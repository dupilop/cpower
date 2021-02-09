<?php
require "../../db/connect.php";  //include the DB config file
require '../classes/databasetable.php';
require_once '../ajax_controller/apiservice.php';
$abc = new DatabaseTable('sales');
$abc2 = new DatabaseTable('products');
$abc3 = new DatabaseTable('customers');
if ($_POST['action'] == 'add') {
    unset($_POST['action']);
    $ins = $abc->insert($_POST);

    $s_id1 = $pdo->lastInsertId();
    // $send = sendmessage('a6205d21895d684dc2becec6a4a596f32846c3da3ff98f825e63ecd3eed432fb', $_POST['s_mobile'], 'Thank you for the shopping');
    // echo $send;
    echo $s_id1;
    // print_r($_POST);
} else if ($_POST['action'] == 'removeqty') {
    unset($_POST['action']);
    $g1 = $pdo->prepare("SELECT * FROM products WHERE p_id=:p_id");
    $g1->execute(['p_id' => $_POST['p_id']]);
    $gg1 = $g1->fetch();
    $newqty = intval($gg1['p_qty']) + intval($_POST['p_qty']);
    $_POST['p_qty'] = $newqty;
    $up2 = $abc2->save($_POST, 'p_id');
    // print_r($_POST);
    echo $newqty;
} else if ($_POST['action'] == 'addqty') {
    unset($_POST['action']);
    $g1 = $pdo->prepare("SELECT * FROM products WHERE p_id=:p_id");
    $g1->execute(['p_id' => $_POST['p_id']]);
    $gg1 = $g1->fetch();
    $newqty = $gg1['p_qty'] - $_POST['p_qty'];
    $_POST['p_qty'] = $newqty;
    $up2 = $abc2->save($_POST, 'p_id');
    echo $newqty;
} else if ($_POST['action'] == 'remqtyget') {
    unset($_POST['action']);
    $g1 = $pdo->prepare("SELECT * FROM products WHERE p_id=:p_id");
    $g1->execute(['p_id' => $_POST['p_id']]);
    $gg1 = $g1->fetch();
    echo $gg1['p_qty'];
}
