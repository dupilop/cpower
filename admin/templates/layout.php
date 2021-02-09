<?php
// session_start();
if (!(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true)) {
    header('Location: ../login.php');
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?php echo $title; ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../css/simplebar.css">
    <link rel="stylesheet" href="../assets/plugins/sliding-popup-message/dist/jquery-msgpopup.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/prompt_action/prompt-boxes.min.css">
    <!-- Fonts CSS -->


    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="../assets/plugins/sliding-popup-message/dist/jquery-msgpopup.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/cr-1.5.2/fh-3.1.7/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/cr-1.5.2/fh-3.1.7/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/feather.css">
    <link rel="stylesheet" href="../css/select2.css">
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="../css/uppy.min.css">
    <link rel="stylesheet" href="../css/jquery.steps.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../css/app-dark.css" id="darkTheme" disabled>




</head>



<body class="vertical  light">

    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                        <span class="fe fe-grid fe-16"></span>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16"></span>
                        <span class="dot dot-md bg-success"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="../assets/images/admins/<?php echo $_SESSION['u_photo']; ?>" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile">Profile</a>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Company</span><span class="sr-only">(current)</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                            <li class="nav-item active">
                                <a class="nav-link pl-3" href="./index"><span class="ml-1 item-text">Dashboard</span></a>
                            </li>


                        </ul>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Components</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text">Inventory</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./addproduct"><span class="ml-1 item-text">Add Product</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./products"><span class="ml-1 item-text">Products</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Billing</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./sales"><span class="ml-1 item-text">Product billing</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./servicesales"><span class="ml-1 item-text">Service billing</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./futkarsales"><span class="ml-1 item-text">Futkar billing</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-grid fe-16"></i>
                            <span class="ml-3 item-text">Salary</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./addsalary"><span class="ml-1 item-text">Add Salary</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./salarys"><span class="ml-1 item-text">Salary</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-pie-chart fe-16"></i>
                            <span class="ml-3 item-text">Account</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./roles"><span class="ml-1 item-text">Roles</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./adduser"><span class="ml-1 item-text">Add User</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./users"><span class="ml-1 item-text">Users</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./addcustomers"><span class="ml-1 item-text">Add customers</span></a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item w-100">
                        <a class="dropdown-toggle nav-link" href="#report" data-toggle="collapse" aria-expanded="false">
                            <i class="fe fe-layers fe-16"></i>
                            <span class="ml-3 item-text">Report</span>

                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="report">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./salesreport"><span class="ml-1 item-text">Product Sales Report</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./servicesalesreport"><span class="ml-1 item-text">Service Sales Report</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./overallreport"><span class="ml-1 item-text">Company Report</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./customerreport"><span class="ml-1 item-text">Customer Report</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="./overalldetailedsalesreport"><span class="ml-1 item-text">Company Report-Detail</span></a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Apps</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-book fe-16"></i>
                            <span class="ml-3 item-text">Bulk Message</span>
                            <span class="badge badge-pill badge-primary">New</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                            <a class="nav-link pl-3" href="./addmessage"><span class="ml-1">Add Message</span></a>
                            <a class="nav-link pl-3" href="./messagerecords"><span class="ml-1">Message</span></a>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="./notifications" class="nav-link">
                            <i class="fe fe-book fe-16"></i>
                            <span class="ml-3 item-text">Push Notification</span>
                            <span class="badge badge-pill badge-primary">New</span>
                        </a>
                    </li>
                </ul>


                <!-- <div class="btn-box w-100 mt-4 mb-1">
                    <button type="button" class="btn mb-2 btn-primary btn-lg btn-block">
                        <i class="fe fe-shopping-cart fe-12 mr-2"></i><span class="small">Buy now</span>
                    </button>
                </div> -->
            </nav>
        </aside>
        <main role="main" class="main-content">
            <?php echo $content; ?>


        </main> <!-- main -->
    </div> <!-- .wrapper -->

    <!-- <script src="../js/jquery.min.js"></script> -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/simplebar.min.js"></script>
    <script src='../js/daterangepicker.js'></script>
    <script src='../js/jquery.stickOnScroll.js'></script>
    <script src="../js/tinycolor-min.js"></script>
    <script src="../js/config.js"></script>
    <script src="../js/d3.min.js"></script>
    <script src="../js/topojson.min.js"></script>
    <script src="../js/datamaps.all.min.js"></script>
    <script src="../js/datamaps-zoomto.js"></script>
    <script src="../js/datamaps.custom.js"></script>
    <script src="../js/Chart.min.js"></script>
    <!-- <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script> -->
    <script src="../js/gauge.min.js"></script>
    <script src="../js/jquery.sparkline.min.js"></script>
    <script src="../js/apexcharts.min.js"></script>
    <script src="../js/apexcharts.custom.js"></script>
    <script src='../js/jquery.mask.min.js'></script>
    <script src='../js/select2.min.js'></script>
    <script src='../js/jquery.steps.min.js'></script>
    <script src='../js/jquery.validate.min.js'></script>
    <script src='../js/jquery.timepicker.js'></script>


    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });

        /** date range picker */



        // editor
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
        var editor = document.getElementById("p_desc");
        if (editor) {

            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        var editor2 = document.getElementById("p_specification");
        if (editor2) {

            var quill = new Quill(editor2, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    </script>

    <script src="../assets/plugins/prompt_action/prompt-boxes.min.js"></script>
    <script>
        var pb = new PromptBoxes({
            attrPrefix: 'pb',
            speeds: {
                backdrop: 250, // The enter/leaving animation speed of the backdrop
                toasts: 250 // The enter/leaving animation speed of the toast
            },
            prompt: {
                inputType: 'text', // The type of input 'text' | 'password' etc.
                submitText: 'Submit', // The text for the submit button
                submitClass: '', // A class for the submit button
                cancelText: 'Cancel', // The text for the cancel button
                cancelClass: '', // A class for the cancel button
                closeWithEscape: true, // Allow closing with escaping
                absolute: false // Show prompt popup as absolute
            },
            confirm: {
                confirmText: 'Confirm', // The text for the confirm button
                confirmClass: '', // A class for the confirm button
                cancelText: 'Cancel', // The text for the cancel button
                cancelClass: '', // A class for the cancel button
                closeWithEscape: true, // Allow closing with escaping
                absolute: false // Show prompt popup as absolute
            },
            toasts: {
                direction: 'top', // Which direction to show the toast  'top' | 'bottom'
                max: 5, // The number of toasts that can be in the stack
                duration: 3000, // The time the toast appears
                showTimerBar: false, // Show timer bar countdown
                closeWithEscape: true, // Allow closing with escaping
                allowClose: false, // Whether to show a "x" to close the toast
            }
        });
    </script>
    <script src="../js/apps.js"></script>
</body>

</html>