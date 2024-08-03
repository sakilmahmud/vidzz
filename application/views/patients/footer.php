<!-- views/patients/footer.php -->
<!-- Footer -->
<footer>
  <p>&copy; <?php echo date('Y'); ?> Patient Dashboard. All rights reserved.</p>
</footer>

<script src="<?php echo base_url('assets/frontend/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/bootstrap.bundle.min.js') ?>"></script>

<script>
  $(document).ready(function() {
    // Mobile Menu
    $('#mobile-toggle-button').click(function() {
      $('#mobile-menu').addClass('open');
      $('#mobile-menu-overlay').addClass('active');
    });

    $('#mobile-close-button, #mobile-menu-overlay').click(function() {
      $('#mobile-menu').removeClass('open');
      $('#mobile-menu-overlay').removeClass('active');
    });
  });
</script>
</body>
</html>
