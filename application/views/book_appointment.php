<!-- views/patients/book_appointment.php -->
<section id="book-appointment">
  <div class="container">
    <h2>Book Appointment</h2>
    <p>Select a doctor and schedule an appointment.</p>

    <?php echo validation_errors(); ?>
    <?php echo form_open('booking/bookAppointment', 'class="needs-validation"'); ?>
    
      <div class="form-group">
          <label for="doctor">Doctor:</label>
          <?php if (isset($selected_doctor) && !empty($selected_doctor)): ?>
            <!-- Display the selected doctor name (readonly) -->
            <input type="text" class="form-control" value="<?php echo $selected_doctor['full_name']; ?>" readonly>
            <input type="hidden" name="doctor_id" value="<?php echo $selected_doctor['id']; ?>">
          <?php else: ?>
            <!-- Display the list of available doctors for selection -->
            <select name="doctor_id" id="doctor_id" class="form-control">
              <option value="">Select Doctor</option>
              <?php foreach ($doctors as $doctor): ?>
                <option value="<?php echo $doctor['id']; ?>"><?php echo $doctor['full_name']; ?></option>
              <?php endforeach; ?>
            </select>
          <?php endif; ?>
        </div>
        <?php if (!empty($getUpcomingAppointments)): ?>
            <div class="form-group">
              <label for="appointment_date">Select Date:</label>
              <select name="appointment_id" id="appointment_id" class="form-control">
                <?php 
                    $html = "";
                    foreach ($getUpcomingAppointments as $dateDetails){
                        $html .= '<option value="'. $dateDetails->id .'">'. date('jS F, Y', strtotime($dateDetails->appointment_date)) . " - ". date("h:i A", strtotime($dateDetails->appointment_time)) .'</option>';
                    }
                    echo $html;
                    /* foreach ($availableDays as $day): ?>
                      <option value="<?php echo getNextWeekdayDateFormat(getDayNumber($day)); ?>"><?php echo getNextWeekday(getDayNumber($day)); ?></option>
                    <?php endforeach; */ 
                ?>
              </select>
            </div>
          <?php endif; ?>
          <!-- Display area for the fetched doctor details -->
          <div id="doctorDetails">
          
          </div>
      <?php if ($this->session->userdata('user_id')): ?>
        <!-- Autofill name and mobile if user is logged in -->
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" class="form-control" value="<?php echo $patient->full_name; ?>" required>
        </div>

        <div class="form-group">
          <label for="mobile">Mobile Number:</label>
          <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $patient->mobile; ?>" required>
        </div>
      <?php else: ?>
        <!-- If user is not logged in, show regular input fields -->
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="mobile">Mobile Number:</label>
          <input type="text" name="mobile" id="mobile" class="form-control" required>
        </div>
      <?php endif; ?>

      <!-- Referral ID field is not required -->
      <!-- <div class="form-group">
        <label for="referral_id">Referral ID (Optional):</label>
        <input type="text" name="referral_id" id="referral_id" class="form-control">
      </div> -->

      <button type="submit" name="bk" value="Book Appointment" class="btn btn-primary">Book Appointment</button>
    <?php echo form_close(); ?>
  </div>
</section>

<script>
    // JavaScript to fetch doctor details on doctor selection change
    $(document).ready(function() {
        $("#doctor_id").on('change', function() {
            var doctor_id = $(this).val();
            if (doctor_id !== '') {
                $.ajax({
                    url: "<?php echo base_url('AjaxResponse/getDoctorDetails'); ?>",
                    type: "POST",
                    data: { doctor_id: doctor_id },
                    success: function(response) {
                        $("#doctorDetails").html(response);
                    },
                    error: function() {
                        // Show an error message if there is an issue with the AJAX request
                        $("#doctorDetails").html('<p>Failed to fetch doctor details.</p>');
                    }
                });
            } else {
                // Clear doctor details display if no doctor is selected
                $("#doctorDetails").html('');
            }
        });
        
        $("#doctor_id").change();
        $("#patient_id").change();
    });
</script>