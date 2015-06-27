<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'cekAkses.php';

$valid = true;

if ($_POST) {
    mysql_connect(DB_HOST, DB_USER, DB_PASS);
    mysql_select_db(DB_NAME);

    $userId = mysql_real_escape_string($_POST['username']);
    $data = mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='" . $userId . "'"));
    if ($data != false && $data['password'] == md5($_POST['password'])) {
        //login berhasil
        $_SESSION['tipe_user'] = $data['hakAkses'];
        $_SESSION['user_id'] = $data['username'];
        $_SESSION['user_name'] = $data['nama'];
        $_SESSION['user_email'] = $data['email'];
        $_SESSION['user_photo'] = $data['photoPath'];
        $_SESSION['user_registDate'] = $data['registrationDate'];
        $_SESSION['my_user_agent'] = md5($_SERVER['HTTP_USER_AGENT']);
        if ($_SESSION['tipe_user'] == 'Admin' || $_SESSION['tipe_user'] == 'Super Admin') {
            header("Location: ../admin/");
        }
    } else {
        $valid = false;
    }
}
?>