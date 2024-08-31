<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veddzy :: Forgot Password</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free-6.5.2-web/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aos.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <header class="full_header fixed-top">
    <div class="container-fluid">
      <a href="<?php echo base_url() ?>">
        <img src="<?php echo base_url() ?>assets/images/logo.svg" class="img-fluid logo_img" alt="logo_img">
      </a>
    </div>
  </header>
  <section class="login_sec">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="img_area">
            <img src="<?php echo base_url() ?>assets/images/forgot.svg" class="img-fluid" alt="forgot_password_img">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="content_area d-flex justify-content-center align-items-center">
            <div class="content_area_bx text-center">
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
              <form method="post" action="<?php echo base_url('forgot-password') ?>" id="forgot_password_form" name="forgot_password" class="forgot_password_frm">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" placeholder="Enter your email" value="<?php echo set_value('email'); ?>" class="form-control">
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

  <script src="<?php echo base_url() ?>assets/js/jquery3.7.1.min.js"></script>
</body>

</html>