<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>APP Users</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url('admin/users/add'); ?>" class="btn btn-primary">Add User</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Admin user list -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (count($users) > 0) { ?>
                                <table id="user" class="table table-bordered table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Verified</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) {

                                        ?>
                                            <tr>
                                                <td><?php echo $user['id']; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span><?php echo $user['full_name']; ?></span>
                                                    </div>
                                                </td>
                                                <td><?php echo $user['email']; ?></td>
                                                <td>
                                                    <?php if ($user['is_verified'] == 1) { ?>
                                                        <span class="badge badge-success">Mail verified</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">Mail not verified</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($user['status'] == 1) { ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">Deactive</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/users/edit/' . $user['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?php echo base_url('admin/users/changeStatus/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to change the status of this user?');" class="btn btn-sm btn-warning">Change Status</a>
                                                    <a href="<?php echo base_url('admin/users/changeVerifiedStatus/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to change the status of this user?');" class="btn btn-sm btn-warning">Change Verification Status</a>
                                                    <a href="<?php echo base_url('admin/users/delete/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


                            <?php } else { ?>
                                <p>No users found.</p>
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
        $('#user').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>