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
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets/vendor/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/date-picker/bootstrap-datepicker.min.css">
<!-- data table -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatable/dataTables.bootstrap4.min.css">
<!-- nestable -->
<?php if($this->uri->rsegments[1] == 'link'): ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nestable/custom.nestable.css">
<?php endif; ?>
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
.ui-datepicker-calendar {
    display: none;
}

.circular--portrait {
    position: relative;
    width: 80px;
    height: 100px;
    overflow: hidden;
}

.circular--portrait img {
    width: 100%;
    height: auto;
}
</style>