<?php 
class Admin extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert_data($table,$data){
        $query = $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    public function get_data($table,$where=false){
        $query = $this->db->get($table)->result();
        return $query;
    }

    public function get_questions(){
        $query = $this->db->select('q.*,s.name')->from('questions q')->join('subjects as s','s.id=q.subject_id')->get()->result();
        return $query;
    }

    public function get_conditional_data($table,$where){
        $query = $this->db->where($where)->get($table)->result();
        return $query;
    }

    public function update_data($table,$where,$data){
        $query = $this->db->where($where)->update($table,$data);
        return $query;
    }
}