<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>

    <div class="card">
    <div class="card-header text-center"><h3>Welcome To Online Exam ! Start Now</h3></div>
    <div class="card-body">
       <div class="row">
            <div class="col-lg-6">
                <img src="https://eblcoaching.com/wp-content/uploads/2015/09/Study-Skills-for-Success-This-School-Year.jpg" width="100%" alt="">
            </div>
            <div class="col-lg-6 text-center">
                <h3>Start Test</h3>
                <form action="<?= base_url('user_ctrl/start_test') ?>" method="post">
                    <div class="form-group">
                        <label for="subject_id">Choose Subject</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="">Select One</option>
                            <?php foreach($subjects as $key=>$subject){ ?>
                                <option value="<?= $subject->id ?>"><?= $subject->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question_number">Number Of Question</label>
                        <input type="number" name="question_number" id="question_number" class="form-control" placeholder="Number of Question">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Start Now</button>
                </form>
                
            </div>
       </div>
    </div>
    <div class="card-footer"></div>
</div>
</div>



<?php $this->load->view('layouts/footer.php'); ?>