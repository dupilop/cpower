<?php
date_default_timezone_set('Asia/Kathmandu');
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
require '../image_compressor/image_compressor.php';
$d1 = new DatabaseTable("shareholders");
$d2 = new DatabaseTable("loans");

if (isset($_POST['action'])) {
    $action  = $_POST['action'];

    if ($action == 'view') {
?>

        <?php

        $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Add new loan</h2>
                  
                  <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                        
                        <table class="table table-sm table-hover example" id="example">
                            <thead>
                              <tr>
                                <th>Image</th>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>';

        $dta = $pdo->prepare("SELECT * FROM shareholder s 
        INNER JOIN shareholder_types st ON s.s_type=st.st_id
        INNER JOIN admins a ON a.ad_id=s.s_uploaded_by");
        $dta->execute();
        $data = $dta->fetchAll();
        foreach ($data as $dat) {



            $output .= ' <tr>';
            if ($dat['s_photo'] != '') {
                $output .= '<td><div class="avatar avatar-md">
                                      <a href="../../assets/images/customers/' . $dat['s_photo'] . '"><img src="../../assets/images/customers/' . $dat['s_photo'] . '" alt="..." class="avatar-img rounded-circle">
                                      </a></div>
                                       </td>';
            } else {
                $output .= '<td><div class="avatar avatar-md">
                                      <img src="../../assets/images/logo.svg" alt="..." class="avatar-img rounded-circle">
                                      </div>
                                       </td>';
            }
            $output .= '<td>' . $dat['s_number'] . '</td>
            <td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong> </p><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_email'] . '</small></td>
                                    <td>' . $dat['st_name'] . '</td>
                                    <td><button class="btn btn-sm btn-outline-primary addloan" id="' . $dat['s_id'] . '"><span class="fe fe-plus"></span>Add</button></td>';





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
<?php
    } else if ($action == 'viewform') {
        session_start();
        $abc = $pdo->prepare("SELECT * FROM shareholder s
        LEFT JOIN loans l ON l.l_s_id=s.s_id WHERE s.s_id=:s_id");
        $abc->execute(['s_id' => $_POST['s_id']]);
        $abc2 = $abc->fetch();
        $bcd = $pdo->prepare("SELECT * FROM loans WHERE l_s_id=:s_id && l_status='unpaid'");
        $bcd->execute(['s_id' => $abc2['s_id']]);
        $bcd2 = $bcd->fetchAll();
        $cbcd2 = $bcd->rowCount();

        echo ' 
        <div class="row justify-content-center">
        <div class="col-12">

        <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
        <div class="card shadow">
        <div class="card-body">
            <form class="needs-validation" id="form2" novalidate method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom3">Shareholder Number *</label>
                        <input class="form-control-plaintext" readonly value="' . $abc2['s_number'] . '" />
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom4">Shareholder Name *</label>
                        <input class="form-control-plaintext" readonly value="' . $abc2['s_name'] . '" />
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom3">Date of Birth*</label>
                        <input class="form-control-plaintext" readonly value="' . $abc2['s_dob'] . '" />
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom3">Registration Date *</label>
                        <input class="form-control-plaintext" readonly value="' . $abc2['s_reg_date'] . '" />
                        <div class="valid-feedback"> Looks good! </div>
                    </div>';
        if ($cbcd2 > 0) {
            echo '<h2 class="text-danger">Please clear the previous loan<h2>';
        } else {

            echo ' <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Description *</label>
                        <input class="form-control" type="text" name="l_desc"/>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom3">Date *</label>
                        <input class="form-control" type="date" name="l_date" />
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom3">Amount *</label>
                        <input class="form-control" type="number" name="l_amount" />
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <input type="hidden" class="form-control-plaintext" readonly name="l_s_id" value="' . $abc2['s_id'] . '">
                    <input type="hidden" class="form-control-plaintext" readonly name="l_uploaded_by" value="' . $_SESSION['ad_id'] . '">
                    <div id="bload" class="col-6" style="justify-content: flex-start !important;">
                        <button class="btn btn-primary" type="submit" id="uploan" name="submit">Add</button>
                    </div>';
        }


        echo '</div> <!-- /.form-row -->
              
               
            </form>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       ';
    } else if ($action == 'uploadloan') {
        unset($_POST['action']);
        $_POST['l_rem_amount'] = $_POST['l_amount'];
        $_POST['l_uploaded_on'] = date("Y-m-d H:i:sa");
        $t1 = $d2->insert($_POST);
        echo $_POST['l_s_id'];
        // print_r($_POST);
    }
}
?>