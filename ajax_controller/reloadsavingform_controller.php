<?php

require('../../db/connect.php');
if (isset($_POST['s_id'])) {
    $shid = $_POST['s_id'];
    $dat2 = $pdo->query("SELECT * FROM shareholder s 
              LEFT JOIN masiksavings ms ON s.s_id=ms.sh_id
              WHERE s.s_id ='$shid' ORDER BY ms.ms_upload_date DESC LIMIT 1")->fetch();


?>
    <div class="row">
        <div class="col-xl-4 col-md-2 mb-4">
            <div class="card shadow h-30 py-2" style="background:#54be6c;">
                <div class="card-body" style="color:black;">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <b>Shareholder No:<br>
                                Name:<br>
                                Address: <br>
                                Contact No: <br> </b>
                        </div>
                        <div class="col-auto">
                            <?php echo $dat2['s_number']; ?><br>
                            <?php echo $dat2['s_name']; ?><br>
                            <?php echo $dat2['s_address']; ?><br>
                            <?php echo $dat2['s_mobile']; ?><br>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <div class="col-xl-8 col-md-4 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <form method="POST" id="form1">
                            <div class="col mr-4 form-group row">
                                <label for="total_amount" class="col-lg-7 col-form-label"><b>Total Amount:</b></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="total_amount" name="ms_amount" style="width: 100%;">

                                </div>
                            </div>

                            <div class="col mr-2 form-group row">
                                <label for="tender" class="col-lg-7 col-form-label"><b>Penalty: </b></label>
                                <div class="col-sm-5">
                                    <input type="number" name="penalty_amount" class="form-control" id="penalty" value="0" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col mr-2 form-group row">
                                <label for="tender" class="col-lg-7 col-form-label"><b>Discount: </b></label>
                                <div class="col-sm-5">
                                    <input type="number" name="discount_amount" class="form-control" id="discount_amount" value="0" style="width: 100%;" required>
                                </div>
                            </div>
                            <div class="col mr-4 form-group row">
                                <label for="tender" class="col-lg-4 col-form-label"><b>Date: </b></label>
                                <div class="col-sm-8">
                                    <input type="date" name="ms_mthyr" id="nepaliDate5" class="nepali-calendar form-control" required>
                                </div>
                            </div>
                            <div class="col mr-2 form-group row">
                                <label for="payamt" class="col-lg-7 col-form-label"><b>To Pay Amount: </b></label>
                                <div class="col-sm-5">
                                    <input type="text" readonly class="form-control-plaintext" id="payamt" name="ms_grand_total" value="0" style="width: 100%;">
                                </div>
                            </div>

                            <div class="row no-gutters align-items-center" style="margin-left: 300px;">
                                <input type="hidden" name="sh_id" id="sh_id" value="<?php echo $shid; ?>" class="form-control">
                                <!-- <input type="hidden" id="status" value="unpaid" name="status" class="form-control"> -->
                                <div class="relbtn2">
                                    <input type="submit" value="Pay" id="pay" name="pay" class="form-control btn-outline-success">
                                </div>

                            </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php

}
?>
<script type="text/javascript">
    var p = $("#total_amount").val();

    var discount = $("#discount_amount").val();
    var penalty = $("#penalty").val();
    $("#payamt").val(Number(p) + Number(penalty) - Number(discount));
</script>


<!-- Tender change code -->
<script type="text/javascript">
    $("#discount_amount").on("change keyup", function() {
        var p = $("#total_amount").val();

        var discount = $(this).val();
        var penalty = $("#penalty").val();
        $("#payamt").val(Number(p) + Number(penalty) - Number(discount));

    });
    $("#penalty").on("change keyup", function() {
        var p = $("#total_amount").val();

        var discount = $("#discount_amount").val();
        var penalty = $(this).val();
        $("#payamt").val(Number(p) + Number(penalty) - Number(discount));

    });
    $("#total_amount").on("change keyup", function() {
        var p = $(this).val();

        var discount = $("#discount_amount").val();
        var penalty = $("#penalty").val();
        $("#payamt").val(Number(p) + Number(penalty) - Number(discount));

    });
</script>