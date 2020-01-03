<?php
class Auth_ctrl extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth','auth');

    }

    public function index(){
        $this->load->view('index.php');
    }

    public function registration(){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        $result = $this->auth->insert('user',$data);
        echo $result;
    }

    public function sign_in(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $result = $this->auth->login('user',['email'=>$email,'password'=>$password]);
        echo json_encode($result);
    }

    
}