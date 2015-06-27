<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/kelurahan.php");

$kelurahan = new kelurahan();
$kelurahan->idKelurahan = $_POST['idKelurahan'];
$kelurahan->namaKelurahan = $_POST['namaKelurahan'];

$_SESSION['edited'] = $kelurahan->ubahKelurahan($_POST['kecamatan1']);

if ($_SESSION['edited']) {
    echo "<script>window.location.href='kelurahan.php';</script>";
    $_SESSION['pesan'] = "Sukses Ubah Data Kelurahan";
} else {
    echo "<script>window.location.href='kelurahan.php';</script>";
    $_SESSION['pesan'] = "Gagal Ubah Data Kelurahan";
}
?>