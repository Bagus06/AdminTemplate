$(document).ready(function() {
    $('#table1').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "user/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#pekerjaan').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "pekerjaan/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-link').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "link/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-menu').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "menu/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-personal').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "personal/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-kesiswaan').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "kesiswaan/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-profile').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "profile/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-gelar').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "gelar/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-jurusan').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "jurusan/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-keluarga').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "keluarga/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-permission').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "permission/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})

$(document).ready(function() {
    $('#table-aktivitas').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "aktivitas/get_ajax",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [-1],
                "className": 'text-center'
            },
            {
                "targets": [0, -1],
                "orderable": false
            }
        ],
        // "order": []
    })
})