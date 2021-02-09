<?php
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
session_start();
date_default_timezone_set('Asia/Kathmandu');
$abc = new DatabaseTable('bulkmessage');
if ($_POST['action'] == 'sendbulk') {

    $_POST['bm_uploaded_by'] = $_SESSION['ad_id'];
    $_POST['bm_uploaded_on'] = date("Y-m-d H:i:s");

    $bulk_phone = [];
    if ($_POST['sendper'] == 'roles') {
        $b1 = $pdo->prepare("SELECT * FROM roles r
        INNER JOIN roles_assign ra ON r.r_id=ra.role_id WHERE role_id=:rid");
        $b1->execute(['rid' => $_POST['bm_to']]);
        $bb1 = $b1->fetch();
        $_POST['bm_to'] = $bb1['r_name'];
        $a1 = $pdo->prepare("SELECT * FROM roles_assign ra 
        INNER JOIN admins a ON a.ad_id=ra.admin_id WHERE role_id=:rid");
        $a1->execute(['rid' => $_POST['bm_to']]);
        $rca1 = $a1->rowCount();
        $aa1 = $a1->fetchAll();
        if ($rca1 > 0) {
            foreach ($aa1 as $aaa1) {

                array_push($bulk_phone, $aaa1['ad_mobile']);
            }
        }
    } else if ($_POST['sendper'] == 'customers') {
        $a2 = $pdo->prepare("SELECT * FROM customers");
        $a2->execute();
        $rca2 = $a2->rowCount();
        $aa2 = $a2->fetchAll();
        if ($rca2 > 0) {
            foreach ($aa2 as $aaa2) {

                array_push($bulk_phone, $aaa2['c_mobile']);
            }
        }
    } else if ($_POST['sendper'] == 'all') {
        $a1 = $pdo->prepare("SELECT * FROM roles_assign ra 
        INNER JOIN admins a ON a.ad_id=ra.admin_id WHERE role_id=:rid");
        $a1->execute(['rid' => $_POST['bm_to']]);
        $rca1 = $a1->rowCount();
        $aa1 = $a1->fetchAll();
        if ($rca1 > 0) {
            foreach ($aa1 as $aaa1) {
                array_push($bulk_phone, $aaa1['ad_mobile']);
            }
        }
        $a2 = $pdo->prepare("SELECT * FROM customers");
        $a2->execute();
        $rca2 = $a2->rowCount();
        $aa2 = $a2->fetchAll();
        if ($rca2 > 0) {
            foreach ($aa2 as $aaa2) {

                array_push($bulk_phone, $aaa2['c_mobile']);
            }
        }
    } else {
        echo 'ERROR';
    }
    unset($_POST['action'], $_POST['sendper']);
    $ins = $abc->insert($_POST);
    foreach ($bulk_phone as $tosendnum) {
        echo $tosendnum;
    }
}
