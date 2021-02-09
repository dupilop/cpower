<?php
require '../db/connect.php';

?>
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="row">
            <?php
            $tod = date("Y-m-d");
            // $c1 = $pdo->prepare("SELECT SUM(s_grandtotal) FROM sales WHERE s_uploaded_on LIKE '" . $tod . "%'");
            // $c1->execute();
            // $cc1 = $c1->fetch();

            ?>

            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow bg-primary text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary-light">
                                    <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-light mb-0">Today Sales</p>
                                <span class="h3 mb-0 text-white"><?php echo 'Rs. 0'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $c2 = $pdo->prepare("SELECT COUNT(p_id) FROM products WHERE p_uploaddate LIKE '" . $tod . "%'");
            $c2->execute();
            $cc2 = $c2->fetch();

            ?>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-muted mb-0">Today products</p>
                                <span class="h3 mb-0"><?php echo  $cc2[0]; ?></span>
                                <!-- <span class="small text-success">+16.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $c3 = $pdo->prepare("SELECT COUNT(p_id) FROM products");
            $c3->execute();
            $cc3 = $c3->fetch();

            ?>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-filter text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col">
                                <p class="small text-muted mb-0">Total Products</p>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <span class="h3 mr-2 mb-0"> <?php echo  $cc3[0]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // $c4 = $pdo->prepare("SELECT COUNT(c_id) FROM customers");
            // $c4->execute();
            // $cc4 = $c4->fetch();

            ?>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-primary">
                                    <i class="fe fe-16 fe-activity text-white mb-0"></i>
                                </span>
                            </div>
                            <div class="col">
                                <p class="small text-muted mb-0">Total Customers</p>
                                <span class="h3 mb-0"><?php echo '0'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end section -->
        <div class="col-12">



            <div class="row">
                <!-- Recent Activity -->
                <div class="col-md-8 col-lg-4 mb-4">
                    <div class="card timeline shadow">
                        <div class="card-header">
                            <strong class="card-title">Recent Notification</strong>
                            <a class="float-right small text-muted" href="./notifications">View all</a>
                        </div>
                        <div class="card-body" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
                            <h6 class="text-uppercase text-muted mb-4">Today</h6>
                            <?php
                            // $today = date("Y-m-d");
                            // $d2 = $pdo->prepare("SELECT * FROM notifications WHERE n_uploaddate LIKE '" . $today . "%'");
                            // $d2->execute();
                            // $c1 = $d2->rowCount();
                            // if ($c1 > 0) {
                            //     foreach ($d2 as $dd2) {
                            //         echo ' <div class="pb-3 timeline-item item-primary">
                            //     <div class="pl-5">
                            //         <div class="mb-1"><strong>@Brown Asher</strong><span class="text-muted small mx-2">' . $dd2['n_text'] . '</span></div>
                            //         <p class="small text-muted">Uploaded on <span class="badge badge-light">' . $dd2['n_uploaddate'] . '</span>
                            //         </p>
                            //     </div>
                            // </div>';
                            //     }
                            // } else {
                            //     echo '<p class="text text-danger">No new notifications</p>';
                            // }
                            ?>



                            <h6 class="text-uppercase text-muted mb-4">Yesterday</h6>
                            <?php
                            // $yesterday = date("Y-m-d", strtotime('-1 days'));
                            // $d2 = $pdo->prepare("SELECT * FROM notifications WHERE n_uploaddate LIKE '" . $yesterday . "%'");
                            // $d2->execute();
                            // $c1 = $d2->rowCount();
                            // if ($c1 > 0) {
                            //     foreach ($d2 as $dd2) {
                            //         echo ' <div class="pb-3 timeline-item item-danger">
                            //     <div class="pl-5">
                            //         <div class="mb-1"><strong>@Brown Asher</strong><span class="text-muted small mx-2">' . $dd2['n_text'] . '</span></div>
                            //         <p class="small text-muted">Uploaded on <span class="badge badge-light">' . $dd2['n_uploaddate'] . '</span>
                            //         </p>
                            //     </div>
                            // </div>';
                            //     }
                            // } else {
                            //     echo '<p class="text text-danger">No new notifications</p>';
                            // }
                            ?>

                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->
                </div> <!-- / .col-md-6 -->
                <!-- Striped rows -->
                <div class="col-md-12 col-lg-8 mb-4">
                    <div class="row">

                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Recent Customers</strong>
                                <a class="float-right small text-muted" href="./customerreport">View all</a>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //     $abc = $pdo->prepare("SELECT * FROM customers c
                                        // INNER JOIN admins a ON a.ad_id=c.c_uploadedby ORDER BY c.c_uploaddate DESC LIMIT 5");
                                        //     $abc->execute();
                                        //     // $abc2 = $abc->fetch();
                                        //     foreach ($abc as $abc2) {
                                        //         echo '<tr>
                                        //     <td>#' . $abc2['c_id'] . '</td>
                                        //     <th scope="col">' . $abc2['c_name'] . '</th>
                                        //     <td>' . $abc2['c_address'] . '</td>
                                        //     <td>' . $abc2['c_mobile'] . '</td>
                                        //     <td>' . $abc2['c_reg_date'] . '</td>
                                        //     <td>' . $abc2['ad_fullname'] . '</td>
                                        // </tr>';
                                        //     }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div><br>
                    <div class="row">

                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Low stocks</strong>
                                <a class="float-right small text-muted" href="./products">View all</a>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Quantity</th>

                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //     $abc = $pdo->prepare("SELECT * FROM products p
                                        //     INNER JOIN admins a ON a.ad_id=p.p_uploaded_by 
                                        //     WHERE p.p_qty < 10
                                        //     ORDER BY p.p_qty ASC LIMIT 10");
                                        //     $abc->execute();
                                        //     // $abc2 = $abc->fetch();
                                        //     foreach ($abc as $abc2) {
                                        //         echo '<tr>
                                        //     <td>#' . $abc2['p_id'] . '</td>
                                        //     <th scope="col">' . $abc2['p_name'] . '</th>
                                        //     <td class="text-warning">' . $abc2['p_qty'] . '</td>

                                        //     <td>' . $abc2['ad_fullname'] . '</td>
                                        // </tr>';
                                        //     }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- Striped rows -->
            </div> <!-- .row-->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->