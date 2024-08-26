<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2><?php echo $isUpdate ? 'Edit Country' : 'Add Country'; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url('admin/countries'); ?>" class="btn btn-primary">All Countries</a>
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
                            <form action="<?php echo $isUpdate ? base_url('admin/countries/edit/' . $country['id']) : base_url('admin/countries/add'); ?>" method="post">
                                <div class="form-group">
                                    <label for="code">Country Code</label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter country code" value="<?php echo set_value('code', isset($country['code']) ? $country['code'] : ''); ?>">
                                    <?php echo form_error('code'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="title">Country Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter country title" value="<?php echo set_value('title', isset($country['title']) ? $country['title'] : ''); ?>">
                                    <?php echo form_error('title'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" <?php echo set_select('status', '1', isset($country['status']) && $country['status'] == 1 ? TRUE : FALSE); ?>>Active</option>
                                        <option value="0" <?php echo set_select('status', '0', isset($country['status']) && $country['status'] == 0 ? TRUE : FALSE); ?>>Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo $isUpdate ? 'Update' : 'Add'; ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>