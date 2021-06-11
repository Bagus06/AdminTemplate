$(document).ready(function () {
    //untuk memanggil plugin select2
    $('#province').select2({
        placeholder: 'Select province',
        language: "id"
    });
    $('#regency').select2({
        placeholder: 'Select regency',
        language: "id"
    });
    $('#districts').select2({
        placeholder: 'Select districts',
        language: "id"
    });
    $('#village').select2({
        placeholder: 'Select village',
        language: "id"
    });

    var id_regency = $('#getRegency').val();
    if (id_regency != 0) {
        getAjaxProvince();
        getAjaxKota();
        getAjaxKecamatan();
    }

    //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
    $("#province").change(getAjaxProvince);

    function getAjaxProvince() {
        $("img#load1").show();
        if ($('#getProvince').val() != '') {
            var id_provinces = $('#getProvince').val();
        } else {
            var id_provinces = $(this).val();
        }
        var id_regency = $('#getRegency').val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=regency",
            data: {
                id_provinces: id_provinces,
                id_regency: id_regency
            },
            success: function (msg) {
                $("select#regency").html(msg);
                $("img#load1").hide();
                getAjaxKota();
            }
        });
    }

    $("#regency").change(getAjaxKota);

    function getAjaxKota() {
        $("img#load2").show();
        var id_regencies = $("#regency").val();
        var id_districts = $("#getDistricts").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=districts",
            data: {
                id_regencies: id_regencies,
                id_districts: id_districts
            },
            success: function (msg) {
                $("select#districts").html(msg);
                $("img#load2").hide();
                getAjaxKecamatan();
            }
        });
    }

    $("#districts").change(getAjaxKecamatan);

    function getAjaxKecamatan() {
        $("img#load3").show();
        var id_district = $("#districts").val();
        var id_village = $("#getVillage").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=village",
            data: {
                id_district: id_district,
                id_village: id_village
            },
            success: function (msg) {
                $("select#village").html(msg);
                $("img#load3").hide();
            }
        });
    }
});