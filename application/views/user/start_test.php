<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>

    <div class="card">
    <div class="card-header text-center"><h3>Welcome To Online Exam</h3></div>
    <div class="card-body">
       <div class="row">
            <div class="col-lg-12 text-center">
            <h2>Test Your Knowledge</h2>
                <p>This is multiple choice quiz to test your knowledge.</p>
                <b><p>Number of question : <?= $data['question_number']; ?></p></b>
                <b><p>Question Type : Multiple Choice</p></b>
                <a class="btn btn-primary btn-block" href="<?= base_url('user_ctrl/final_start_test/'.$data['subject_id'].'/'.$data['question_number']); ?>">Start Test</a>
            </div>
       </div>
    </div>
    <div class="card-footer"></div>
</div>
</div>



<?php $this->load->view('layouts/footer.php'); ?>