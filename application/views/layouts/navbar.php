<nav class="navbar navbar-expand-lg navbar-light bg-light">

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php if($this->session->userdata('role') == 1){ ?>
<a class="navbar-brand" href="<?= base_url('admin_ctrl/manage_user') ?>">Manage User</a>
<?php } ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if($this->session->userdata('role') == 1){ ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin_ctrl/subject_list'); ?>">Subject <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin_ctrl/question_list'); ?>">Questions</a>
      </li>
    <?php }elseif($this->session->userdata('role') == 2){ ?>
      <li class="nav-item">
              <a class="nav-link" href="<?= base_url("user_ctrl/user_profile/".$this->session->userdata('id')); ?>">Profile</a>
      </li>
      <li class="nav-item">
              <a class="nav-link" href="<?= base_url('user_ctrl/exam'); ?>">Exam</a>
      </li>
    <?php } ?>
      <li class="nav-item">
        <a class="nav-link disabled" href="<?= base_url('logout_ctrl/logout') ?>">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>