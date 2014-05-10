<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	class Home extends CI_Controller {

	/**
	*
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('home_model');
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
	*	首页
	**/
	public function index()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";
		// $data['upload']['event'] 	= $base_url."res/upload/event/";
		// $data['upload']['user'] 	= $base_url."res/upload/user/";
		$data = $this->set_user_info($data);
		// 最新论文
		$Newpaper = $this->home_model->getNewPaper(8);
		$data['newpaper'] = $Newpaper;
		// 最热新闻
		$Hotpaper = $this->home_model->getHotpaper(8);
		$data['hotpaper'] = $Hotpaper;
		$this->load->view("common/header.php", $data);
		$this->load->view('index', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 登录管理类
	 *
	 * @return void
	 **/
	function log()
	{
		if( is_login() ) {
			redirect('home');
		}
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";
		
		$data = $this->set_user_info($data);
		$this->load->view("common/header.php", $data);
		$this->load->view('login', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 注册管理类
	 *
	 * @return void
	 **/

	function logout()
	{
		$user_info = array('name' => '','id' => '','role' => '');
		$this->session->unset_userdata($user_info);
		redirect('home');
	}

	/**
	 * 注册管理类
	 *
	 * @return void
	 **/
	function register()
	{
		if( is_login() ) {
			redirect('home');
		}
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";
		
		$data = $this->set_user_info($data);
		$this->load->view("common/header.php", $data);
		$this->load->view('regist', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 列表
	 *
	 * @return void
	 **/
	function lister( $location = 'all',$sec = '',$page = 1)
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";
        switch($location) {
            case 'all':
                $lister = $this->home_model->getLister($page,$location,$sec);
                $item = '';
                break;
            case 'university':
                $lister = $this->home_model->getLister($page,$location,$sec);
                $item = $this->home_model->getSchoolName($page);
                break;
            case 'research':
                $lister = $this->home_model->getLister($page,$location,$sec);
                $item = $this->home_model->getResearch($page);
                break;
            case 'specialty':
                $lister = $this->home_model->getLister($page,$location,$sec);
                $item = $this->home_model->getSpecialty($page);
                break;
        }
        $data['lister'] = $lister;
        $data['item'] = $item;
        $data['location'] = $location;
		$data['current'] = $page;
		$data = $this->set_user_info($data);
		// e($data);
		$this->load->view("common/header.php", $data);
		$this->load->view('list', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 论文详情
	 *
	 * @return void
	 **/
	function paper()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$data = $this->set_user_info($data);

		$pid = $this->uri->segment(3);   // 获取论文id
		$uid = $data['uid'];	// 当前登录用户id
		$paper = $this->home_model->getPaper($pid, $uid);
		$data['paper'] = $paper;

		$this->home_model->updateclick($pid);	// 点击量++
		
		$this->load->view("common/header.php", $data);
		$this->load->view('paper', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 个人主页
	 *
	 **/
	function homepage()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$data = $this->set_user_info($data);

		$user_name = $data['name'];
		$user_id = $data['uid'];

		$selfPublish = $this->home_model->selfPublish($user_id);
		$data['selfPublish'] = $selfPublish;

		$selfCollect = $this->home_model->selfCollect($user_id);
		$data['selfCollect'] = $selfCollect;
		
		$this->load->view("common/header.php", $data);
		$this->load->view('user_home', $data);
		$this->load->view("common/footer.php", $data);
	}
	/**
	 * 错误处理
	 */
	public function erro($errcode)
	{
		switch($errcode)
		{
		case '101':
		  echo "用户名或密码错误!"."<a href='".$this->redirectUrl('log')."'>登录</a>";
		  break;
		case 102:
		  echo "用户已经存在!"."<a href='".$this->redirectUrl('register')."'>注册</a>";
		  break;
		case 103:
		  echo "两次输入密码不同!"."<a href='".$this->redirectUrl('register')."'>注册</a>";
		  break;
		case 201:
		  echo "登陆成功!"."<a href='".$this->redirectUrl('index')."'>返回首页</a>";
		  break;
		case 202:
		  echo "注册成功"."<a href='".$this->redirectUrl('log')."'>登录</a>";
		  break;

		}
	}
	private function set_user_info($data)
	{
		$data['uid'] = $this->session->userdata("id");
		$data['name'] = $this->session->userdata("name");
		$data['role'] = $this->session->userdata("role");
		return $data; 
	}    
	private function redirectUrl($location)
	{
		return base_url()."index.php/home/".$location;
	}

}
