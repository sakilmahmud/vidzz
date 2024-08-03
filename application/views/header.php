<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aayan Pharmacy</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/styles.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Add Bootstrap JS and jQuery links here -->
    <script src="<?php echo base_url('assets/frontend/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/bootstrap.bundle.min.js') ?>"></script>
</head>

<body>
    <!-- Header -->
    <header>
        <!-- Add your app's logo here -->
        <div class="logo_area">
            <a class="logo" href="<?php echo base_url('/') ?>"><img class="card-img-top" src="<?php echo base_url('assets/frontend/images/logo.png') ?>" alt="Aayan Pharmacy"></a>
            <div class="my_account">
                <a class="btn btn-dark" href="<?php echo base_url('login') ?>">Login</a>
            </div>
        </div>


        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light hidden-phone">
            <button class="navbar-toggler" type="button" id="mobile-toggle-button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="overlay" id="mobile-menu-overlay"></div>
            <div class="mobile-menu" id="mobile-menu">
                <a class="logo-menu" href="<?php echo base_url(); ?>"><img class="card-img-top" src="<?php echo base_url('assets/frontend/images/logo_small.png') ?>" alt="Aayan Pharmacy"></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Prescriptions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('bookAppointment') ?>">Book an Appointment</a>
                    </li>
                    <?php if ($this->session->userdata('user_id')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('user/dashboard') ?>">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('login') ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <button class="close-button" id="mobile-close-button">&times;</button>
            </div>
            <div class="search-bar">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for medicines...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>