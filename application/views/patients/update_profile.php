<!-- views/patients/update_profile.php -->
<section id="profile">
    <h2>Profile</h2>
    <p>Update your profile information.</p>
    <?php echo validation_errors(); ?>
    <?php echo form_open('patient/updateProfile', 'class="needs-validation"'); ?>
        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $patient->full_name ?? ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $patient->email ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="mobile">Mobile Number:</label>
            <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $patient->mobile ?? ''; ?>" readonly >
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    <?php echo form_close(); ?>
</section>
