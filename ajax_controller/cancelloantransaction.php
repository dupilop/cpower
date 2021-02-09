<?php
require('../../db/connect.php');
require '../classes/databasetable.php';
$abc = new DatabaseTable('loan_transactions');
$abc2 = new DatabaseTable('loans');
$bcd = $abc->find('lt_id', $_GET['id']);
$def = $bcd->fetch();
$bcd2 = $abc2->find('l_id', $def['lt_l_id']);
$def2 = $bcd2->fetch();
$newlamt =  $def2['l_rem_amount'] + $def['lt_amount'];
$criteria = [
    'l_rem_amount' => $newlamt,
    'l_id' => $def['lt_l_id']
];
$bcd3 = $abc2->update($criteria, 'l_id');
$delete = $abc->delete('lt_id', $_GET['id']);
header("location: ../public_html/masikloan");
