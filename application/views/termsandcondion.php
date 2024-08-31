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

<section class="tc_sec">
    <div class="container">
        <p>The services provided by Vedzzy are governed by the following terms. By registering with us, you acknowledge that you have accepted the terms and conditions outlined here. Our experts adhere to the rules and regulations of web services Please review the points below for an overview of our terms and conditions:</p>
        <div class="tc_block">
            <h6><span></span> 1. Registration and Account</h6>
            <ul>
                <li><span>a.</span>The Services are available only to users who have registered and created an account on the Platform. Without an account, you are not entitled to access any Services offered by us. There are no charges for signing up and creating an account.</li>
                <li><span>b.</span>To create an individual user account, you must provide essential personal information such as your name, contact details, and email address. You confirm that this information is accurate, realistic, and complete. We are not liable for any discontinuation of Service due to inaccurate or incomplete information provided by you.</li>
                <li><span>c.</span>You are responsible for keeping your account credentials secure and must not share them with any third party. If unauthorized access to your account occurs despite your best efforts, you agree to notify us immediately of such access or any security breach.</li>
                <li><span>d.</span>You are solely responsible for activities that occur on your account. We will not be held responsible for any losses caused by unauthorized access to your account. You also agree to be liable for any losses we incur due to such unauthorized access.</li>
                <li><span>e.</span>You agree not to use another user's account without their permission and not to allow unauthorized persons to access your account. You accept responsibility for any liability or loss incurred as a result of allowing a third party to access your account.</li>
            </ul>
        </div>
        <div class="tc_block">
            <h6><span></span> 2. Payment</h6>
            <ul>
                <li><span>a.</span>Services can be availed by making payment of the fees prescribed by us from time to time. Payments can be made via PayPal or as per the instructions provided by us.</li>
                <li><span>b.</span>Access to free trial services may be limited at our discretion.</li>
                <li><span>c.</span>. In the event of termination or suspension of your account or Services, any refund will be subject to our refund policy.</li>
            </ul>
        </div>
        <div class="tc_block">
            <h6><span></span> 2. Payment</h6>
            <ul>
                <li><span>a.</span>Services can be availed by making payment of the fees prescribed by us from time to time. Payments can be made via PayPal or as per the instructions provided by us.</li>
                <li><span>b.</span>Access to free trial services may be limited at our discretion.</li>
                <li><span>c.</span>. In the event of termination or suspension of your account or Services, any refund will be subject to our refund policy.</li>
            </ul>
        </div>
        <div class="tc_block">
            <h6><span></span> 3. Advertisement and Third-Party Content:</h6>
            <p>The Platform may contain advertisements or links to third-party websites, applications, products, or services, which may not be owned or affiliated with us. We do not assume responsibility for the content, privacy policy, or practices of any third-party site or advertisement. We cannot and do not censor or edit the content of third-party sites or advertisements. We are not a party to any transaction or agreement you enter with such advertisers or websites and cannot be held responsible for any loss, damage, injury, or liability incurred from interactions with third parties or reliance on their content. We advise you to read the terms and privacy policy of any such website before relying on its content.</p>
        </div>
        <div class="tc_block">
            <h6><span></span> 4. Personal Information</h6>
            <ul>
                <li><span>a.</span>We may collect certain personal and personally identifiable information from you, which will be handled as per our Privacy Policy.</li>
                <li><span>b.</span>You acknowledge that certain information may be disclosed to payment gateways for processing payments. We are not liable for any loss, damage, injury, or liability incurred due to the collection, storage, processing, or disclosure of your information by these payment gateways.</li>
            </ul>
        </div>
        <div class="tc_block">
            <h6><span></span> 5. Cancellation and Refund</h6>
            <p>Vedzzy aims to ensure your satisfaction with every service provided. However, in certain circumstances, Vedzzy will provide a refund in the following cases:</p>
            <p><span>Product issues:</span>Please report this to support@vedzzy.com while the campaign is still active</p>
        </div>
        <div class="tc_block">
            <h6><span></span> 6. Refund Policy FAQ</h6>
            <div class="tc_sub_block">
                <h6><span>1</span>Can I cancel my campaign before it ends and get a refund?</h6>
                <p>Once your YouTube campaign begins, your video is immediately distributed, and the budget is fully utilized. Therefore, we cannot provide a refund. However, you can contact <span>support@Vedzzy.com</span>  with your concerns, and we will work to find the best solution for you.</p>
            </div>
            <div class="tc_sub_block">
                <h6><span>2</span>I'm not happy with your service. Can I get a refund?</h6>
                <p>If the results have not been fully delivered (and the budget has not been fully utilized), you may be eligible for a partial refund. Please note that while your video gains viewership as soon as your campaign starts, YouTube may take up to 72 hours to reflect updates.</p>
            </div>
            <div class="tc_sub_block">
                <h6><span>3</span>What happens if I have charges on my account that I did not authorize?</h6>
                <p>If you or your financial institution notify us of an unauthorized charge, we will attempt to suspend your account immediately to prevent further fraudulent charges. We ask for your patience as we work to assist you.</p>
            </div>
            <div class="tc_sub_block">
                <h6><span>4</span>I chose the wrong video/target audience. Can I get a refund?</h6>
                <p>We can adjust the targeting as needed and promote the correct video with the remaining available budget.</p>
            </div>
        </div>
    </div>
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