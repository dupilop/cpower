<?php
require "../../db/connect.php";  //include the DB config file
require '../../classes/databasetable.php';
require '../../assets/plugins/image_compressor/image_compressor.php';
$d1 = new DatabaseTable("products");
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'delete') {
        $delete = $d1->delete('p_id', $_GET['p_id']);
    }
}
if (isset($_POST['action'])) {
    $action  = $_POST['action'];

    if ($action == 'add') {
        $_POST['p_uploaddate'] = date("Y-m-d H:i:s");
        unset($_POST['action']);
        if ($_FILES['p_image1']['error'] == 0) {
            $fileName1 = $_FILES['p_image1']['name'];
            $temp_name = $_FILES['p_image1']['tmp_name'];
            $type = $_FILES["p_image1"]["type"];
            // resize the image in the tmp directorys
            // newidea('../../assets/images/inventory/', $fileName1, 300, 300);
            $filename1 = compress($_FILES['p_image1']['tmp_name'], "../../assets/images/inventory/" . $fileName1, 75);
        }
        if ($_FILES['p_image2']['error'] == 0) {
            $fileName2 = $_FILES['p_image2']['name'];
            newidea('../../assets/images/inventory/', $fileName2, 300, 300);
            // $filename2 = compress($_FILES['p_image2']['tmp_name'], "../../assets/images/inventory/" . $fileName2, 75);
        }
        if ($_FILES['p_image3']['error'] == 0) {
            $fileName3 = $_FILES['p_image3']['name'];
            newidea('../../assets/images/inventory/', $fileName3, 300, 300);
            // $filename3 = compress($_FILES['p_image3']['tmp_name'], "../../assets/images/inventory/" . $fileName3, 75);
        }
        if ($_FILES['p_image4']['error'] == 0) {
            $fileName4 = $_FILES['p_image4']['name'];
            newidea('../../assets/images/inventory/', $fileName4, 300, 300);
            // $filename4 = compress($_FILES['p_image4']['tmp_name'], "../../assets/images/inventory/" . $fileName4, 75);
        }
        if ($_FILES['p_image5']['error'] == 0) {
            $fileName5 = $_FILES['p_image5']['name'];
            newidea('../../assets/images/inventory/', $fileName5, 300, 300);
            // $filename5 = compress($_FILES['p_image5']['tmp_name'], "../../assets/images/inventory/" . $fileName5, 75);
        }
        if ($_FILES['p_file1']['error'] == 0) {
            $fileName6 = $_FILES['p_file1']['name'];
            $filename6 = move_uploaded_file($_FILES['p_file1']['tmp_name'], "../../assets/media/files/" . $fileName6);
        }
        $_POST['p_image1'] = $_FILES['p_image1']['name'];
        $_POST['p_image2'] = $_FILES['p_image2']['name'];
        $_POST['p_image3'] = $_FILES['p_image3']['name'];
        $_POST['p_image4'] = $_FILES['p_image4']['name'];
        $_POST['p_image5'] = $_FILES['p_image5']['name'];
        $_POST['p_file1'] = $_FILES['p_file1']['name'];
        if (isset($_POST['p_availability']) && $_POST['p_availability'] == 'on') {
            $_POST['p_availability'] = 'yes';
        } else {
            $_POST['p_availability'] = 'no';
        }
        $abc = $d1->save($_POST, "");
    } else if ($action == 'eavailable') {
        if ($_POST['p_availability'] == 'yes') {
            $_POST['p_availability'] = 'no';
        } else {
            $_POST['p_availability'] = 'yes';
        }
        unset($_POST['action']);
        $upp1 = $d1->save($_POST, 'p_id');
    } else if ($action == 'view') {
?>

<?php

        $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Products</h2>
                  <p class="card-text">You are viewing all the product lists</p>
                  <div class="row my-4">
                    <div class="col-md-4">
                    <button type="button" class="btn mb-2 btn-outline-secondary" id="addrestro"  data-whatever="@mdo"><span class="fe fe-20 fe-plus"></span>Add product</button>
                    </div>
                  </div>
                  <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                        
                        <table class="table table-sm table-hover example" id="example">
                            <thead>
                              <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Availability</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>';

        $dta = $pdo->prepare("SELECT * FROM products p 
        LEFT JOIN admins a ON a.ad_id=p.p_uploadedby");
        $dta->execute();
        $data = $dta->fetchAll();
        foreach ($data as $dat) {



            $output .= ' <tr>';
            if ($dat['p_image1'] != '') {
                $output .= '<td><div class="avatar avatar-md">
                                      <a href="../assets/images/inventory/' . $dat['p_image1'] . '"><img src="../assets/images/inventory/' . $dat['p_image1'] . '" alt="..." class="avatar-img rounded-circle">
                                      </a></div>
                                       </td>';
            } else {
                $output .= '<td><div class="avatar avatar-md">
                                      <img src="../ssets/images/logo.svg" alt="..." class="avatar-img rounded-circle">
                                      </div>
                                       </td>';
            }

            $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['p_name'] . '</strong> </p><small class="mb-0 text-muted" style="font-size:12px;">ID: #' . $dat['p_code'] . '</small><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_fullname'] . '</small></td>
                                  
                                    <td>' . $dat['p_size'] . '</td>';


            $output .= '
                                   
                                    <td>' . $dat['p_price'] . '</td>';
            if ($dat['p_availability'] == 'yes') {
                $output .= '<td><div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input pavailable" id="' . $dat['p_id'] . '" checked name="p_availability" value="' . $dat['p_availability'] . '">
                            <label class="custom-control-label" for="' . $dat['p_id'] . '"></label>
                            <div class="valid-feedback"> Looks good! </div>
                        </div></td>';
            } else {
                $output .= '<td><div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input pavailable" id="' . $dat['p_id'] . '" name="p_availability" value="' . $dat['p_availability'] . '">
                            <label class="custom-control-label" for="' . $dat['p_id'] . '"></label>
                            <div class="valid-feedback"> Looks good! </div>
                        </div></td>';
            }

            $output .= ' 
                                   <td style="width:10%">
                                  
                                  <div class="row">
                                <div class="col-4">
                                   <button type="button" class="btn btn-sm btn-primary updatbtn" id="' . $dat['p_id'] . '" ><span class="fe fe-20 fe-edit-3"></span></button>
                                   </div>
                                   <div class="col-4">
                                   <button class="btn btn-sm btn-danger delete" id="' . $dat['p_id'] . '" ><span class="fe fe-20 fe-trash-2"></span></button>
                                   </div>
                                 
                              </td> 
                              
                     
                               
                            
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