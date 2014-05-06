<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
class Admin_model extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }
  public function getUserList($uid)
  {
    $sql = "SELECT id,name,role FROM p_user WHERE id != ?";
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
