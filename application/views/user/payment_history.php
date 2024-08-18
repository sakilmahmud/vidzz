<div class="dashboard_content">
    <div class="dashboard_content_area">
        <h2 class="mb-3">Payment History</h2>

        <?php if (!empty($payments)) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Campaign ID</th>
                        <th>Campaign Title</th>
                        <th>Amount</th>
                        <th>Tnx</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment) : ?>
                        <tr>
                            <td><?php echo $payment->id; ?></td>
                            <td>#<?php echo $payment->campaign_id; ?></td>
                            <td><?php echo $payment->video_id; ?></td>
                            <td>$<?php echo number_format($payment->payment_amount, 2); ?></td>
                            <td><?php echo $payment->transaction_id; ?></td>
                            <td><?php echo ($payment->status == 1) ? 'Paid' : 'Pending'; ?></td>
                            <td><?php echo date('d M Y', strtotime($payment->created_at)); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No payment history found.</p>
        <?php endif; ?>
    </div>
</div>