$(document).ready(function () {



    const prapath = window.location.origin;
    const path = `${prapath}/simako/dashboard/`;

    let monitoring_inputan_program = $('#monitoring_inputan_program').DataTable({
        "ajax": `${path}get_monitoring_inputan_program`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "name" },
            { "data": "program" },
            { "data": "outcome" },
            { "data": "kegiatan" },
            { "data": "output" },
            { "data": "tujuan" }
        ]
    });


    let monitoring_inputan_risiko = $('#monitoring_inputan_risiko').DataTable({
        "ajax": `${path}get_monitoring_inputan_risiko`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "name" },
            { "data": "program" },
            { "data": "kegiatan" },
            { "data": "resiko" },
            { "data": "sebab" },
            { "data": "dampak" }
        ]
    });

    let monitoring_inputan_rtp = $('#monitoring_inputan_rtp').DataTable({
        "ajax": `${path}get_monitoring_inputan_rtp`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "name" },
            { "data": "kegiatan" },
            { "data": "resiko" },
            { "data": "uraian_rtp" },
            { "data": "target_waktu" },
            { "data": "pj" }
        ]
    });

    //panggil ajax per 6detik
    setInterval(function () { monitoring_inputan_program.ajax.reload() }, 6000);
    setInterval(function () { monitoring_inputan_risiko.ajax.reload() }, 6000);


    //menampilkan row berdasarkan pilihan

    $('select').on('change', function () {
        $('.show').attr('class', 'show d-none');
        $(`#${this.value}`).attr('class', 'show');
        if (this.value == 'all') {
            $('.show').attr('class', 'show');
        }
    });
    //--end

});