<?php
require '../classes/databasetable.php';
require '../../db/connect.php';
session_start();
// print_r($_POST);
date_default_timezone_set('Asia/Kathmandu');
$abc = new DatabaseTable('masiksavings');
// print_r($_POST);
$_POST['ms_uploaded_by'] = $_SESSION['ad_id'];
$_POST['ms_upload_date'] = date("Y-m-d");
$_POST['ms_upload_time'] = date("H:i:sa");
$s1 = $abc->save($_POST, '');
echo $_POST['sh_id'];
