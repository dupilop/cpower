<?php
require '../../db/connect.php';
require_once '../ajax_controller/invoicedesign_controller.php';
?>

<h1 class="h3 mb-2 text-gray-800">Masik Savings</h1>

<style type="text/css">
    @media print {
        .sp {
            width: 20%;
        }

        .wp {
            width: 60%;
        }
    }
</style>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">

        <script type="text/javascript">
            $(document).ready(function() {
                // Setup - add a text input to each footer cell
                $('#example thead tr').clone(true).appendTo('#example thead');
                $('#example thead tr:eq(1) th.sear').each(function(i) {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control"/>');

                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });

                });


                var table = $('#example').DataTable({
                    orderCellsTop: true,
                    fixedHeader: true
                });


            });
        </script>


        <div class="table-responsive display">
            <?php

            $asd = $pdo->query("SELECT * FROM shareholder sh
                  WHERE sh.s_available= 'yes'");

            ?>
            <table class="table table-bordered display table-hover table-sm" width="100%" cellspacing="0" id="example" style="width:100%">

                <thead class="thead-dark">
                    <tr>
                        <th class="sear">Shareholder Number</th>
                        <th class="sear">Shareholder Name</th>
                        <th class="sear">Shareholder Address</th>
                        <!--<th class="sear">Advances</th>-->
                        <th class="fear" style="width:1%;"></th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="sear">Shareholder Number</th>
                        <th class="sear">Shareholder Name</th>
                        <th class="sear">Shareholder Address</th>
                        <!--<th class="sear">Advances</th>-->
                        <th class="fear" style="width:1%;"></th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    foreach ($asd as $a) {



                        echo '<tr>';
                        echo '<td>' . $a['s_number'] . '</td>';

                        echo '<td>' . $a['s_name'] . '</a></td>';
                        echo '<td>' . $a['s_address'] . '</td>';
                        // echo '<td>' . $a['advance_amount'] . '</td>';
                        // $advance_amount = $a['advance_amount'];
                        echo '<td><button id="' . $a['s_id'] . '" class="btn btn-light formv" data-toggle="tooltip" data-placement="top" title="Add Saving"><span class="fe fe-plus"></span></button></td>';
                        echo '</tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <script>
    function printExternal(url) {
        var printWindow = window.open(url, 'Print', '');

        printWindow.addEventListener('load', function() {
            if (Boolean(printWindow.chrome)) {
                // printWindow.print();
                // setTimeout(function() {
                //     printWindow.close();
                // }, 500);
            } else {
                printWindow.print();
                printWindow.close();
            }
        }, true);
    }
</script> -->

<div class="container-fluid" id="u_data">



</div>





<div class="container-fluid" id="user_data">

</div>
<!-- <button type="button" class="btn mb-2 btn-outline-success" data-toggle="modal" data-target="#verticalModal"> Launch demo modal </button> -->
<!-- Modal -->
<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle">Saving Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <h2 class="h5 page-title"><small class="text-muted text-uppercase">Invoice</small><br />#<span id="invid"></span>
                                    </h2>
                                </div>
                                <div class="col-auto">

                                    <button type="button" class="btn btn-secondary pp"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>

                            <div id="pdiv">
                                <?php printingdiv(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="../../js/jQuery.print.js"></script>
<script type="text/javascript">
    $(document).on("click", ".printsaving", function() {
        $("#verticalModal").modal("show");
        var ms_id = $(this).attr('id');
        $("#invid").text(ms_id);
    });


    $(document).on("click", ".pp", function(e) {
        e.preventDefault();
        $("#pdiv").print({
            //Use Global styles
            globalStyles: true,
            //Add link with attrbute media=print
            mediaPrint: false,
            //Custom stylesheet
            stylesheet: "../../css/app-light.css",
            //Print in a hidden iframe
            iframe: false,
            //Don't print this
            noPrintSelector: ".avoid-this",

            //Log to console when printing is done via a deffered callback
            deferred: $.Deferred().done(function() {
                console.log('Printing done', arguments);
            })
        });
        // window.open('../ajax_controller/invoicedesign_controller.php?print=ok');
        // divToPrint.hide();
        // window.print();
        // divToPrint.show();

    });
</script>

<script type="text/javascript">
    // load_bottom();
    $(document).on("click", ".formv", function() {
        var sh_id = $(this).attr("id");
        load_form(sh_id);
        load_bottom(sh_id)
    });

    function load_form(sh_id) {
        $("#u_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/reloadsavingform_controller.php",
            method: "POST",
            data: {
                s_id: sh_id
            },
            success: function(data) {
                $('#u_data').html(data);
            }
        });
    }

    function load_bottom(sh_id) {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/reloadsavingrecord_controller.php",
            method: "POST",
            data: {
                s_id: sh_id
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        });
    }
    $(document).on("click", "#pay", function(e) {
        e.preventDefault();
        $(".relbtn2").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        var formdata = new FormData(document.getElementById("form1"));
        $.ajax({
            type: "POST",
            url: "../ajax_controller/savings_controller.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(sh_id) {
                $().msgpopup({
                    text: 'Payment Success',
                    type: 'success'
                });
                load_bottom();
                $("#form1")[0].reset();
                load_form(sh_id);
                load_bottom(sh_id);
                $(".relbtn2").html('<input type="submit" value="Pay" id="pay" name="pay" class="form-control btn-outline-success">');
            }
        });
    });
    $(document).on("click", ".cancsav", function(e) {
        var id = $(this).attr('id');
        var shid = $(this).data('shid');
        e.preventDefault();
        pb.confirm(
            function(outcome) {
                if (outcome) {
                    $.ajax({
                        type: "POST",
                        url: "../ajax_controller/cancelsavings_controller.php",
                        data: {
                            id: id,
                            shid: shid
                        },
                        success: function(data) {
                            $().msgpopup({
                                text: 'Transaction Cancelled',
                                type: 'info'
                            });
                            load_form(data);
                            load_bottom(data);



                        }
                    });
                }

            },
            '<h4 class="text text-danger">Are you sure you want to delete?</h4>',
            'Yes',
            'No'
        );
    });
</script>