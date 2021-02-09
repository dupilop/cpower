<?php
require '../../db/connect.php';
$ad_id = $_SESSION['ad_id'];
$abc = $pdo->prepare("SELECT * FROM admins WHERE ad_id=:ad_id");
$abc->execute(['ad_id' => $ad_id]);
$abcd = $abc->fetch();;
?>
<style>
    .item-img-container {
        height: 145px;
        position: relative;
    }

    .img-container {
        overflow: hidden;
    }

    .crop {
        height: 100%;
        object-fit: cover;
    }

    .inner-img-container {
        position: absolute;
        top: 9px;
        left: 2px;
        width: 100px;
        border-radius: 50%;
    }

    .img-container {
        overflow: hidden;
    }

    .inner-img-container img {
        width: 100%;
    }

    .item-img-container img {
        width: 100%;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <h2 class="h3 mb-4 page-title">Settings</h2>
            <div class="my-4">
                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link px-3 active" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true"><span class="fe fe-16 fe-user-check"></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3" id="pills-contact-tab2" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact" aria-selected="false"><span class="fe fe-16 fe-lock"></span></a>
                    </li>

                </ul>
                <div class="tab-content mb-2" id="pills-tabContent2">
                    <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
                        <form action="" id="form1" method="POST" enctype="multipart/form-data">
                            <div class="row mt-5 align-items-center">
                                <div class="col-md-3 text-center mb-5">
                                    <div class="avatar avatar-xl" id="adminimage">
                                        <img src="../../assets/images/admins/<?php echo $abcd['ad_photo']; ?>" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <h4 class="mb-1" id="displayname"><?php echo $abcd['ad_department']; ?></h4>
                                            <p class="small mb-3" id="email"><span class="fe fe-14 fe-mail"></span><span class="badge badge-dark"><?php echo $abcd['ad_email']; ?></span></p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="firstname">Department Name</label>
                                    <input type="text" id="firstname" name="ad_department" value="<?php echo $abcd['ad_department'];  ?>" class="form-control" placeholder="Enter valid name">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="ad_email" value="<?php echo $abcd['ad_email'];  ?>" id="inputEmail4" placeholder="Enter valid email">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCompany5">Image</label>
                                    <input type="hidden" name="ad_photo" id="ad_photo" value="<?php echo $abcd['ad_photo']; ?>">

                                    <div class="custom-file">
                                        <input type="file" name="ad_new_photo" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary" id="updateadmin">Save Change</button>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2">
                        <br><br>
                        <form action="" id="form3" method="POST" enctype="multipart/form-data">
                            <div class="row mb-4">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="inputPassword5">New Password</label>
                                        <input type="password" name="ad_password" class="form-control" id="inputPassword5">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword6">Confirm Password</label>
                                        <input type="password" class="form-control" id="inputPassword6">
                                    </div>
                                    <div class="paschkerror"></div>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">Password requirements</p>
                                    <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                                    <ul class="small text-muted pl-4 mb-0">
                                        <li> Minimum 8 character </li>
                                        <li>At least one special character</li>
                                        <li>At least one number</li>
                                        <li>Can’t be the same as a previous password </li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-primary" id="updatepassword">Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on("click", "#updateadmin", function(e) {
            e.preventDefault();
            var ab = pb.prompt(

                function callback(value) {
                    var data = {
                        password: value
                    };
                    $.ajax({
                        type: "POST",
                        url: "../ajax_controller/passwordcheck_controller.php",
                        data: data,

                        success: function(data) {
                            if ($.trim(data) == 'true') {
                                var formdata = new FormData(document.getElementById("form1"));
                                formdata.append('action', 'updateadmin');
                                $.ajax({
                                    type: "POST",
                                    url: "../ajax_controller/profile_controller.php",
                                    data: formdata,
                                    contentType: false,
                                    context: this,
                                    processData: false,
                                    success: function(data) {
                                        var returnedData = JSON.parse(data);
                                        var name = returnedData.ad_fullname;
                                        var email = returnedData.ad_email;
                                        var photo = returnedData.ad_photo;
                                        $("#displayname").text(name);
                                        $("#email").text(email);
                                        $("#adminimage").html('<img src="../../assets/images/admins/' + photo + '" alt="..." class="avatar-img rounded-circle">');
                                        $("#ad_photo").val(photo);
                                        $().msgpopup({
                                            text: '<span class="fe fe-16 fe-check-circle"></span> Successfully Updated',
                                            type: 'success'
                                        });
                                        // pb.success('<span class="fe fe-16 fe-check-circle"></span> Successfully Updated');
                                    }
                                });
                            } else {
                                $().msgpopup({
                                    text: 'Invalid Password',
                                    type: 'error'
                                });
                            }


                        }
                    });
                },
                '<p class="text text-primary">Enter your password to confirm</p>',
                'password',
                '',
                'Submit',
                'Cancel'
            );

        });

        $(document).on("click", "#updatepassword", function(e) {
            e.preventDefault();
            var pass = $("#inputPassword5").val();
            var cpass = $("#inputPassword6").val();
            if (!$.trim(pass) == '') {
                if ($.trim(pass) === $.trim(cpass)) {
                    $(".paschkerror").html("");
                    var ab3 = pb.prompt(

                        function callback(value) {
                            var data = {
                                password: value
                            };
                            $.ajax({
                                type: "POST",
                                url: "../ajax_controller/passwordcheck_controller.php",
                                data: data,

                                success: function(data) {
                                    if ($.trim(data) == 'true') {
                                        var formdata = new FormData(document.getElementById("form3"));
                                        formdata.append('action', 'changepassword');
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax_controller/profile_controller.php",
                                            data: formdata,
                                            contentType: false,
                                            context: this,
                                            processData: false,
                                            success: function(data) {
                                                pb.success('<span class="fe fe-16 fe-check-circle"></span> Password Changed Successfully');
                                                $("#form3")[0].reset();
                                            }
                                        });
                                    } else {
                                        $().msgpopup({
                                            text: 'Invalid Password',
                                            type: 'error'
                                        });
                                    }
                                }
                            });

                        },
                        '<p class="text text-primary">Enter your password to confirm</p>',
                        'password',
                        '',
                        'Submit',
                        'Cancel'
                    );
                } else {
                    $(".paschkerror").html("<p style='color:red;'>Password is not same</p>");
                }
            } else {
                $().msgpopup({
                    text: 'Password field cannot be empty',
                    type: 'error'
                });
            }
        });
    </script>