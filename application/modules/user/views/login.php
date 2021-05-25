<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= application()['name'] . ' | ' . application()['dsc'] ?></title>
    <link rel="icon" href="<?= base_url('assets/images/logo/logo-fuhum.png') ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page"
    style="background-image: url(<?= base_url(application()['background']) ?>);background-size:cover">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/images/logo/loading.gif') ?>" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>
    <div id="alert" data-status="<?= @$data['status'] ?>" data-msg="<?= @$data['msg'] ?>"></div>
    <div class="login-box">
        <div class="card card-primary card-outline">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h1"><?= application()['name'] ?></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    var BASE_URL = "<?php echo base_url(); ?>";
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-knob/jquery.knob.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom/alert.js"></script>

</body>

</html>