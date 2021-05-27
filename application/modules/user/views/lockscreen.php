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
    <link rel="icon" href="<?= base_url(application()['logo']) ?>">
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

<body class="hold-transition lockscreen">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url(application()['loader']) ?>" width="80">
            <p>Harap Tunggu...</p>
        </div>
    </div>
    <div id="alert" data-status="<?= @$data['status'] ?>" data-msg="<?= @$data['msg'] ?>"></div>
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="<?= base_url() ?>" class="h1"><?= application()['name'] ?></a>
        </div>
        <div class="lockscreen-name"><?= @$data['userdata']['username'] ?></div>
        <div class="lockscreen-item">
            <div class="lockscreen-image">
                <?php
                    $photo = 'default.png';
                    if (!empty($data['userdata']['photo'])) {
                        $photo = $data['userdata']['photo'];
                    }
                ?>
                <img src="<?= base_url('assets/images/upload/user_profile/' . $photo) ?>" alt="User Image">
            </div>
            <form action="" method="post" class="lockscreen-credentials">
                <div class="input-group">
                    <input type="hidden" name="username" value="<?= @$data['userdata']['username'] ?>">
                    <input type="password" name="password" class="form-control" placeholder="password">

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>
        <div class="text-center">
            <a href="<?= base_url('login') ?>">Or sign in as a different user</a>
        </div>
        <div class="lockscreen-footer text-center">
            <strong>Copyright &copy; </strong>SIENTE.Corp <strong>2021</strong>
            Beta Version
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