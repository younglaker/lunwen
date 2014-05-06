<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class api extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('PRC');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('api_model');
        $this->uid = $this->session->userdata('id');
        $this->urole = $this->session->userdata('role');
    }

    /**
     *login api
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = array(
                'name' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            if( $data['name'] !="" && $data['password'] !="" )
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
                        case 0:
                            redirect('home');
                        break;
                        case 1:
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
                'role' => 0

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
    *userdelete api
    */
    public function userdelete($uid)
    {
        if( $this->isAdmin() )
        {
            if( $this->admin_model->userDelete($uid) )
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
            redirect('index/erro');
        }
        }  
        else
        {
            show_404();
        } 
    }

    private function isRegister($data)
    {
        return  $this->api_model->isRegister( $data );
    }

    private function isAdmin()
    {

        if( $this->uid !== NULL && $this->urole !== '0' )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
