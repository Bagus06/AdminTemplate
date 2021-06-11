<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin-lte/meta') ?>
</head>

<body id="body" class="hold-transition sidebar-collapse layout-navbar-fixed">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url(application()['loader']) ?>" width="80">
        </div>
    </div>
    <div id="alert" data-status="<?= @$data['status'] ?>" data-msg="<?= @$data['msg'] ?>"></div>
    <div class="wrapper">
        <?php $this->load->view('admin-lte/nav-menu') ?>
        <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?php echo base_url(); ?>" class="brand-link">
                <img src="<?php echo base_url(application()['logo']); ?>" alt="Logo" class="brand-image">
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
        </aside> -->
        <div class="content-wrapper">
            <div class="content-header">
            </div>
            <section class="content">
                <div class="container-fluid">
                    <?php $this->load->view($this->uri->rsegments[1] . '/' . $this->uri->rsegments[2]);?>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> <?= application()['version'] ?>
                Beta Version.
            </div>
            <strong>Copyright &copy; </strong>SIENTE.Corp <strong>2021</strong>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <?php $this->load->view('admin-lte/js') ?>

</body>

</html>