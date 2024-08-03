<!-- views/patients/book_appointment.php -->
<section id="book-appointment">
  <div class="container">
      <div class="doctor-details-box text-center">
        <h4>Today's Appointments</h4>
        <hr> <!-- Separate line -->
        <div class="row">
            <div class="col-md-6">
                <!-- Display all doctors' details for today -->
                <div class="doctor-list">
                    <h4>Today's Doctors</h4>
                    <?php if (!empty($doctors_for_today)): ?>
                        <ul class="doc_ul">
                            <?php foreach ($doctors_for_today as $doctor): ?>
                                <li>
                                    <b><?php echo $doctor['full_name']; ?></b>
                                    <p><?php echo $doctor['degree']; ?></p>
                                    <p><?php echo $doctor['specialist']; ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No doctors available for today.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Display Ongoing Coupon Number -->
                <div class="ongoing-coupon">
                    <h4>Ongoing Coupon: </h4>
                    <span class="badge badge-info big-badge"><?php echo $ongoing_coupon; ?></span>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Display Total Patients for Today -->
                <div class="total-patients">
                    <h4>Total Patients for Today</h4>
                    <span class="badge badge-warning big-badge"><?php echo $total_patients; ?></span>
                </div>
            </div>
        </div>
    </div>
</section>