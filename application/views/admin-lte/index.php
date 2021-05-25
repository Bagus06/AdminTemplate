<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin-lte/meta') ?>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
    <!-- <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/images/logo/loading.gif') ?>" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div> -->
    <div id="alert" data-status="<?= @$data['status'] ?>" data-msg="<?= @$data['msg'] ?>"></div>
    <div class="wrapper">
        <?php $this->load->view('admin-lte/nav-menu') ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?php echo base_url(); ?>" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/images/logo/logo-fuhum.png" alt="Kalam Fuhum Logo"
                    class="brand-image">
                <span class="brand-text font-weight-light"><?= application()['name'] ?></span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php
                            $photo = 'default.png';
                            if (!empty(get_user()['photo'])) {
                                $photo = get_user()['photo'];
                            }
                        ?>
                        <img src="<?php echo base_url('assets/images/upload/user_profile/' . $photo); ?>"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?php $this->load->view('admin-lte/sidebar') ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= capital_letters($this->uri->rsegments[1]) ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url() . $this->uri->rsegments[1]; ?>"><?= capital_letters($this->uri->rsegments[1]); ?></a>
                                </li>
                                <li class="breadcrumb-item active"><?= capital_letters($this->uri->rsegments[2]) ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <?php
        $this->load->view($this->uri->rsegments[1] . '/' . $this->uri->rsegments[2]);
        ?>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <strong>Copyright &copy; </strong>SIENTE.Corp <strong>2021</strong>
                Beta Version.
                <b>Version</b> <?= application()['version'] ?>
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk keluarkan akun.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?php echo base_url('logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin-lte/js') ?>

</body>

</html>