<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Countries</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url('admin/countries/add'); ?>" class="btn btn-primary">Add Country</a>
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
                            <?php if (count($countries) > 0) { ?>
                                <table id="countries" class="table table-bordered table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($countries as $country) { ?>
                                            <tr>
                                                <td><?php echo $country['id']; ?></td>
                                                <td><?php echo $country['code']; ?></td>
                                                <td><?php echo $country['title']; ?></td>
                                                <td><?php echo $country['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/countries/edit/' . $country['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?php echo base_url('admin/countries/delete/' . $country['id']); ?>" onclick="return confirm('Are you sure you want to delete this country?');" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <p>No countries found.</p>
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
        $('#countries').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    });
</script>