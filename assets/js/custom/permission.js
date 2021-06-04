$('.master').on('click', function () {
    var id = $(this).data('id');
    var data_child = $(this).data('child');
    id = parseInt(id);
    if ($('#master_' + id).is(":checked")) {
        for (let i = 0; i < data_child.length; i++) {
            $('#child_' + data_child[i]).prop('checked', true);
        }
    } else {
        for (let i = 0; i < data_child.length; i++) {
            $('#child_' + data_child[i]).prop('checked', false);
        }
    }
});

$('.child').on('click', function () {
    var id = $(this).val();
    var id_master = $(this).data('master');
    id = parseInt(id);
    if ($('#child_' + id).is(":checked")) {
        $('#master_' + id_master).prop('checked', true);
    }
});