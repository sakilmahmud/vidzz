<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/fontawesome-free-6.5.2-web/css/all.min.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/aos.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <header class="full_header fixed-top">
    <div class="container-fluid">
      <a href="<?php echo base_url() ?>">
        <img src="assets/images/logo.png" class="img-fluid logo_img" alt="logo_img">
      </a>
    </div>
  </header>

  <section class="login_sec">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="img_area">
            <img src="assets/images/login_img.png" class="img-fluid" alt="logo_img">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="content_area d-flex justify-content-center align-items-center">
            <div class="content_area_bx text-center">
              <div class="user_img">
                <img src="assets/images/user.png" class="img-fluid" alt="user_img">
              </div>
              <a href="#" class="google_continue"><img src="assets/images/google_icon.png" class="img-fluid" alt="google_logo">Continue with Google</a>
              <div class="or">Or</div>
              <form method="post" action="<?php echo base_url('login') ?>" id="login_form" name="login" class="login_frm">
                <?php if (!empty($error)) : ?>
                  <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="username" placeholder="username or email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <a href="#" class="forgot_pass">Forgot Password</a>
                  <input type="password" placeholder="Password" name="password" class="form-control" class="pass">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                <p>New on our platform? <a href="#"> Create an account</a></p>

              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="assets/js/jquery3.7.1.min..js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>