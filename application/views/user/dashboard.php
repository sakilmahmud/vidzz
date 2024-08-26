<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="promote_video d-flex justify-content-center align-items-center ">
            <div class="promote_video_center text-center">
                <img src="<?php echo base_url() ?>assets/images/google_partner.png" class="partner_img" alt="partner">
                <h2>Promote Your Entire <span class="clr_blue">YouTube</span> <br /> <span class="clr_vio">Channel</span>
                    with Easy <span class="clr_vio">Steps</span>!</h2>

                <form id="channel_form" class="channel_frm">
                    <i class="fa-brands fa-youtube"></i>
                    <input class="form-control me-2" type="search" placeholder="Enter Your YouTube Channel Name / Link" name="youtube_url" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" id="submit_channel_form"><img src="<?php echo base_url() ?>assets/images/arrow.png" class="img-fluid" alt="arow_img"></button>
                </form>

                <div class="preview_section"></div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="dashboard_area_card text-center">
                            <div class="card_img">
                                <img src="<?php echo base_url() ?>assets/images/url_icon.png" class="img-fluid" alt="card_img">
                            </div>

                            <h6>Enter URL Link</h6>
                            <p>Enter the URL which you want to promote</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dashboard_area_card text-center">
                            <div class="card_img">
                                <img src="<?php echo base_url() ?>assets/images/campaing_clr_icon.png" class="img-fluid" alt="card_img">
                            </div>

                            <h6>Set Up your Campaign</h6>
                            <p>Set your target audience, budget, and check the estimated views</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dashboard_area_card text-center">
                            <div class="card_img">
                                <img src="<?php echo base_url() ?>assets/images/payment_clr_icon.png" class="img-fluid" alt="card_img">
                            </div>

                            <h6>Make Payment</h6>
                            <p>Complete the payment, and voila, sit back and watch your video go viral</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .loader {
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 40px;
        height: 40px;
        animation: spin 2s linear infinite;
        margin: 20px auto;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<script>
    $(document).ready(function() {
        // Handle form submission via button click or pressing "Enter"
        $('#submit_channel_form').on('click', function(event) {
            event.preventDefault();
            submitChannelForm();
        });

        $('#channel_form').on('submit', function(event) {
            event.preventDefault();
            submitChannelForm();
        });

        function submitChannelForm() {
            let youtubeUrl = $('input[name="youtube_url"]').val();

            // Add a loader to the preview section
            $('.preview_section').html('<div class="loader">Loading...</div>');

            $.ajax({
                url: "<?php echo base_url('user/get_video_details'); ?>",
                type: "POST",
                data: {
                    youtube_url: youtubeUrl
                },
                success: function(response) {
                    // Replace the loader with the response
                    $('.preview_section').html(response);
                },
                error: function() {
                    // Replace the loader with an error message
                    $('.preview_section').html('<p>Error retrieving video details. Please try again.</p>');
                }
            });
        }
    });

    // Make the thumbnails clickable
    $(document).on('click', '.thumb_section', function() {
        let videoId = $(this).data('video-id');
        //alert(videoId);
        $('#video_id').val(videoId);

        // Submit the form to add the campaign
        $('#campaign_form').submit();
    });
</script>