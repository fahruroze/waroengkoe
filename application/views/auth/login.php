
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('auth'); ?>"><b>Waroeng Koe</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?= $this->session->flashdata('message'); ?>

    <form action="<?= base_url('auth');?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email');?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email','<small class="text-danger pl-3">', '</small>');?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= set_value('password');?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger pl-3">', '</small>');?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
   <!-- <div class="text-center"><a href="">I forgot password</a><br></div> -->
    <!-- <div class="text-center"><a href="" class="text-center">create an account</a></div> -->
 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
