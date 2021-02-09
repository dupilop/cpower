<?php
$did = $pdo->query('DELETE FROM admins WHERE ad_id = ' . $_GET['did']);
header('location: users');
