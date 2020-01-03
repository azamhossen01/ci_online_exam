<?php 
class User_ctrl extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User','user');
        if($this->session->userdata('id') == null){
            redirect('/');
        }
        if($this->session->userdata('role') == 1){
            redirect('admin_ctrl');
        }
    }

    public function index(){
        $this->load->view('user/home');
    }

    public function user_profile($id){
        
        $user = $this->user->get_conditional_data('user',['id'=>$id]);
        $this->load->view('user/user_profile',compact('user'));
    }

    public function update_profile(){
        $id = $this->session->userdata('id');
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $result = $this->user->update_data('user',['id'=>$id],$data);
        if($result){
            echo $id;
        }
    }

    // exam
    public function exam(){
        $subjects = $this->user->get_data('subjects');
        $this->load->view('user/exam.php',compact('subjects'));
    }

    public function start_test(){
        $data['subject_id'] = $this->input->post('subject_id');
        $data['question_number'] = $this->input->post('question_number');
        
        $this->load->view('user/start_test.php',compact('data'));
    }

    public function final_start_test($subject_id,$count){
        $questions = $this->db->where('subject_id',$subject_id)->get('questions',$count)->result();
        
        $this->load->view('user/final_start_test',compact('questions','subject_id'));
    }

    public function exam_submit($subject_id){
        $post_data = $this->input->post();
        // echo "<pre>";
        // print_r($post_data);die();

        
        $exam_data['user_id'] = $this->session->userdata('id');
        $exam_data['subject_id'] = $subject_id;
       
        $exam_data['total_marks'] = count($this->input->post());
        $exam_id = $this->user->insert_data('exams',$exam_data);
        
        if($exam_id){
            foreach($post_data as $p_data){
                $data['question_id'] = explode('-',$p_data)[0];
                $data['option_id'] = explode('-',$p_data)[1];
                $data['exam_id'] = $exam_id;
                $data['is_correct'] = $this->user->anyName('options',['id'=>$data['option_id']],'correct');
                $this->user->insert_data('exam_details',$data);
            }
            
            $score = $this->user->num_rows('exam_details',['exam_id'=>$exam_id,'is_correct'=>1]);
            $result = $this->user->update_data('exams',['id'=>$exam_id],['score'=>$score]);
            if($result){
               
                $this->load->view('user/result',compact('exam_id'));
            }
        }
        
    }

    public function view_result($exam_id){
        $exam = $this->user->get_conditional_data('exams',['id'=>$exam_id]);
        $exam_details = $this->user->get_conditional_data('exam_details',['exam_id'=>$exam_id]);
        $this->load->view('user/result_details',compact('exam_id','exam_details'));
    }

    
}