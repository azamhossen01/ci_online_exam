<?php 
class Admin_ctrl extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Admin','admin');
        if($this->session->userdata('id') == null){
            redirect('/');
        }
        if($this->session->userdata('role') == 2){
            redirect('user_ctrl');
        }
    }

    public function index(){
        $this->load->view('admin/home');
    }


    // subject crud 
    public function subject_create(){
        $this->load->view('admin/subject/create');
    }
    public function save_subject(){
        $data['name'] = $this->input->post('name');
        $result = $this->admin->insert_data('subjects',$data);
        echo json_encode($result);
    }
    public function subject_list(){
        $this->load->view('admin/subject/index');
    }
    public function get_subject_list(){
        $result = $this->admin->get_data('subjects');
        echo json_encode($result);
    }



    // question crud
    public function question_list(){
        
        $this->load->view('admin/question/index');
    }
    public function question_create(){
        $subjects = $this->admin->get_data('subjects');
        $this->load->view('admin/question/create',compact('subjects'));
    }
    public function save_question(){
        
        $question_data['subject_id'] = $this->input->post('subject_id');
        $question_data['question'] = $this->input->post('question');
        $last_id = $this->admin->insert_data('questions',$question_data);
        if($last_id){
            $options = $this->input->post('option');
            $answers = $this->input->post('answer');
             $count = count($answers);
             
            foreach($options as $key=>$option){
                   
                    
                        $option_data['question_id'] = $last_id;
                        $option_data['opt'] = $options[$key];
                        if(in_array($key, $answers)){
                            $option_data['correct'] = 1;
                        }else{
                            $option_data['correct'] = 0;
                        }
                        $this->admin->insert_data('options',$option_data);
                    
                
            }

            
        }
        redirect('admin_ctrl/question_list');
    }
    public function get_question_list(){
        $result = $this->admin->get_questions();
        echo json_encode($result);
    }

    public function show_question_details($ques_id){
        // echo $ques_id;die();
        $result = $this->admin->get_conditional_data('options',['question_id'=>$ques_id]);
        echo json_encode($result);
    }


    // manage general user
    public function manage_user(){
        $this->load->view('admin/user/index.php');
    }
    public function get_all_users(){
        $result = $this->admin->get_conditional_data('user',['role'=>2]);
        echo json_encode($result);
    }
    public function change_status(){
        $status = $this->input->post('status') == 1 ? 0 : 1;
        $id = $this->input->post('id');
        $result = $this->admin->update_data('user',['id'=>$id],['status'=>$status]);
        echo json_encode($result);
    }
}