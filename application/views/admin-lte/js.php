<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/custom/permission.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-knob/jquery.knob.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/alert.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js">
</script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/vendor/select2/js/select2.full.min.js"></script>
<!-- data table -->
<script src="<?php echo base_url(); ?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatable/dataTables.bootstrap4.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/vendor/date-picker/bootstrap-datepicker.min.js"></script>
<!-- Nestable -->
<?php if($this->uri->rsegments[1] == 'link'): ?>
<script src="<?php echo base_url(); ?>assets/vendor/nestable/jquery.nestable.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/nestable/custom.nestable.js"></script>
<?php endif; ?>
<script src="<?php echo base_url(); ?>assets/js/custom/table.js"></script>
<script>
$(document).ready(function() {
    $('.date-own').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });
});

// file upload view
// config/edit/logo
$('document').ready(function() {
    $("#loadLogo").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showLogo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
// config/edit/Background
$('document').ready(function() {
    $("#loadBg").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showBg').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
// config/edit/Loader
$('document').ready(function() {
    $("#loadLoader").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showLoader').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});

// file upload view end

//Initialize Select2 Elements
$('.select2').select2()

//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()

$(document).ready(function() {
    var mouse = 0;
    var mouse_latest = 0;
    $(document).mousemove(function(event) {
        mouse = event.pageX + event.pageY;
    });

    selesai();

    function selesai() {
        setTimeout(function() {
            update();
            selesai();
        }, 600000);
    }

    function update() {
        if (mouse == mouse_latest) {
            window.location.replace(BASE_URL + "user/lockscreen");
        } else {
            mouse_latest = mouse;
        }
    }
});
</script>