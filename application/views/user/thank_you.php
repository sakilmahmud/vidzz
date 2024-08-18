<div class="dashboard_content">
    <div class="dashboard_content_area">
        <div class="thank_you_area text-center">
            <h2>Thank You!</h2>
            <p>Your payment was successful. Your transaction ID is: <strong><?php echo $this->session->flashdata('transaction_id'); ?></strong></p>
            <p>We appreciate your business. If you have any questions, please contact our support team.</p>
            <a href="<?php echo base_url('user/dashboard'); ?>" class="btn btn-primary">Go to Dashboard</a>
        </div>
    </div>
</div>