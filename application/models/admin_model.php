<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function getUserList($uid,$page)
    {
        $pagesize = 10;
        $sql = "SELECT COUNT(id) AS num FROM p_user WHERE id != ?";
        $query = $this->db->query($sql,array($uid));
        $result = $query->result_array();
        $offset = ($page-1)*$pagesize;
        $count = count($result) > 0?$result[0]['num'] : 1;
        $total = ceil($count/$pagesize);
        $sql = "SELECT id,name,role,'$total' AS total 
                FROM p_user WHERE id != ? 
                ORDER BY id DESC 
                LIMIT $offset,$pagesize";
        $query = $this->db->query($sql,array($uid));
        return $query->result_array();
    }

    public function getPaperList($uid,$page,$type)
    {
        $pagesize = 10;
        $sql = "SELECT COUNT(id) AS num FROM thesis";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $offset = ($page-1)*$pagesize;
        $count = count($result) > 0 ? $result[0]['num'] : 1;
        $total = ceil($count/$pagesize);
        $sql = "SELECT t.id,t.number,t.attachment,t.title,u.name,$total as total 
                FROM p_user as u, thesis as t 
                WHERE u.id = t.publisher_id AND t.status = $type
                ORDER BY t.id DESC
                LIMIT $offset,$pagesize";
        $query = $this->db->query($sql);
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
    public function paperDelete($pid)
    {
        $this->db->delete('thesis', array('id' => $pid));
        return TRUE;
    }
    public function paperUpdate($pid,$data)
    {
        $this->db->where('id', $pid);
        $this->db->update('thesis', $data);
        return TRUE;
    }

    public function getUserInfoById($uid)
    {
        $sql = "SELECT id,name,role FROM p_user WHERE id = ?";
        $query = $this->db->query($sql,array($uid));
        return $query->result_array();
    }
}
