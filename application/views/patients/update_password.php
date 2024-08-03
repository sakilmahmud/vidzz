<!-- views/patients/update_password.php -->
<section id="update-password">
    <h2>Update Password</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('patient/updatePassword'); ?>
        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input type="password" class="form-control" name="current_password" id="current_password" required>
        </div>

        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" class="form-control" name="new_password" id="new_password" required minlength="6">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Password</button>
    <?php echo form_close(); ?>
</section>
