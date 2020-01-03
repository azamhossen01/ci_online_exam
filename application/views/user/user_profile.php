<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>
</div>
<div class="card">
    <div class="card-header"><h3><?= $this->user->anyName('user',['id'=>$this->session->userdata('id')],'name'); ?></h3></div>
    <div class="card-body">
       <form action="">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="<?= $user[0]->name ?>" name="name" id="name" class="form-control" placeholder="Name" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?= $user[0]->email ?>" name="email" id="email" class="form-control" placeholder="Email" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
            </div>
            <button type="button" onclick="update_profile()" id="sign_up_button">Update Info</button>
       </form>
    </div>
    <div class="card-footer"></div>
</div>


<?php $this->load->view('layouts/footer.php'); ?>
<script>
    var li = "http://localhost/ci_online_exam/";
    function update_profile(){
        var name = $('#name').val();
        var email = $('#email').val();
        // var password = $('#password').val();
        var data = {name,email}
        $.ajax({
            type : 'post',
            url : li + "user_ctrl/update_profile",
            data : data,
            success : function(data){
                if(data > 0){
                    alert('Profile updated successfully');
                    window.location.href= li + "user_ctrl/user_profile/"+data;
                }
            }
        });
    }
</script>