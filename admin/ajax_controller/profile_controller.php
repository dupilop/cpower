<?php
session_start();
require '../../db/connect.php';
require '../../classes/databasetable.php';
$rr = new DatabaseTable('admins');

if ($_POST['action'] == 'updateadmin') {
    $_POST['ad_id'] = $_SESSION['ad_id'];
    if ($_FILES['ad_new_photo']['error'] == 0) {
        $fileName = $_FILES['ad_new_photo']['name'];
        move_uploaded_file($_FILES['ad_new_photo']['tmp_name'], '../../assets/images/admins/' . $fileName);
    }
    if ($_FILES['ad_new_photo']['name'] == '') {
        $_POST['ad_photo'] = $_POST['ad_photo'];
    } else {
        $_POST['ad_photo'] = $_FILES['ad_new_photo']['name'];
    }
    unset($_POST['action']);
    $abc = $rr->save($_POST, 'ad_id');
    echo json_encode($_POST);
} else if ($_POST['action'] == 'changepassword') {
    $_POST['ad_password'] =  password_hash($_POST['ad_password'], PASSWORD_DEFAULT);
    $_POST['ad_id'] = $_SESSION['ad_id'];
    unset($_POST['action']);
    $abc = $rr->save($_POST, 'ad_id');
}
