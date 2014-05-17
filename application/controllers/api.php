<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class api extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('PRC');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('api_model');
        $this->load->model('admin_model');
        $this->uid = $this->session->userdata('id');
        $this->urole = $this->session->userdata('role');
    }

    /**
     * login api
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = array(
                'name' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            if( $data['name'] != "" && $data['password'] != "" )
            {
                if( $this->api_model->doLogin( $data ) )
                {
                    $userInfo = $this->api_model->getUserInfoByName( $data['name'] );
                    foreach( $userInfo as $key => $value )
                    {
                        $this->session->set_userdata( $value );
                    }
                    switch( $userInfo[0]['role'] )
                    {
                        case 1:
                            redirect('home/homepage');
                        break;
                        case 2:
                            redirect('admin/paper');
                        case 3:
                            redirect('admin/paper');
                        break;
                    }
                }
                else
                {
                    redirect('home/erro/101');
                }
            }
        }
        else
        {
            show_404();
        }
    }

   /**
    * register api
    */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = array(
                'name' => $this->input->post('username'),
                'password' => md5( $this->input->post('password').'lunwen' ),
                'status' => 0,
            );
            $passconf = md5( $this->input->post('passconf').'lunwen' );
            if( $data['password'] !== $passconf)
            {
                redirect('home/erro/103');
                return FAlSE;
            }
            if( $this->isRegister($data) )
            {
                redirect('home/erro/102');
            }
            else
            {
                $res = $this->api_model->doRegister( $data );
                if( $res ) 
                {
                  redirect('home/erro/202');
                } 
            }
        }
        else 
        {
            show_404();
        }
    }

    /**
     * userdelete api
     *
     */
    public function userdelete($uid,$from = '')
    {
        if( $this->isAdmin() )
        {
            if( $this->admin_model->userDelete($uid) )
            {
                if($from = 'user')
                {
                    
                    redirect('home/homepage');
                }
                else
                {
                    redirect('admin/users');
                }
            }
            else
            {
                redirect('home/erro');
            }
        }  
        else
        {
            show_404();
        } 
    }

    /**
     * modify psw api
     */
    public function modifypsw()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $uid = $this->uid;
            $userInfo = $this->api_model->getUserInfoById( $uid );
            print_r($userInfo);
            $data = array(
                'name' => $userInfo[0]['name'],
                'password' => $this->input->post('modify-psw-old')
            );
            $psw_new = md5( $this->input->post('modify-psw-new').'lunwen' );
            $psw_conf = md5( $this->input->post('modify-psw-conf').'lunwen' );

            if( $data['name'] != "" && $data['password'] != "" && $psw_new != "" )
            {
                if( $this->api_model->doLogin( $data )){
                    if ($psw_new == $psw_conf) {
                        echo "yes";
                        $data['password'] = $psw_new;
                        $this->api_model->doUpdateUser($uid,$data);
                    }
                }
                switch( $userInfo[0]['role'] )
                {
                    case 1:
                        redirect('home/homepage');
                    break;
                    case 2:
                        redirect('admin/paper');
                    case 3:
                        redirect('admin/paper');
                    break;
                }
            }
        }
        else
        {
            show_404();
        }
    }
    /**
     * set user role
     *
     */
    public function setrole($uid,$role) {

        if( $this->isAdmin() )
        {
            $data = array(
                'role' => $role
            );
            if( $this->admin_model->userUpdate( $uid,$data ) )
            {
                redirect('admin/users');
            }
            else
            {
                redirect('home/erro');
            }
        }  
        else
        {
            show_404();
        } 
    }

    /**
    *userupdate api
    */
    public function userupdate($uid)
    {
        if( $this->isAdmin() )
        {
            $data = array(
                'name' => $this->input->post( 'username' ),
                'role' => $this->input->post( 'role' )
            );
            if( $this->admin_model->userUpdate( $uid,$data ) )
            {
                redirect('admin/user');
            }
            else
            {
                redirect('home/erro');
            }
        }  
        else
        {
            show_404();
        } 
    }

    /**
     * upload paper
     *
     */

    public function do_upload()
    {
        if( !is_login() ) show_404();
        $title = $this->input->post('title');
        $author = $this->input->post('author');
        $teacher = $this->input->post('teacher');
        $school = $this->input->post('school');
        $college = $this->input->post('college');
        $career = $this->input->post('career');
        $catage = $this->input->post('catage');
        $description = $this->input->post('description');
        $number = $this->input->post('number');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|ppt|pptx|excel';
        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('attachment') )
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $attachment = "uploads/".$data['upload_data']['client_name'];
            $status = $this->isAdmin() ? 1 : 0;
            $data = array(
                'title' => $title,
                'author' => $author,
                'leader' => $teacher,
                'university' => $school,
                'college' => $college,
                'specialty' => $career,
                'research' => $catage,
                'attachment' => $attachment,
                'summary' => $description,
                'publisher_id' => $this->uid,
                'status' => $status,
                'number' => trim($number),
                'time' => date("Y-m-d H:i:s",time())
            );
            $this->api_model->doUpload($data);
            redirect('admin/paper');
        }
    }

    /**
     * update paper
     *
     */
    public function do_update($pid,$from = '')
    {
        if( !is_login() ) show_404();
        $title = $this->input->post('title');
        $author = $this->input->post('author');
        $number = $this->input->post('number');
        $teacher = $this->input->post('teacher');
        $school = $this->input->post('school');
        $college = $this->input->post('college');
        $career = $this->input->post('career');
        $catage = $this->input->post('catage');
        $description = $this->input->post('description');
        $status = $this->input->post('publish');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|ppt|pptx|excel';
        $this->load->library('upload', $config);
       $data = array(
            'title' => $title,
            'number' => $number,
            'author' => $author,
            'leader' => $teacher,
            'university' => $school,
            'college' => $college,
            'specialty' => $career,
            'research' => $catage,
            'summary' => $description,
            'publisher_id' => $this->uid,
            'status' => $status
        );
        if ( ! $this->upload->do_upload('attachment') )
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $attachment = "uploads/".$data['upload_data']['client_name'];
            $data['attachment'] = $attachement;
        }

        $this->api_model->doUpdate($pid,$data);
        if($from == 'user') {
            redirect('home/homepage');
        }
        else
        {
            redirect('admin/paper');
        }
    }


    /**
     *userdelete api
     */
    public function paperdelete($pid)
    {
        if( $this->isAdmin() )
        {
            if( $this->admin_model->paperDelete($pid) )
            {
                redirect('admin/paper');
            }
            else
            {
                redirect('home/erro');
            }
        }  
        else
        {
            show_404();
        } 
    }

    /**
     * set user role
     *
     */
    public function paperpub($uid,$status) {

        if( $this->isAdmin() )
        {
            $data = array(
                'status' => $status
            );
            if( $this->admin_model->paperUpdate( $uid,$data ) )
            {
                redirect('admin/paper');
            }
            else
            {
                redirect('home/erro');
            }
        }  
        else
        {
            show_404();
        } 
    }

    public function collection($pid) 
    {
        if( !is_login() ) show_404();
        $data = array(
            'id' => '',
            'p_id' => $pid,
            'u_id' => $this->uid
        );
        $this->api_model->collection($data);
        redirect('home/homepage');
    }

    public function delcollection($pid)
    {
        if( !is_login() ) show_404();
        $this->api_model->delcollection($pid,$this->uid);
        redirect('home/homepage');
    }


    private function isRegister($data)
    {
        return  $this->api_model->isRegister( $data );
    }

    private function isAdmin()
    {
        if( $this->uid !== NULL && $this->urole > 1 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
