<?php if (!empty($videoDetails)) : ?>
    <?php if (isset($videoDetails[0]['items'][0]['kind']) && $videoDetails[0]['items'][0]['kind'] === 'youtube#video') : ?>

        <div class="row">
            <div class="col-md-3">
                <div class="thumb_section" data-video-id="<?php echo $videoDetails[0]['items'][0]['id']; ?>">
                    <div class="thumb_img">
                        <img src="<?php echo $videoDetails[0]['items'][0]['snippet']['thumbnails']['high']['url']; ?>" class="img-fluid" alt="youtube_img">
                    </div>
                    <div class="video_title_sec">
                        <div class="video_title">
                            <h6><?php echo $videoDetails[0]['items'][0]['snippet']['title']; ?></h6>
                        </div>
                        <div class="channel_title">
                            <h6><i class="fa-brands fa-youtube"></i> <?php echo $videoDetails[0]['items'][0]['snippet']['channelTitle']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <!-- Display details for the latest videos from a channel -->
        <div class="channel-preview">
            <h3>Latest Videos:</h3>
            <div class="row">
                <?php foreach ($videoDetails['items'] as $video) : ?>
                    <div class="col-md-3">
                        <div class="thumb_section" data-video-id="<?php echo $video['id']['videoId']; ?>">
                            <div class="thumb_img">
                                <img src="<?php echo $video['snippet']['thumbnails']['high']['url']; ?>" class="img-fluid" alt="youtube_img">
                            </div>
                            <div class="video_title_sec">
                                <div class="video_title">
                                    <h6><?php echo $video['snippet']['title']; ?></h6>
                                </div>
                                <div class="channel_title">
                                    <h6><i class="fa-brands fa-youtube"></i> <?php echo $video['snippet']['channelTitle']; ?></h6>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <form action="<?php echo base_url('user/add-campaign'); ?>" method="post" id="campaign_form">
        <input type="hidden" name="video_id" id="video_id">
    </form>
<?php else : ?>
    <p>No video details found.</p>
<?php endif; ?>