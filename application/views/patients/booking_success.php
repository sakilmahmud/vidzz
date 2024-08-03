<section id="booking-success">
    <div class="container">
        <div class="doctor-details-box text-center">
            <h2>Booking Successful</h2>
            <p>Your appointment has been booked successfully.</p>
            <p>Thank you for choosing our services!</p>
            <strong>Booking ID: #<?php echo $bookingDetails['id']; ?></strong>
            <strong>Token ID:</strong>
            <span class="badge badge-info big-badge"><?php echo $bookingDetails['coupon_no']; ?></span>
        </div>
    </div>
</section>