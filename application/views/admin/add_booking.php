<!-- select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/select2/css/select2.min.css') ?>">
<style>
    .select2-container .select2-selection--single{
        height: calc(2.25rem + 2px) !important;
    }
</style>
<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/select2/js/select2.full.min.js') ?>"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>
<!-- views/admin/add_booking.php -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <?php if (!empty($booking_details)) { ?>
                    <h1>Update Booking</h1>
                <?php } else { ?>
                    <h1>Add Booking</h1>
                    <?php } ?>
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
                            <!-- Your form for adding/updating a booking goes here -->
                            
                            <?php if (!empty($booking_details)) : ?>
                                <!-- If updating, use the 'updateBooking' method -->
                                <form action="<?php echo base_url('admin/bookings/edit/') . $booking_details['id']; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="booking_id" value="<?php echo $booking_details['id']?>">
                            <?php else: ?>
                                <!-- If adding, use the 'addBooking' method -->
                                <?php echo form_open('admin/bookings/add', 'class="needs-validation"'); ?>
                            <?php endif; ?>

                            <!-- Form fields and other elements go here -->
                            <div class="form-group">
                                <label for="doctor_id">Select Doctor:</label>
                                <select name="doctor_id" id="doctor_id" class="form-control" required>
                                    <option value="">Select Doctor</option>
                                    <!-- Loop through available doctors and populate the dropdown -->
                                    <?php foreach ($doctors as $doctor): ?>
                                        <?php $selected = ($booking_details && $booking_details['doctor_id'] == $doctor['id']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $doctor['id']; ?>" <?php echo $selected; ?>><?php echo $doctor['full_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Display area for the fetched doctor details -->
                            <div id="doctorDetails">
                                
                            </div>

                            <!-- Add more form fields for other booking details -->
                            
                            <div class="form-group">
                                <label for="patient_id">Select Patient:</label>
                                <select name="patient_id" id="patient_id" class="form-control select2" required>
                                    <option value="">Select Patient</option>
                                    <option value="add">Add New Patient</option>
                                    <!-- Loop through available patients and populate the dropdown -->
                                    <?php foreach ($patients as $patient): ?>
                                        <?php $selected = (!empty($booking_details) && $booking_details['patient_id'] == $patient['id']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $patient['id']; ?>" <?php echo $selected; ?>><?php echo $patient['full_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div id="patientDetails" style="display: none;">
                                <!-- If adding a new patient -->
                                <!-- patient details will be shown here -->
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile Number:</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <?php echo (!empty($booking_details)) ? 'Update Booking' : 'Add Booking'; ?>
                            </button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
        
        $("#patient_id").on('change', function() {
            var patient_id = $(this).val();
            var booking_id = <?php echo (!empty($booking_details)) ? $booking_details['id'] : '0'; ?>;

            if (patient_id !== '') {
                if (patient_id === 'add') {
                    // Show the patient details section for adding a new patient
                    $("#patientDetails").show();
                    $("#name").val('');
                    $("#mobile").val('');
                    // Disable the fields for name and mobile
                    //$("#name").prop('disabled', false);
                    //$("#mobile").prop('disabled', false);
                } else {
                    // Fetch patient details using AJAX
                    $.ajax({
                        url: "<?php echo base_url('AjaxResponse/getPatientDetails'); ?>",
                        type: "POST",
                        data: { patient_id: patient_id, booking_id: booking_id },
                        dataType: 'json',
                        success: function(response) {
                            //console.log(response);
                            // Populate patient details in the input fields
                            
                            if(response.patient_name != "" && booking_id != 0){
                                $("#name").val(response.patient_name);
                            }else{
                                $("#name").val(response.full_name);
                            }
                            $("#mobile").val(response.mobile);
                            // Disable the fields for name and mobile
                            //$("#name").prop('disabled', true);
                            //$("#mobile").prop('disabled', true);
                        },
                        error: function() {
                            // Show an error message if there is an issue with the AJAX request
                        }
                    });

                    // show the patient details section since we are selecting an existing patient
                    $("#patientDetails").show();
                }
            } else {
                // Clear patient details and hide the section if no patient is selected
                $("#name").val('');
                $("#mobile").val('');
                $("#patientDetails").hide();
                
                // Enable the fields for name and mobile
                $("#name").prop('disabled', false);
                $("#mobile").prop('disabled', false);
            }
        });
        $("#doctor_id").change();
        $("#patient_id").change();
    });
</script>