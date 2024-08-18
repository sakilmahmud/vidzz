<div class="dashboard_content">
    <div class="dashboard_content_area">
        <h2 class="mb-3">All Campaigns</h2>
        <div class="campaign-list">
            <?php if (!empty($campaigns)) : ?>
                <?php foreach ($campaigns as $campaign) : ?>
                    <div class="campaign-item row">
                        <div class="campaign-info col-md-10">
                            <?php if (isset($campaign->videoDetails) && !empty($campaign->videoDetails)) : ?>
                                <div class="youtube_img_area">
                                    <div class="thumb_section">
                                        <div class="thumb_img">
                                            <img src="<?php echo $campaign->videoDetails['items'][0]['snippet']['thumbnails']['high']['url']; ?>" class="img-fluid" alt="youtube_img">
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <img src="default_image_url.jpg" alt="Default Image">
                            <?php endif; ?>
                            <div class="col-md-9">
                                <div class="campaign-status">
                                    <?php if ($campaign->status == 0): ?>
                                        <span class="active">Pending</span>
                                        <span>Under Review</span>
                                        <span>In Progress</span>
                                        <span>Completed</span>
                                    <?php elseif ($campaign->status == 1): ?>
                                        <span class="active">Paid</span>
                                        <span class="active">Under Review</span>
                                        <span>In Progress</span>
                                        <span>Completed</span>
                                    <?php elseif ($campaign->status == 2): ?>
                                        <span class="active">Paid</span>
                                        <span class="active">Under Review</span>
                                        <span class="active">In Progress</span>
                                        <span>Completed</span>
                                    <?php elseif ($campaign->status == 3): ?>
                                        <span class="active">Paid</span>
                                        <span class="active">Under Review</span>
                                        <span class="active">In Progress</span>
                                        <span class="active">Completed</span>
                                    <?php endif; ?>
                                </div>
                                <div class="campaign-title"><?php echo $campaign->videoDetails['items'][0]['snippet']['title']; ?></div>
                                <div class="campaign-id">Campaign ID #<?php echo $campaign->id; ?></div>
                            </div>


                            <!-- <div class="col-md-9">
                                <div class="campaign-status">
                                    <span class="active">Pending</span>
                                    <span>Under Review</span>
                                    <span>In Progress</span>
                                    <span>Completed</span>
                                </div>
                                <div class="campaign-title"><?php echo $campaign->videoDetails['items'][0]['snippet']['title']; ?></div>
                                <div class="campaign-id">Campaign ID #<?php echo $campaign->id; ?></div>
                            </div> -->
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