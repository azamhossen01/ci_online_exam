<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>


    <div class="card">
    <div class="card-header"><h3>Create Subject</h3></div>
    <div class="card-body">
        <form action="" id="create_subject">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Subject Name">
            </div>
            <button type="button" onclick="save_subject()">Submit</button>
        </form>
    </div>
    <div class="card-footer"></div>
</div>
</div>



<?php $this->load->view('layouts/footer.php'); ?>
<script>
    function save_subject(){
        var name = $('#name').val();
        var li = "http://localhost/ci_online_exam/";
        $.ajax({
            type : 'post',
            data : {name},
            dataType : 'json',
            url : li + "admin_ctrl/save_subject",
            success : function(data){
                if(data == 1){
                    alert('Subject Created Successfully');
                    $("#create_subject").trigger('reset');
                }
            }
        });
    }
</script>