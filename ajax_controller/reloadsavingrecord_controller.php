<?php
require('../../db/connect.php');
$shid = $_POST['s_id'];
$mb = $pdo->query("SELECT * FROM masiksavings LEFT JOIN shareholder ON masiksavings.sh_id=shareholder.s_id WHERE masiksavings.sh_id='$shid'");
?>
<table class="table table-bordered table-sm table-hover table-striped display nowrap" width="100%" cellspacing="0" id="example2" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>S.N.</th>
            <th>Date</th>
            <th>Saving Amount</th>
            <th>Penalty</th>
            <th>Discount</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tfoot>

        <tr>
            <th>S.N.</th>
            <th>Date</th>
            <th>Saving Amount</th>
            <th>Penalty</th>
            <th>Discount</th>
            <th>Total</th>
            <th></th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $a = 1;
        foreach ($mb as $mbb) {

            echo '<tr>';
            echo '<td>' . $a . '</td>';
            echo '<td>' . $mbb['ms_mthyr'] . '</td>';
            echo '<td>' . $mbb['ms_amount'] . '</td>';
            echo '<td>' . $mbb['penalty_amount'] . '</td>';
            echo '<td>' . $mbb['discount_amount'] . '</td>';
            echo '<td>' . $mbb['ms_grand_total'] . '</td>';
            echo '<td><button id="' . $mbb["ms_id"] . '" class="btn btn-light btn-sm printsaving"><i class="fa fa-print"></i></button><button class="btn btn-danger btn-sm cancsav" id="' . $mbb['ms_id'] . '" data-shid="' . $mbb['sh_id'] . '">Cancel</button></td>';
            echo '</tr>';
            $a++;
        }
        ?>



    </tbody>
</table>
<script type="text/javascript">
    var table2 = $('#example2').DataTable({
        orderCellsTop: true,
        fixedHeader: true
    });
</script>