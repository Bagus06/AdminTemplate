<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= application()['name'] . ' | ' . application()['dsc'] ?></title>
    <link rel="icon" href="<?= base_url(application()['logo']) ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/toastr/toastr.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/date-picker/bootstrap-datepicker.min.css">
    <!-- data table -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatable/dataTables.bootstrap4.min.css">
    <style>
    .ui-datepicker-calendar {
        display: none;
    }

    .circular--portrait {
        position: relative;
        width: 250px;
        height: 250px;
        overflow: hidden;
        border-radius: 50%;
    }

    .circular--portrait img {
        width: 100%;
        height: auto;
    }
    </style>
</head>