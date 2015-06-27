<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'loginSession.php';
?>
<?php
include("includes/koneksi.php");
include("model/usaha.php");

$data_usaha = new usaha();
$data_usaha = $data_usaha->ambilData();

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
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Pengolahan Usaha</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="data_usaha.php"><i class="fa fa-circle-o"></i> Data Usaha</a></li>
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
                        <li><a href="kecamatan.php"><i class="fa fa-circle-o"></i> Data Kelurahan</a></li>
                        <li><a href="kelurahan.php"><i class="fa fa-circle-o"></i> Data Kelurahan / Desa</a>
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
                Pengolahan Data Usaha
                <small>Usaha</small>
            </h1>
            <hr/>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">Data Usaha</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dataUsaha" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Usaha</th>
                                    <th>Pemilik</th>
                                    <th>Alamat Usaha</th>
                                    <th width="130px">Status</th>
                                    <th width="40px">
                                        <div align="center">Detail</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($usaha = $data_usaha->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $usaha->namaUsaha ?></td>
                                        <td><?php echo $usaha->nama ?></td>
                                        <td><?php echo $usaha->alamatUsaha ?></td>
                                        <td>
                                            <?php
                                            if ($usaha->statusUsaha == 1) {
                                                echo "<span class='label label-info'>Approved</span>";
                                                echo "<button style='float: right' class='btn btn-danger btn-xs'>" .
                                                    "<span class='glyphicon glyphicon-remove'></span>" .
                                                    "</button>";
                                            } else {
                                                echo "<span class='label label-warning'>Waiting For Approval</span>";
                                                echo "<button id='' style='float: right' class='btn btn-info btn-xs'>" .
                                                    "<span class='glyphicon glyphicon-ok'></span>" .
                                                    "</button>";
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <button data-toggle="modal" data-target="#modalDetailUsaha"
                                                    style="cursor:pointer" type="submit"
                                                    data-id="<?php echo $usaha->idUsaha; ?>"
                                                    data-status="<?php echo $usaha->statusUsaha; ?>"
                                                    data-namausaha="<?php echo $usaha->namaUsaha; ?>"
                                                    data-pemilik="<?php echo $usaha->nama; ?>"
                                                    data-alamatusaha="<?php echo $usaha->alamatUsaha; ?>"
                                                    data-kec="<?php echo $usaha->namaKecamatan; ?>"
                                                    data-kel="<?php echo $usaha->namaKelurahan; ?>"
                                                    data-deskripsi="<?php echo $usaha->deskripsi; ?>"
                                                    data-skala="<?php echo $usaha->skalaUsaha; ?>"
                                                    data-sektor="<?php echo $usaha->namaSektor; ?>"
                                                    class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </button>
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

            <div class="modal fade" id="modalDetailUsaha" tabindex="-1" role="dialog"
                 aria-labelledby="modalDetailUsahaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalDetailUsahaLabel">Detail Usaha</h4>
                        </div>
                        <div class="modal-body">
                            <div id="mapUsaha"></div>
                            <table>
                                <tr>
                                    <td style="vertical-align: top"><label>ID Usaha</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="idUsaha"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Status Usaha</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top">
                                        <span class="label statusUsaha"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Nama Usaha</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="namaUsaha"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Pemilik</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="pemilik"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Alamat Usaha</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="alamatUsaha"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Kecamatan</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="kecamatan"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Kelurahan</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="kelurahan"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Deskripsi</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="deskripsi"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Skala Usaha</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="skala"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top"><label>Sektor Usaha</label></td>
                                    <td style="vertical-align: top" width="10px" align="center">:</td>
                                    <td style="vertical-align: top" class="sektor"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modalDetailUsaha -->

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
    $(document).ready(function () {
        var table = $('#dataUsaha').DataTable({
            "scrollY": "500px",
            "scrollX": "100%",
            "scrollCollapse": true,
            "paging": true
        });
        new $.fn.dataTable.FixedColumns(table);
    });
</script>
<!-- modal script -->
<script language="javascript">
    $(function () {
        $('#modalDetailUsaha').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var idUsaha = button.data('id');
            var statusUsaha = button.data('status');
            var namaUsaha = button.data('namausaha');
            var pemilik = button.data('pemilik');
            var alamatUsaha = button.data('alamatusaha');
            var kecamatan = button.data('kec');
            var kelurahan = button.data('kel');
            var deskripsi = button.data('deskripsi');
            var skala = button.data('skala');
            var sektor = button.data('sektor');

            var modal = $(this);
            if (statusUsaha == 1) {
                modal.find('.statusUsaha').addClass('label-success');
                modal.find('.statusUsaha').text("Approved");
            }
            else {
                modal.find('.statusUsaha').addClass('label-warning');
                modal.find('.statusUsaha').text("Waiting For Approval");
            }
            modal.find('.idUsaha').text(idUsaha);
            modal.find('.namaUsaha').text(namaUsaha);
            modal.find('.pemilik').text(pemilik);
            modal.find('.alamatUsaha').text(alamatUsaha);
            modal.find('.kecamatan').text(kecamatan);
            modal.find('.kelurahan').text(kelurahan);
            modal.find('.deskripsi').text(deskripsi);
            modal.find('.skala').text(skala);
            modal.find('.sektor').text(sektor);
        });
    });

    $.post("update_database_with_ajax.php", {id: button_id, increment: true},
        function (data) {
            alert("Link incremented");
        });
</script>
</body>
</html>