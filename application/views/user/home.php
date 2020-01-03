<?php $this->load->view('layouts/header.php'); ?>
<div class="container">
    <?php $this->load->view('layouts/navbar.php'); ?>
    
    <div class="card">
    <div class="card-header"><h3><?= $this->user->anyName('user',['id'=>$this->session->userdata('id')],'name'); ?></h3></div>
    <div class="card-body">
       
    </div>
    <div class="card-footer"></div>
</div>
</div>



<?php $this->load->view('layouts/footer.php'); ?>