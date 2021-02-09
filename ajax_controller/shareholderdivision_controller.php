<?php
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
require '../image_compressor/image_compressor.php';

if (isset($_POST['action'])) {
    $action  = $_POST['action'];

    if ($action == 'view') {
?>

<?php

        $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Shareholder Divisions</h2>
                  <p class="card-text">You are viewing all the shareholders by their division</p>
                  
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
                                    <td>' . $dat['st_name'] . '</td>';



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
</script>