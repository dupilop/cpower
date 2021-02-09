<div id="user_data">

</div>
<div class="container-fluid" id="loanform">



</div>

<script type="text/javascript">
    load_data();

    function load_data() {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/addloans_controller.php",
            method: "POST",
            data: {
                action: "view"
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        });
    }




    $(document).on("click", ".addloan", function() {
        var id = $(this).attr('id');
        load_data2(id);
    });



    $(document).on("click", "#uploan", function(e) {
        e.preventDefault();
        $("#bload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        var formdata = new FormData(document.getElementById("form2"));
        formdata.append('action', 'uploadloan');

        $.ajax({
            type: "POST",
            url: "../ajax_controller/addloans_controller.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                // alert($.trim(data));
                $().msgpopup({
                    text: 'Loan applied successfully',
                    type: 'success'
                });
                $("#form2")[0].reset();
                $("#bload").html('<button class="btn btn-primary" type="submit" id="uploan" name="submit">Add</button>');
                load_data2($.trim(data));

            }
        });
    });

    function load_data2(id) {
        $("#loanform").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/addloans_controller.php",
            method: "POST",
            data: {
                s_id: id,
                action: "viewform"
            },
            success: function(data) {
                $('#loanform').html(data);
            }
        });
    }
</script>