<?php
// print_r($_POST);
require('../../db/connect.php');
require '../classes/databasetable.php';
$abc = new DatabaseTable('masiksavings');
// print_r($_POST);
$delete = $abc->delete('ms_id', $_POST['id']);
echo $_POST['shid'];
