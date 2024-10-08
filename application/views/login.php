<section class="login_sec">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="img_area">
          <img src="<?php echo base_url() ?>assets/images/login_img.png" class="img-fluid" alt="logo_img">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="content_area d-flex justify-content-center align-items-center">
          <div class="content_area_bx text-center">
            <div class="user_img">
              <img src="<?php echo base_url() ?>assets/images/user.png" class="img-fluid" alt="user_img">
            </div>
            <?php if ($this->session->flashdata('error')) : ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')) : ?>
              <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <a href="<?php echo base_url('google-login'); ?>" class="google_continue"><img src="<?php echo base_url() ?>assets/images/google_icon.png" class="img-fluid" alt="google_logo">Continue with Google</a>
            <div class="or">Or</div>
            <form method="post" action="<?php echo base_url('login') ?>" id="login_form" name="login" class="login_frm">
              <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php endif; ?>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="username" placeholder="username or email" value="<?php echo set_value('username'); ?>" class="form-control">
                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label>Password</label>
                <a href="<?php echo base_url('forgot-password') ?>" class="forgot_pass">Forgot Password</a>
                <input type="password" placeholder="Password" name="password" class="form-control" class="pass">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              <p>New on our platform? <a href="<?php echo base_url('register') ?>">Create an account</a></p>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>