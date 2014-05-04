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
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$this->load->view("common/header.php", $data);
		$this->load->view('login', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 注册管理类
	 *
	 * @return void
	 **/
	function register()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$this->load->view("common/header.php", $data);
		$this->load->view('regist', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 列表
	 *
	 * @return void
	 **/
	function rigster()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

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

		$this->load->view("common/header.php", $data);
		$this->load->view('paper', $data);
		$this->load->view("common/footer.php", $data);
	}

}
