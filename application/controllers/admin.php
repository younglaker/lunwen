<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	* 管理论文
	**/
	public function paper()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";
 
		$this->load->view("common/header.php", $data);
		$this->load->view('admin_paper', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 管理用户
	 **/
	function users()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$this->load->view("common/header.php", $data);
		$this->load->view('admin_users', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 审批论文
	 **/
	function approval()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$this->load->view("common/header.php", $data);
		$this->load->view('admin_approval', $data);
		$this->load->view("common/footer.php", $data);
	}

	/**
	 * 上传论文
	 **/
	function upload()
	{
		$base_url = base_url();
		$data['base_url'] = $base_url."index.php";
		$data['css'] = $base_url."res/css";
		$data['js'] = $base_url."res/js";
		$data['img'] = $base_url."res/img";

		$this->load->view("common/header.php", $data);
		$this->load->view('admin_upload', $data);
		$this->load->view("common/footer.php", $data);
	}

}
