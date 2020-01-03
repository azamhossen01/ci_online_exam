<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>


    <div class="card">
    <div class="card-header"><h3>Questions List</h3>
        <!-- <button onclick="create_question()">Create New Question</!--> 
        <a class="btn btn-danger" href="<?= base_url('admin_ctrl/question_create'); ?>">Create New Question</a>
    </div>
    <div class="card-body" id="subject_list">
       
    </div>
    <div class="card-footer"></div>
</div>
</div>

<!-- modal -->
<!-- <div class="modal" tabindex="-1" role="dialog" id="create_subject_modal"> -->
<div id="question_details_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
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
            <div class="card-header"><h3 id="card_header"></h3></div>
            <div class="card-body">
                <h4>Ques : <span id="question"></span></h4>
                <h5>Ans : <span id="answer"></span></h5>
            </div>
            <div class="card-footer"></div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('layouts/footer.php'); ?>
<script>
var li = "http://localhost/ci_online_exam/";
$(document).ready(function(){
    get_all_questions();
   
});





    function get_all_questions(){
        
        $.ajax({
            type : 'post',
            dataType : 'json',
            url : li + "admin_ctrl/get_question_list",
            success : function(data){
                console.log(data);
                var subject_count = data.length;
                var counter = 0;
                var html = `
                    <table class="table table-bordered"><thead><tr><th>ID</th><th>Subject</th><th>Question</th><th>Created At</th><th>Action</th></thead><tbody>
                `;
                for(var i = 0; i < subject_count; i++){
                    html += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${data[i].name}</td>
                            <td>${data[i].question}</td>
                            <td>${data[i].created_at}</td>
                            <td><button onclick="show_question_details(${data[i].id},'${data[i].name}','${data[i].question}')">Details</button></td>
                        </tr>
                    `;
                }
                $('#subject_list').html(html);
            }
        });
    }
   

    function create_question(){
        $('#create_question_modal').modal('show');
    }

    function show_question_details(ques_id,subject,question){
        
        if(ques_id){
            $.ajax({
                type : 'post',
                url : li + "admin_ctrl/show_question_details/" + ques_id,
                dataType : 'json',
                success : function(data){
                    var option_count = data.length;
                    var html = `<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Option</th>
                                        <th>Ans</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                    for(var i = 0; i<option_count; i++){
                        html += `
                              <tr>
                                <td>${i+1}</td>
                                <td>${data[i].opt}</td>
                                <td class="text-${data[i].correct == 1 ? 'success':'danger'}">${data[i].correct == 1 ? 'Correct':'Wrong'}</td>
                              </tr>      
                        `;
                    }
                    html += `</tbody>
                            </table>`;
                    $('#answer').html(html);
                    $('#card_header').text(subject);
                    $('#question').text(question);
                    $('#question_details_modal').modal('show');
                   
                }
            });
        }
    }
</script>