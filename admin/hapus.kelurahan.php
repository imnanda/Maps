<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/kelurahan.php");

$delKelurahan = new kelurahan();
$delKelurahan->idKelurahan = $_POST['idKelurahan'];

$affected_row = $delKelurahan->hapusKelurahan();

if ($affected_row) {
    echo "<script>window.location.href='kelurahan.php';</script>";
    $_SESSION['pesan'] = "Sukses Hapus Data Kelurahan";
} else {
    echo "<script>window.location.href='kelurahan.php';</script>";
    $_SESSION['pesan'] = "Gagal Hapus Data Kelurahan.";
}
?>