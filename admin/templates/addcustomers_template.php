<style type="text/css">
    .uploaded_image,
    .uploaded_image>img {
        width: 85px;
        height: 81px;
    }

    .uploaded_image {
        float: left;
        position: relative;
        margin-left: 14px;
    }

    .uploaded_image>img {
        position: absolute;
        z-index: 0;
        border-radius: 20px;
    }

    .img_rmv {
        visibility: hidden;
        position: absolute;
        z-index: 1;
        padding: 22px;
        width: 95px;
        height: 95px;
    }

    .uploaded_image>img:hover+.img_rmv {
        visibility: visible;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .img_rmv:hover {
        visibility: visible;
        background-color: rgba(255, 255, 255, 0.5);
        border: none !important;
    }

    .img_rmv:focus {
        background-color: rgba(255, 255, 255, 0) !important;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Add Customers</h2>
            <p class="text-muted">Please enter valid information</p>
            <div class="row">

                <div class="col-md-8">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <form class="needs-validation" id="form1" novalidate method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Name *</label>
                                        <input class="form-control" id="a" name="c_name" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom4">Address *</label>
                                        <input class="form-control" id="b" name="c_address" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom3">Date *</label>
                                        <input class="form-control" id="c" type="date" name="c_reg_date" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                </div> <!-- /.form-row -->
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom3">Mobile number *</label>
                                        <input class="form-control" id="d" name="c_mobile" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom4">Phone number</label>
                                        <input class="form-control" id="e" name="c_phone" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Email</label>
                                        <input class="form-control" id="f" type="email" name="c_email" />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Photo</label>

                                        <div class="card shadow mb-4">
                                            <div class="card-body text-center">
                                                <div class="avatar avatar-lg mt-4" id="photo" style="margin-top: 2.5rem !important;margin-bottom: 2.5rem !important;">
                                                    <button class="btn btn-sm btn-inline-secondary" id="cphoto"><span class="fe fe-plus-square fe-32"></span></button>
                                                </div>

                                            </div> <!-- ./card-text -->

                                        </div>

                                        <input class="form-control" id="k" type="file" name="c_photo_f" hidden />
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Front Citizenship</label>
                                        <div class="card shadow mb-4">
                                            <div class="card-body text-center">
                                                <div class="avatar avatar-lg mt-4" id="f_citizenphoto" style="margin-top: 2.5rem !important;margin-bottom: 2.5rem !important;">
                                                    <button class="btn btn-sm btn-inline-secondary" id="fcitizenship"><span class="fe fe-plus-square fe-32"></span></button>
                                                </div>

                                            </div> <!-- ./card-text -->

                                        </div>
                                        <input class="form-control" id="l" type="file" name="c_front_citizenship_f" hidden />
                                        <!-- <input type="text" name="c_front_citizenship" id="c_front_citizenship" hidden> -->
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Back Citizenship</label>
                                        <div class="card shadow mb-4">
                                            <div class="card-body text-center">
                                                <div class="avatar avatar-lg mt-4" id="b_citizenphoto" style="margin-top: 2.5rem !important;margin-bottom: 2.5rem !important;">
                                                    <button class="btn btn-sm btn-inline-secondary" id="bcitizenship"><span class="fe fe-plus-square fe-32"></span></button>
                                                </div>

                                            </div> <!-- ./card-text -->

                                        </div>
                                        <input class="form-control" id="m" type="file" name="c_back_citizenship_f" hidden />
                                        <!-- <input type="text" name="c_back_citizenship" id="c_back_citizenship" hidden> -->
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom3">Desciption</label>
                                        <div class="card shadow">
                                            <div class="card-body">

                                                <!-- Create the editor container -->
                                                <div id="editor" style="min-height:100px;">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div id="bload">
                                        <button class="btn btn-primary" type="submit" id="add" name="submit">Add</button>
                                    </div>
                                </div> <!-- /.form-row -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../assets/dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="../../assets/dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script src="../../assets/dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
<script type="text/javascript">
    document.getElementById('cphoto').addEventListener('click', openDialog1);
    document.getElementById('fcitizenship').addEventListener('click', openDialog2);
    document.getElementById('bcitizenship').addEventListener('click', openDialog3);

    function openDialog1(e) {
        e.preventDefault();
        document.getElementById('k').click();
    }

    function openDialog2(e) {
        e.preventDefault();
        document.getElementById('l').click();
    }


    function openDialog3(e) {
        e.preventDefault();
        document.getElementById('m').click();
    }
</script>
<script type="text/javascript">
    var max_uploads = 1;

    $(function() {

        'use strict';

        var url1 = '../../admin/ajax_controller/fileuploaded_controller.php';
        $('#k').fileupload({
                url: url1,
                dataType: 'html',
                done: function(e, data) {

                    if (data['result'] == 'FAILED') {
                        alert('Invalid File');
                    } else {
                        $('#c_photo').val(data['result']);
                        $('#photo').html('<div class="uploaded_image uim"><input type="text" value="' + data['result'] + '" name="c_photo" id="uploaded_image_name" hidden > <img src="../../assets/images/customers/' + data['result'] + '" /><a href="#" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" style="font-size:48px;color:red"></i></a> </div>');

                        if ($('.uim').length >= max_uploads) {
                            $('#select_file').hide();
                        } else {
                            $('#select_file').show();
                        }
                    }



                    $.each(data.result.files, function(index, file) {
                        $('<p/>').text(file.name).appendTo('#files');
                    });

                },

            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
        // Change this to the location of your server-side upload handler:
        var url1 = '../../admin/ajax_controller/fileuploaded_controller.php';
        $('#l').fileupload({
                url: url1,
                dataType: 'html',
                done: function(e, data) {

                    if (data['result'] == 'FAILED') {
                        alert('Invalid File');
                    } else {
                        $('#c_front_citizenship').val(data['result']);
                        $('#f_citizenphoto').html('<div class="uploaded_image uim1"><input type="text" value="' + data['result'] + '" name="c_front_citizenship" id="uploaded_image_name1" hidden > <img src="../../assets/images/customers/' + data['result'] + '" /><a href="#" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" style="font-size:48px;color:red"></i></a> </div>');

                        if ($('.uim1').length >= max_uploads) {
                            $('#select_file').hide();
                        } else {
                            $('#select_file').show();
                        }
                    }



                    $.each(data.result.files, function(index, file) {
                        $('<p/>').text(file.name).appendTo('#files');
                    });

                },

            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

        var url2 = '../../admin/ajax_controller/fileuploaded_controller.php';
        $('#m').fileupload({
                url: url2,
                dataType: 'html',
                done: function(e, data) {

                    if (data['result'] == 'FAILED') {
                        alert('Invalid File');
                    } else {
                        $('#c_back_citizenship').val(data['result']);
                        $('#b_citizenphoto').html('<div class="uploaded_image uim2"><input type="text" value="' + data['result'] + '" name="c_back_citizenship" id="uploaded_image_name2" hidden> <img src="../../assets/images/customers/' + data['result'] + '" /><a href="#" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" style="font-size:48px;color:red"></i></a> </div>');

                        if ($('.uim2').length >= max_uploads) {
                            $('#select_file').hide();
                        } else {
                            $('#select_file').show();
                        }
                    }



                    $.each(data.result.files, function(index, file) {
                        $('<p/>').text(file.name).appendTo('#files');
                    });

                },

            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
    $("#photo").on("click", ".img_rmv", function() {
        $(this).parent().remove();
        $('#photo').html('<button class="btn btn-sm btn-inline-secondary" id="cphoto"><span class="fe fe-plus-square fe-32"></span></button>');
        document.getElementById('cphoto').addEventListener('click', openDialog1);
        document.getElementById('fcitizenship').addEventListener('click', openDialog2);
        document.getElementById('bcitizenship').addEventListener('click', openDialog3);
        if ($('.uim').length >= max_uploads) {
            $('#select_file').hide();
        } else {
            $('#select_file').show();
        }
    });
    $("#f_citizenphoto").on("click", ".img_rmv", function() {
        $(this).parent().remove();
        $('#f_citizenphoto').html('<button class="btn btn-sm btn-inline-secondary" id="fcitizenship"><span class="fe fe-plus-square fe-32"></span></button>');
        document.getElementById('cphoto').addEventListener('click', openDialog1);
        document.getElementById('fcitizenship').addEventListener('click', openDialog2);
        document.getElementById('bcitizenship').addEventListener('click', openDialog3);
        if ($('.uim1').length >= max_uploads) {
            $('#select_file').hide();
        } else {
            $('#select_file').show();
        }
    });
    $("#b_citizenphoto").on("click", ".img_rmv", function() {
        $(this).parent().remove();
        $('#b_citizenphoto').html('<button class="btn btn-sm btn-inline-secondary" id="bcitizenship"><span class="fe fe-plus-square fe-32"></span></button>');
        document.getElementById('cphoto').addEventListener('click', openDialog1);
        document.getElementById('fcitizenship').addEventListener('click', openDialog2);
        document.getElementById('bcitizenship').addEventListener('click', openDialog3);
        if ($('.uim2').length >= max_uploads) {
            $('#select_file').hide();
        } else {
            $('#select_file').show();
        }
    });
</script>
<script type="text/javascript">
    $(document).on('click', '#add', function(e) {
        e.preventDefault();
        var a = $("#a").val();
        var b = $("#b").val();
        var c = $("#c").val();
        var d = $("#d").val();
        var e = $("#e").val();
        var f = $("#f").val();

        var avalid = false;
        var bvalid = false;
        var cvalid = false;
        var dvalid = false;
        var evalid = false;
        var fvalid = false;


        if ($.trim(a) == '') {
            $("#a").css("border", "2px solid red");
            avalid = false;
        } else {
            $("#a").css("border", "");
            avalid = true;
        }
        if ($.trim(b) == '') {
            $("#b").css("border", "2px solid red");
            bvalid = false;
        } else {
            $("#b").css("border", "");
            bvalid = true;
        }
        if ($.trim(c) == '') {
            $("#c").css("border", "2px solid red");
            cvalid = false;
        } else {
            $("#c").css("border", "");
            cvalid = true;
        }
        if ($.trim(d) == '') {
            $("#d").css("border", "2px solid red");
            dvalid = false;
        } else {
            $("#d").css("border", "");
            dvalid = true;
        }
        // if ($.trim(e) == '') {
        //     $("#e").css("border", "2px solid red");
        //     evalid = false;
        // } else {
        //     $("#e").css("border", "");
        //     evalid = true;
        // }
        // if ($.trim(f) == '') {
        //     $("#f").css("border", "2px solid red");
        //     fvalid = false;
        // } else {
        //     $("#f").css("border", "");
        //     fvalid = true;
        // }
        if ((avalid && bvalid && cvalid && dvalid) == true) {
            $("#bload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            var diveditor = $("#editor").html();
            var formdata = new FormData(document.getElementById("form1"));
            formdata.append('action', 'add');
            formdata.append('c_description', diveditor);
            $.ajax({
                type: "POST",
                url: "../ajax_controller/addcustomer_controller.php",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $().msgpopup({
                        text: 'Added Successfully',
                        type: 'success'
                    });
                    $("#table1").html("");
                    $("#table2").html("");
                    $("#t_income").val("");
                    $("#form1")[0].reset();
                    $("#bload").html('<button class="btn btn-primary" type="submit" id="add" name="submit">Save</button>');
                }
            });
        } else {
            $().msgpopup({
                text: 'Error',
                type: 'error'
            });
        }
    });
    var editor = document.getElementById('editor');

    if (editor) {
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{
                    'header': 1
                },
                {
                    'header': 2
                }
            ],
            [{
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }
            ],
            [{
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }
            ],
            [{
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }
            ], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            [{
                    'color': []
                },
                {
                    'background': []
                }
            ], // dropdown with defaults from theme
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    }
</script>