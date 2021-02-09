<?php
$dat = new DatabaseTable('admins');
$dat2 = new DatabaseTable('roles_assign');
if (isset($_POST['save'])) {
    $r_id = $_POST['r_id'];
    unset($_POST['save'], $_POST['r_id']);
    if ($_FILES['ad_photo']['error'] == 0) {
        $fileName = $_FILES['ad_photo']['name'];
        move_uploaded_file($_FILES['ad_photo']['tmp_name'], '../../assets/images/admins/' . $fileName);
    }
    $_POST['ad_password'] = password_hash($_POST['ad_password'], PASSWORD_DEFAULT);
    $_POST['ad_photo'] = $_FILES['ad_photo']['name'];
    $ins = $dat->insert($_POST);
    $ad_id = $pdo->lastInsertId();
    $criteria  = [
        'role_id' => $r_id,
        'admin_id' => $ad_id
    ];
    $abc2 = $dat2->insert($criteria);
    header('Location: users');
}
$title = 'Add Account';
$content = loadTemplate('../templates/adduser_template.php', []);
