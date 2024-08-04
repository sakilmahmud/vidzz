<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />

<style>
    div.chosen-container-multi ul,
    div.chosen-container-single {
        min-height: 50px;
        border-radius: 5px;
        box-shadow: none;
    }

    div.chosen-container-multi ul li {
        line-height: 36px;
    }

    div.chosen-container-single a {
        line-height: 36px !important;
        min-height: 38px;
    }

    .chosen-container-single .chosen-single div {
        top: 7px !important;
    }

    div.chosen-container-multi.error ul {
        border: 1px solid #f00 !important;
    }

    div.chosen-container-single.error {
        border: 1px solid #f00 !important;
    }

    .chosen-container-multi .chosen-choices li.search-choice {
        margin: 7px 5px 3px 0;
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
                    <pre>
                            <?php //echo print_r($videoDetails); //$videoDetails['items'][0]['snippet']['title'];
                            ?>
                        </pre>
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
                            <div class="view_count">
                                <p>Estimated View Count</p>
                                <h6><span id="viewMin">500</span> - <span id="viewMax">600</span></h6>
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
                            <form action="<?php echo base_url('user/create-campaign'); ?>" method="post">
                                <div class="range_container mb-5">
                                    <div class="range_slider_header d-flex justify-content-between align-items-center">
                                        <h3>Enter Your Budget</h3>
                                        <div id="sliderValue">$</div>
                                    </div>
                                    <div class="sliders_control">
                                        <div id="fromSliderTooltip" class="slider-tooltip">$10</div>
                                        <input id="fromSlider" name="budget" type="range" value="10" min="10" max="1000" step="1" />
                                    </div>
                                    <div id="scale" class="scale" data-values="[10, 50, 100, 300, 500, 800, 1000]">
                                        <div style="left: 0%">$10</div>
                                        <div style="left: 4.67%;">$50</div>
                                        <div style="left: 10.33%;">$100</div>
                                        <div style="left: 30%;">$300</div>
                                        <div style="left: 50%;">$500</div>
                                        <div style="left: 81%;">$800</div>
                                        <div style="left: 100%">$1000</div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md-6 mt-5">
                                        <div class="country_area">
                                            <p>Target by Country</p>
                                            <select name="country_id" class="form-control choose_country" id="">
                                                <option value="1">USA</option>
                                                <option value="2">INDIA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <div class="compaign_type_area">
                                            <p class="">What do you want besides views?</p>
                                            <div class="btn_area">
                                                <a href="javascript:void(0)" class="btn btn-outline-info view_type">Subscribers</a>
                                                <a href="javascript:void(0)" class="btn btn-outline-info view_type">Like</a>
                                                <input type="hidden" name="campaign_type" id="campaignType" value="Subscribers">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="video_id" value="<?php echo $videoDetails['items'][0]['id']; ?>">
                                <input type="hidden" name="estimated_view" id="estimatedView">
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="create_campaign btn bg_btn text-white">Create Campaign</button>
                            </form>
                        </div>
                    </div>


                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".choose_country").chosen();
    });
</script>