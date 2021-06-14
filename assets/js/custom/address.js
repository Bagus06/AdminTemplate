$(document).ready(function () {
    //untuk memanggil plugin select2
    $('#provincePob').select2({
        placeholder: 'Select province',
        language: "id"
    });
    $('#regencyPob').select2({
        placeholder: 'Select regency',
        language: "id"
    });
    $('#districtsPob').select2({
        placeholder: 'Select districts',
        language: "id"
    });
    $('#villagePob').select2({
        placeholder: 'Select village',
        language: "id"
    });

    var id_regencyPob = $('#getRegencyPob').val();
    if (id_regencyPob != 0) {
        getAjaxProvincePob();
        getAjaxKotaPob();
        getAjaxKecamatanPob();
    }

    //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
    $("#provincePob").change(getAjaxProvincePob);

    function getAjaxProvincePob() {
        $("img#load1Pob").show();
        if ($('#getProvincePob').val() != '') {
            var id_provinces = $('#getProvincePob').val();
        } else {
            var id_provinces = $(this).val();
        }
        var id_regencyPob = $('#getRegencyPob').val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=regencyPob",
            data: {
                id_provinces: id_provinces,
                id_regencyPob: id_regencyPob
            },
            success: function (msg) {
                $("select#regencyPob").html(msg);
                $("img#load1Pob").hide();
                getAjaxKotaPob();
            }
        });
    }

    $("#regencyPob").change(getAjaxKotaPob);

    function getAjaxKotaPob() {
        $("img#load2Pob").show();
        var id_regencies = $("#regencyPob").val();
        var id_districtsPob = $("#getDistrictsPob").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=districtsPob",
            data: {
                id_regencies: id_regencies,
                id_districtsPob: id_districtsPob
            },
            success: function (msg) {
                $("select#districtsPob").html(msg);
                $("img#load2Pob").hide();
                getAjaxKecamatanPob();
            }
        });
    }

    $("#districtsPob").change(getAjaxKecamatanPob);

    function getAjaxKecamatanPob() {
        $("img#load3Pob").show();
        var id_district = $("#districtsPob").val();
        var id_villagePob = $("#getVillagePob").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=villagePob",
            data: {
                id_district: id_district,
                id_villagePob: id_villagePob
            },
            success: function (msg) {
                $("select#villagePob").html(msg);
                $("img#load3Pob").hide();
            }
        });
    }
});

$(document).ready(function () {
    //untuk memanggil plugin select2
    $('#provinceResidence').select2({
        placeholder: 'Select province',
        language: "id"
    });
    $('#regencyResidence').select2({
        placeholder: 'Select regency',
        language: "id"
    });
    $('#districtsResidence').select2({
        placeholder: 'Select districts',
        language: "id"
    });
    $('#villageResidence').select2({
        placeholder: 'Select village',
        language: "id"
    });

    var id_regencyResidence = $('#getRegencyResidence').val();
    if (id_regencyResidence != 0) {
        getAjaxProvinceResidence();
        getAjaxKotaResidence();
        getAjaxKecamatanResidence();
    }

    //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
    $("#provinceResidence").change(getAjaxProvinceResidence);

    function getAjaxProvinceResidence() {
        $("img#load1Residence").show();
        if ($('#getProvinceResidence').val() != '') {
            var id_provinces = $('#getProvinceResidence').val();
        } else {
            var id_provinces = $(this).val();
        }
        var id_regencyResidence = $('#getRegencyResidence').val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=regencyResidence",
            data: {
                id_provinces: id_provinces,
                id_regencyResidence: id_regencyResidence
            },
            success: function (msg) {
                $("select#regencyResidence").html(msg);
                $("img#load1Residence").hide();
                getAjaxKotaResidence();
            }
        });
    }

    $("#regencyResidence").change(getAjaxKotaResidence);

    function getAjaxKotaResidence() {
        $("img#load2Residence").show();
        var id_regencies = $("#regencyResidence").val();
        var id_districtsResidence = $("#getDistrictsResidence").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=districtsResidence",
            data: {
                id_regencies: id_regencies,
                id_districtsResidence: id_districtsResidence
            },
            success: function (msg) {
                $("select#districtsResidence").html(msg);
                $("img#load2Residence").hide();
                getAjaxKecamatanResidence();
            }
        });
    }

    $("#districtsResidence").change(getAjaxKecamatanResidence);

    function getAjaxKecamatanResidence() {
        $("img#load3Residence").show();
        var id_district = $("#districtsResidence").val();
        var id_villageResidence = $("#getVillageResidence").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: BASE_URL + "user/address?tipe=villageResidence",
            data: {
                id_district: id_district,
                id_villageResidence: id_villageResidence
            },
            success: function (msg) {
                $("select#villageResidence").html(msg);
                $("img#load3Residence").hide();
            }
        });
    }
});