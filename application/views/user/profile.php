<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="container mt-5">
            <h2>Profile</h2>
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form action="<?php echo base_url('user/update_profile'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username', $user->username); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $user->email); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo set_value('full_name', $user->full_name); ?>">
                </div>
                <button type="submit" class="btn bg_btn mt-3">Update Profile</button>
            </form>
        </div>
    </div>
</div>