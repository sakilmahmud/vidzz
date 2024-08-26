<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2><?php echo $isUpdate ? 'Edit Admin User' : 'Add Admin User'; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-primary">All Users</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <form action="<?php echo $isUpdate ? base_url('admin/users/edit/' . $user['id']) : base_url('admin/users/add'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo set_value('username', isset($user['username']) ? $user['username'] : ''); ?>" <?php echo ($isUpdate) ? 'readonly' : ''; ?>>
                                    <?php echo form_error('username'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo set_value('email', isset($user['email']) ? $user['email'] : ''); ?>" <?php echo ($isUpdate) ? 'readonly' : ''; ?>>
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="<?php echo set_value('first_name', isset($user['first_name']) ? $user['first_name'] : ''); ?>">
                                    <?php echo form_error('first_name'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo set_value('last_name', isset($user['last_name']) ? $user['last_name'] : ''); ?>">
                                    <?php echo form_error('last_name'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="1" <?php echo set_select('gender', '1', isset($user['gender']) && $user['gender'] == '1'); ?>>Male</option>
                                        <option value="2" <?php echo set_select('gender', '2', isset($user['gender']) && $user['gender'] == '2'); ?>>Female</option>
                                        <option value="3" <?php echo set_select('gender', '3', isset($user['gender']) && $user['gender'] == '3'); ?>>Others</option>
                                    </select>
                                    <?php echo form_error('gender'); ?>
                                </div>
                                <?php if ($isUpdate): ?>
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>