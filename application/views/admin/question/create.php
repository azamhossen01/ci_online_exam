<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>




      <div class="card">
    <div class="card-header"><h3>Create Question</h3></div>
    <div class="card-body">
        <form action="<?= base_url('admin_ctrl/save_question') ?>" method="post" id="create_question_form">
            <div class="form-group">
                <label for="subject_id">Select Subject</label>
                <select name="subject_id" id="subject_id" class="form-control">
                    <option value="">Select Subject</option>
                    <?php foreach($subjects as $key=>$subject){ ?>
                        <option value="<?= $subject->id; ?>"><?= $subject->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <textarea name="question" id="question" cols="30" rows="3" class="form-control" placeholder="Write Question"></textarea>
            </div>
            <div class="form-group">
                <button type="button" onclick="create_options(1)">Create Options</button>
            </div>
            <div id="options">
            
            </div>
            <div class="form-group">
                <button type="submit" onclick="save_subject()">Submit</button>
            </div>
            
        </form>
    </div>
    <div class="card-footer"></div>
</div>
     </div>

<?php $this->load->view('layouts/footer.php'); ?>
<script>
 var data = 0;
$(document).ready(function(){
   
});

function create_options(v){
    

    var html = `
        <div class="form-group row">
            <div class="col-lg-6">
                <input type="text" placeholder="Option" name="option[]" class="form-control option" />
            </div>
            <div class="col-lg-6">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="answer[]" value="${data++}">Correct Answer
                    </label>
                </div>
            </div>
            
        </div>
    `;
    $('#options').append(html);
}



</script>