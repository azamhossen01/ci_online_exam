<?php
class Auth extends CI_Model{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role') !== null){
            $role = $this->session->userdata('role');
            if($role == 1){
                redirect('admin_ctrl');
            }elseif($role == 2){
                redirect('user_ctrl');
            }
        }
    }

    public function insert($table,$data){
        $query = $this->db->insert($table,$data);
        return $query;
    }

    public function login($table,$where){
        $query = $this->db->where($where)->get($table)->row();
        $this->session->set_userdata('id',$query->id);
        $this->session->set_userdata('role',$query->role);
        return $query;
    }
}