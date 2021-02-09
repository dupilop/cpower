<?php
date_default_timezone_set('Asia/Kathmandu');
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';

if (isset($_POST['action'])) {
  $action  = $_POST['action'];

  if ($action == 'view') {
?>

<?php

    $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Masik Saving Report</h2>
                 
                  <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-6>
                    <div class="card shadow">
                        <div class="card-body">
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Daily</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Monthly</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Yearly</a>
                        </li>
                      </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                       
                      <div class="tab-content mb-1" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <table class="table table-sm table-hover example" id="example">
                            <thead>
                              <tr>
                                <th>Saving on.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Saving Amount</th>
                                <th>Penalty</th>
                                <th>Discount</th>
                                <th>Grand Total</th>
                              </tr>
                            </thead>
                            <tbody>';
    $daily = date("Y-m-d");
    $dta = $pdo->prepare("SELECT * FROM masiksavings ms
        INNER JOIN shareholder s ON ms.sh_id=s.s_id
        INNER JOIN admins a ON a.ad_id=ms.ms_uploaded_by WHERE ms.ms_upload_date LIKE '" . $daily . "%'");
    $dta->execute();
    $data = $dta->fetchAll();
    foreach ($data as $dat) {



      $output .= ' <tr>';
      $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $dat['ms_upload_date'] . '</small></td>';

      $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong></p><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_email'] . '</small></td>
                                    <td>' . $dat['s_address'] . '</td>
                                    <td>' . $dat['ms_amount'] . '</td>';


      $output .= '
                                   
                                    <td>' . $dat['penalty_amount'] . '</td>
                                    <td>' . $dat['discount_amount'] . '</td>
                                    <td>' . $dat['ms_grand_total'] . '</td>
                                   
                              
                     
                               
                            
                                  </tr>';
    }


    //monthly
    $output .= '</tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 
                            <table class="table table-sm table-hover example" id="example2">
                            <thead>
                            <tr>
                                <th>Saving on.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Saving Amount</th>
                                <th>Penalty</th>
                                <th>Discount</th>
                                <th>Grand Total</th>
                            </tr>
                            </thead>
                            <tbody>';
    $month = date("Y-m-");
    $dta = $pdo->prepare("SELECT * FROM masiksavings ms
        INNER JOIN shareholder s ON ms.sh_id=s.s_id
        INNER JOIN admins a ON a.ad_id=ms.ms_uploaded_by WHERE ms.ms_upload_date LIKE '" . $month . "%'");
    $dta->execute();
    $data = $dta->fetchAll();
    foreach ($data as $dat) {



      $output .= ' <tr>';
      $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $dat['ms_upload_date'] . '</small></td>';

      $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong></p><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_email'] . '</small></td>
                                    <td>' . $dat['s_address'] . '</td>
                                    <td>' . $dat['ms_amount'] . '</td>';


      $output .= '
                                   
                                    <td>' . $dat['penalty_amount'] . '</td>
                                    <td>' . $dat['discount_amount'] . '</td>
                                    <td>' . $dat['ms_grand_total'] . '</td>
                                   
                              


                            </tr>';
    }



    $output .= '</tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
                        <table class="table table-sm table-hover example" id="example3">
                        <thead>
                        <tr>
                                <th>Saving on.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Saving Amount</th>
                                <th>Penalty</th>
                                <th>Discount</th>
                                <th>Grand Total</th>
                        </tr>
                        </thead>
                        <tbody>';
    $yearly = date("Y-");
    $dta = $pdo->prepare("SELECT * FROM masiksavings ms
        INNER JOIN shareholder s ON ms.sh_id=s.s_id
        INNER JOIN admins a ON a.ad_id=ms.ms_uploaded_by WHERE ms.ms_upload_date LIKE '" . $yearly . "%'");
    $dta->execute();
    $data = $dta->fetchAll();
    foreach ($data as $dat) {



      $output .= ' <tr>';
      $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $dat['ms_upload_date'] . '</small></td>';

      $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong></p><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_email'] . '</small></td>
                                    <td>' . $dat['s_address'] . '</td>
                                    <td>' . $dat['ms_amount'] . '</td>';


      $output .= '
                                   
                                    <td>' . $dat['penalty_amount'] . '</td>
                                    <td>' . $dat['discount_amount'] . '</td>
                                    <td>' . $dat['ms_grand_total'] . '</td>
                                   
                              




                        </tr>';
    }



    $output .= '</tbody>
                        </table>
                        </div>
                        
                        </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>';


    echo $output;
  }
}
?>
<script type="text/javascript">
  $(".discount1").hide();
  $(".discount2").hide();

  $(document).on("change", "#i_offer", function() {
    if (this.className == 'custom-control-input') {
      $("#ival_offer").val("yes");
      $(this).addClass("show");
      $(".discount1").show();
      $(".discount2").show();
    } else {
      $(this).removeClass("show");
      $("#ival_offer").val("no");
      $(".discount1").hide();
      $(".discount2").hide();
    }
    //   if(this.value == 'on'){

    //   }else{
    //     $(".discount1").hide();
    // $(".discount2").hide();
    //   }
  });
</script>
<script type="text/javascript">
  $('#example').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 50, 75, 100, -1],
      [10, 50, 75, 100, "All"]
    ]
  });
  $('#example2').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 50, 75, 100, -1],
      [10, 50, 75, 100, "All"]
    ]
  });
  $('#example3').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 50, 75, 100, -1],
      [10, 50, 75, 100, "All"]
    ]
  });
</script>