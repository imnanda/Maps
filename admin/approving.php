<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/usaha.php");

$usaha = new usaha();
$usaha->idUsaha = $_POST['namaKecamatan'];
$kecamatan->kodePos = $_POST['kodePos'];
$kecamatan->idKecamatan = $_POST['idKecamatan'];

$_SESSION['approve'] = $kecamatan->ubahKecamatan();

if ($_SESSION['approve']) {
    echo "<script>window.location.href='data_usaha.php';</script>";
    $_SESSION['approve'] = "Usaha Telah Di Setujui";
} else {
    echo "<script>window.location.href='data_usaha.php';</script>";
    $_SESSION['approve'] = "Usaha Gagal Di Setujui";
}
?>