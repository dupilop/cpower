<?php
// $dat = new DatabaseTable('admins');
//     if(isset($_POST['save'])){

//         if($_FILES['ad_photo_new']['name'] != ''){
//             if ($_FILES['ad_photo_new']['error'] == 0) {
//                 $imgname = $_FILES['ad_photo_new']['name'];
//                 move_uploaded_file($_FILES['ad_photo_new']['tmp_name'], '../../assets/images/admins/' . $imgname);
//               }
//             $_POST['ad_photo'] = $_FILES['ad_photo_new']['name'];
//         }else{
//             $_POST['ad_photo'] = $_POST['ad_photo'];
//         }
//         if($_POST['ad_password_new'] != ''){
//             $_POST['ad_password'] = $_POST['ad_password_new'];
//             $_POST['ad_password'] = password_hash($_POST['ad_password'],PASSWORD_DEFAULT);
//         }else{
//             $_POST['ad_password'] = $_POST['ad_password'];           
//         }
//         unset($_POST['save'], $_POST['ad_password_new']);
//         $_POST['ad_id'] = $_SESSION['ad_id'];
//         $abc = $dat->save($_POST, 'ad_id');
//         header('Location: profile');
//     }
$title = 'Admin- Profile';
$content = loadTemplate('templates/profile_template.php', []);
