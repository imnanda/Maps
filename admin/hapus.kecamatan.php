<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
?>
<?php
include("includes/koneksi.php");
include("model/kecamatan.php");

$delKecamatan = new kecamatan();
$delKecamatan->idKecamatan = $_POST['idKecamatan'];

$hasKelurahan = mysqli_num_rows($delKecamatan->hasKelurahan());

if ($hasKelurahan == 0)
    $_SESSION['deleted'] = $delKecamatan->hapusKecamatan();

if ($_SESSION['deleted']) {
    echo "<script>window.location.href='kecamatan.php';</script>";
    $_SESSION['pesan'] = "Sukses Hapus Data Kecamatan";
} else {
    echo "<script>window.location.href='kecamatan.php';</script>";
    $_SESSION['pesan'] = "Gagal Hapus Data Kecamatan. Data Kecamatan Masih Memiliki Data Kelurahan";
}
?>