<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>
    <form action="<?= base_url('user_ctrl/exam_submit/'.$subject_id) ?>" method="post">
    <?php foreach($questions as $key=>$question){ ?>
    <div class="card" style="display:none"  id="next_question<?=$key?>">
    <div class="card-header text-center"><h3>Question <?= $key+1 ?> of <?= count($questions) ?></h3></div>
    <div class="card-body">
       <div class="row">
            <div class="col-lg-12 text-center">
                    <h3><?= $question->question ?></h3>
                    <?php 
                        $options = $this->user->get_conditional_data('options',['question_id'=>$question->id]);
                        foreach($options as $k=>$option){ ?>
                       
                        
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" value="<?= $question->id.'-'.$option->id ?>" class="form-check-input" name="opt<?= $question->id ?>"><?= $option->opt ?>
                            </label>
                        </div>
                        
                           
                        <?php } ?>
                        <?php if(($key+1) < count($questions)){ ?>
                        <a class="btn btn-primary" onclick="next_question(<?=$key?>)">Next Question</a>
                        <?php }else{ ?>
                            <button type="submit">Submit Answer</button>
                        <?php } ?>
                        
            </div>
       </div>
    </div>
    <div class="card-footer"></div>
</div>


<?php } ?>

</form>
</div>



<?php $this->load->view('layouts/footer.php'); ?>

<script>
    $('document').ready(function(){
        $("#next_question0").show();
    });
    function next_question(key){
        var prev_page = key;
        var next_page = key+1;
        $('#next_question'+next_page).show()
        $('#next_question'+prev_page).hide();
    }
</script>