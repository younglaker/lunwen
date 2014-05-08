<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
class Home_model extends CI_Model {
	function __construct()
	{
		$this->load->database();
	}

	/*
	* 获取最新论文，首页显示
	*/
	public function getNewPaper($count)
	{
		$sql = "SELECT * FROM thesis LIMIT ?";
		$query = $this->db->query($sql, array($count));
		return $query->result_array();
	}

	/*
	* 获取最热门论文，首页显示
	*/
	public function getHotPaper($count)
	{
		$sql = "SELECT * FROM thesis LIMIT ?";
		$query = $this->db->query($sql, array($count));
		return $query->result_array();
	}

	/*
	* 获取论文详情
	*/
	public function getPaper($pid, $uid)
	{
		// 此处有做限制，未审核过的论文只有自己能看见
		$sql = "SELECT * FROM thesis WHERE id = ? AND (status = 1 OR publisher_id = ?)";
		$query = $this->db->query($sql, array($pid, $uid));
		return $query->result_array();
	}
}