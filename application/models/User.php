<?php 

class User extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_conditional_data($table,$where){
        $query = $this->db->where($where)->get($table)->result();
        return $query;
    }

    public function update_data($table,$where,$data){
        $query = $this->db->where($where)->update($table,$data);
        return $query;
    }

    public function anyName($table,$where,$field){
        $query = $this->db->select($field)->from($table)->where($where)->get()->row();
        return $query->$field;
    }

    public function get_data($table){
        $query = $this->db->get($table)->result();
        return $query;
    }

    public function insert_data($table,$data){
        $query = $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function num_rows($table,$where){
        $query = $this->db->where($where)->get($table)->num_rows();
        return $query;
    }
}