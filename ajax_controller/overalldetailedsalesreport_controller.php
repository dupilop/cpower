<style type="text/css">
    .center {
        position: absolute;
        left: 70%;
        width: 100px;



    }
</style>
<?php
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
require '../image_compressor/image_compressor.php';

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
        $_POST['p_uploaded_date'] = date("Y-m-d H:i:sa");
        unset($_POST['action']);
        if ($_FILES['p_image']['error'] == 0) {
            $fileName1 = $_FILES['p_image']['name'];
            $filename1 = compress($_FILES['p_image']['tmp_name'], "../../assets/images/inventory/" . $fileName1, 75);
        }
        $_POST['p_image'] = $_FILES['p_image']['name'];
        $abc = $d1->save($_POST, "");
    } else if ($action == 'eavailable') {
        if ($_POST['p_available'] == 'on') {
            $_POST['p_available'] = 'off';
        } else {
            $_POST['p_available'] = 'on';
        }
        unset($_POST['action']);
        $upp1 = $d1->save($_POST, 'p_id');
        print_r($_POST);
    } else if ($action == 'view') {
?>

<?php

        $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Overall Report</h2>
                 
                  <div class="row my-4">
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
                  <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                        <div class="tab-content mb-1" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <table class="table table-sm table-hover example" id="example">
                            <thead>
                              <tr>
                                <th>Sales on.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Sub total</th>
                                <th>VAT/Charge</th>
                                <th>Grand Total</th>
                                <th>Action</th>
                                <th class="noExport">Action2</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tfoot>
                            <tbody>';

        $daily = date("Y-m-d");
        $dta = $pdo->prepare("SELECT * FROM sales s
        INNER JOIN admins a ON a.ad_id=s.s_uploaded_by && s.s_uploaded_on LIKE '" . $daily . "%'");
        $dta->execute();
        $data = $dta->fetchAll();
        foreach ($data as $dat) {



            $output .= ' <tr>';
            $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $dat['s_date'] . '</small></td>';

            $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . ' </strong></p><small class="mb-0 text-muted" style="font-size:12px;">ID: #' . $dat['s_id'] . '</small><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_fullname'] . '</small></td>
                                    <td>' . $dat['s_address'] . '</td>
                                    <td>' . $dat['s_amount'] . '</td>';


            $output .= '
                                   
                                    <td>' . $dat['s_vatorcharge'] . '</td>
                                    <td>' . $dat['s_grandtotal'] . '</td>
                                    <td>' . $dat['s_sales'] . '</td>
                                    <td><a class="btn btn-sm btn-success" href="../ajax_controller/billsmallprint_controller.php?s_id=' . $dat['s_id'] . '">Print</a></td>
                              
                     
                               
                            
                                  </tr>';
        }



        $output .= '</tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table table-sm table-hover example" id="example2">
                        <thead>
                          <tr>
                            <th>Sales on.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Sub total</th>
                            <th>VAT/Charge</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                            <th class="noExport">Action 2</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tfoot>
                        <tbody>';
        $monthly = date("Y-m-");
        $dta = $pdo->prepare("SELECT * FROM sales s
    INNER JOIN admins a ON a.ad_id=s.s_uploaded_by && s.s_uploaded_on LIKE '" . $monthly . "%'");
        $dta->execute();
        $data = $dta->fetchAll();
        foreach ($data as $dat) {



            $output .= ' <tr>';
            $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $dat['s_date'] . '</small></td>';

            $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong></p><small class="mb-0 text-muted" style="font-size:12px;">ID: #' . $dat['s_id'] . '</small><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_fullname'] . '</small></td>
                                <td>' . $dat['s_address'] . '</td>
                                <td>' . $dat['s_amount'] . '</td>';


            $output .= '
                               
                                <td>' . $dat['s_vatorcharge'] . '</td>
                                <td>' . $dat['s_grandtotal'] . '</td>
                                <td>' . $dat['s_sales'] . '</td>
                                <td><a class="btn btn-sm btn-success" href="../ajax_controller/billsmallprint_controller.php?s_id=' . $dat['s_id'] . '">Print</a></td>
                               
                          
                 
                           
                        
                              </tr>';
        }



        $output .= '</tbody>
                    </table>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <table class="table table-sm table-hover example" id="example3">
                        <thead>
                          <tr>
                            <th>Sales on.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Sub total</th>
                            <th>VAT/Charge</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                            <th class="noExport">Action2</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tfoot>
                        <tbody>';
        $yearly = date("Y-");
        $dta = $pdo->prepare("SELECT * FROM sales s
    INNER JOIN admins a ON a.ad_id=s.s_uploaded_by && s.s_uploaded_on LIKE '" . $yearly . "%'");
        $dta->execute();
        $data = $dta->fetchAll();
        foreach ($data as $dat) {



            $output .= ' <tr>';
            $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $dat['s_date'] . '</small></td>';

            $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong></p><small class="mb-0 text-muted" style="font-size:12px;">ID: #' . $dat['s_id'] . '</small><small class="mb-0 text-muted" style="font-size:12px;"> User :</small><small style="font-size:10px;color:red;"> ' . $dat['ad_fullname'] . '</small></td>
                                <td>' . $dat['s_address'] . '</td>
                                <td>' . $dat['s_amount'] . '</td>';


            $output .= '
                               
                                <td>' . $dat['s_vatorcharge'] . '</td>
                                <td>' . $dat['s_grandtotal'] . '</td>
                                <td>' . $dat['s_sales'] . '</td>
                                <td><a class="btn btn-sm btn-success" href="../ajax_controller/billsmallprint_controller.php?s_id=' . $dat['s_id'] . '">Print</a></td>
                               
                          
                 
                           
                        
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
    $(document).ready(function() {

        var table = $('#example').DataTable({

            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            orderCellsTop: true,
            fixedHeader: true,
            responsive: true,
            dom: "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fa fa-copy"></i>',
                    titleAttr: 'COPY'
                }, {
                    extend: 'print',

                    text: '<i class="fa fa-print"></i>',
                    title: '<div style="text-align:center;"><img src="../../assets/images/logo.svg" height="100px" width="100px" alt="image" style=""><br /><br /></div><div style="text-align:center;" id="head"><h1>Galznguyz</h2></div><div style="text-align:center;font-size:15px;color:black;"><b>Printed Date: <?php echo date("Y-m-d");  ?></b><br /></div>',

                    titleAttr: 'Print',
                    footer: true,
                    // autoPrint: true,
                    exportOptions: {
                        columns: "thead th:not(.noExport)",
                    },

                    customize: function(win) {
                        $(win.document.body)
                            // .css('background', 'white')
                            .css('font-size', 'inherit')

                        // $(win.document.body).find('#pdate').prepend('<div style="text-align:center;font-size:15px;color:black;"><b>SAVINGS MADE ON : ' + mon + yrs + date + comdate + '</b></div>');

                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: $('h1').text(),
                    titleAttr: 'PDF',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    },
                    footer: true
                },
                {
                    extend: 'csv',
                    text: '<i class="fa fa-file-o"></i>',
                    titleAttr: 'CSV',
                    title: $('h1').text(),
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'excel',
                    titleAttr: 'EXCEL',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    title: $('h1').text(),
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'colvis',
                    titleAttr: 'Column Visibility',
                    text: '<i class="fa fa-bars"></i>'
                },

            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };


                total2 = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(3).footer()).html(
                    'Rs.' + total2
                );
                total3 = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(4).footer()).html(
                    'Rs.' + total3
                );

                total4 = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(5).footer()).html(
                    'Rs.' + total4
                );
            }

        });

        //monthly

        var table2 = $('#example2').DataTable({

            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            orderCellsTop: true,
            fixedHeader: true,
            dom: "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fa fa-copy"></i>',
                    titleAttr: 'COPY'
                }, {
                    extend: 'print',

                    text: '<i class="fa fa-print"></i>',
                    title: '<div style="text-align:center;"><img src="../../assets/images/logo.svg" height="100px" width="100px" alt="image" style=""><br /><br /></div><div style="text-align:center;" id="head"><h1>Galznguyz</h2></div><div style="text-align:center;font-size:15px;color:black;"><b>Printed Date: <?php echo date("Y-m-d");  ?></b><br /></div>',

                    titleAttr: 'Print',
                    footer: true,
                    // autoPrint: true,
                    exportOptions: {
                        columns: "thead th:not(.noExport)",
                    },

                    customize: function(win) {
                        $(win.document.body)
                            // .css('background', 'white')
                            .css('font-size', 'inherit')

                        // $(win.document.body).find('#pdate').prepend('<div style="text-align:center;font-size:15px;color:black;"><b>SAVINGS MADE ON : ' + mon + yrs + date + comdate + '</b></div>');

                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: $('h1').text(),
                    titleAttr: 'PDF',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    },
                    footer: true
                },
                {
                    extend: 'csv',
                    text: '<i class="fa fa-file-o"></i>',
                    titleAttr: 'CSV',
                    title: $('h1').text(),
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'excel',
                    titleAttr: 'EXCEL',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    title: $('h1').text(),
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'colvis',
                    titleAttr: 'Column Visibility',
                    text: '<i class="fa fa-bars"></i>'
                },

            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };


                total2 = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(3).footer()).html(
                    'Rs.' + total2
                );
                total3 = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(4).footer()).html(
                    'Rs.' + total3
                );

                total4 = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(5).footer()).html(
                    'Rs.' + total4
                );
            }

        });


        //yearly


        var table3 = $('#example3').DataTable({

            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            orderCellsTop: true,
            fixedHeader: true,
            dom: "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fa fa-copy"></i>',
                    titleAttr: 'COPY'
                }, {
                    extend: 'print',

                    text: '<i class="fa fa-print"></i>',
                    title: '<div style="text-align:center;"><img src="../../assets/images/logo.svg" height="100px" width="100px" alt="image" style=""><br /><br /></div><div style="text-align:center;" id="head"><h1>Galznguyz</h2></div><div style="text-align:center;font-size:15px;color:black;"><b>Printed Date: <?php echo date("Y-m-d");  ?></b><br /></div>',

                    titleAttr: 'Print',
                    footer: true,
                    // autoPrint: true,
                    exportOptions: {
                        columns: "thead th:not(.noExport)",
                    },

                    customize: function(win) {
                        $(win.document.body)
                            // .css('background', 'white')
                            .css('font-size', 'inherit')

                        // $(win.document.body).find('#pdate').prepend('<div style="text-align:center;font-size:15px;color:black;"><b>SAVINGS MADE ON : ' + mon + yrs + date + comdate + '</b></div>');

                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: $('h1').text(),
                    titleAttr: 'PDF',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    },
                    footer: true
                },
                {
                    extend: 'csv',
                    text: '<i class="fa fa-file-o"></i>',
                    titleAttr: 'CSV',
                    title: $('h1').text(),
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'excel',
                    titleAttr: 'EXCEL',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    title: $('h1').text(),
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'colvis',
                    titleAttr: 'Column Visibility',
                    text: '<i class="fa fa-bars"></i>'
                },

            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };


                total2 = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(3).footer()).html(
                    'Rs.' + total2
                );
                total3 = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(4).footer()).html(
                    'Rs.' + total3
                );

                total4 = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(5).footer()).html(
                    'Rs.' + total4
                );
            }

        });




    });
</script>