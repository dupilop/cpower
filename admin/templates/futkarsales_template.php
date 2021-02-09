<?php
$ad_id = $_SESSION['ad_id'];
require '../../db/connect.php';

?>
<style type="text/css">
    .center {
        margin-left: 200px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Add Billing (Futkar Billing)</h2>
            <p class="text-muted">Please enter valid information</p>
            <div class="row">

                <div class="col-md-8">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <form class="needs-validation" id="form1" novalidate method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label for="validationCustom3">Description *</label>
                                        <input class="form-control" id="a" name="e_description" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Date *</label>
                                        <input class="form-control" id="b" type="date" name="e_date" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>

                                </div> <!-- /.form-row -->

                                <div class="form-row">
                                    <div class="col-md-5 mb-3">
                                        <label for="validationCustom3">Quantity</label>
                                        <input class="form-control" id="c" type="number" value="1" name="e_quantity" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="validationCustom3">Price</label>
                                        <input class="form-control" id="d" type="text" value="0" name="e_price" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                </div>



                                <div class="form-row">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align text-danger"><b>Sub Total</b></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" readonly name="e_amount" id="t_income" class="form-control-plaintext text-danger">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align text-danger"><b>Total Amount </b></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" readonly name="e_grandtotal" id="t_amount" class="form-control-plaintext text-danger">
                                    </div>
                                </div>
                                <input type="hidden" name="e_uploadedby" value="<?php echo $ad_id; ?>">
                                <input type="hidden" name="e_uploadedon" value="<?php echo date("Y-m-d H:i:sa"); ?>">
                                <!-- <input type="hidden" readonly name="s_sales" id="sal_earnings"> -->
                                <div id="bload">
                                    <button class="btn btn-primary" type="submit" id="add" name="submit">Save</button>
                                </div>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->

<script type="text/javascript">
    var qty = $("#c").val();
    var price = $("#d").val();
    if (qty > 1) {
        price = price * qty;
        $("#t_income").val(price);
        $("#t_amount").val(price);
    } else {
        price = price * 1;
        $("#t_income").val(price);
        $("#t_amount").val(price);
    }
    $(document).on("change keyup", "#c", function() {
        var qty = $(this).val();
        var price = $("#d").val();
        if (qty > 1) {
            price = price * qty;
            $("#t_income").val(price);
            $("#t_amount").val(price);
        } else {
            price = price * 1;
            $("#t_income").val(price);
            $("#t_amount").val(price);
        }
    });
    $(document).on("change keyup", "#d", function() {
        var qty = $("#c").val();
        var price = $(this).val();
        if (qty > 1) {
            price = price * qty;
            $("#t_income").val(price);
            $("#t_amount").val(price);
        } else {
            price = price * 1;
            $("#t_income").val(price);
            $("#t_amount").val(price);
        }
    });
    $(document).on('click', '#add', function(e) {
        e.preventDefault();
        var a = $("#a").val();
        var b = $("#b").val();
        var c = $("#c").val();
        var d = $("#d").val();


        var avalid = false;
        var bvalid = false;
        var cvalid = false;
        var dvalid = false;


        if ($.trim(a) == '') {
            $("#a").css("border", "2px solid red");
            avalid = false;
        } else {
            $("#a").css("border", "");
            avalid = true;
        }
        if ($.trim(b) == '') {
            $("#b").css("border", "2px solid red");
            bvalid = false;
        } else {
            $("#b").css("border", "");
            bvalid = true;
        }
        if ($.trim(c) == '') {
            $("#c").css("border", "2px solid red");
            cvalid = false;
        } else {
            $("#c").css("border", "");
            cvalid = true;
        }
        if ($.trim(d) == '') {
            $("#d").css("border", "2px solid red");
            dvalid = false;
        } else {
            $("#d").css("border", "");
            dvalid = true;
        }
        // if ($.trim(e) == '') {
        //     $("#e").css("border", "2px solid red");
        //     evalid = false;
        // } else {
        //     $("#e").css("border", "");
        //     evalid = true;
        // }
        // if ($.trim(f) == '') {
        //     $("#f").css("border", "2px solid red");
        //     fvalid = false;
        // } else {
        //     $("#f").css("border", "");
        //     fvalid = true;
        // }
        if ((avalid && bvalid && cvalid && dvalid) == true) {
            $("#bload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            e.preventDefault();
            var formdata = new FormData(document.getElementById("form1"));
            formdata.append('action', 'add');
            $.ajax({
                type: "POST",
                url: "../ajax_controller/futkar_controller.php",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $().msgpopup({
                        text: 'Added Successfully',
                        type: 'success'
                    });
                    $("#table1").html("");
                    $("#table2").html("");
                    $("#t_income").val("");
                    $("#form1")[0].reset();
                    $("#bload").html('<button class="btn btn-primary" type="submit" id="add" name="submit">Save</button>');
                }
            });

        } else {
            $().msgpopup({
                text: 'Error',
                type: 'error'
            });
        }
    });
</script>