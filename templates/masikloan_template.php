<?php
require('../../db/connect.php');
$datab1 = new DatabaseTable('loan_transactions');
$datab2 = new DatabaseTable('loans');
$datab3 = new DatabaseTable('loan_period_setups');
date_default_timezone_set('Asia/Kathmandu');

if (isset($_POST['pay'])) {
    // if ($_POST['lt_interest'] > 0) {
    //     $_POST['l_last_interest_paid_date'] = $nepali_date;
    // } else {
    //     $_POST['l_last_interest_paid_date'] = $_POST['o_l_last_interest_paid_date'];
    // }
    $remamt = $_POST['rem_amount'] - $_POST['lt_amount'];
    $criteria = [
        'l_rem_amount' => $remamt,
        'l_id' => $_POST['lt_l_id']
    ];
    $_POST['lt_month'] = date("m");
    $_POST['lt_upload_date_time'] = date("Y-m-d H:i:sa");
    $_POST['lt_u_id'] = '1';
    unset($_POST['pay'], $_POST['rem_amount'], $_POST['l_remaining_interest'], $_POST['l_remaining_penalty'], $_POST['l_last_interest_paid_date'], $_POST['o_l_last_interest_paid_date']);
    $daa1 = $datab1->insert($_POST);
    $daa2 = $datab2->update($criteria, 'l_id');
}
?>
<style type="text/css">
    [class~=circline] {
        width: 100%;
    }

    [class~=circline] div {
        font-weight: bold;
    }

    [class~=circline] div {
        border-left-width: .125pc;
    }

    [class~=circline] div {
        border-bottom-width: .125pc;
    }

    [class~=circline] div {
        border-right-width: .125pc;
    }

    [class~=circline],
    [class~=circline] div {
        border-top-width: .125pc;
    }

    [class~=circline] div {
        border-left-style: solid;
    }

    [class~=circline] div {
        border-bottom-style: solid;
    }

    [class~=circline] div {
        border-right-style: solid;
    }

    [class~=circline] {
        display: flex;
    }

    [class~=circline],
    [class~=circline] div {
        border-top-style: solid;
    }

    [class~=circline] div {
        border-left-color: white;
    }

    [class~=circline] div {
        border-bottom-color: white;
    }

    [class~=circline] div {
        border-right-color: white;
    }

    [class~=circline] {
        justify-content: space-between;
    }

    [class~=circline] div {
        border-top-color: white;
    }

    [class~=circline] div {
        border-image: none;
    }

    [class~=circline] div {
        margin-top: -30pt;
    }

    [class~=circline] div {
        width: .46875in;
    }

    [class~=circline] div {
        height: 33.75pt;
    }

    [class~=circline] div {
        line-height: 2.8125pc;
    }

    [class~=circline] div {
        text-align: center;
    }

    [class~=circline] div {
        border-radius: 50%;
    }

    [class~=circline] {
        border-top-color: black;
    }

    [class~=circline] {
        border-image: none;
    }

    [class~=circline] {
        padding-top: 15px;
    }

    [class~=circline] {
        margin-top: 15px;
    }
</style>
<h1 class="h3 mb-2 text-gray-800">Loan Transaction</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">

        <script type="text/javascript">
            var _0x1417 = ['input', '#example', 'html', 'clone', 'text', 'column', '#example2', 'DataTable', 'keyup\x20change', '#example\x20thead\x20tr', 'value', 'ready', 'draw', 'search', 'each'];
            (function(_0x3269f9, _0x1417f2) {
                var _0xebc802 = function(_0x5ea1aa) {
                    while (--_0x5ea1aa) {
                        _0x3269f9['push'](_0x3269f9['shift']());
                    }
                };
                _0xebc802(++_0x1417f2);
            }(_0x1417, 0x137));
            var _0xebc8 = function(_0x3269f9, _0x1417f2) {
                _0x3269f9 = _0x3269f9 - 0x0;
                var _0xebc802 = _0x1417[_0x3269f9];
                return _0xebc802;
            };
            $(document)['ready'](function() {
                $(_0xebc8('0xd'))[_0xebc8('0x7')](!![])['appendTo']('#example\x20thead');
                $('#example\x20thead\x20tr:eq(1)\x20th.sear')[_0xebc8('0x3')](function(_0x474106) {
                    var _0x45fa8f = $(this)[_0xebc8('0x8')]();
                    $(this)[_0xebc8('0x6')]('<input\x20type=\x22text\x22\x20class=\x22form-control\x22/>');
                    $(_0xebc8('0x4'), this)['on'](_0xebc8('0xc'), function() {
                        if (_0x199640[_0xebc8('0x9')](_0x474106)[_0xebc8('0x2')]() !== this['value']) {
                            _0x199640[_0xebc8('0x9')](_0x474106)[_0xebc8('0x2')](this[_0xebc8('0xe')])[_0xebc8('0x1')]();
                        }
                    });
                });
                var _0x199640 = $(_0xebc8('0x5'))[_0xebc8('0xb')]({
                    'orderCellsTop': !![],
                    'fixedHeader': !![]
                });
            });
            $(document)[_0xebc8('0x0')](function() {
                var _0x163116 = $(_0xebc8('0xa'))[_0xebc8('0xb')]({
                    'orderCellsTop': !![],
                    'fixedHeader': !![]
                });
            });
        </script>


        <div class="table-responsive display">
            <?php

            $asd = $pdo->query("SELECT * FROM shareholder sh
                  RIGHT JOIN loans l ON sh.s_id=l.l_s_id
                  WHERE sh.s_available= 'yes' && l.l_status='unpaid'");

            ?>
            <table class="table table-bordered display table-hover table-sm" width="100%" cellspacing="0" id="example" style="width:100%">

                <thead class="thead-dark">
                    <tr>
                        <th class="sear">Customer Number</th>
                        <th class="sear">Customer Name</th>
                        <th class="sear">Customer Address</th>
                        <th class="sear">Remaining Loans</th>
                        <th class="fear" style="width:1%;"></th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="sear">Customer Number</th>
                        <th class="sear">Customer Name</th>
                        <th class="sear">Customer Address</th>
                        <th class="sear">Remaining Loans</th>
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
                        echo '<td>' . $a['l_rem_amount'] . '</td>';
                        echo '<td><a href="masikloan?s_id=' . $a['s_id'] . '" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Add Saving"><span class="fe fe-plus"></span></td>';
                        echo '</tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if (isset($_GET['s_id'])) {
    $sh_id = $_GET['s_id'];
    $dat2 = $pdo->query("SELECT * FROM shareholder s 
              RIGHT JOIN loans l ON s.s_id=l.l_s_id
              WHERE s.s_id ='$sh_id' && l.l_status = 'unpaid' ORDER BY l_uploaded_on DESC LIMIT 1")->fetch();

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-2 mb-4">
                <div class="card shadow h-30 py-2" style="background:#013220;">
                    <div class="card-body" style="color:white;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <b>Shareholder No:<br>
                                    Name:<br>
                                    Address: <br>
                                    Contact No: <br>
                                    Loan Date <br>
                                    Deadline <br>
                                    <!-- Last Paid Date: <br></b> -->
                            </div>
                            <div class="col-auto">
                                <?php echo $dat2['s_number']; ?><br>
                                <?php echo $dat2['s_name']; ?><br>
                                <?php echo $dat2['s_address']; ?><br>
                                <?php echo $dat2['s_mobile']; ?><br>
                                <?php echo $dat2['l_uploaded_on']; ?><br>
                                <?php
                                $update = $dat2['l_uploaded_on'];
                                $deadline = date('Y-m-d', strtotime("+1 year", strtotime($update)));
                                ?>
                                <?php echo $deadline; ?><br>
                                <?php
                                // echo $dat2['l_last_interest_paid_date']; 
                                ?>
                                <!-- <br> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12 col-md-2 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <form action="masikloan" method="POST">
                                <div class="col mr-2 form-group row">
                                    <label for="price" class="col-lg-7 col-form-label"><b>Total Loan:</b></label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="tot_amount" value="<?php echo $dat2['l_amount']; ?>" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col mr-2 form-group row">
                                    <label for="price" class="col-lg-7 col-form-label"><b>Remaining Principal:</b></label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="rem_amount" name="rem_amount" value="<?php echo $dat2['l_rem_amount']; ?>" style="width: 100%;">
                                    </div>
                                </div>



                                <div class="col mr-2 form-group row">
                                    <label for="interest" class="col-lg-4 col-form-label"><b>Date: </b></label>
                                    <div class="col-sm-8">
                                        <input type="date" id="nepaliDate5" name="lt_upload_date" class="nepali-calendar form-control" /><br><br>
                                    </div>
                                </div>

                                <div class="col mr-2 form-group row">
                                    <label for="tender" class="col-lg-7 col-form-label"><b>Reduced Principal:</b></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control text-success" name="lt_amount" id="r_principal" value="0" min="0" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col mr-2 form-group row">
                                    <label for="tender" class="col-lg-7 col-form-label"><b>Reduced Interest:</b></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control text-success" id="r_interest" name="lt_interest" value="0" min="0" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col mr-2 form-group row">
                                    <label for="tender" class="col-lg-7 col-form-label"><b>Reduced Penalty:</b></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control text-success" id="r_penalty" name="lt_penalty" value="0" min="0" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col mr-2 form-group row">
                                    <label for="tender" class="col-lg-7 col-form-label"><b>Total:</b></label>
                                    <div class="col-sm-5">
                                        <input type="number" readonly class="form-control-plaintext" name="lt_total" id="total" value="0" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col mr-2 form-group row">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="lt_sh_id" value="<?php echo $dat2['s_id']; ?>">
                                        <input type="hidden" name="lt_l_id" value="<?php echo $dat2['l_id']; ?>">
                                        <input type="submit" class="btn btn-success" id="pay" name="pay" value="Pay" style="float:right; width: 30%;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div class="container-fluid">
        <?php

        $sh_id = $_GET['s_id'];
        $mb = $pdo->query("SELECT * FROM loan_transactions lt 
  INNER JOIN shareholder sh ON lt.lt_sh_id=sh.s_id WHERE lt.lt_sh_id='$sh_id'");
        ?>
        <table class="table table-bordered  table-striped table-hover table-sm" width="100%" cellspacing="0" id="example2" style="width:100%">

            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Date</th>
                    <th>Principal</th>
                    <th>Penalty</th>
                    <th>Interest</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>

                <tr>
                    <th>S.N.</th>
                    <th>Date</th>
                    <th>Principal</th>
                    <th>Penalty</th>
                    <th>Interest</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $c1 = 1;
                foreach ($mb as $mbb) {

                    echo '<tr>';
                    echo '<td>' . $c1 . '</td>';
                    echo '<td>' . $mbb['lt_upload_date'] . '</td>';
                    echo '<td>' . $mbb['lt_amount'] . '</td>';
                    echo '<td>' . $mbb['lt_penalty'] . '</td>';
                    echo '<td>' . $mbb['lt_interest'] . '</td>';
                    echo '<td><a href="printloandiv?lt_id=' . $mbb["lt_id"] . '" class="btn btn-light btn-sm apply"><i class="fa fa-print"></i></a><a class="btn btn-danger btn-sm canclon" href="../ajax_controller/cancelloantransaction.php?id=' . $mbb['lt_id'] . '">Cancel</button></td>';

                    echo '</tr>';
                    $c1++;
                }
                ?>



            </tbody>
        </table>
    </div>
<?php
}
?>
<script type="text/javascript">
    var interest = $("#r_interest").val();
    var penalty = $("#r_penalty").val();
    var principal = $("#r_principal").val();
    var total = 0;
    total = Number(interest) + Number(penalty) + Number(principal);
    $("#total").val(total);
    $("#r_penalty").on("change keyup", function() {
        var interest = $("#r_interest").val();
        var penalty = $(this).val();
        var principal = $("#r_principal").val();
        var total = $("#total").val();
        total = Number(interest) + Number(penalty) + Number(principal);
        $("#total").val(total);
    });
    $("#r_interest").on("change keyup", function() {
        var interest = $(this).val();
        var penalty = $("#r_penalty").val();
        var principal = $("#r_principal").val();
        var total = $("#total").val();
        total = Number(interest) + Number(penalty) + Number(principal);
        $("#total").val(total);
    });
    $("#r_principal").on("change keyup", function() {
        var interest = $("#r_interest").val();
        var penalty = $("#r_penalty").val();
        var principal = $(this).val();
        var total = $("#total").val();
        total = Number(interest) + Number(penalty) + Number(principal);
        $("#total").val(total);
    });
</script>