<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="container pt-2">
            <h2 class=" pb-5">Profile</h2>
            <div class="profile_form_area">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <form action="<?php echo base_url('user/update_profile'); ?>" method="post">
                    <div class="form_column">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value('first_name', $user->first_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value('last_name', $user->last_name); ?>">
                        </div>
                    </div>
                    <div class="form_column">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username', $user->username); ?>" disabled>
                        </div>
                        <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $user->email); ?>" disabled>
                        </div>
                    </div>
                    <div class="form_column">
                        <div class="form-group">
                            <label for="username">Old Password</label>
                            <input type="text" class="form-control" id="oldpass" name="oldpass" value="">
                        </div>
                        <div class="form-group ">
                            <label for="newpass">New Password</label>
                            <input type="text" class="form-control" id="newpass" name="newpass" value="">
                        </div>
                    </div>
                    <button type="submit" class="btn bg_btn mt-3">Update Profile</button>
                </form>
            </div>

        </div>
    </div>
</div>