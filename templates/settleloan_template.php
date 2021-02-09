<div id="user_data">

</div>


<script type="text/javascript">
    load_data();

    function load_data() {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/settleloan_controller.php",
            method: "POST",
            data: {
                action: "view"
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        });
    }




    $(document).on("click", ".settleloan", function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "../ajax_controller/settleloan_controller.php",
            method: "POST",
            data: {
                l_id: id,
                action: "loansettle"
            },
            success: function(data) {
                load_data();
            }
        });
    });
</script>