<style>
    .payment-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
    }

    .payment-container h3 {
        margin-top: 0;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .payment-container p {
        margin: 10px 0;
        font-size: 1em;
    }

    .payment-container .total {
        font-weight: bold;
        border-top: 1px dashed #000;
        padding-top: 10px;
        margin-top: 10px;
    }

    .payment-methods {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .payment-methods button {
        width: 48%;
        border: 2px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        font-size: 1em;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .payment-methods button i {
        margin-right: 10px;
    }

    .payment-methods button.active {
        border-color: #000;
    }

    .paypal-button {
        background-color: #ffc439;
        color: #000;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2em;
        margin-top: 20px;
    }

    .paypal-button i {
        margin-right: 10px;
    }

    .powered-by {
        text-align: center;
        font-size: 0.8em;
        color: #999;
        margin-top: 10px;
    }
</style>
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
                                <p>Campaign Cost: <span>$300.00</span></p>
                                <p class="total">Total Amount Payable: <span>$300.00</span></p>

                                <div class="view_count">
                                    <p>Estimated View Count</p>
                                    <h6><span><?php echo $payment_details->estimated_view; ?></span></h6>
                                </div>
                                <!-- <h4>Select Method</h4>
                                <div class="payment-methods">
                                    <button class="active" onclick="selectMethod('paypal')">
                                        <i class="fab fa-paypal"></i> PayPal
                                    </button>
                                    <button onclick="selectMethod('cards')">
                                        <i class="fas fa-credit-card"></i> Cards
                                    </button>
                                </div> -->

                                <button class="paypal-button">
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