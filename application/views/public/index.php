<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('public/meta') ?>

<body class="hold-transition layout-top-nav">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url(application()['loader']) ?>" width="80">
            <p>Harap Tunggu...</p>
        </div>
    </div>
    <div class="wrapper">
        <?php $this->load->view('public/navbar') ?>

        <div class="content-wrapper"
            style="background-image: url(<?= base_url(application()['background']) ?>);background-size:cover">
            <?php
                $this->load->view($this->uri->rsegments[1] . '/' . $this->uri->rsegments[2]);
            ?>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; SIENTE.Corp 2021</strong>
            Beta Version.
            <div class="float-right d-none d-sm-inline">
                <b>Version</b> <?= application()['version'] ?>
            </div>
        </footer>
    </div>

    <?= $this->load->view('public/js') ?>
</body>

</html>