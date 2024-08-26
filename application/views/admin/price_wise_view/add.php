<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2><?php echo $isUpdate ? 'Edit' : 'Add'; ?> Price Wise View</h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url('admin/price_wise_view'); ?>" class="btn btn-secondary">Back to List</a>
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
                            <form action="<?php echo $isUpdate ? base_url('admin/price_wise_view/edit/' . $priceWiseView['id']) : base_url('admin/price_wise_view/add'); ?>" method="post">

                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $country) { ?>
                                            <option value="<?php echo $country['id']; ?>"
                                                <?php echo (isset($priceWiseView) && $country['id'] == $priceWiseView['country_id']) ? 'selected' : ''; ?>>
                                                <?php echo $country['title']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('country_id', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="<?php echo set_value('price', isset($priceWiseView['price']) ? $priceWiseView['price'] : ''); ?>">
                                    <?php echo form_error('price', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="starting_view">Starting View</label>
                                    <input type="text" name="starting_view" id="starting_view" class="form-control" value="<?php echo set_value('starting_view', isset($priceWiseView['starting_view']) ? $priceWiseView['starting_view'] : ''); ?>">
                                    <?php echo form_error('starting_view', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="end_view">End View</label>
                                    <input type="text" name="end_view" id="end_view" class="form-control" value="<?php echo set_value('end_view', isset($priceWiseView['end_view']) ? $priceWiseView['end_view'] : ''); ?>">
                                    <?php echo form_error('end_view', '<small class="text-danger">', '</small>'); ?>
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