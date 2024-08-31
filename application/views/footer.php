<footer>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_top_1">
                        <img src="<?php echo base_url() ?>assets/images/logo.svg" class="img-fluid footer_logo" alt="Vedzzy">
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
                                <li><a href="<?php echo base_url('register') ?>">Add Video</a></li>
                                <li><a href="<?php echo base_url() ?>#blogs">Blog</a></li>
                                <li><a href="<?php echo base_url() ?>#faq">FAQs</a></li>
                                <li><a href="<?php echo base_url('terms') ?>">Terms & Condition</a></li>
                                <li><a href="<?php echo base_url('privacy') ?>">Privacy Policy</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_top_3">
                        <div class="footer_links">
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="<?php echo base_url('login') ?>">Login</a></li>
                                <li><a href="<?php echo base_url('register') ?>">Register</a></li>
                                <li><a href="<?php echo base_url('contact') ?>">Contact us</a></li>
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
                <p>Vedzzy © 2024</p>
                <p>Vedzzy is not affiliated or endorsed by YouTube.</p>
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