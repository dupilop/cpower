<?php

/*
 * Ajax Multiple Image Uploader
 * https://github.com/tharindulucky/ajax-multi-image-uploader
 *
 * Copyright 2018, Tharindu Lakshitha
 * https://coderaweso.me
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'uploads';   //2
if (!empty($_FILES['c_front_citizenship_f'])) {
    $tempFile = $_FILES['c_front_citizenship_f']['tmp_name'];
    $file_name = $_FILES['c_front_citizenship_f']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // if(filesize($tempFile) > 5000000){
    //     echo 'FAILED';
    //     die();
    // }

    // if ($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'pdf' || $ext == 'PDF') {
    $new_file_name = time() . '.' . $ext;
    $targetPath = '../../assets/images/customers/';  //4
    $targetFile =  $targetPath . $new_file_name;  //5
    // if ($img = @imagecreatefromstring(file_get_contents($tempFile))) {
    $upload_result = move_uploaded_file($tempFile, $targetFile); //6
    echo $new_file_name;
    // }else{
    // echo 'FAILED';
    // }
    // } else {
    //     echo 'FAILED';
    // }
} else if (!empty($_FILES['c_back_citizenship_f'])) {
    $tempFile = $_FILES['c_back_citizenship_f']['tmp_name'];
    $file_name = $_FILES['c_back_citizenship_f']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // if(filesize($tempFile) > 5000000){
    //     echo 'FAILED';
    //     die();
    // }

    // if ($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'pdf' || $ext == 'PDF') {
    $new_file_name = time() . '.' . $ext;
    $targetPath = '../../assets/images/customers/';  //4
    $targetFile =  $targetPath . $new_file_name;  //5
    // if ($img = @imagecreatefromstring(file_get_contents($tempFile))) {
    $upload_result = move_uploaded_file($tempFile, $targetFile); //6
    echo $new_file_name;
    // }else{
    // echo 'FAILED';
    // }
    // } else {
    //     echo 'FAILED';
    // }
} else if (!empty($_FILES['c_photo_f'])) {
    $tempFile = $_FILES['c_photo_f']['tmp_name'];
    $file_name = $_FILES['c_photo_f']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // if(filesize($tempFile) > 5000000){
    //     echo 'FAILED';
    //     die();
    // }

    // if ($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'pdf' || $ext == 'PDF') {
    $new_file_name = time() . '.' . $ext;
    $targetPath = '../../assets/images/customers/';  //4
    $targetFile =  $targetPath . $new_file_name;  //5
    // if ($img = @imagecreatefromstring(file_get_contents($tempFile))) {
    $upload_result = move_uploaded_file($tempFile, $targetFile); //6
    echo $new_file_name;
}
