<?php
session_start();
require '../../db/connect.php';
date_default_timezone_set('Asia/Kathmandu');
if (isset($_POST['s_id'])) {
    $s_id = $_POST['s_id'];
}
$dat = $pdo->query('SELECT * FROM sales s 
                    INNER JOIN customers c ON s.s_c_id=c.c_id
                    INNER JOIN admins a ON a.ad_id=s.s_uploaded_by 
                    WHERE s_id =' . $s_id)->fetch();
?>
<script type="text/javascript">
    window.onload = function() {
        window.print();
    }
</script>
<style>
    hr {
        border: 1px dotted #ff0000;
        border-style: none none dotted;
        color: #fff;
        background-color: #fff;
    }

    @page {
        size: auto;
        margin: 0cm 3cm 4cm 1cm;
    }
</style>
<div class="container">


    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-3">
            <img src="../../assets/images/logo.svg" width="auto" height="120px" /><br><br>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">

            <div><b>Address:</b> Dhangadi</div>
            <div><b>Phone:</b> 9800000000</div>
            <div><b>www.galznguyz.com</b></div>

            <hr />
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3">
            <div><b>Transaction number: </b> <?php echo '#' . $dat['s_id']; ?></div>

            <div><b>Date of transaction:</b><?php echo $dat['s_uploaded_on']; ?> </div>
            <hr />
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div><b>Name : </b><?php echo $dat['c_name']; ?> </div>
            <div><b>Address : </b><?php echo $dat['c_address']; ?> </div>
            <div><b>Mobile : </b><?php echo $dat['c_mobile']; ?> </div>
            <div><b>Registered on: </b><?php echo $dat['c_reg_date']; ?> </div>
            <hr /></b>
        </div>
        <!--</div>-->


        <!--<div class="row">-->

        <!--</div>-->

        <!--<div class="row">-->
        <?php
        $d1 = explode(",", $dat['s_sales']);
        ?>
        <div class="col-md-12 col-lg-4 col-xl-3">
            <!--<div>Previous Bill Amount: <?php echo $price2 ?> </div>-->
            <div><b>Products</b></div>
            <?php
            foreach ($d1 as $d2) {
                echo '<div>' . $d2 . '</div>';
            }



            ?>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div><b>Subtotal : </b><?php echo $dat['s_amount']; ?> </div>
            <div><b>Vat/Charge : </b><?php echo $dat['s_vatorcharge']; ?> </div>
            <div><b>Grand Total : </b><?php echo $dat['s_grandtotal']; ?> </div>
            <hr /></b>
        </div>

        <!--<div class="row">-->
        <div class="col-md-12 col-lg-4 col-xl-3">
            <div> <b>Powered By:</b> <i>Light Web Group Pvt Ltd.</i>
                <hr />
            </div>
        </div>

        <div class="col-md-12 col-lg-4 col-xl-3">
            <div> <b>Uploaded by: <?php echo $dat['ad_fullname']; ?><b>
                        <hr />
            </div>
        </div>
        <br>
        <div> </div>
    </div>