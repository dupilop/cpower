<?php
$ad_id = $_SESSION['ad_id'];


?>
<style type="text/css">
    .center {
        margin-left: 200px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Add Product</h2>
            <p class="text-muted">Please enter valid information</p>
            <div class="row">

                <div class="col-md-9">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <form class="needs-validation" id="form1" novalidate method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Product Code</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="p_code" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">Product Name</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="p_name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                </div> <!-- /.form-row -->
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom4">Price</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="p_price" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom4">Size</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="p_size" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                </div> <!-- /.form-row -->


                                <div class="form-group mb-3">
                                    <label for="validationTextarea1">Description</label>
                                    <div id="p_desc" class="editor" style="min-height:100px;">
                                    </div>
                                    <div class="invalid-feedback"> Please enter a message in the textarea. </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationTextarea1">Specification</label>

                                    <!-- Create the editor container -->
                                    <div id="p_specification" class="editor" style="min-height:100px;">
                                    </div>


                                    <div class="invalid-feedback"> Please enter a message in the textarea. </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Image 1</label>
                                        <input type="file" class="form-control dropify" name="p_image1">
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Image 2</label>
                                        <input type="file" class="form-control dropify" name="p_image2">
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Image 3</label>
                                        <input type="file" class="form-control dropify" name="p_image3">
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Image 4</label>
                                        <input type="file" class="form-control dropify" name="p_image4">
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Image 5</label>
                                        <input type="file" class="form-control dropify" name="p_image5">
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">File</label>
                                        <input type="file" class="form-control dropify" name="p_file1">
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>

                                </div> <!-- /.form-row -->
                                <hr />
                                <input type="hidden" name="p_uploadedby" value="<?php echo $ad_id; ?>">
                                <div class="form-row">
                                    <div id="bload" class="col-sm-6 mb-3">
                                        <button class="btn btn-primary" type="submit" id="add" name="submit">Save</button>
                                    </div>
                                    <div class="col-sm-6 mb-3" style="display: flex;justify-content: flex-end;">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="p_availability" checked>
                                            <label class="custom-control-label" for="customSwitch1">Available</label>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->

<script type="text/javascript">
    $(document).on("click", "#add", function(e) {
        e.preventDefault();
        var p_desc = $("#p_desc").html();
        var p_specification = $("#p_specification").html();
        $(this).parent().html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        var formdata = new FormData(document.getElementById("form1"));
        formdata.append('action', 'add');
        formdata.append('p_desc', p_desc);
        formdata.append('p_specification', p_specification);

        $.ajax({
            type: "POST",
            url: "ajax_controller/products_controller.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $().msgpopup({
                    text: 'Added Successfully',
                    type: 'success'
                });
                $("#form1")[0].reset();
                $("#p_desc").html('');
                $("#p_specification").html('');
                var drEvent = $('.dropify').dropify();
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                $("#bload").html('<button class="btn btn-primary" type="submit" id="add" name="submit">Save</button>');

            }
        });
    });
</script>
<script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script src='../js/quill.min.js'></script>
<script>
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    });
</script>