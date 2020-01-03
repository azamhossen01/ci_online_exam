<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>
    <?php 
        $exam = $this->user->get_conditional_data('exams',['id'=>$exam_id]);
    ?>
    <div class="card">
    <div class="card-header text-center"><h3>You Are Done!</h3></div>
    <div class="card-body">
       <div class="row">
            <div class="col-lg-12 text-center">
            <h4>Congratulation ! You have just completed the test.</h4>
            <h4>Final Score : <?= $exam[0]->score; ?></h4>
             <a class="btn btn-success btn-block" href="<?= base_url('user_ctrl/view_result/'.$exam_id) ?>">View Result</a>   
             <a href="<?= base_url('user_ctrl/exam') ?>">Start Again</a>   
                
            </div>
       </div>
    </div>
    <div class="card-footer"></div>
</div>
</div>



<?php $this->load->view('layouts/footer.php'); ?>