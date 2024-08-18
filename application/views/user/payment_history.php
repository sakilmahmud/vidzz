<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap4.css" />
<div class="dashboard_content">
    <div class="dashboard_content_area">
        <h2 class="mb-3">Payment History</h2>

        <?php if (!empty($payments)) : ?>
            <table id="payment" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Campaign</th>
                        <th>Amount</th>
                        <th>Tnx</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment) :
                        //$video_details = getVideoDetails($payment->video_id);
                        $youtube_img_url = "";
                        $video_title = "";
                        if ($payment->video_thumbs != "") :
                            $videoDetails = unserialize($payment->video_thumbs);
                            $youtube_img_url = $videoDetails['high']['url'];
                            $video_title = $payment->video_title;
                        endif;
                    ?>
                        <tr>
                            <td>#<?php echo $payment->id; ?></td>
                            <td width="40%">
                                <div class="d-flex gap-3" style="gap:20px">
                                    <img src="<?php echo $youtube_img_url; ?>" class="img-fluid w-100" alt="youtube_img">
                                    <div class="title">
                                        <h6><?php echo $video_title; ?></h6>
                                        #<?php echo str_pad($payment->campaign_id, 5, '0', STR_PAD_LEFT); ?>
                                    </div>
                                </div>
                            </td>
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
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function() {
        $('#payment').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    });
</script>