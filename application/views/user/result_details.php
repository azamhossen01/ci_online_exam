<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>
    <?php 
        $exam = $this->user->get_conditional_data('exams',['id'=>$exam_id]);
    ?>
    <div class="card">
    <div class="card-header text-center"><h3>All Question & Ans : <?= $exam[0]->total_marks; ?></h3></div>
    <div class="card-body">
       <div class="row">
            <div class="col-lg-12 text-left">
            <?php foreach($exam_details as $key=>$ed){  
                $question = $this->user->get_conditional_data('questions',['id'=>$ed->question_id]);?>
                <h3>Ques <?= $key+1 ?> : <?= $question[0]->question ?></h3>
              <?php  $options = $this->user->get_conditional_data('options',['question_id'=>$ed->question_id]);
                foreach($options as $key=>$opt){ ?> 
                
                <h4 class="text-<?= $opt->correct == 1 ? 'success' : '' ?>">&copy; <?= $opt->opt ?></h4>
            <?php } } ?> 
            </div>
       </div>
       <a class="btn btn-success btn-block" href="<?= base_url('user_ctrl/exam') ?>">Start Again</a> 
    </div>
    <div class="card-footer"></div>
</div>
</div>



<?php $this->load->view('layouts/footer.php'); ?>