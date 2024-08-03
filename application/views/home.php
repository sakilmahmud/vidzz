<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aayan Pharmacy</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/styles.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <!-- Add your app's logo here -->
        <div class="logo_area">
            <a class="logo" href="#"><img class="card-img-top" src="<?php echo base_url('assets/frontend/images/logo.png') ?>" alt="Aayan Pharmacy"></a>
            <div class="my_account">
                <a class="btn btn-primary hidden-phone" href="<?php echo base_url('login') ?>">Login</a>
            </div>
        </div>
        
        
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" id="mobile-toggle-button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="overlay" id="mobile-menu-overlay"></div>
            <div class="mobile-menu" id="mobile-menu">
                <a class="logo-menu" href="<?php echo base_url();?>"><img class="card-img-top" src="<?php echo base_url('assets/frontend/images/logo_small.png') ?>" alt="Aayan Pharmacy"></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('bookAppointment') ?>">Book an Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tel:9153036768">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('login') ?>">Login</a>
                    </li>
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
    <!-- Banner -->
    <section class="banner">
        <!-- Add your banner content here -->
        <div id="banner-carousel" class="carousel slide" data-ride="carousel" data-interval="5000" data-touch="true">
            <ol class="carousel-indicators">
                <li data-target="#banner-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#banner-carousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url('assets/frontend/images/banners/home_banner.png') ?>" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('assets/frontend/images/banners/home_banner_2.png') ?>" class="d-block w-100" alt="Banner 2">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <!-- <section class="categories">
        <div class="container">
            <h2>Popular Categories</h2>
            <div class="row" style="padding-left: 10px;">
                <div class="col-md-3 col-3 card-container">
                    <div class="card">
                        <img src="<?php echo base_url('assets/frontend/images/top_categories/1.jpg') ?>" class="card-img-top" alt="Category 1">
                    </div>
                </div>
                <div class="col-md-3 col-3 card-container">
                    <div class="card">
                        <img src="<?php echo base_url('assets/frontend/images/top_categories/2.jpg') ?>" class="card-img-top" alt="Category 2">
                    </div>
                </div>
                <div class="col-md-3 col-3 card-container">
                    <div class="card">
                        <img src="<?php echo base_url('assets/frontend/images/top_categories/3.jpg') ?>" class="card-img-top" alt="Category 3">
                    </div>
                </div>
                <div class="col-md-3 col-3 card-container">
                    <div class="card">
                        <img src="<?php echo base_url('assets/frontend/images/top_categories/4.jpg') ?>" class="card-img-top" alt="Category 4">
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <!-- Doctor Section -->
    <section class="doctor-zone mb-3">
        <div id="doctor-carousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-touch="true">
            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < count($doctors); $i++): ?>
                    <li data-target="#doctor-carousel" data-slide-to="<?php echo $i; ?>" <?php echo ($i === 0) ? 'class="active"' : ''; ?>></li>
                <?php endfor; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($doctors as $index => $doctor): ?>
                    <div class="carousel-item doc_banner <?php echo ($index === 0) ? 'active' : ''; ?>">
                        <div class="appointmentDetails">
                            <b><i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php
                                //echo $doctor['appointment_date']; 
                                echo date('jS F, Y', strtotime($doctor['appointment_date'])) . " - ". date("h:i A", strtotime($doctor['appointment_time']));
                            ?></b>
                        </div>
                        <a href="<?php echo base_url('bookAppointment/').$doctor['username'] ?>">
                            <img src="<?php echo base_url('assets/uploads/' . $doctor['banner_photo']); ?>" class="d-block w-100" alt="Doctor <?php echo $index + 1; ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="offer-zone">
        <div id="offer-carousel" class="carousel slide" data-ride="carousel" data-interval="6000" data-touch="true">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url('assets/frontend/images/ap_playstore.png') ?>" class="d-block w-100" alt="Offer 1">
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="offer-zone">
        <div id="offer-carousel" class="carousel slide" data-ride="carousel" data-interval="6000" data-touch="true">
            <ol class="carousel-indicators">
                <li data-target="#offer-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#offer-carousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url('assets/frontend/images/offers/1.webp') ?>" class="d-block w-100" alt="Offer 1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('assets/frontend/images/offers/2.webp') ?>" class="d-block w-100" alt="Offer 2">
                </div>
            </div>
        </div>
    </section> -->

    <!-- Featured Products -->
    <!-- <section class="products">
        <div class="container">
            <h2>Products</h2>
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="card">
                        <img src="<?php echo base_url('assets/frontend/images/products/1.jpg') ?>" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Product 1</h5>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <img src="<?php echo base_url('assets/frontend/images/products/2.jpg') ?>" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product 2</h5>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <!-- Testimonials -->
    <section class="testimonials">
        <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                <li data-target="#testimonial-carousel" data-slide-to="2"></li>
                <li data-target="#testimonial-carousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial-card">
                        <div class="card-body">
                            <div class="testimonial-content">
                                <p class="testimonial-text">এটা একটি ভাল পরিষেবা। কর্মকর্তারা অত্যন্ত বন্ধুত্বপূর্ণ এবং সহায়ক।</p>
                            </div>
                            <div class="testimonial-author">
                                <h5 class="card-title">Akash Mukherjee</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial-card">
                        <div class="card-body">
                            <div class="testimonial-content">
                                <p class="testimonial-text">यह एक अच्छी सेवा है। कर्मचारी बहुत दोस्ताने और मददगार हैं।</p>
                            </div>
                            <div class="testimonial-author">
                                <h5 class="card-title">Sandeep Kumar</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial-card">
                        <div class="card-body">
                            <div class="testimonial-content">
                                <p class="testimonial-text">এটি একটি সুপার সেবা। কর্মকর্তারা অত্যন্ত সহায়ক এবং মেধাবী।</p>
                            </div>
                            <div class="testimonial-author">
                                <h5 class="card-title">Sakil Mahmud</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial-card">
                        <div class="card-body">
                            <div class="testimonial-content">
                                <p class="testimonial-text">This is a great service. The staff is very friendly and helpful.</p>
                            </div>
                            <div class="testimonial-author">
                                <h5 class="card-title">Uzma Afeefa</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <!-- Add your footer content here -->
        <div class="container">
            <p>&copy; 2023 Aayan Pharmacy. All rights reserved.</p>
        </div>
    </footer>

    <!-- Add Bootstrap JS and jQuery links here -->
    <script src="<?php echo base_url('assets/frontend/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/bootstrap.bundle.min.js') ?>"></script>
    <script>
        // Mobile menu toggle
        document.getElementById("mobile-toggle-button").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.toggle("open");
            document.getElementById("mobile-menu-overlay").classList.toggle("active");
        });

        // Mobile menu close button
        document.getElementById("mobile-close-button").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.remove("open");
            document.getElementById("mobile-menu-overlay").classList.remove("active");
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#banner-carousel').carousel();
            $('#offer-carousel').carousel();
        });
    </script>
</body>
</html>