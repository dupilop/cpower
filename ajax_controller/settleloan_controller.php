<?php
date_default_timezone_set('Asia/Kathmandu');
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
$d2 = new DatabaseTable("loans");

if (isset($_POST['action'])) {
    $action  = $_POST['action'];

    if ($action == 'view') {

        $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Loan Settlement</h2>
                  
                  <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                        
                        <table class="table table-sm table-hover example" id="example">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Remaining Amount</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>';

        $dta = $pdo->prepare("SELECT * FROM shareholder s 
        INNER JOIN shareholder_types st ON s.s_type=st.st_id
        INNER JOIN admins a ON a.ad_id=s.s_uploaded_by
        INNER JOIN loans l ON l.l_s_id=s.s_id WHERE l.l_status='unpaid'");
        $dta->execute();
        $data = $dta->fetchAll();
        foreach ($data as $dat) {



            $output .= ' <tr>';

            $output .= '<td>' . $dat['l_id'] . '</td>';
            $output .= '<td>' . $dat['s_number'] . '</td>
            <td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong> </p><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_email'] . '</small></td>
                                    <td>' . $dat['l_amount'] . '</td>
                                    <td>' . $dat['l_rem_amount'] . '</td>
                                    <td><button class="btn btn-md btn-outline-warning settleloan" id="' . $dat['l_id'] . '"><span class="fe fe-repeat"></span>Settle</button></td>';





            $output .= ' </tr>';
        }



        $output .= '</tbody>
                        </table>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>';


        echo $output;
    } else if ($action == 'loansettle') {
        session_start();
        unset($_POST['action']);
        $_POST['l_status'] = 'paid';
        $_POST['l_paidby'] = $_SESSION['ad_id'];
        $_POST['l_paidon'] = date("Y-m-d H:i:sa");
        $t2 = $d2->save($_POST, 'l_id');
    }
}
?>
<script type="text/javascript">
    $('#example').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [10, 50, 75, 100, -1],
            [10, 50, 75, 100, "All"]
        ]
    });
</script>