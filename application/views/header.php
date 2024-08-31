<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_descriptions; ?>" />
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
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>assets/images/logo.svg" class="img-fluid logo_img" alt="Vedzzy"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-medium" href="<?php echo base_url('register') ?>">Add Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-medium" href="<?php echo base_url('contact') ?>">Contact</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-uppercase fw-medium" href="#">Blog</a>
                        </li> -->
                        <?php if ($this->session->userdata('user_id')) : ?>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-medium btn bg_btn text-white px-3" href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-medium btn border_btn" href="<?php echo base_url('login'); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-white fw-medium btn bg_btn" href="<?php echo base_url('register'); ?>">Register</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </nav>
    </header>