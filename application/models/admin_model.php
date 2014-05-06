<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
class Admin_model extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }
  public function getUserList($uid,$page)
  {
    $pagesize = 10;
    $sql = "SELECT COUNT(id) AS num FROM p_user";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $offset = ($page-1)*$pagesize;
    $count = count($result) > 0?$result[0]['num']:1;
    $total = ceil($count/$pagesize);
    $sql = "SELECT id,name,role,'$total' AS total 
            FROM p_user WHERE id != ? 
            ORDER BY id DESC 
            LIMIT $offset,$pagesize";
    $query = $this->db->query($sql,array($uid));
    return $query->result_array();
  }
  public function userDelete($uid)
  {
    $this->db->delete('p_user', array('id' => $uid));
    return TRUE;
  }
  public function userUpdate($uid,$data)
  {
    $this->db->where('id', $uid);
    $this->db->update('p_user', $data);
    return TRUE;
  }
  public function getUserInfoById($uid)
  {
    
    $sql = "SELECT id,name,role FROM p_user WHERE id = ?";
    $query = $this->db->query($sql,array($uid));
    return $query->result_array();
  }
}
