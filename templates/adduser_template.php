<?php
require '../../db/connect.php';


?>
<style>
    .center {
        margin: auto;
        width: 100%;
        padding: 40px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Add accounts</h2>
            <p class="text-muted">You can add accounts and assign them a role from here</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Form Details</strong>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="ad_email" class="form-control" id="email" required>

                                        <div class="invalid-feedback">Invalid Email</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustomUsername">Displayname</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="ad_fullname" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback"> Please choose a displayname. </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="example-password">Password</label>
                                        <input type="password" name="ad_password" id="example-password" class="form-control" value="password" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="multi-select21">Role</label>
                                        <select class="form-control select2" name="r_id" tabindex="1" id="multi-select21">
                                            <optgroup label="Types">
                                                <?php
                                                $r = $pdo->prepare("SELECT * FROM roles WHERE NOT r_name = 'admin'");
                                                $r->execute();
                                                $rr = $r->fetchAll();
                                                foreach ($rr as $rrr) {

                                                    echo '<option value="' . $rrr['r_id'] . '">' . $rrr['r_name'] . '</option>';
                                                }
                                                ?>
                                            </optgroup>

                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="file" name="ad_photo" class="custom-file-input" id="validatedCustomFile" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <div class="invalid-feedback">Invalid custom file</div>
                                    </div>

                                </div> <!-- /.form-row -->
                                <button class="btn btn-primary" name="save" type="submit">Add</button>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div>
        </div>
    </div>
</div>