<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="range_video">
            <div class="row">
                <?php if (isset($error)) : ?>
                    <p class="text-center" style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <?php
                if (isset($payment_details) && !empty($payment_details)) :
                    $youtube_img_url = "";
                    $video_title = "";
                    if ($payment_details->video_thumbs != "") :
                        $videoDetails = unserialize($payment_details->video_thumbs);
                        $youtube_img_url = $videoDetails['high']['url'];
                        $video_title = $payment_details->video_title;
                    endif;
                ?>
                    <div class="col-lg-4">
                        <div class="youtube_img_area">
                            <div class="thumb_section">
                                <div class="thumb_img">
                                    <img src="<?php echo $youtube_img_url; ?>" class="img-fluid" alt="youtube_img">
                                </div>
                                <div class="video_title_sec">
                                    <div class="video_title">
                                        <h6><?php echo $video_title; ?></h6>
                                        <strong>#<?php echo str_pad($payment_details->campaign_id, 5, '0', STR_PAD_LEFT); ?></strong>
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
                                <div class="row">
                                    <div class="col-md-3 mt-4">
                                        <a href="<?php echo base_url('user/add-campaign'); ?>" class="btn bg_btn text-white">Back</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="paypal-button" onclick="window.location.href='<?php echo base_url('user/pay_with_paypal/' . $payment_details->id); ?>'">
                                            <i class="fab fa-paypal"></i> Pay Now
                                        </button>
                                    </div>
                                </div>


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