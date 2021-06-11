<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-blue">
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a title="Start Center" href="<?= base_url() . 'dashboard/main'; ?>" class="nav-link"><i
                    class="fas fa-home"></i></a>
        </li>
        <?php $this->load->view('admin-lte/menu') ?>
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#"
                class="nav-link"><?= capital_letters($this->uri->rsegments[1]) . ' ' . capital_letters($this->uri->rsegments[2]) ?></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a title="Sign Out" href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                <?= @get_profile()['name'] ?>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a title="Sign Out" href="<?= base_url() . 'logout' ?>" class="nav-link">
                <i class="fas fa-power-off fa-lg"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <img src="<?php echo base_url(application()['logo']); ?>" alt="Logo" style="max-width:40px;width: 40px;">
        </li>
    </ul>
</nav>