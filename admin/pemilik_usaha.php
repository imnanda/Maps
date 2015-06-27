<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'loginSession.php';
?>
<?php
include("includes/koneksi.php");
include("model/kecamatan.php");

$kecamatan = new kecamatan();
$kecamatan = $kecamatan->ambilData();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminDISPERAN | Pemilik Usaha</title>
    <?php include("includes/head.php") ?>
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
                <!-- Pengolahan Data Usaha-->
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Pengolahan Usaha</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="data_usaha.php"><i class="fa fa-circle-o"></i> Data Usaha</a></li>
                        <li class="active"><a href="pemilik_usaha.php"><i class="fa fa-circle-o"></i> Data Pemilik Usaha</a>
                        </li>
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
                        <li><a href="kecamatan.php"><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
                        <li><a href="kelurahan.php"><i class="fa fa-circle-o"></i> Data Kelurahan / Desa</a></li>
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
                Pengolahan Usaha
                <small>Data Usaha</small>
            </h1>
            <hr/>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dataPemilikUsaha" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Kode Pos</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
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
        $("#dataPemilikUssha").dataTable();
    });
</script>
</body>
</html>