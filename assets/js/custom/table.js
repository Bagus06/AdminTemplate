$(document).ready(function () {
    $('#table-user').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "user/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-right'
            },
            {
                "targets": [-1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function () {
    $('#table-link').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "link/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-right'
            },
            {
                "targets": [-1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function () {
    $('#table-menu').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "menu/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-right'
            },
            {
                "targets": [-1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function () {
    $('#table-permission').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "permission/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-right'
            },
            {
                "targets": [-2, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})