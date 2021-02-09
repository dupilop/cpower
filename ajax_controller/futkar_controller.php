<?php
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
$abc = new DatabaseTable('expenses');
if ($_POST['action'] == 'add') {
    unset($_POST['action']);
    $ins = $abc->insert($_POST);
    print_r($_POST);
}
