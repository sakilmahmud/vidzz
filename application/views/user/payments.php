<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="range_video">
            <div class="row">
                <?php if (isset($error)) : ?>
                    <p class="text-center" style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <?php if (isset($videoDetails) && !empty($videoDetails)) : ?>
                    <div class="col-lg-4">
                        <div class="youtube_img_area">
                            <div class="thumb_section">
                                <div class="thumb_img">
                                    <img src="<?php echo $videoDetails['items'][0]['snippet']['thumbnails']['high']['url']; ?>" class="img-fluid" alt="youtube_img">
                                </div>
                                <div class="video_title_sec">
                                    <div class="video_title">
                                        <h6><?php echo $videoDetails['items'][0]['snippet']['title']; ?></h6>
                                    </div>
                                    <div class="channel_title">
                                        <h6><i class="fa-brands fa-youtube"></i> <?php echo $videoDetails['items'][0]['snippet']['channelTitle']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="youtube_range_area">
                            <div class="payment-container">
                                <h3>Bill Summary</h3>
                                <p>Campaign Cost: <span>$<?php echo number_format($payment_details->payment_amount); ?></span></p>
                                <p class="total">Total Amount Payable: <span>$<?php echo number_format($payment_details->payment_amount); ?></span></p>

                                <div class="view_count">
                                    <p>Estimated View Count</p>
                                    <h6><span><?php echo $payment_details->estimated_view; ?></span></h6>
                                </div>
                                <button class="paypal-button" onclick="window.location.href='<?php echo base_url('user/pay_with_paypal/' . $payment_details->id); ?>'">
                                    <i class="fab fa-paypal"></i> PayPal
                                </button>


                                <div class="powered-by">
                                    Powered by PayPal
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>