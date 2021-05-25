<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <title><?= application()['name'] . ' | ' . application()['dsc'] ?></title>
    <link rel="icon" href="<?= base_url('assets/images/logo/logo-fuhum.png') ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sorry, This Page Can&#39;t Be Accessed</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminlte.min.css">
    <style>
        #footer {
            text-align: center;
            position: fixed;
            margin-left: 530px;
            bottom: 0px
        }
    </style>
</head>

<body class="bg-dark text-white py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-2 text-center">
                <p><i class="fa fa-exclamation-triangle fa-5x"></i><br />Status Code: 403</p>
            </div>
            <div class="col-md-10">
                <h3>OPPSSS!!!! Sorry...</h3>
                <p>Sorry, your access is refused due to security reasons of our server and also our sensitive data.<br />Please go back to the previous page to continue browsing.</p>
                <a class="btn btn-danger" href="<?php base_url() ?>">Go Home</a>
            </div>
        </div>
    </div>

    <div style="text-align: center;position: fixed;left: 0;bottom: 0;width: 100%;background-color: red;color: white;text-align: center;">
        <strong>Copyright &copy; </strong>SIENTE.Corp <strong>2021</strong>
        Beta Version.
        <div class="d-none d-sm-inline-block">
            <b>Version</b> <?= application()['version'] ?>
        </div>
    </div>
</body>

</html>