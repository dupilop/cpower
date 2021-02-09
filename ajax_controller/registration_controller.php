<?php
date_default_timezone_set('Asia/Kathmandu');
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
$abc = new DatabaseTable('shareholder');
if ($_POST['action'] == 'add') {
    unset($_POST['action']);
    if (isset($_POST['s_available'])) {
        $_POST['s_available'] = 'yes';
    } else {
        $_POST['s_available'] = 'no';
    }
    $_POST['s_uploaded_on'] = date("Y-m-d H:i:sa");
    $ins = $abc->insert($_POST);
    print_r($_POST);
}
