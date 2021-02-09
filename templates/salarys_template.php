<div id="show_data">

</div>
<script>
    load_data();

    function load_data() {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/salary_controller.php",
            data: {
                action: "view"
            },
            method: "POST",
            success: function(data) {
                $('#show_data').html(data);
            }
        });
    }
    $(document).on("click", ".delete", function(e) {
        var id = $(this).attr('id');
        e.preventDefault();
        pb.confirm(
            function(outcome) {
                if (outcome) {
                    $.ajax({
                        type: "GET",
                        url: "../ajax_controller/salary_controller.php?sal_id=" + id + "&&action=delete",
                        data: {
                            id: id,
                            action: 'delete'
                        },
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $().msgpopup({
                                text: 'Deleted Successfully',
                                type: 'error'
                            });
                            load_data();



                        }
                    });
                }

            },
            '<h4 class="text text-danger">Are you sure you want to delete?</h4>',
            'Yes',
            'No'
        );
    });
    $(document).on("click", "#addrestro", function() {
        window.location.href = './addsalary'
    });
</script>