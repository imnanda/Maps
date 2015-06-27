<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/kecamatan.php");

$kecamatan = new kecamatan();
$kecamatan->namaKecamatan = $_POST['namaKecamatan'];
$kecamatan->kodePos = $_POST['kodePos'];
$kecamatan->idKecamatan = $_POST['idKecamatan'];

$_SESSION['edited'] = $kecamatan->ubahKecamatan();

if ($_SESSION['edited']) {
    echo "<script>window.location.href='kecamatan.php';</script>";
    $_SESSION['pesan'] = "Sukses Ubah Data Kecamatan";
} else {
    echo "<script>window.location.href='kecamatan.php';</script>";
    $_SESSION['pesan'] = "Gagal Ubah Data Kecamatan";
}
?>