<!-- views/patients/patient_dashboard.php -->
<!-- Main Content -->
<main>
  <!-- Dashboard -->
  <section id="dashboard">
    <h2>Last Booking Details</h2>
    <?php if (!empty($lastBooking)): ?>
        <div class="card">
            <div class="card-body">
                <?php if (!empty($lastBooking['patient_name'])): ?>
                    <h5 class="card-title">Patient Name: <?php echo $lastBooking['patient_name']; ?></h5>
                <?php else: ?>
                    <h5 class="card-title">Patient Name: <?php echo $lastBooking['patient_full_name']; ?></h5>
                <?php endif; ?>
                <h5 class="card-title">Booking ID: #<?php echo $lastBooking['id']; ?></h5>
                <h5 class="card-title">Token Number: <span class="badge badge-info"><?php echo $lastBooking['coupon_no']; ?></span></h5>
                <h5 class="card-text">Doctor: <?php echo $lastBooking['doctor_name']; ?></h5>
                <h5 class="card-text">Appointment Date: <?php echo date('jS F, Y', strtotime($lastBooking['appointment_date'])); ?></h5>
                <!-- Add more details as needed -->
            </div>
        </div>
    <?php else: ?>
        <p>No booking history available.</p>
    <?php endif; ?>
    <!-- Add your dashboard content here -->
  </section>
</main>