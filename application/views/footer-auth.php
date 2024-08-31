<script src="<?php echo base_url() ?>assets/js/jquery3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            let input = $(this).prev("input");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
</body>

</html>