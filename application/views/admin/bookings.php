<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1>Bookings</h1>
        </div>
        <div class="col-sm-8">
          <form action="<?php echo base_url('admin/bookings/filter'); ?>" method="post">
            <div class="row">
              <?php if ($this->session->userdata('role') != 2): ?>
                <div class="col-md-4">
                  <select name="doctor_id" id="doctor_id" class="form-control">
                    <option value="">Select Doctor</option>
                    <!-- Loop through available doctors and populate the dropdown -->
                    <?php foreach ($doctors as $doctor): ?>
                      <?php $selected = ($selected_doctor_id == $doctor['id']) ? 'selected' : ''; ?>
                      <option value="<?php echo $doctor['id']; ?>" <?php echo $selected; ?>>
                        <?php echo $doctor['full_name']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <?php else: ?>
                <input type="hidden" name="doctor_id" value="<?php echo $this->session->userdata('user_id'); ?>">
              <?php endif; ?>
              <div class="col-md-4">
                <?php $selected_date = ($selected_appointment_date != "") ? $selected_appointment_date : ''; ?>
                <input type="date" class="form-control" name="appointment_date" value="<?php echo $selected_date; ?>">
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo base_url('admin/bookings/'); ?>?action=show_all" class="btn btn-danger">Clear</a>
              </div>
            </div>
          </form>
        </div>
        <?php if ($this->session->userdata('role') != 2): ?>
          <div class="col-sm-2 text-right">
            <a href="<?php echo base_url('admin/bookings/add'); ?>" class="btn btn-primary">Add Booking</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <span><b>Total:
                      <?php echo count($bookings); ?>
                    </b></span>
                </div>
                <div class="col-md-2">
                  <span><b>Completed:
                      <?php echo count($completedBookings); ?>
                    </b></span>
                </div>
                <div class="col-md-2">
                  <span><b>Confirmed:
                      <?php echo count($confirmedBookings); ?>
                    </b></span>
                </div>
                <div class="col-md-2">
                  <span><b>Pending:
                      <?php echo count($pendingBookings); ?>
                    </b></span>
                </div>
                <div class="col-md-2">
                  <span><b>Rejected:
                      <?php echo count($rejectedBookings); ?>
                    </b></span>
                </div>
              </div>

              <hr>

              <?php if (!empty($bookings)): ?>
                <table id="bookings" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Booking ID</th>
                      <?php if ($this->session->userdata('role') != 2): ?>
                        <th>Doctor</th>
                      <?php endif; ?>
                      <th>Patient</th>
                      <th>Appointment</th>
                      <th>Token No</th>
                      <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 5 || $this->session->userdata('role') == 2): ?>
                        <th>Visit</th>
                      <?php endif; ?>
                      <th>Status</th>
                      <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 5): ?>
                        <th>Booked By</th>
                        <th>Action</th> <!-- New column for action buttons -->
                      <?php endif; ?>
                      <!-- Add more columns based on your booking data -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($bookings as $booking): ?>
                      <tr>
                        <td>#
                          <?php echo $booking['id']; ?>
                        </td>
                        <?php if ($this->session->userdata('role') != 2): ?>
                          <td>
                            <?php echo $booking['doctor_name']; ?>
                          </td>
                        <?php endif ?>
                        <td>
                          <?php if (!empty($booking['patient_name'])): ?>
                            <?php echo $booking['patient_name']; ?>
                          <?php else: ?>
                            <?php echo $booking['patient_full_name']; ?>
                          <?php endif; ?>
                          <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 5): ?>
                            <br>
                            <?php echo $booking['mobile']; ?>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if ($booking['appointment_date'] != ""): ?>
                            Date:
                            <?php echo date("d/m/Y", strtotime($booking['appointment_date'])); ?>
                          <?php else: ?>
                            Date:
                            <?php echo date("d/m/Y", strtotime($booking['dad'])); ?><br>
                            Time:
                            <?php echo date("h:i A", strtotime($booking['dat'])); ?>
                          <?php endif; ?>
                        </td>
                        <td>
                          <span class="badge badge-info big-badge">
                            <?php echo $booking['coupon_no']; ?>
                          </span>
                        </td>
                        <td>
                          <?php if (($this->session->userdata('role') == 1 || $this->session->userdata('role') == 5 /* || $this->session->userdata('role') == 2 */) && ($booking['dad'] == date("Y-m-d")) && $booking['status'] == 1): ?>

                            <?php if ($booking['visit_status'] == 0): ?>
                              <span class="status-text">Yet to start the appointment</span>
                              <hr>
                              <a href="javascript:void(0)" data-booking-id="<?php echo $booking['id']; ?>"
                                class="btn btn-sm btn-success appointment-ongoing">
                                <i class="fas fa-check"></i> Mark as Ongoing
                              </a>

                            <?php elseif ($booking['visit_status'] == 1): ?>
                              <span class="status-text">Appointment is ongoing</span>
                              <hr>
                              <a href="javascript:void(0)" data-booking-id="<?php echo $booking['id']; ?>"
                                class="btn btn-sm btn-warning appointment-completed">
                                <i class="fas fa-check"></i> Mark as Completed
                              </a>
                            <?php endif; ?>

                          <?php endif; ?>

                          <?php if ($booking['visit_status'] == 2): ?>
                            <i class="fas fa-check"></i> <span class="status-text">Appointment is completed</span>
                          <?php endif; ?>
                        </td>
                        <td>

                          <?php
                          $today = strtotime(date('Y-m-d'));
                          $appointmentDate = strtotime($booking['dad']);

                          if ($booking['status'] == 0) {
                            if ($appointmentDate < $today) {
                              echo '<span class="badge badge-info">Not Attended</span>';
                            } else {
                              echo '<span class="badge badge-info">Pending</span>';
                            }
                          } else {
                            switch ($booking['status']) {
                              case 1:
                                echo '<span class="badge badge-success">Confirmed</span>';
                                break;
                              case 2:
                                echo '<span class="badge badge-success">Visited</span>';
                                break;
                              case 3:
                                echo '<span class="badge badge-danger">Rejected</span>';
                                break;
                              default:
                                echo 'Unknown';
                                break;
                            }
                          }

                          if (($appointmentDate >= $today) && $booking['status'] == 0 && ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 5)): ?>
                            <hr>
                            <!-- Show Confirm and Reject buttons when status is pending -->
                            <button type="button" data-booking-id="<?php echo $booking['id']; ?>"
                              class="btn btn-sm btn-success confirm-booking"><i class="fas fa-check"></i> Confirm</button>
                            <button type="button" data-booking-id="<?php echo $booking['id']; ?>"
                              class="btn btn-sm btn-danger reject-booking"><i class="fas fa-times"></i> Reject</button>
                          <?php endif; ?>
                        </td>
                        <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 5): ?>
                          <td>
                            <?php
                            // Show "Self" if patient_id and booked_by are the same, otherwise show user's full_name
                            echo ($booking['patient_id'] === $booking['booked_by']) ? 'Self' : $booking['booked_by_name'];
                            ?>
                          </td>
                          <td>
                            <!-- Action buttons with Font Awesome icons for edit and delete -->
                            <a href="<?php echo base_url('admin/bookings/edit/') . $booking['id']; ?>"
                              class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                            <!--a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a-->
                          </td>
                        <?php endif; ?>
                        <!-- Add more cells based on your booking data -->
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php else: ?>
                <p>No bookings found.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Modal for Confirming Booking -->
<div class="modal fade" id="confirmBookingModal" tabindex="-1" role="dialog" aria-labelledby="confirmBookingModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmBookingModalLabel">Confirm Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to confirm this booking?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmBookingButton">Confirm</button>
      </div>
    </div>
  </div>
</div>
<?php
if (!empty($booking_details)):
  ?>
  <!-- Modal for Booking Details -->
  <div class="modal fade" id="bookingDetails" tabindex="-1" role="dialog" aria-labelledby="bookingDetailsLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Token Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <span class="badge badge-info big-token">
            <?php echo $booking_details['coupon_no']; ?>
          </span>
          <div class="text-left mt-3">
            <p><b>Doctor:
                <?php echo $booking_details['doctor_name']; ?>
              </b></p>
            <p><b>Patient:
                <?php echo $booking_details['patient_name']; ?>
              </b></p>
            <p><b>Appointment Date:
                <?php echo date("l, jS F, Y", strtotime($booking_details['dad'])); ?>
              </b></p>
            <p><b>Appointment Time:
                <?php echo date("h:i A", strtotime($booking_details['dat'])); ?>
              </b></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function () {
      // Open the confirmation modal
      $('#bookingDetails').modal('show');
    });
  </script>

  <?php
endif;
?>
<style>
  .modal {
    text-align: center;
  }

  .big-token {
    font-size: 6em;
    padding: 0.3em 0.6em;
  }

  @media screen and (min-width: 768px) {
    .modal:before {
      display: inline-block;
      vertical-align: middle;
      content: " ";
      height: 100%;
    }
  }

  .modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
  }
</style>

<script>
  $(function () {
    $("#bookings").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false // Disable default sorting
    });

    // Inside the $(document).ready(function() { ... }) block
    // JavaScript to handle status update on Confirm and Reject buttons click
    // Event handlers for confirm and reject buttons with confirmation check
    $('body').on('click', '.confirm-booking', function () {

      var booking_id = $(this).data('booking-id');

      // Open the confirmation modal
      $('#confirmBookingModal').modal('show');

      // Set up a click event handler for the "Confirm" button within the modal
      $('#confirmBookingButton').on('click', function () {
        // Close the modal
        $('#confirmBookingModal').modal('hide');

        // Proceed with updating the booking status
        updateBookingStatus(booking_id, 1); // 1 represents Confirmed status
      });
    });

    /* $(".confirm-booking").on('click', function() {
        var booking_id = $(this).data('booking-id');
        // Show a confirmation dialog before updating the status
        var confirmationMessage = "Are you sure you want to confirm this booking?";
        if (confirm(confirmationMessage)) {
            updateBookingStatus(booking_id, 1); // 1 represents Confirmed status
        }
    }); */

    $('body').on('click', '.reject-booking', function () {
      var booking_id = $(this).data('booking-id');
      // Show a confirmation dialog before updating the status
      var confirmationMessage = "Are you sure you want to reject this booking?";
      if (confirm(confirmationMessage)) {
        updateBookingStatus(booking_id, 3); // 3 represents Rejected status
      }
    });

  });

  function updateBookingStatus(booking_id, status) {
    $.ajax({
      url: "<?php echo base_url('admin/bookings/updateBookingStatus'); ?>",
      type: "POST",
      data: { booking_id: booking_id, status: status },
      success: function (response) {
        if (response === 'success') {
          // Refresh the page or update the booking status in the table if needed
          location.reload();
        } else {
          // Show an error message if the update fails
          alert('Failed to update booking status.');
        }
      },
      error: function () {
        // Show an error message if there is an issue with the AJAX request
        alert('Failed to update booking status.');
      }
    });
  }

  $('body').on('click', '.appointment-ongoing', function () {
    var booking_id = $(this).data('booking-id');
    var confirmationMessage = "Are you sure you want to mark as ongoin?";
    if (confirm(confirmationMessage)) {
      updateVisitStatus(booking_id, 1); // 1 represents Ongoing status
    }
  });

  $('body').on('click', '.appointment-completed', function () {
    var booking_id = $(this).data('booking-id');
    var confirmationMessage = "Are you sure you want to mark as completed?";
    if (confirm(confirmationMessage)) {
      updateVisitStatus(booking_id, 2); // 2 represents Completed status
    }
  });

  function updateVisitStatus(booking_id, visit_status) {
    $.ajax({
      url: "<?php echo base_url('admin/bookings/updateVisitStatus'); ?>",
      type: "POST",
      data: { booking_id: booking_id, visit_status: visit_status },
      success: function (response) {
        if (response === 'success') {
          // Refresh the page or update the visit status in the table if needed
          location.reload();
        } else {
          // Show an error message if the update fails
          alert('Failed to update visit status.');
        }
      },
      error: function () {
        // Show an error message if there is an issue with the AJAX request
        alert('Failed to update visit status.');
      }
    });
  }

</script>