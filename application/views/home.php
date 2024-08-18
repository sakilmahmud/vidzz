<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidzz</title>
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
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>assets/images/logo.png" class="img-fluid logo_img" alt="logo_img"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-medium" href="#">Add Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-medium" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-medium" href="#">Blog</a>
                        </li>
                        <?php if ($this->session->userdata('user_id')) : ?>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-medium btn bg_btn text-white px-3" href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-medium btn border_btn" href="<?php echo base_url('login'); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-white fw-medium btn bg_btn" href="<?php echo base_url('login'); ?>">Register</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <section class="banner d-flex align-items-center">
        <div class="container">
            <div class="banner_top">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="banner_content_area">
                            <h5>Official <span><img src="<?php echo base_url() ?>assets/images/google.png" class="img-fluid" alt=""></span> Partner</h5>
                            <h1>Start Your YouTube<br />
                                Promotions with just<br />
                                $10</h1>
                            <p>We help you get more Engagement on your YouTube video by promoting it to Relevant
                                Audiences using Google Ads.</p>
                            <a href="<?php echo base_url('user/dashboard'); ?>">Promote Videos Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner_img_area">
                            <img src="<?php echo base_url() ?>assets/images/banner_img.png" class="img-fluid" alt="banner_img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo_ser">
        <div class="container">
            <div class="promo_ser_heading">
                <h3>Why You Need <span>YouTube Promotion Service?</span> </h3>
            </div>
            <div class="promo_ser_content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="promo_ser_content_img_area">
                            <img src="<?php echo base_url() ?>assets/images/b1.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="promo_ser_content_content_area">
                            <div class="promo_ser_content_single">
                                <h6><span>1.</span>Increased Visibility and reach</h6>
                                <p>Around 3.7 Milion videos are Uploaded to Youtube every day.
                                    Promoting your Youtube videos help them out in a
                                    crowed space Increasing their Visibility</p>
                            </div>
                            <div class="promo_ser_content_single">
                                <h6><span>1.</span>Increased Visibility and reach</h6>
                                <p>Around 3.7 Milion videos are Uploaded to Youtube every day.
                                    Promoting your Youtube videos help them out in a
                                    crowed space Increasing their Visibility</p>
                            </div>
                            <div class="promo_ser_content_single">
                                <h6><span>1.</span>Increased Visibility and reach</h6>
                                <p>Around 3.7 Milion videos are Uploaded to Youtube every day.
                                    Promoting your Youtube videos help them out in a
                                    crowed space Increasing their Visibility</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="how_to_promote">
        <div class="container">
            <div class="how_to_promote_heading">
                <h3>How To <span>Promote Youtube Video</span> with Vedzzy?</h3>
            </div>
            <div class="how_to_promote_content">
                <div class="bx bx_content_lt">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bx_content">
                                <div class="num_bx">
                                    <h2>1</h2>
                                </div>

                                <h6>Enter Your YouTube URL</h6>
                                <p>Simply paste your YouTube video URL into our dashboard to promote YouTube videos. Select the primary goal of the campaign from the available options. Begin with a minimum budget of $10 with VeeFly.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bx_img">
                                <img src="<?php echo base_url() ?>assets/images/1.png" class="img-fluid" alt="bx_img">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bx bx_content_rt">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bx_img">
                                <img src="<?php echo base_url() ?>assets/images/2.png" class="img-fluid" alt="bx_img">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="bx_content bx_content_right">
                                <div class="num_bx">
                                    <h2>2</h2>
                                </div>
                                <h6>Choose Countries and Enter Keywords</h6>
                                <p>Select the country from where you wish to advertise YouTube videos. Enter the keywords that your audience would type when searching for content related to your YouTube Video. This helps to advertise your video on YouTube to a relevant audience..</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bx bx_content_lt">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bx_content">
                                <div class="num_bx">
                                    <h2>3</h2>
                                </div>
                                <h6>Watch Your YouTube Views & Engagement Grow</h6>
                                <p>Select the country from where you wish to advertise YouTube videos. Enter the keywords that your audience would type when searching for content related to your YouTube Video. This helps to advertise your video on YouTube to a relevant audience.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bx_img">
                                <img src="<?php echo base_url() ?>assets/images/3.png" class="img-fluid" alt="bx_img">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ctc_home">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="ctc_bg_color">
                        <img src="<?php echo base_url() ?>assets/images/overlay_dot.png" class="img-fluid ctc_home_overlay" alt="overlay">
                        <div class="row">
                            <div class="col-lg-8">
                                <h6>Promote your YouTube Videos Now</h6>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">Start Promotion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="banner_bottom">
        <div class="row">
            <div class="col-lg-4">
                <div class="banner_bottom_box d-flex justify-content-center">
                    <div class="banner_bottom_box_left">
                        <img src="<?php echo base_url() ?>assets/images/views.png" class="img-fluid" alt="bx_img">
                        <h2>2.9<span>B</span></h2>
                    </div>
                    <div class="banner_bottom_box_right">
                        <h5 class="text-uppercase">Views<span>Delivered</span></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner_bottom_box d-flex justify-content-center">
                    <div class="banner_bottom_box_left">
                        <img src="<?php echo base_url() ?>assets/images/success.png" class="img-fluid" alt="bx_img">
                        <h2>109<span>K</span></h2>
                    </div>
                    <div class="banner_bottom_box_right">
                        <h5 class="text-uppercase">Successful<span>Campaigns</span></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner_bottom_box d-flex justify-content-center">
                    <div class="banner_bottom_box_left">
                        <img src="<?php echo base_url() ?>assets/images/happy.png" class="img-fluid" alt="bx_img">
                        <h2>29<span>K</span></h2>
                    </div>
                    <div class="banner_bottom_box_right">
                        <h5 class="text-uppercase">Happy<span>Clients</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="veed_seen">
        <div class="container">
            <div class="veed_seen_heading">
                <h3 class="text-center">How Will <span>Your Video Be Seen </span></h3>
            </div>
            <div class="veed_seen_content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="veed_seen_content_img">
                            <img src="<?php echo base_url() ?>assets/images/vid_seen.png" class="img-fluid" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="veed_seen_content_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="choose">

        <div class="container">

            <div class="choose_heading_content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="choose_content_area">
                            <h3>Why <span>Choose Us</span></h3>

                            <div class="choose_content_single">
                                <div class="choose_content_single_left">
                                    <img src="<?php echo base_url() ?>assets/images/wcu1.png" class="img-fluid" alt="img">
                                </div>
                                <div class="choose_content_single_right">
                                    <h6>Experienced Team</h6>
                                    <p>Global Senior Level Operations Management</p>
                                </div>

                            </div>
                            <div class="choose_content_single">
                                <div class="choose_content_single_left">
                                    <img src="<?php echo base_url() ?>assets/images/wcu2.png" class="img-fluid" alt="img">
                                </div>
                                <div class="choose_content_single_right">
                                    <h6>Technical Skills</h6>
                                    <p>Global Senior Level Operations Management</p>
                                </div>

                            </div>
                            <div class="choose_content_single">
                                <div class="choose_content_single_left">
                                    <img src="<?php echo base_url() ?>assets/images/wcu2.png" class="img-fluid" alt="img">
                                </div>
                                <div class="choose_content_single_right">
                                    <h6>Lean</h6>
                                    <p>Global Experience in deploying Lean programs</p>
                                </div>
                            </div>
                            <a href="#" class="btn bg_btn text-white">Promote videos now</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose_content_image">
                            <img src="<?php echo base_url() ?>assets/images/whychooseus.png" class="img-fluid" alt="why_choose">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="channel_boxes">
        <div class="container">
            <div class="channel_boxes_header">
                <h3>YouTube <span>Channel Promotion</span> </h3>
                <p>VeeFly’s YouTube promotion services are suitable for channels across multiple domains. Irrespective of your YouTube channel size, our advanced targeting options using Google Ads can promote your YouTube videos to a relevant audience, thus increasing the odds of gaining higher engagement rates.</p>



            </div>
            <div class="channel_box_content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="channel_box_single text-center">
                            <div class="channel_box_single_img" style="background: url('./assets/images/vlogger.jpg') no-repeat center center;background-size: cover;"></div>
                            <h5>Vloggers</h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="channel_box_single text-center">
                            <div class="channel_box_single_img" style="background: url('./assets/images/vlogger.jpg') no-repeat center center;background-size: cover;"></div>
                            <h5>Gamers</h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="channel_box_single text-center">
                            <div class="channel_box_single_img" style="background: url('./assets/images/vlogger.jpg') no-repeat center center;background-size: cover;"></div>
                            <h5>Motivatonal</h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="channel_box_single text-center">
                            <div class="channel_box_single_img" style="background: url('./assets/images/vlogger.jpg') no-repeat center center;background-size: cover;"></div>
                            <h5>Artist</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="ctc_home2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>YouTube Promotion <span>Services</span></h4>
                    <a href="#" class="btn bg_btn text-white"><i class="fa-solid fa-caret-right"></i> Start Here</a>
                </div>
                <div class="col-lg-6">
                    <p>Promote your YouTube channel <span>only at $10</span> . Reach the relevant audience and get more engagement on your videos with VeeFly's YouTube Promotion Services.</p>
                </div>
            </div>
        </div>
    </div>


    <section class="why_advertise">

        <div class="container">
            <div class="why_advertise_heading text-center">
                <h3>Why <span>Advertise On YouTube?</span></h3>
                <p>YouTube boasts more than 2 Billion monthly active users with an average spend of at least 20 minutes daily on the platform. Here’s why you must advertise YouTube videos.</p>
            </div>
            <div class="why_advertise_heading_content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="choose_content_image">
                            <img src="<?php echo base_url() ?>assets/images/advertise.png" class="img-fluid" alt="advertise">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="why_advertise_content_area">
                            <div class="why_advertise_content_single">
                                <h6>Adaptability Of Visual Content</h6>
                                <p>According to Google’s marketing reports, users increasingly prefer visual content over other mediums to explore more in-depth about their favorite interests before making any purchase decision.</p>
                            </div>
                            <div class="why_advertise_content_single">
                                <h6>Massive Exposure</h6>
                                <p>YouTube is the second largest search engine after Google, leveraging the power of Google AdWords. When you advertise your video on YouTube, you get access to a vast audience, thus making it a highly preferred medium for users worldwide.</p>
                            </div>
                            <div class="why_advertise_content_single">
                                <h6>In-depth Analytics</h6>
                                <p>YouTube analytics provides a gold mine of your viewership data. You can analyze their online behavior pattern, what videos they frequently watch, at which instants they stop watching, and to what extent they engage.</p>
                            </div>
                            <div class="why_advertise_content_single">
                                <h6>Influencing Purchase Decisions</h6>
                                <p>Statistics show that almost 70% of users have bought the product after seeing its details in a YouTube ad. When you promote your brand by advertising YouTube videos, you can reach end consumers and influence their purchase decisions directly.</p>
                            </div>
                            <div class="why_advertise_content_single">
                                <h6>Brand Identity</h6>
                                <p>YouTube gives you the flexibility to brainstorm and create unique brand experiences that align with the interests of your target audience. Advertise your video on YouTube and establish a firm brand identity in a competitive market.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <section class="promote_tips">
        <div class="container">
            <div class="promote_tips_heading text-center">
                <h3>Tips On <span>How To Promote Your YouTube Channel</span> </h3>
            </div>
            <div class="promote_tips_content">
                <div class="promote_tips_single">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="promote_tips_single_content">
                                <h5><span>Refine, Optimize, And Promote</span> Your Videos</h5>
                                <p>Before you advertise your video on YouTube, ensure they are refined and optimized to every extent possible. A high-quality, thoughtfully designed video with necessary optimizations has a higher chance of attracting more engagement. Consider these tips:</p>
                                <ul>
                                    <li>Include a captivating thumbnail image that aligns with your video title.</li>
                                    <li>Use relevant tags to reach the right audience.</li>
                                    <li>Include major target keywords in your video titles.</li>
                                    <li>Keep your video description simple and relevant while also explaining the video content.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="promote_tips_single_img">
                                <img src="<?php echo base_url() ?>assets/images/tips1.png" class="img-fluid" alt="tips">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="promote_tips_single">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="promote_tips_single_img">
                                <img src="<?php echo base_url() ?>assets/images/tips2.png" class="img-fluid" alt="tips">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="promote_tips_single_content">
                                <h5><span>Optimize And Promote</span> Your Channel</h5>
                                <p>Making efforts to promote your YouTube channel can give you a big competitive advantage to grow the reach of your YouTube videos. Implement these tips to optimize and advertise YouTube channel.</p>
                                <ul>
                                    <li>Add an intriguing channel trailer or an about video to encourage viewers to see more of your channel videos.</li>
                                    <li>Ensure that your channel description, profile picture, and banner images align with your channel’s brand.</li>
                                    <li>Organize the playlists and club similar videos together. Optimize them for maximum watch time.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="promote_tips_single">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="promote_tips_single_content">
                                <h5><span>Use Ads </span> To Expand Your Reach</h5>
                                <p>Before you advertise your video on YouTube, ensure they are refined and optimized to every extent possible. A high-quality, thoughtfully designed video with necessary optimizations has a higher chance of attracting more engagement. Consider these tips:</p>
                                <ul>
                                    <li>Include a captivating thumbnail image that aligns with your video title.</li>
                                    <li>Use relevant tags to reach the right audience.</li>
                                    <li>Include major target keywords in your video titles.</li>
                                    <li>Keep your video description simple and relevant while also explaining the video content.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="promote_tips_single_img">
                                <img src="<?php echo base_url() ?>assets/images/tips3.png" class="img-fluid" alt="tips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="faq">
        <div class="container">
            <div class="faq_heading text-center">
                <h3>Frequently asked <span>questions!</span> </h3>
            </div>
            <div class="faq_content">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Why is YouTube promotion important?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Growing competition on YouTube is one of the reasons to choose YouTube promotion services. Here are some other benefits of YouTube video promotion:</p>
                                <ul>
                                    <li>Reach the right audience.</li>
                                    <li>Get more visibility to your video on YouTube and Google.</li>
                                    <li>Boosts engagement on your YouTube channel.</li>
                                    <li>Speeds up monetization for your channel.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How To Promote My YouTube Channel?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Growing competition on YouTube is one of the reasons to choose YouTube promotion services. Here are some other benefits of YouTube video promotion:</p>
                                <ul>
                                    <li>Reach the right audience.</li>
                                    <li>Get more visibility to your video on YouTube and Google.</li>
                                    <li>Boosts engagement on your YouTube channel.</li>
                                    <li>Speeds up monetization for your channel.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How will I Promote My Youtube Video with Viddz?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Growing competition on YouTube is one of the reasons to choose YouTube promotion services. Here are some other benefits of YouTube video promotion:</p>
                                <ul>
                                    <li>Reach the right audience.</li>
                                    <li>Get more visibility to your video on YouTube and Google.</li>
                                    <li>Boosts engagement on your YouTube channel.</li>
                                    <li>Speeds up monetization for your channel.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="testimonial">
        <div class="container">
            <div class="testimonial_heading text-center">
                <h3>What Our Customers Say About Us</h3>
                <p>Don't just take our word for it. Our customers say it the best.</p>
            </div>
            <div class="testimonial_content">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="testimonial_all owl-carousel owl-theme">
                            <div class="testimonial_single text-center">

                                <div class="testimonial_img">
                                    <img src="<?php echo base_url() ?>assets/images/testimoni.png" class="img-fluid" alt="testimonial">
                                </div>
                                <h6>Mr. Avneesh Malik</h6>
                                <p class="designation">Hertz Controls Pvt. Ltd. India</p>
                                <ul class="ratings">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="testimoni_text">
                                    <img src="<?php echo base_url() ?>assets/images/quote.png" class="img-fluid quote_left" alt="quote">
                                    <p>"I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you.Eat clean it will care for you and workout hard."</p>
                                    <img src="<?php echo base_url() ?>assets/images/quote_right.png" class="img-fluid quote_right" alt="quote">
                                </div>
                            </div>
                            <div class="testimonial_single text-center">

                                <div class="testimonial_img">
                                    <img src="<?php echo base_url() ?>assets/images/testimoni.png" class="img-fluid" alt="testimonial">
                                </div>
                                <h6>Mr. Avneesh Malik</h6>
                                <p class="designation">Hertz Controls Pvt. Ltd. India</p>
                                <ul class="ratings">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="testimoni_text">
                                    <img src="<?php echo base_url() ?>assets/images/quote.png" class="img-fluid quote_left" alt="quote">
                                    <p>"I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you.Eat clean it will care for you and workout hard."</p>
                                    <img src="<?php echo base_url() ?>assets/images/quote_right.png" class="img-fluid quote_right" alt="quote">
                                </div>
                            </div>
                            <div class="testimonial_single text-center">

                                <div class="testimonial_img">
                                    <img src="<?php echo base_url() ?>assets/images/testimoni.png" class="img-fluid" alt="testimonial">
                                </div>
                                <h6>Mr. Avneesh Malik</h6>
                                <p class="designation">Hertz Controls Pvt. Ltd. India</p>
                                <ul class="ratings">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="testimoni_text">
                                    <img src="<?php echo base_url() ?>assets/images/quote.png" class="img-fluid quote_left" alt="quote">
                                    <p>"I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you.Eat clean it will care for you and workout hard."</p>
                                    <img src="<?php echo base_url() ?>assets/images/quote_right.png" class="img-fluid quote_right" alt="quote">
                                </div>
                            </div>
                            <div class="testimonial_single text-center">

                                <div class="testimonial_img">
                                    <img src="<?php echo base_url() ?>assets/images/testimoni.png" class="img-fluid" alt="testimonial">
                                </div>
                                <h6>Mr. Avneesh Malik</h6>
                                <p class="designation">Hertz Controls Pvt. Ltd. India</p>
                                <ul class="ratings">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="testimoni_text">
                                    <img src="<?php echo base_url() ?>assets/images/quote.png" class="img-fluid quote_left" alt="quote">
                                    <p>"I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you.Eat clean it will care for you and workout hard."</p>
                                    <img src="<?php echo base_url() ?>assets/images/quote_right.png" class="img-fluid quote_right" alt="quote">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="cts3">
        <a href="#" class="text-center">Get Started Now</a>
    </section>



    <footer>

        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer_top_1">
                            <img src="<?php echo base_url() ?>assets/images/logo.png" class="img-fluid footer_logo" alt="logo">
                            <p>A team specializing in Digital Marketing. Our experience mixed with our platforms algorithms are the key & the engine of the service that we provide.</p>
                            <ul class="footer_social">
                                <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer_top_2">
                            <div class="footer_links">
                                <h6>Useful Links</h6>
                                <ul>
                                    <li><a href="#">Add Video</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Terms & Condition</a></li>
                                    <li><a href="#">Privacy Policy</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer_top_3">
                            <div class="footer_links">
                                <h6>Quick Links</h6>
                                <ul>
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Register</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_bottom">
            <div class="container">
                <div class="footer_bottom_content">
                    <p>Veddzy © 2024</p>
                    <p>Veddzy is not affiliated or endorsed by YouTube.</p>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="to_top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

    <script src="<?php echo base_url() ?>assets/js/jquery3.7.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/aos.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/js/jquery.fancybox.min.js"></script> -->
    <script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <script>
        /* Testimonial*/
        $(document).ready(function() {
            $(".testimonial_all").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                smartSpeed: 700,
                autoplayHoverPause: true,
                nav: false,
                margin: 40
            });
        });
    </script>
</body>

</html>