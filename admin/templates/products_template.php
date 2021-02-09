<div id="user_data">

</div>

<script type="text/javascript">
    load_data();

    function load_data() {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "ajax_controller/products_controller.php",
            method: "POST",
            data: {
                action: "view"
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        });
    }
    $(document).on("click", ".delete", function(e) {
        var id = $(this).attr('id');
        e.preventDefault();
        pb.confirm(
            function(outcome) {
                if (outcome) {
                    $(".dropify").aeImageResize({
                        height: 250,
                        width: 250
                    });
                    $.ajax({
                        type: "GET",
                        url: "ajax_controller/products_controller.php?p_id=" + id + "&&action=delete",
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
    $(document).on("click", ".pavailable", function() {
        var pid = $(this).attr("id");
        var vall = $(this).attr("value");
        $.ajax({
            url: "ajax_controller/products_controller.php",
            method: "POST",
            data: {
                p_id: pid,
                p_availability: vall,
                action: "eavailable"
            },
            success: function(data) {
                load_data();
            }
        });
    });
    $(document).on("click", "#addrestro", function() {
        window.location.href = './addproduct'
    });
</script>
<script src="../assets/plugins/imageresizer/jquery.ae.image.resize.js"></script>
<script src="../assets/plugins/imageresizer/jquery.ae.image.resize.min.js"></script>