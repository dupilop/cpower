<?php
session_start();
require '../../db/connect.php';
require '../../classes/databasetable.php';
$rr = new DatabaseTable('admins');
$ad_id = $_SESSION['ad_id'];
$dat = $rr->find('ad_id', $ad_id);
$data = $dat->fetch();
$password = $_POST['password'];
$hashedpassword = $data['ad_password'];
if (password_verify($password, $hashedpassword)) {
    echo 'true';
} else {
    echo 'false';
}
