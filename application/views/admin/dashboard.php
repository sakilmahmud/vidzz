<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-12 px-4 text-center">
                    <h2>Enter YouTube Video URL</h2>
                    <form action="<?php echo site_url('YouTubeController/fetch_video_details'); ?>" method="post">
                        <input class="form-control" type="text" name="youtube_url" placeholder="Enter YouTube Video URL" required>
                        <button type="submit" class="btn btn-outline-dark mt-3">Get Video Details</button>
                    </form>

                    <?php if (isset($error)) : ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <?php if (isset($videoDetails) && !empty($videoDetails)) : ?>
                        <pre><?php echo print_r($videoDetails); //$videoDetails['items'][0]['snippet']['title']; 
                                ?></pre>
                        <p><?php //echo $videoDetails['items'][0]['snippet']['description']; 
                            ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>