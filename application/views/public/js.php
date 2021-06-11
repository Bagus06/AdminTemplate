<!-- jQuery -->
<script src="<?= base_url('assets/vendor/') ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/js/') ?>adminlte.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/vendor/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/js/') ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/js/') ?>js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/alert.js"></script>
<!-- data table -->
<script src="<?php echo base_url(); ?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatable/dataTables.bootstrap4.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/vendor/date-picker/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function() {
    $('#front').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('front/get_ajax') ?>",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            // {
            //     "targets": [0, -1],
            //     "orderable": false
            // }
        ],
        // "order": []
    })
})
</script>