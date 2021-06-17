$(document).ready(function () {
    $('#table-user').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "user/data_main",
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
    $('#table-user-history').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "user/data_history?history=1",
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
            "url": BASE_URL + "link/data_main",
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

    $('#table-link-history').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "link/data_history?history=1",
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
            "url": BASE_URL + "permission/data_main",
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
    $('#table-permission-history').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "permission/data_history?history=1",
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