<div id="user_data">

</div>

<script type="text/javascript">
    load_data();

    function load_data() {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/loanreport_controller.php",
            method: "POST",
            data: {
                action: "view"
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        });
    }
</script>