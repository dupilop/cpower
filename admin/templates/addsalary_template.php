<?php
$ad_id = $_SESSION['ad_id'];


?>
<style type="text/css">
    .center {
        margin-left: 200px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Add Salary</h2>
            <p class="text-muted">Please enter valid information</p>
            <div class="row">

                <div class="col-md-8">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <form class="needs-validation" id="form1" novalidate method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Name</label>
                                        <input class="form-control" id="a" name="sal_emp_name" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom4">Designation</label>
                                        <input class="form-control" id="b" name="sal_designation" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom3">Month & Year</label>
                                        <input class="form-control" id="c" type="month" name="sal_mon_year" required="required" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                </div> <!-- /.form-row -->

                                <div class="form-row">
                                    <label class="col-form-label col-md-2 col-sm-3  label-align">Earnings<span class="required">*</span></label>
                                    <div class="col-md-3  mb-3">
                                        <input class="form-control" type="text" placeholder="Earning Description" id="e_desc" required="required" />
                                    </div>
                                    <div class="col-md-3  mb-3">
                                        <input class="form-control" type="number" placeholder="Earning Amount" id="e_price" required="required" />
                                    </div>
                                    <div class="col-md-3  mb-3">
                                        <button class="btn-danger" type="button" id="eadd"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label class="col-form-label col-md-2 col-sm-3  label-align">Deductions<span class="required">*</span></label>
                                    <div class="col-md-3  mb-3">
                                        <input class="form-control" type="text" placeholder="Deduction Description" id="d_desc" required="required" />
                                    </div>
                                    <div class="col-md-3  mb-3">
                                        <input class="form-control" type="number" placeholder="Deduction Amount" id="d_price" required="required" />
                                    </div>
                                    <div class="col-md-3  mb-3">
                                        <button class="btn-danger" type="button" id="dadd"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Cheque No</label>
                                        <input class="form-control" id="d" class='optional' name="sal_cheque_no" type="text" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom4">Name of Bank</label>
                                        <input class="form-control" id="e" class='optional' name="sal_bank_name" type="text" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom3">Date</label>
                                        <input class="form-control" id="f" class='date' type="date" name="sal_date" required='required'>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                </div> <!-- /.form-row -->


                                <div class="form-row">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align text-danger"><b>Earnings</b></label>
                                    <div class="col-md-6 col-sm-6">
                                        <table id="table1">

                                        </table>
                                    </div>
                                </div> <!-- /.form-row -->
                                <div class="form-row">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align text-danger"><b>Deductions </b></label>
                                    <div class="col-md-6 col-sm-6">
                                        <table id="table2">

                                        </table>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align text-danger"><b>Total Income </b></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" readonly name="sal_tincome" id="t_income" class="form-control-plaintext text-danger">
                                    </div>
                                </div>

                                <input type="hidden" name="sal_uploaded_by" value="<?php echo $ad_id; ?>">
                                <input type="hidden" name="sal_uploaded_on" value="<?php echo date("Y-m-d H:i:sa"); ?>">
                                <input type="hidden" readonly name="sal_earnings" id="sal_earnings">
                                <input type="hidden" readonly name="sal_deductions" id="sal_deductions">
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
    var arr = [];
    var arr11 = [];
    var arr2 = [];
    var arr22 = [];
    $("#eadd").on("click", function() {
        var edesc = $("#e_desc").val();
        var eprice = $("#e_price").val();
        if ($.trim(edesc) == '') {
            $("#e_desc").css("border", "2px solid red");
        } else {
            $("#e_desc").css("border", "");
        }
        if ($.trim(eprice) == '') {
            $("#e_price").css("border", "2px solid red");
        } else {
            $("#e_price").css("border", "");
        }
        if ($.trim(edesc) == '' || $.trim(eprice) == '') {

            pb.clear();
            pb.error('<i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> Empty Value cannot be added');
        } else {
            var tincome = $("#t_income").val();
            var ecomb = edesc + '- Rs.' + eprice;
            tincome = Number(tincome) + Number(eprice);
            var tds = '<tr>';
            tds += '<td id="ll">' + ecomb + '</td>';
            tds += '<td><button type="button" name="rem2" class="btn btn-danger btn-sm remove"><span><i class="fa fa-times-circle"></i></span></button></td>';
            tds += '</tr>';
            $("#table1").append(tds);
            $("#e_comb").val(ecomb);
            $("#e_desc").val('');
            $("#e_price").val('');
            $("#t_income").val(tincome);
            arr.push(eprice);
            arr11.push(ecomb);
            $("#sal_earnings").val(arr11);
        }
    });

    //remove eadd
    $(document).on('click', '.remove', function() {
        var tot = t_income.value;

        var d = $(this).closest('td').prev('#ll').text();
        const originalString = d;
        const splitString = originalString.split("- Rs.");
        var res = splitString[1];
        var abc = splitString[0].split(' of ');

        tot = tot - Number(res);
        arr.splice($.inArray(res, arr), 1);
        arr11.splice($.inArray(d, arr11), 1);
        $(this).closest('tr').remove();
        $("#t_income").val(tot);
        $("#sal_earnings").val(arr11);
    });

    $("#dadd").on("click", function() {
        var ddesc = $("#d_desc").val();
        var dprice = $("#d_price").val();
        if ($.trim(ddesc) == '') {
            $("#d_desc").css("border", "2px solid red");
        } else {
            $("#d_desc").css("border", "");
        }
        if ($.trim(dprice) == '') {
            $("#d_price").css("border", "2px solid red");
        } else {
            $("#d_price").css("border", "");
        }
        if ($.trim(ddesc) == '' || $.trim(dprice) == '') {
            pb.clear();
            pb.error('<i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> Empty Value cannot be reduced');
        } else {
            var tincome2 = $("#t_income").val();
            var dcomb = ddesc + '- Rs.' + dprice;
            tincome2 = Number(tincome2) - Number(dprice);
            var tds2 = '<tr>';
            tds2 += '<td id="ll2">' + dcomb + '</td>';
            tds2 += '<td><button type="button" name="rem2" class="btn btn-danger btn-sm remove2"><span><i class="fa fa-times-circle"></i></span></button></td>';
            tds2 += '</tr>';
            $("#table2").append(tds2);
            $("#d_comb").val(dcomb);
            $("#d_desc").val('');
            $("#d_price").val('');
            $("#t_income").val(tincome2);
            arr2.push(dprice);
            arr22.push(dcomb);
            $("#sal_deductions").val(arr22);
        }
    });

    //remove daddd
    $(document).on('click', '.remove2', function() {
        var tot2 = t_income.value;
        var d2 = $(this).closest('td').prev('#ll2').text();
        const originalString = d2;
        const splitString = originalString.split("- Rs.");
        var res2 = splitString[1];
        var abc2 = splitString[0].split(' of ');

        tot2 = Number(tot2) + Number(res2);
        arr2.splice($.inArray(res2, arr2), 1);
        arr22.splice($.inArray(d2, arr22), 1);
        $(this).closest('tr').remove();
        $("#t_income").val(tot2);
        $("#sal_deductions").val(arr22);
    });

    $(document).on('click', '#add', function(e) {
        e.preventDefault();
        var a = $("#a").val();
        var b = $("#b").val();
        var c = $("#c").val();
        var d = $("#d").val();
        var e = $("#e").val();
        var f = $("#f").val();
        var avalid = false;
        var bvalid = false;
        var cvalid = false;
        var dvalid = false;
        var evalid = false;
        var fvalid = false;

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
        if ($.trim(e) == '') {
            $("#e").css("border", "2px solid red");
            evalid = false;
        } else {
            $("#e").css("border", "");
            evalid = true;
        }
        if ($.trim(f) == '') {
            $("#f").css("border", "2px solid red");
            fvalid = false;
        } else {
            $("#f").css("border", "");
            fvalid = true;
        }
        if ((avalid && bvalid && cvalid && dvalid && evalid && fvalid) == true) {
            $("#bload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            var formdata = new FormData(document.getElementById("form1"));
            formdata.append('action', 'add');
            $.ajax({
                type: "POST",
                url: "../ajax_controller/salary_controller.php",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data);
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