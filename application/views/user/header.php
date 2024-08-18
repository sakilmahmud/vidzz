<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veddzy</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fm.tagator.jquery.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <script src="<?php echo base_url() ?>assets/js/jquery3.7.1.min.js"></script>
</head>

<body>

    <div class="dashboard">
        <div class="dashboard_sidebar">
            <div class="header_logo_area">
                <a href="<?php echo base_url('user/dashboard'); ?>">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" class="img-fluid logo_img" alt="logo_img">
                </a>
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url() ?>assets/images/circle.png" class="img-fluid circle_img" alt="logo_img">
                </a>
            </div>
            <h6>Youtube Promotion</h6>
            <ul>
                <li>
                    <a href="<?php echo base_url('user/dashboard'); ?>" class="<?php echo ($activePage === 'dashboard') ? 'active' : ''; ?>"><img src="<?php echo base_url() ?>assets/images/video_icon.png" class="img-fluid" alt="sidebar_img">Promote a Video</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/campaigns'); ?>" class="<?php echo ($activePage === 'campaigns') ? 'active' : ''; ?>"><img src="<?php echo base_url() ?>assets/images/campaign_icon.png" class="img-fluid" alt="sidebar_img">Campaigns</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/profile'); ?>" class="<?php echo ($activePage === 'profile') ? 'active' : ''; ?>"><img src="<?php echo base_url() ?>assets/images/profile_icon_sm.png" class="img-fluid" alt="sidebar_img">Profile</a>
                </li>
                <li>
                    <a href="<?php echo base_url('logout'); ?>"><img src="<?php echo base_url() ?>assets/images/logout.png" class="img-fluid" alt="sidebar_img">Log Out</a>
                </li>
            </ul>
        </div>
        <div class="main_area">
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
                        <li><a href="<?php echo base_url('user/profile'); ?>"><img src="<?php echo base_url() ?>assets/images/profile_line.png" alt="line_img">Profile</a></li>
                        <li><a href="<?php echo base_url('user/payment_history'); ?>"><img src="<?php echo base_url() ?>assets/images/payment_line.png" alt="line_img">Payments</a></li>
                        <li><a href="<?php echo base_url('logout'); ?>"><img src="<?php echo base_url() ?>assets/images/logout.png" alt="line_img">Logout</a></li>
                    </ul>
                </div>
            </div>