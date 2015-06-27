<?php
if (!defined('__NOT_DIRECT')) {
    //mencegah akses langsung ke file ini
    die('Akses langsung tidak diizinkan!');
}

session_start();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';

if (!isset($_SESSION['my_user_agent']) || ($_SESSION['my_user_agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
    //user belum login
    $__tipe_user = 'Guest';
} else {
    $__tipe_user = $_SESSION['tipe_user'];
    $__username = $_SESSION['user_id'];
}

$aksesFilename = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'hakAkses' . DIRECTORY_SEPARATOR . $__tipe_user . '.php';

if (!file_exists($aksesFilename)) {
    echo $__tipe_user;
    die('Terjadi kesalahan sistem');
}

include $aksesFilename;

$arrayCurrentPath = explode('?', $_SERVER['REQUEST_URI']);
$currentPath = substr($arrayCurrentPath[0], strlen(BASE_URL));
$allow = in_array($currentPath, $__akses_config);

if (!$allow) {
    if ($__tipe_user == 'Guest' && $currentPath != 'admin/login.php') {
        header("Location: " . BASE_URL . 'admin/login.php');
    } else {
        echo "Anda tidak diizinkan mengakses halaman ini!";
    }
    exit;
}
?>