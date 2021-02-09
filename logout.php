<?php
session_start();
session_destroy();
header('location: login.php');
$_SESSION['editorloggedin'] = false;
$_SESSION['admin_loggedin'] = false;
?>