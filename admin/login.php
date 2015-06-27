<?php
include 'loginSession.php';

if ($__tipe_user == 'Admin' && $currentPath == 'admin/login.php') {
    header("Location: ../admin/");
} elseif ($__tipe_user == 'Super Admin' && $currentPath == 'admin/login.php') {
    header("Location: ../admin/");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminDISPERINDAG | Log in</title>
    <?php include("includes/head.php") ?>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>DISPERINDAG
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">
            <?php
            if ($valid == false) {
                echo '<div class="alert alert-danger">Login gagal. Mungkin Username dan Password salah.</div>';
            }
            ?>
        </p>

        <form role="form" action="" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4 pull-right">
                    <button class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="text-left">
            <p class="login">Hubungin Super Admin Administrator untuk mendapatkan akses login.</p>
        </div>
        <!-- /.social-auth-links -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>