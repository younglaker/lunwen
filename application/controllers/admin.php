<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
    *
    */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->library('session');
        $this->uid = $this->session->userdata('id');
        $this->urole = $this->session->userdata('role');
        // $this->load->model('lh_model');
        // $this->load->model('org_model');
        // $this->load->model('event_model');
        // $this->load->model('people_model');
        // $this->load->library('pagination');

        // 载入用户验证类
        // $this->load->library('account');
        // $this->userInfo['uid'] 		= $this->account->get_uid();
        // $this->userInfo['uname'] 	= $this->account->get_name();
    }

    /**
    * 管理论文
    **/
    public function paper($page = 1)
    {

        if( !$this->isAdmin() || !is_login() ) {
            redirect('home');
        }
        $base_url = base_url();
        $data['base_url'] = $base_url."index.php";
        $data['css'] = $base_url."res/css";
        $data['js'] = $base_url."res/js";
        $data['img'] = $base_url."res/img";
        $data['paperlist'] = $this->admin_model->getPaperList( $this->uid,$page,1);
        $data['current'] = $page;
        $data = $this->set_user_info($data);
        $this->load->view("common/header.php", $data);
        $this->load->view('admin_paper', $data);
        $this->load->view("common/footer.php", $data);
    }

    /**
     * 管理用户
     **/
    function users($page = 1)
    {

        if( !$this->isAdmin() || !is_login() ) 
        {
            redirect('home');
        }
        $base_url = base_url();
        $data['base_url'] = $base_url."index.php";
        $data['css'] = $base_url."res/css";
        $data['js'] = $base_url."res/js";
        $data['img'] = $base_url."res/img";
        $data['userlist'] = $this->admin_model->getUserList( $this->uid,$page );
        
        $data['current'] = $page;
        $data = $this->set_user_info($data);
        $this->load->view("common/header.php", $data);
        $this->load->view('admin_users', $data);
        $this->load->view("common/footer.php", $data);
    }

    /**
     * 审批论文
     **/
    function approval($page = 1)
    {


        if( !$this->isAdmin() || !is_login() ) 
        {
            redirect('home');
        }
        $base_url = base_url();
        $data['base_url'] = $base_url."index.php";
        $data['css'] = $base_url."res/css";
        $data['js'] = $base_url."res/js";
        $data['img'] = $base_url."res/img";

        $data['current'] = $page;
        $data['paperlist'] = $this->admin_model->getPaperList( $this->uid,$page,0);
        $data = $this->set_user_info($data);
        $this->load->view("common/header.php", $data);
        $this->load->view('admin_approval', $data);
        $this->load->view("common/footer.php", $data);
    }

    /**
     * 上传论文
     **/
    function upload()
    {
        
        if( !is_login() ) 
        {
            redirect('home');
        }
        $base_url = base_url();
        $data['base_url'] = $base_url."index.php";
        $data['css'] = $base_url."res/css";
        $data['js'] = $base_url."res/js";
        $data['img'] = $base_url."res/img";

        $data = $this->set_user_info($data);
        $this->load->view("common/header.php", $data);
        $this->load->view('admin_upload', $data);
        $this->load->view("common/footer.php", $data);
    }

    /**
     * 编辑论文
     * 
     **/

    function edit($pid)
    {
        
        if( !is_login() ) 
        {
            redirect('home');
        }
        $base_url = base_url();
        $data['base_url'] = $base_url."index.php";
        $data['css'] = $base_url."res/css";
        $data['js'] = $base_url."res/js";
        $data['img'] = $base_url."res/img";
        $data['paper'] = $this->admin_model->getPaper($pid);
        $data = $this->set_user_info($data);
        $this->load->view("common/header.php", $data);
        $this->load->view('admin_edit', $data);
        $this->load->view("common/footer.php", $data);
    }

    private function set_user_info($data)
    {
        $data['uid'] = $this->session->userdata("id");
        $data['name'] = $this->session->userdata("name");
        $data['role'] = $this->session->userdata("role");
        return $data; 
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
