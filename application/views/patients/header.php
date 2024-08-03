<!-- views/patients/header.php -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard</title>
  <!-- Add your CSS and JavaScript files here -->

  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/patient_styles.css') ?>">
</head>

<body>

  <!-- patient_dashboard.php -->

  <!-- Header -->
  <header>
    <h1>Aayan Pharmacy</h1>
    <h4>Welcome, <?php echo $patient->full_name; ?></h4>
  </header>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" id="mobile-toggle-button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="overlay" id="mobile-menu-overlay"></div>
    <div class="mobile-menu" id="mobile-menu">
      <h1>Vidzz</h1>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/dashboard'); ?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('bookAppointment'); ?>">Book Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('patient/bookingHistory'); ?>">Booking History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('patient/updateProfile'); ?>">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('patient/updatePassword'); ?>">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('logout'); ?>">Logout</a>
        </li>
      </ul>
      <button class="close-button" id="mobile-close-button">&times;</button>
    </div>
  </nav>