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
		$sql = "SELECT * FROM thesis ORDER BY time DESC LIMIT ?";
		$query = $this->db->query($sql, array($count));
		return $query->result_array();
	}

	/*
	* 获取最热门论文，首页显示
	*/
	public function getHotPaper($count)
	{
		$sql = "SELECT * FROM thesis ORDER BY click DESC LIMIT ?";
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

	/*
	* 点击量+1
	*/
	public function updateclick($pid)
	{
		$sql = "SELECT click FROM thesis WHERE id = ?";
		$query = $this->db->query($sql, array($pid));
		$result = $query->result_array();
		$click = ++$result[0]['click'];	// 前加

		$sql = "UPDATE thesis SET click = ? WHERE id = ?";
		$query = $this->db->query($sql, array($click, $pid));
	}

	/*
	* 获取全部论文
	*/
	public function getLister($page)
	{
		$pagesize = 10;
		$sql = "SELECT COUNT(id) AS num FROM thesis";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$offset = ($page-1)*$pagesize;
		$count = count($result)>0 ? $result[0]['num'] : 1;
		$total = ceil($count/$pagesize);
		// 此处不需要传入参数，获取所以得论文信息
		$sql = "SELECT *,'$total' AS total FROM thesis ORDER BY id DESC LIMIT $offset,$pagesize";
		$query  = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 *  获取所有学校的名称
	 */
	public function getSchoolName()
	{
		$sql = "SELECT DISTINCT university FROM thesis";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 *  获取所有研究方向
	 */
	public function getResearch()
	{
		$sql = "SELECT DISTINCT research FROM thesis";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 *  获取所有专业
	 */
	public function getSpecialty()
	{
		$sql = "SELECT DISTINCT specialty FROM thesis";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 *  本人发布论文
	 */
	public function selfPublish($user_name)
	{
		$sql = "SELECT * FROM thesis WHERE author = ?";
		$query = $this->db->query($sql, array($user_name));
		return $query->result_array();
	}

	/**
	 *  本人收藏论文
	 */
	public function selfCollect($user_id)
	{
		$sql = "SELECT * FROM thesis AS t WHERE t.id = (SELECT c.p_id FROM collect_paper AS c WHERE c.u_id = ? ) ";
		$query = $this->db->query($sql, array($user_id));
		return $query->result_array();
	}
}