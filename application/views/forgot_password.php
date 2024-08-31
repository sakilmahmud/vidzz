<section class="login_sec">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="img_area">
          <img src="<?php echo base_url() ?>assets/images/login_img.png" class="img-fluid" alt="forgot_password_img">
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

            <form method="post" action="<?php echo base_url('forgot-password') ?>" id="forgot_password_form" name="forgot_password" class="login_frm">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter your email" value="<?php echo set_value('email'); ?>" class="form-control">
                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
              <p>Remembered your password? <a href="<?php echo base_url('login') ?>">Sign In</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>