<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .print-area {
            max-width: 80mm; /* Adjust the maximum width as needed */
            margin: auto;
            padding: 10px;
        }
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
        }
        .divider {
            border-top: 1px solid #000;
            margin: 10px 0;
        }
        .token-number {
            text-align: center;
            font-size: 30px;
            margin-top: 10px;
        }
        .details {
            font-size: 20px;
            margin-top: 10px;
        }
        .footer {
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<section id="booking-success" class="print-area">
    <div class="header">
        <p>আয়ান ফার্মেসি</p>
        <p>উস্থি, আয়ান কমপ্লেক্স</p>
        <p>9153036768</p>
    </div>
    
    <div class="divider"></div>
    
    <div class="token-number">
        <b>টোকেন নম্বর: <?php echo $bookingDetails['coupon_no']; ?></b>
    </div>

    <div class="details">
        <p><b>Doctor: </b><?php echo $bookingDetails['doctor_name']; ?></p>
        <p><b>Patient:</b> <?php echo $bookingDetails['patient_name']; ?></p>
        <p><b>Appointment Date:</b> <?php echo date("l, jS F, Y", strtotime($bookingDetails['dad'])); ?></p>
        <p><b>Appointment Time:</b> <?php echo date("h:i A", strtotime($bookingDetails['dat'])); ?></p>
        <p><b>Booking Date-Time:</b> <?php echo date("l, jS F, Y h:i A", strtotime($bookingDetails['created_at'])); ?></p>
        <p>আয়ান ফার্মেসি আপনার শারীরিক সুস্থতা কামনা করে। </p>
    </div>

    <div class="divider"></div>

    <div class="footer">
        <p>আপনার দিন শুভ হোক!</p>
    </div>
</section>

<script>
    // JavaScript function for printing
    window.onload = function() {
        window.print();
    }
</script>

</body>
</html>
