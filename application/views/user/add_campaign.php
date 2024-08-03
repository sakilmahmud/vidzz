<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="range_video">
            <div class="row">
                <?php if (isset($error)) : ?>
                    <p class="text-center" style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <?php if (isset($videoDetails) && !empty($videoDetails)) : ?>
                    <pre><?php //echo print_r($videoDetails); //$videoDetails['items'][0]['snippet']['title']; 
                            ?></pre>
                    <div class="col-lg-4">
                        <style>
                            .thumb_img img {
                                border-radius: 25px 25px 0 0;
                            }

                            .video_title_sec {
                                background-color: #fff;
                                padding: 10px;
                                border-radius: 0 0 25px 25px;
                            }

                            .channel_title i {
                                margin-top: 5px;
                                color: var(--red);
                                font-size: 20px;
                            }
                        </style>
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
                            <div class="view_count">
                                <p>Estimated View Count</p>
                                <h6><span>5000</span>- <span>6061</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="youtube_range_area">
                            <div class="range_process_box d-flex justify-content-between ">
                                <div class="range_proces">
                                    <div class="check">
                                        <img src="<?php echo base_url() ?>assets/images/check.png" alt="check_img">
                                    </div>

                                    <div class="check_content">
                                        <p>Paste URL link</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="range_proces">

                                    <div class="check">
                                        <img src="<?php echo base_url() ?>assets/images/check.png" alt="check_img">

                                    </div>

                                    <div class="check_content">
                                        <p>Set target Audience</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="range_proces">
                                    <div class="check incomplete">
                                        <p>3</p>
                                    </div>
                                    <div class="check_content">
                                        <p>Start promotion</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="rule">

                            <div class="range_container">
                                <div class="range_slider_header d-flex justify-content-between align-items-center">
                                    <h3>Enter Your Budget</h3>
                                    <div id="sliderValue">$10</div>
                                </div>
                                <div class="sliders_control">
                                    <div id="fromSliderTooltip" class="slider-tooltip">$10</div>
                                    <input id="fromSlider" type="range" value="0" min="0" max="6" step="1" />
                                </div>
                                <div id="scale" class="scale" data-values="[10, 15, 100, 300, 500, 800, 1000]">
                                    <div style="left: 0%">$10</div>
                                    <div style="left: 16.67%">$15</div>
                                    <div style="left: 33.33%">$100</div>
                                    <div style="left: 50%">$300</div>
                                    <div style="left: 66.67%">$500</div>
                                    <div style="left: 83.33%">$800</div>
                                    <div style="left: 100%">$1000</div>
                                </div>
                            </div>
                            <div class="tags">
                                <p>Target by Country</p>
                                <input type="text" id="tag-input" placeholder="Enter tags">
                                <div id="tag-dropdown" style="display:none;">
                                    <ul>
                                        <li class="tag-option">USA</li>
                                        <li class="tag-option">UK</li>
                                        <li class="tag-option">INDIA</li>
                                    </ul>
                                </div>
                            </div>


                            <div class="views_area">
                                <p>What do you want besides views?</p>
                                <div class="btn_area">
                                    <a href="#" class="btn bg_btn text-white">Subscribers</a>
                                    <a href="#" class="btn bg_btn text-white">Like</a>
                                </div>
                            </div>
                            <a href="" class="create_campaign btn bg_btn text-white">Create Campaign</a>
                        </div>


                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>