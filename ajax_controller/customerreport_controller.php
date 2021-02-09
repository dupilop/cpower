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

    if ($action == 'view') {
?>

<?php

        $output = '<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="mb-2 page-title">Customer Report</h2>
                 
                  <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                        
                        <table class="table table-sm table-hover example" id="example">
                            <thead>
                              <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Phone</th>
                                <th>Email</th>
                                
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>S.N.</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Phone</th>
                              <th>Email</th>
                              </tr>
                            </tfoot>
                            <tbody>';

        $dta = $pdo->prepare("SELECT * FROM sales s
        LEFT JOIN admins a ON a.ad_id=s.s_uploaded_by");
        $dta->execute();
        $data = $dta->fetchAll();
        $a = 1;
        foreach ($data as $dat) {



            $output .= ' <tr>';
            $output .= '<td><small class="mb-0 text-muted" style="font-size:12px;">' . $a . '</small></td>';

            $output .= '<td><p class="mb-0 text-muted"><strong>' . $dat['s_name'] . '</strong></p></td>
                                    <td>' . $dat['s_address'] . '</td>
                                    <td>' . $dat['s_mobile'] . '</td>';


            $output .= '
                                   
                                    <td>' . $dat['s_phone'] . '</td>
                                    <td>' . $dat['s_email'] . '</td>
                                    
                                   
                              
                     
                               
                            
                                  </tr>';
            $a++;
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
    $(document).ready(function() {

        var table2 = $('#example').DataTable({

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


                // total2 = api
                //     .column(3, {
                //         page: 'current'
                //     })
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);

                // $(api.column(3).footer()).html(
                //     'Rs.' + total2
                // );
                // total3 = api
                //     .column(4, {
                //         page: 'current'
                //     })
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);

                // $(api.column(4).footer()).html(
                //     'Rs.' + total3
                // );

                // total4 = api
                //     .column(5, {
                //         page: 'current'
                //     })
                //     .data()
                //     .reduce(function(a, b) {
                //         return intVal(a) + intVal(b);
                //     }, 0);

                // $(api.column(5).footer()).html(
                //     'Rs.' + total4
                // );
            }

        });




    });
</script>