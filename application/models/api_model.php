<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
class Api_model extends CI_Model 
{ 
    public function __construct()
    {
        $this->load->database();
    }
    public function isRegister($data)
    {
        $sql = "SELECT id FROM p_user WHERE name = ?";
        $query = $this->db->query($sql, array( $data['name'] ));
        $res = $query->result_array();
        return count( $res ) > 0 ? TRUE:FALSE;
    }

    public function doRegister($data)
    {
        return $this->db->insert('p_user',$data);
    }

    public function doUpload($data)
    {

        return $this->db->insert('thesis',$data);
    }

    public function doUpdate($pid,$data)
    {

        $this->db->where('id', $pid);
        $this->db->update('thesis', $data);
    }

    public function doLogin($data)
    {
        $sql = "SELECT id FROM p_user WHERE name = ? AND password = ?";
        $query = $this->db->query($sql,array($data['name'],md5( $data['password']."lunwen" )));
        $res = $query->result_array();
        return count( $res ) > 0 ? TRUE:FALSE;
    }

    public function getUserInfoByname($name)
    {
        $sql = "SELECT id,name,role FROM p_user WHERE name = ?";
        $query = $this->db->query($sql,array($name));
        return $query->result_array();
    }
}
