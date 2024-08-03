<!-- views/patients/booking_history.php -->
<section id="booking-history">
  <div class="container">
    <h2>Booking History</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Booking Details</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($bookings as $booking): ?>
        <tr>
          <td>#<?php echo $booking['id']; ?></td>
          <td>
            <b><?php echo $booking['doctor_name']; ?></b><br>
            <b><?php echo date('jS F, Y', strtotime($booking['appointment_date']));?></b><br>
            <b>Token: <span class="badge badge-info big-badge"><?php echo $booking['coupon_no']; ?></span></b>
          </td>
          <td>
          <?php
            $today = strtotime(date('Y-m-d'));
            $appointmentDate = strtotime($booking['appointment_date']);
            
            if ($booking['status'] == 0) {
              if ($appointmentDate < $today) {
                echo 'Not Attended';
              } else {
                echo 'Pending';
              }
            } else {
              switch ($booking['status']) {
                case 1:
                  echo 'Confirmed';
                  break;
                case 2:
                  echo 'Visited';
                  break;
                case 3:
                  echo 'Rejected';
                  break;
                default:
                  echo 'Unknown';
                  break;
              }
            }
            ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
