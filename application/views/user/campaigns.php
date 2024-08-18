<div class="dashboard_content">
    <div class="dashboard_content_area">
        <h2 class="mb-3 pt-2">All Campaigns</h2>
        <div class="campaign-list mt-5">
            <?php if (!empty($campaigns)) : ?>
                <?php foreach ($campaigns as $campaign) : ?>
                    <div class="campaign-item row">
                        <div class="campaign-info col-md-10">
                            <div class="campaign-status">
                                <?php if ($campaign->status == 0): ?>
                                    <span class="active">Pending</span>
                                    <hr>
                                    <span>Under Review</span>
                                    <hr>
                                    <span>In Progress</span>
                                    <hr>
                                    <span>Completed</span>
                                <?php elseif ($campaign->status == 1): ?>
                                    <span class="active">Paid</span>
                                    <hr>
                                    <span class="active">Under Review</span>
                                    <hr>
                                    <span>In Progress</span>
                                    <hr>
                                    <span>Completed</span>
                                <?php elseif ($campaign->status == 2): ?>
                                    <span class="active">Paid</span>
                                    <hr>
                                    <span class="active">Under Review</span>
                                    <hr>
                                    <span class="active">In Progress</span>
                                    <hr>
                                    <span>Completed</span>
                                <?php elseif ($campaign->status == 3): ?>
                                    <span class="active">Paid</span>
                                    <hr>
                                    <span class="active">Under Review</span>
                                    <hr>
                                    <span class="active">In Progress</span>
                                    <hr>
                                    <span class="active">Completed</span>
                                    <hr>
                                <?php endif; ?>
                            </div>
                            <div class="campaign-info-box">
                                <div class="campaign-info-box-left">
                                    <?php if ($campaign->video_thumbs != "") :
                                        $videoDetails = unserialize($campaign->video_thumbs);
                                    ?>
                                        <div class="youtube_img_area">
                                            <div class="thumb_section">
                                                <div class="thumb_img">
                                                    <img src="<?php echo $videoDetails['high']['url']; ?>" class="img-fluid" alt="youtube_img">
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <img src="<?php echo base_url('assets/images/default_image_url.jpg'); ?>" alt="Video Thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class="campaign-info-box-right">
                                    <div class="campaign-title"><?php echo $campaign->video_title; ?></div>
                                    <div class="campaign-id">Campaign ID #<?php echo str_pad($campaign->id, 5, '0', STR_PAD_LEFT); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="campaign-actions col-md-2">
                            <p>Budget: $<?php echo number_format($campaign->budget, 2); ?></p>
                            <?php if ($campaign->status == 0): ?>
                                <a href="<?php echo base_url('user/payments/' . $campaign->payment_id); ?>" class="btn bg_btn">Pay now</a>
                            <?php else: ?>
                                <span class="btn border_btn">Paid</span>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No campaigns found.</p>
            <?php endif; ?>
        </div>

    </div>
</div>