<?php
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
$abc = new DatabaseTable('salarys');
if (isset($_GET['action'])) {
  $action = $_GET['action'];
  if ($action == 'delete') {
    $delete = $abc->delete('sal_id', $_GET['sal_id']);
  }
}
if ($_POST['action'] == 'add') {
  unset($_POST['action']);
  $ins = $abc->insert($_POST);
  print_r($_POST);
} else if ($_POST['action'] == 'view') {

  // $asd = $pdo->query("SELECT * FROM admins");
  $query = "SELECT * FROM salarys";
  $statement = $pdo->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $output = '<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="mb-2 page-title">Salarys</h2>
        <p class="card-text">You are viewing all the salary lists</p>
        <div class="row my-4">
          <div class="col-md-4">
          <button type="button" class="btn mb-2 btn-outline-secondary" id="addrestro"  data-whatever="@mdo"><span class="fe fe-20 fe-plus"></span>Add salary</button>
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
                         <th>Employee Name</th>
                         <th>Designation</th>
                         <th>Month</th>
                         <th>Year</th>
                         <th>Amount</th>
                         <th class="noExport">Action</th>
                       </tr>
                     </thead>
                     
                 
                       <tbody>';
  if ($total_row > 0) {
    foreach ($result as $a) {
      $d = explode("-", $a['sal_mon_year']);
      $output .= '
                           <tr>
                           <td>' . $a['sal_emp_name'] . '</td>
                           <td>' . $a['sal_designation'] . '</td>
                           <td>' . $d[1] . '</td>
                           <td>' . $d[0] . '</td>
                           <td>' . $a['sal_tincome'] . '</td>
                          
                           <td>
                         
                          
                           <button class="btn btn-sm mb-2 btn-outline-danger delete" id="' . $a['sal_id'] . '">
                           <span class="fe fe-trash"></span>
                           </button>
                          
                          <a href="../ajax_controller/printsalary.php?sal_id=' . $a['sal_id'] . '"><button type="button" class="btn btn-sm mb-2 btn-outline-primary printbtn" id="printbtn"><span class="fe fe-printer"></span></button></a>
                          
     
                           </td>
                           </tr>';
    }
  }


  $output .= '</tbody>
                   </table> </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
 </div>';
  echo $output;
}
?>
<script type="text/javascript">
  $('#example').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 50, 75, 100, -1],
      [10, 50, 75, 100, "All"]
    ]
  });
</script>