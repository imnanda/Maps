<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/kelurahan.php");

$newKelurahan = new kelurahan();
$newKelurahan->namaKelurahan = $_POST['namaKelurahan'];

$_SESSION['added'] = $newKelurahan->tambahKelurahan($_POST['kecamatan']);

if ($_SESSION['added']) {
    echo "<script>window.location.href='kelurahan.php';</script>";
    $_SESSION['pesan'] = "Sukses Tambah Data Kelurahan";
} else {
    echo "<script>window.location.href='kelurahan.php';</script>";
    $_SESSION['pesan'] = "Gagal Tambah Data Kelurahan." . mysqli_error($_SESSION['added']);
}
?>