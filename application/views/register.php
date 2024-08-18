<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veddzy :: Register</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <style>
        .error {
            color: red;
        }

        .google_continue {
            margin: 20px 0px 20px 0px;
        }
    </style>
</head>

<body>
    <header class="full_header fixed-top">
        <div class="container-fluid">
            <img src="<?php echo base_url() ?>assets/images/logo.png" class="img-fluid logo_img" alt="logo_img">
        </div>
    </header>

    <section class="register_sec">
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
                            <a href="#" class="google_continue"><img src="<?php echo base_url() ?>assets/images/google_icon.png" class="img-fluid" alt="google_logo">Continue with Google</a>
                            <div class="or">Or</div>
                            <form action="<?php echo base_url('user/register'); ?>" method="post" id="register_form" name="register" class="register_frm">

                                <!-- First Name -->
                                <div class="form-group">
                                    <label>Enter First Name</label>
                                    <input type="text" name="first_name" placeholder="John" class="form-control" value="<?php echo set_value('first_name'); ?>">
                                    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                                </div>

                                <!-- Last Name -->
                                <div class="form-group">
                                    <label>Enter Last Name</label>
                                    <input type="text" name="last_name" placeholder="Doe" class="form-control" value="<?php echo set_value('last_name'); ?>">
                                    <?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="john.doe@example.com" class="form-control" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" placeholder="Password" class="form-control" id="confirm_password">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" value="1" id="terms">
                                    <label class="form-check-label" for="terms">
                                        I agree to <a href="#" class="solid_clr">Privacy Policy</a> & <a href="#" class="gradient_clr">Terms of Service</a>
                                    </label>
                                    <?php echo form_error('terms', '<div class="error">', '</div>'); ?>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn bg_btn">Sign Up</button>

                                <p>Already have an account? <a href="<?php echo base_url('login'); ?>">Sign in instead</a></p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url() ?>assets/js/jquery3.7.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                let input = $(this).prev("input");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
</body>

</html>