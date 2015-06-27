<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/kecamatan.php");

$newKecamatan = new kecamatan();
$newKecamatan->namaKecamatan = $_POST['namaKecamatan'];
$newKecamatan->kodePos = $_POST['kodePos'];

$_SESSION['added'] = $newKecamatan->tambahKecamatan();

if ($_SESSION['added']) {
    echo "<script>window.location.href='kecamatan.php';</script>";
    $_SESSION['pesan'] = "Sukses Tambah Data Kecamatan";
} else {
    echo "<script>window.location.href='kecamatan.php';</script>";
    $_SESSION['pesan'] = "Gagal Tambah Data Kecamatan";
}
?>