<style>
    .campaign-list {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .campaign-item {
        display: flex;
        justify-content: space-between;
        align-items-center;
        padding: 20px;
        border-bottom: 1px solid #f4f4f4;
    }

    .campaign-item:last-child {
        border-bottom: none;
    }

    .campaign-info {
        display: flex;
        align-items: center;
    }

    .campaign-info img {
        border-radius: 10px;
        width: 150px;
        height: 90px;
        object-fit: cover;
        margin-right: 20px;
    }

    .campaign-status {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .campaign-status span {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .campaign-status span::before {
        content: '';
        display: block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ffcc00;
        margin-right: 5px;
    }

    .campaign-title {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .campaign-id {
        color: #999;
    }

    .campaign-actions {
        text-align: right;
    }

    .campaign-actions p {
        margin: 5px 0;
        font-size: 1.1em;
        color: #7d3fff;
        font-weight: bold;
    }

    .campaign-actions button {
        background-color: #7d3fff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 1em;
    }
</style>

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
                                    <span>Pending</span>
                                    <span>Under Review</span>
                                    <span>In Progress</span>
                                    <span>Completed</span>
                                </div>
                                <div class="campaign-title"><?php echo $campaign->videoDetails['items'][0]['snippet']['title']; ?></div>
                                <div class="campaign-id">Campaign ID #<?php echo $campaign->id; ?></div>
                            </div>
                        </div>
                        <div class="campaign-actions col-md-2">
                            <p>Budget: $<?php echo number_format($campaign->budget, 2); ?></p>

                            <a href="<?php echo base_url('user/payments/1'); ?>" class="btn bg_btn">Pay now</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No campaigns found.</p>
            <?php endif; ?>
        </div>

    </div>
</div>