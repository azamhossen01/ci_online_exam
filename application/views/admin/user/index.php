<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>


    <div class="card">
    <div class="card-header"><h3>Subject List</h3>
        <button onclick="create_subject()">Create New Subject</button>
    </div>
    <div class="card-body" id="subject_list">
       
    </div>
    <div class="card-footer"></div>
</div>
</div>

<!-- modal -->
<!-- <div class="modal" tabindex="-1" role="dialog" id="create_subject_modal"> -->
<div id="create_subject_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card">
    <div class="card-header"><h3>Create Subject</h3></div>
    <div class="card-body">
        <form action="" id="create_subject_form">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('layouts/footer.php'); ?>
<script>
var li = "http://localhost/ci_online_exam/";
$(document).ready(function(){
    get_all_users();
});


    function get_all_users(){
        
        $.ajax({
            type : 'post',
            dataType : 'json',
            url : li + "admin_ctrl/get_all_users",
            success : function(data){
                // console.log(data[0]);
                var user_count = data.length;
                var counter = 0;
                var html = `
                    <table class="table table-bordered"><thead><tr><th>ID</th><th>Name</th><th>Created At</th><th>Status</th><th>Action</th></thead><tbody>
                `;
                for(var i = 0; i < user_count; i++){
                    html += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${data[i].name}</td>
                            <td>${data[i].created_at}</td>
                            <td>`;
                               
                                if(data[i].status == 1){
                                    html += `
                                     <button class="btn btn-${data[i].status==1?'success':'danger'}" onclick="change_status(${data[i].id},${data[i].status})">Deactive</button>
                                    `;
                                }else{
                                    
                                    html += `<button class="btn btn-${data[i].status==1?'success':'danger'}" onclick="change_status(${data[i].id},${data[i].status})">Active</button>`;
                                }
                                
                                
                            html += `</td>
                            <td><button class="btn btn-warning">Edit</button></td>
                      </tr>
                    `;
                }
                $('#subject_list').html(html);
            }
        });
    }
   

    function create_subject(){
        $('#create_subject_modal').modal('show');
    }

    function change_status(id,status){
        
            var data = {id:id,status:status}
            $.ajax({
                data : data,
                type : 'post',
            dataType : 'json',
            url : li + "admin_ctrl/change_status/",
            success : function(data){
                if(data == 1){
                    alert('Change Status Successfully');
                    get_all_users();
                }
            }
            });
        
    }

    function save_subject(){
        var name = $('#name').val();
        var li = "http://localhost/ci_online_exam/";
        $.ajax({
            type : 'post',
            data : {name},
            dataType : 'json',
            url : li + "admin_ctrl/save_subject",
            success : function(data){
                if(data){
                    alert('Subject Created Successfully');
                    $("#create_subject").trigger('reset');
                    get_all_subjects();
                    $('#create_subject_modal').modal('hide');
                    
                }
            }
        });
    }
</script>