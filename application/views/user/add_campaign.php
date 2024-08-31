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
                                <h6><span id="viewMin">0</span> - <span id="viewMax">0</span></h6>
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
                                            <select name="country_id" class="form-control choose_country" id="country_id">
                                                <option value="">Select Country</option>
                                                <?php
                                                if (!empty($available_price_list)) :

                                                    foreach ($available_price_list as $countries) :

                                                        echo '<option value="' . $countries['country_id'] . '">' . $countries['country_name'] . '</option>';
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                            <small class="select_country_error text-danger">*Select any country</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <div class="country_area">
                                            <p>Category</p>
                                            <select name="category_id" class="form-control choose_country" id="category_id">
                                                <option value="">Select Category</option>
                                                <option value="1">Vloggers</option>
                                                <option value="2">Gamers</option>
                                                <option value="3">Motivatonal</option>
                                                <option value="4">Artist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-5">
                                        <a href="<?php echo base_url('user/dashboard'); ?>" class="btn bg_btn text-white">Back</a>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <?php /*  if (isset($payment_id)) : ?>
                                            <a href="<?php echo base_url('user/payments/' . $payment_id); ?>" class="btn bg_btn">Pay now</a>
                                        <?php else :  */ ?>
                                        <button type="submit" class="btn bg_btn text-white create_btn" disabled>Create Campaign</button>
                                        <?php //endif; 
                                        ?>

                                    </div>
                                </div>
                                <input type="hidden" name="video_id" value="<?php echo $videoDetails['items'][0]['id']; ?>">
                                <input type="hidden" name="estimated_view" id="estimatedView">
                                <input type="hidden" name="status" value="1">
                            </form>
                        </div>
                    </div>


                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<style>
    .create_campaign {
        margin-top: 35px;
    }
</style>
<script>
    <?php
    if (!empty($available_price_list)) :
        $price_arr = [];
        foreach ($available_price_list as $countries) :
            $price_arr[$countries['country_id']] = array(
                'country_name' => $countries['country_name'],
                'price' => $countries['price'],
                'starting_view' => $countries['starting_view'],
                'end_view' => $countries['end_view']
            );
        endforeach;
        $price_json = json_encode($price_arr);
    endif; ?>

    // Corrected: parse the JSON string to a JavaScript object
    let price_data = <?php echo $price_json; ?>;
    let baseMinView = 0;
    let baseMaxView = 1;
    let sliderPrice = $("#fromSlider").val();

    $(document).on('change', '#country_id', function() {
        let country_id = $(this).val();
        if (country_id != "") {
            $('.select_country_error').hide();
            $('.create_btn').removeAttr('disabled');
        } else {
            $('.select_country_error').show();
            $('.create_btn').attr('disabled', true);
        }

        // Access the starting_view using the selected country_id
        let starting_view = price_data[country_id].starting_view;
        let end_view = price_data[country_id].end_view;

        baseMinView = starting_view;
        baseMaxView = end_view;
        /* $('#viewMin').text(parseInt(sliderPrice) * parseInt(starting_view));
        $('#viewMax').text(parseInt(sliderPrice) * parseInt(end_view)); */
        updateSlider(sliderPrice);

        //console.log(starting_view);

        // Do something with the starting_view (e.g., set it in an input field)
        // $('#some_input_id').val(starting_view);
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".choose_country").chosen();
    });
</script>