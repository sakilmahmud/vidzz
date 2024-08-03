<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Doctors</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="<?php echo base_url('admin/doctors/add'); ?>" class="btn btn-primary">Add Doctor</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Doctor list -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <?php if (count($doctors) > 0) { ?>
                <table id="doctor" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($doctors as $doctor) { ?>
                      <tr>
                        <td><?php echo $doctor['id']; ?></td>
                        <td><?php echo $doctor['username']; ?></td>
                        <td><?php echo $doctor['full_name']; ?></td>
                        <td>
                          <?php if ($doctor['status'] == 1) : ?>
                            <span class="badge badge-success">Active</span>
                          <?php else : ?>
                            <span class="badge badge-danger">Deactivate</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if ($doctor['status'] == 1) : ?>

                            <a href="<?php echo base_url('admin/doctors/deactivateDoctor/' . $doctor['id']); ?>" onclick="return confirm('Are you sure you want to deactivate the doctor?');" class="btn btn-sm btn-outline-dark">Change Status</a>
                          <?php else : ?>
                            <a href="<?php echo base_url('admin/doctors/activateDoctor/' . $doctor['id']); ?>" onclick="return confirm('Are you sure you want to activate the doctor?');" class="btn btn-sm btn-outline-dark">Change Status</a>
                          <?php endif; ?>
                          <a href="<?php echo base_url('admin/doctors/edit/' . $doctor['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                          <a href="<?php echo base_url('admin/doctors/deleteDoctor/' . $doctor['id']); ?>" onclick="return confirm('Are you sure you want to delete this doctor?');" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <?php } else { ?>
                <p>No data found.</p>
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
    $('#doctor').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false, // Disable default sorting
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>