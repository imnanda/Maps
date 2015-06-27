<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'loginSession.php';
?>
<?php
include("includes/koneksi.php");
include("model/sektorusaha.php");

$data_Sektor = new sektorUsaha();
$data_Sektor = $data_Sektor->ambilData();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminDISPERAN | Sektor Usaha</title>
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
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Pengolahan Data Wilayah</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="kecamatan.php"><i class="fa fa-circle-o"></i> Data Kecamatan</a>
                        </li>
                        <li><a href="kelurahan.php"><i class="fa fa-circle-o"></i> Data Kelurahan / Desa</a></li>
                    </ul>
                </li>
                <!-- Pengolahan Sektor Usaha-->
                <li class="active">
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
                Pengolahan Sektor Usaha
            </h1>
            <hr/>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Data Sektor</h3>
                            <button data-toggle="modal" data-target="#modalTambahKecamatan" style="cursor:pointer"
                                    type="submit" class="btn btn-default pull-right">
                                <span class="glyphicon glyphicon-plus"></span> Tambah Data Sektor
                            </button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dataKecamatan" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="70px">ID Sektor</th>
                                    <th>Nama Sektor</th>
                                    <th width="100px">
                                        <div align="center">Action</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($sektor = $data_Sektor->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sektor->idSektor; ?></td>
                                        <td><?php echo $sektor->namaSektor; ?></td>
                                        <td align="center">
                                            <div class="input-group inline">
                                                <button data-toggle="modal" data-target="#modalUbahKecamatan"
                                                        style="cursor:pointer" type="submit"
                                                        data-id="<?php echo $sektor->idSektor; ?>"
                                                        data-namasektor="<?php echo $sektor->namaSektor; ?>"
                                                        class="btn btn-primary btn-xs">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                                <button data-toggle="modal" data-target="#modalHapus"
                                                        data-id="<?php echo $sektor->idSektor; ?>"
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

            <div class="modal fade" id="modalTambahKecamatan" tabindex="-1" role="dialog"
                 aria-labelledby="modalTambahKecamatanLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTambahKecamatanLabel">Tambah Data Kecamatan</h4>
                        </div>
                        <form action="tambah.kecamatan.php" method="post" role="form">
                            <div class="modal-body">
                                <p style="text-align: left;">
                                    <label>Kode POS</label><br/>
                                    <input type="text" maxlength="5" class="form-control kodePos required"
                                           name="kodePos" placeholder="Kode POS (Max. 5 Digit)">
                                    <label>Nama Kecamatan</label><br/>
                                    <input type="text" class="form-control namaKecamatan required" name="namaKecamatan"
                                           placeholder="Nama Kecamatan"></br>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modalTambahKecamatan -->
            <div class="modal fade" id="modalUbahKecamatan" tabindex="-1" role="dialog"
                 aria-labelledby="modalUbahKecamatanLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalUbahKecamatanLabel">Ubah Data Kecamatan</h4>
                        </div>
                        <form action="ubah.kecamatan.php" method="post" role="form">
                            <div class="modal-body">
                                <p style="text-align: left;">
                                    <input type="hidden" class="idKecamatan" name="idKecamatan" value="">
                                    <label>Kode POS</label><br/>
                                    <input type="text" maxlength="5" class="form-control kodePos required"
                                           name="kodePos" value="">
                                    <label>Nama Kecamatan</label><br/>
                                    <input type="text" class="form-control namaKecamatan required" name="namaKecamatan"
                                           value=""></br>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modalTambahKecamatan -->
            <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalHapusLabel">Hapus Data Kecamatan</h4>
                        </div>
                        <!-- /.modal-header -->
                        <form role="form" action="hapus.kecamatan.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="idKecamatan" type="hidden" name="idKecamatan" value=""/>
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
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#dataKecamatan").dataTable();
    });
</script>
<!-- modal script -->
<script language="javascript">
    $(function () {
        $('#modalUbahKecamatan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var idKecamatan = button.data('id');
            var kodePos = button.data('kodepos');
            var namaKecamatan = button.data('namakecamatan');

            var modal = $(this);
            modal.find('.idKecamatan').val(idKecamatan);
            modal.find('.kodePos').val(kodePos);
            modal.find('.namaKecamatan').val(namaKecamatan);
        })

        $('#modalHapus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var idKecamatan = button.data('id');

            var modal = $(this);
            modal.find('.idKecamatan').val(idKecamatan);
        })
    });
</script>

</body>
</html>