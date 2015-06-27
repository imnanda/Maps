<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'loginSession.php';
?>
<?php
include("includes/koneksi.php");
include("model/kelurahan.php");
include("model/kecamatan.php");

$data_kelurahan = new kelurahan();
$listKelurahan = $data_kelurahan->ambilData();
$data_kecamatan = new kecamatan();
$data_kecamatan1 = $data_kecamatan->ambilData();
$data_kecamatan2 = $data_kecamatan->ambilData();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminDISPERAN | Kelurahan</title>
    <?php include("includes/head.php") ?>
    <!-- dataTables -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body class="skin-blue-light sidebar-mini fixed">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="../admin/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                <img src="images/logo.png" alt="DISPERINDAG" align="center"/>
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <img src="images/logo.png" alt="DISPERINDAG" align="center"/>
                <p><b>Admin</b>DISPERINDAG</p>
            </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $_SESSION['user_photo'] ?>" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?php echo $_SESSION['user_name'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $_SESSION['user_photo'] ?>" class="img-circle" alt="User Image"/>

                                <p><?php echo $_SESSION['user_name'] ?><br/><?php echo $_SESSION['tipe_user'] ?></p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat disabled">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <!-- Dashboard-->
                <li>
                    <a href="/tubesatol/admin/">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <!-- Pengolahan Usaha-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Pengolahan Usaha</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="data_usaha.php"><i class="fa fa-circle-o"></i> Data Usaha</a></li>
                        <li><a href="pemilik_usaha.php"><i class="fa fa-circle-o"></i> Data Pemilik Usaha</a></li>
                    </ul>
                </li>
                <!-- Pengolahan Data Wilayah -->
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Pengolahan Data Wilayah</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="kecamatan.php"><i class="fa fa-circle-o"></i> Data Kelurahan</a></li>
                        <li class="active"><a href="kelurahan.php"><i class="fa fa-circle-o"></i> Data Kelurahan / Desa</a>
                        </li>
                    </ul>
                </li>
                <!-- Pengolahan Sektor Usaha-->
                <li>
                    <a href="sektorusaha.php">
                        <i class="fa fa-dashboard"></i> <span>Pengolahan Sektor Usaha</span>
                    </a>
                </li>
                <!-- Pengolahan Admin -->
                <li>
                    <a href="sektorusaha.php">
                        <i class="fa fa-dashboard"></i> <span>Pengolahan Data Admin</span>
                    </a>
                </li>
                <!-- Pengolahan Laporan -->
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Laporan</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pengolahan Data Wilayah
                <small>Kelurahan</small>
            </h1>
            <hr/>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    if (!empty($_SESSION['added']) && $_SESSION['added'] == false) {
                        echo "<div class='alert alert-warning alert-dismissable'>";
                        echo $_SESSION['pesan'];
                        echo "</div>";
                    } elseif (!empty($_SESSION['added']) && $_SESSION['added'] == true) {
                        echo "<div class='alert alert-success alert-dismissable'>";
                        echo $_SESSION['pesan'];
                        echo "</div>";
                    }

                    if (!empty($_SESSION['deleted']) && $_SESSION['deleted'] == false) {
                        echo "<div class='alert alert-warning alert-dismissable'>";
                        echo $_SESSION['pesan'];
                        echo "</div>";
                    } elseif (!empty($_SESSION['deleted']) && $_SESSION['deleted'] == true) {
                        echo "<div class='alert alert-success alert-dismissable'>";
                        echo $_SESSION['pesan'];
                        echo "</div>";
                    }
                    ?>
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Data Kelurahan</h3>
                            <button data-toggle="modal" data-target="#modalTambahKelurahan" style="cursor:pointer"
                                    type="submit" class="btn btn-default pull-right">
                                <span class="glyphicon glyphicon-plus"></span> Tambah Data Kelurahan
                            </button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dataKelurahan" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="100px">Kode Pos</th>
                                    <th>Nama Kelurahan</th>
                                    <th width="100px">
                                        <div align="center">Action</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($kelurahan = $listKelurahan->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $kelurahan->kodePos; ?></td>
                                        <td><?php echo $kelurahan->namaKelurahan; ?></td>
                                        <td align="center">
                                            <div class="input-group inline">
                                                <button data-toggle="modal" data-target="#modalUbahKelurahan"
                                                        style="cursor:pointer" type="submit"
                                                        data-id="<?php echo $kelurahan->idKelurahan; ?>"
                                                        data-kodepos="<?php echo $kelurahan->kodePos; ?>"
                                                        data-namakelurahan="<?php echo $kelurahan->namaKelurahan; ?>"
                                                        data-idkecamatan="<?php echo $kelurahan->idKecamatan; ?>"
                                                        class="btn btn-primary btn-xs">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                                <button data-toggle="modal" data-target="#modalHapus"
                                                        data-id="<?php echo $kelurahan->idKelurahan; ?>"
                                                        style="margin-left: 5px; cursor:pointer" type="submit"
                                                        class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->

            <div class="modal fade" id="modalTambahKelurahan" tabindex="-1" role="dialog"
                 aria-labelledby="modalTambahKelurahanLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTambahKelurahanLabel">Tambah Data Kelurahan</h4>
                        </div>
                        <form id="tambahKelurahan" action="tambah.kelurahan.php" method="post" role="form">
                            <div class="modal-body">
                                <label>Pilih Kecamatan</label><br/>
                                <div class="input-group">
                                    <select name="kecamatan" id="listKecamatan" class="form-control">
                                        <option value="0" data-kodepos="-">----- Pilih Kecamatan -----</option>
                                        <?php
                                        while ($kecamatan = $data_kecamatan1->fetch_object()) {
                                            echo "<option value='$kecamatan->idKecamatan' data-kodepos='$kecamatan->kodePos'>$kecamatan->namaKecamatan</option>";
                                        }
                                        ?>
                                    </select>

                                    <div class="input-group-addon kodePos-addon">-</div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelurahan</label><br/>
                                    <input type="text" disabled="disabled" class="form-control namaKelurahan required"
                                           name="namaKelurahan" placeholder="Nama Kelurahan"></br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modalTambahKelurahan -->
            <div class="modal fade" id="modalUbahKelurahan" tabindex="-1" role="dialog"
                 aria-labelledby="modalUbahKelurahanLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalUbahKelurahanLabel">Ubah Data Kelurahan</h4>
                        </div>
                        <form action="ubah.kelurahan.php" method="post" role="form">
                            <div class="modal-body">
                                <input class="idKelurahan" name="idKelurahan" hidden value="">
                                <label>Pilih Kecamatan</label><br/>

                                <div class="input-group">
                                    <select name="kecamatan1" id="listKecamatan1" class="form-control">
                                        <option value="0" data-kodepos="-">----- Pilih Kecamatan -----</option>
                                        <?php
                                        while ($kecamatan = $data_kecamatan2->fetch_object()) {
                                            echo "<option value='$kecamatan->idKecamatan' data-kodepos='$kecamatan->kodePos'>$kecamatan->namaKecamatan</option>";
                                        }
                                        ?>
                                    </select>

                                    <div class="input-group-addon kodePos-addon1">-</div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelurahan</label><br/>
                                    <input type="text" disabled="disabled" class="form-control namaKelurahan1 required"
                                           name="namaKelurahan" placeholder="Nama Kelurahan"></br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modalTambahKelurahan -->
            <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalHapusLabel">Hapus Data Kelurahan</h4>
                        </div>
                        <!-- /.modal-header -->
                        <form role="form" action="hapus.kelurahan.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="idKelurahan" type="hidden" name="idKelurahan" value=""/>
                                </div>
                                <label>Apakah Anda Yakin ?</label>
                            </div>
                            <!-- /.modal-body-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">hapus</button>
                            </div>
                            <!-- /.modal-footer-->
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modalHapus -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2015</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<?php include("includes/foot.php") ?>

<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="plugins/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js"
        type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#dataKelurahan").dataTable();
    });
</script>
<!-- modal script -->
<script language="javascript">
    $(function () {
        $('#modalUbahKelurahan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var idKelurahan = button.data('id');
            var kodePos = button.data('kodepos');
            var namaKelurahan = button.data('namakelurahan');
            var idKecamatan = button.data('idkecamatan');

            var modal = $(this);
            modal.find('#listKecamatan1').val(idKecamatan);
            modal.find('.idKelurahan').val(idKelurahan);
            modal.find('.kodePos-addon1').text(kodePos);
            modal.find('.namaKelurahan1').val(namaKelurahan);
            modal.find('.namaKelurahan1').removeAttr('disabled');
        });

        $('#modalHapus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var idKelurahan = button.data('id');

            var modal = $(this);
            modal.find('.idKelurahan').val(idKelurahan);
        });

        $('#listKecamatan1').on('change', function () {
            var kodePos = $(this).find(':selected').data('kodepos');
            var val = $(this).find(':selected').val();

            $(document).find('.kodePos-addon1').text(kodePos);

            if (val != 0)
                $(document).find('.namaKelurahan1').removeAttr('disabled');
            else
                $(document).find('.namaKelurahan1').attr("disabled", "disabled");
        });

        $('#listKecamatan').on('change', function () {
            var kodePos = $(this).find(':selected').data('kodepos');
            var val = $(this).find(':selected').val();

            $(document).find('.kodePos-addon').text(kodePos);

            if (val != 0)
                $(document).find('.namaKelurahan').removeAttr('disabled');
            else
                $(document).find('.namaKelurahan').attr("disabled", "disabled");
        });
    });
</script>
</body>
</html>