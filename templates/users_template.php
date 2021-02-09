<?php
require '../../db/connect.php';
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mb-2 page-title">Accounts</h2>
            <p class="card-text">You are viewing all the accounts lists</p>
            <div class="row my-4">
                <div class="col-md-4">
                    <a href="addeditor"><button type="button" class="btn mb-2 btn-outline-secondary" id="addeditors" data-whatever="@mdo"><span class="fe fe-20 fe-plus"></span>Add editor</button></a>
                </div>
            </div>
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">

                            <table class="table table-hover table-sm example" id="example">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Display Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dta = $pdo->prepare("SELECT * FROM admins a
                            INNER JOIN roles_assign ra ON ra.admin_id=a.ad_id
                            INNER JOIN roles r ON r.r_id=ra.role_id
                            WHERE NOT r.r_name = 'admin'
                            ");
                                    $dta->execute();
                                    $data = $dta->fetchAll();
                                    $a = 1;
                                    foreach ($data as $dat) {
                                        echo ' <tr>
                            
                                <td>' . $a . '</td>
                                <td><div class="avatar avatar-md"><a href="../../assets/images/admins/' . $dat['ad_photo'] . '"><img src = "../../assets/images/admins/' . $dat['ad_photo'] . '" alt="No image found" class="avatar-img rounded-circle"></a></div></td>
                                <td>' . $dat['ad_fullname'] . '</td>
                                <td>' . $dat['ad_email'] . '</td>
                                <td>' . $dat['r_name'] . '</td>';

                                        echo '<td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal' . $dat['ad_id'] . '"><span class="fe fe-24 fe-edit-3"></span></button>
                                    <a href="deleteeditor?did=' . $dat['ad_id'] . '"><button class="btn btn-danger btn-sm "><span class="fe fe-24 fe-trash-2"></span></button></a>
                                  
                                </td>';


                                        echo '<div class="modal fade modal-right modal-slide" id="myModal' . $dat['ad_id'] . '" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">';

                                        echo '<div class="modal-dialog modal-sm" role="document">
                                <form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Edit account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        
                                        <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                        <label for="validationCustom3">Email</label>
                                        <input type="email" class="form-control" id="validationCustom3" name="ad_email" value="' . $dat['ad_email'] . '" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                      </div> 
                                          <div class="col-md-6 mb-3">
                                            <label for="validationCustom3">Display Name</label>
                                            <input type="text" class="form-control" id="validationCustom3" name="ad_fullname" value="' . $dat['ad_fullname'] . '" required>
                                            <div class="valid-feedback"> Looks good! </div>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">Password</label>
                                            <input type="hidden" readonly name="ad_password" value="' . $dat['ad_password'] . '">
                                            <input type="password" class="form-control" id="validationCustom4" name="ad_password_new">
                                            <div class="valid-feedback"> Looks good! </div>
                                          </div>
                                        </div> <!-- /.form-row -->
                               
                                       
                                        
                                          
                                         

                                        <div class="form-group mb-3">
                                          <label for="validationTextarea1">Image</label>
                                          <input type="file" id="logo" name="ad_photo" class="form-control">
                                          <input type="hidden" name="ad_photo_name" value="' . $dat['ad_photo'] . '" class="form-control">
                                          <a href="../../assets/images/admins/' . $dat['ad_photo'] . '"><img src = "../../assets/images/admins/' . $dat['ad_photo'] . '" height="100px" width="100px" style="border-radius: 50%;" alt="No image found"></a>
                                          </div>';
                                    ?>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <span class="fe fe-alert-triangle fe-16 mr-2"></span> Please donot type anything or upload if not needed to change! </div>
                        <div class="modal-footer">
                            <input type="hidden" name="ad_id" value="<?php echo $dat['ad_id']; ?>">
                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn mb-2 btn-primary" name="save">Update</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
                                        echo '</tr>';
                                        $a++;
                                    }
        ?>


        </tbody>
        </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    $('#example').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [10, 50, 75, 100, -1],
            [10, 50, 75, 100, "All"]
        ]
    });
</script>