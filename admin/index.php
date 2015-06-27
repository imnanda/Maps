<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'loginSession.php';
?>
<?php
include("includes/koneksi.php");
include("model/kecamatan.php");
include("model/kelurahan.php");
include("model/usaha.php");
include("model/pemilik_usaha.php");

$kecamatan = new kecamatan();
$jumlahKecamatan = $kecamatan->jumlah();
$kelurahan = new  kelurahan();
$jumlahKelurahan = $kelurahan->jumlah();
$usaha = new usaha();
$jumlahUsaha = $usaha->jumlah();
$pemilikUsaha = new pemilik_usaha();
$jumlahPemUs = $pemilikUsaha->jumlah();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminDISPERINDAG | Dashboard</title>
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
                <li class="active">
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
                Dashboard
            </h1>
            <hr/>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-pie-chart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kecamatan</span>
                            <span class="info-box-number"><?php echo $jumlahKecamatan ?></span>
                            <a href="kecamatan.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-pie-chart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kelurahan / Desa</span>
                            <span class="info-box-number"><?php echo $jumlahKelurahan ?></span>
                            <a href="kelurahan.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-pie-chart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pemilik Usaha</span>
                            <span class="info-box-number"><?php echo $jumlahPemUs ?></span>
                            <a href="pemilik_usaha.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usaha</span>
                            <span class="info-box-number"><?php echo $jumlahUsaha ?></span>
                            <a href="data_usaha.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Rekapitulasi Singkat</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i
                                            class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" height="180"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Persentase Usaha Per Skala</strong>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart-responsive">
                                                <canvas id="pieChart" height="150"></canvas>
                                            </div>
                                            <!-- ./chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <ul class="chart-legend clearfix">
                                                <li><i class="fa fa-circle-o text-red"></i> Kecil</li>
                                                <li><i class="fa fa-circle-o text-green"></i> Menengah</li>
                                                <li><i class="fa fa-circle-o text-yellow"></i> Mikro</li>
                                            </ul>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
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
<?php include('includes/foot.php') ?>
<?php include('chart.php') ?>
</body>
</html>