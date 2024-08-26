<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Price Wise View</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url('admin/price_wise_view/add'); ?>" class="btn btn-primary">Add Price Wise View</a>
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
                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
                            <?php endif; ?>

                            <?php if (count($price_wise_views) > 0) { ?>
                                <table id="price_wise_views" class="table table-bordered table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Country</th>
                                            <th>Price</th>
                                            <th>Starting View</th>
                                            <th>End View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($price_wise_views as $view) { ?>
                                            <tr>
                                                <td><?php echo $view['id']; ?></td>
                                                <td><?php echo $view['country_name']; // Assuming you join with the countries table to get the title 
                                                    ?></td>
                                                <td>$<?php echo $view['price']; ?></td>
                                                <td><?php echo $view['starting_view']; ?></td>
                                                <td><?php echo $view['end_view']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/price_wise_view/edit/' . $view['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?php echo base_url('admin/price_wise_view/delete/' . $view['id']); ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <p>No price-wise views found.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function() {
        $('#price_wise_views').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    });
</script>