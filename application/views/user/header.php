<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>

    <header class="dashboard_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header_logo_area">
                        <img src="<?php echo base_url() ?>assets/images/logo.png" class="img-fluid logo_img" alt="logo_img">
                        <img src="<?php echo base_url() ?>assets/images/circle.png" class="img-fluid circle_img" alt="logo_img">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="header_content_area d-flex justify-content-between">
                        <div class="channel_area">
                            <div class="my_channel d-flex justify-content-between align-items-center">
                                <p>My Channel</p>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <a href="#">
                                <div class="add_channel d-flex justify-content-left align-items-center">
                                    <img src="<?php echo base_url() ?>assets/images/add_channel.png" class="img-fluid" alt="channel">
                                    <p>Add Channel</p>
                                </div>
                            </a>

                        </div>
                        <div class="menu_admin_data">
                            <div class="profile">
                                <div class="user">
                                    <h6><?php echo strtoupper($this->session->userdata('full_name')); ?></h6>
                                </div>
                                <div class="img-box">
                                    <img src="<?php echo base_url() ?>assets/images/person.png" alt="some user image">
                                </div>

                            </div>
                            <div class="menu">
                                <ul>
                                    <li><a href="#"><img src="<?php echo base_url() ?>assets/images/profile_line.png" alt="line_img">Profile</a></li>
                                    <li><a href="#"><img src="<?php echo base_url() ?>assets/images/payment_line.png" alt="line_img">Payments</a></li>
                                    <li><a href="<?php echo base_url('logout'); ?>"><img src="<?php echo base_url() ?>assets/images/logout.png" alt="line_img">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>