$(document).ready(function () {
    const path = window.location.origin;
    const url = `${path}/simako/opd/`;

    //data table start
    let listriwayat = $('#table-listriwayat').DataTable({
        "ajax": `${url}get_listriwayat/`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "kondisi" },
            { "data": "kriteria" },
            {
                "data": null,
                "defaultContent": `<a href="javascript:;" id='view' class="badge badge-primary item_view"'>Detail</a> <br>
                <a href="javascript:;" id='edit' class="badge badge-warning item_edit"'>edit</a> <br>
                <a href="javascript:;" id='delete' class="badge badge-danger item_delete"'>Hapus</a>`
            }
        ],

        rowCallback: function (row, data, index) {
            if (data.tindak_lanjut == '2') {
                $('td', row).addClass('text-danger')
            }
        }
    });

    //--- end

    $('#table-listriwayat').on('click', '.item_view', function () {
        let data = listriwayat.row($(this).parents('tr')).data();
        $('#listRiwayatDetailModal').modal('show');
        let text = `<ul class="list-group">
        <li class="list-group-item">
            <h6 class="text-primary">Kondisi</h6>
            ${data.kondisi}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Kriteria</h6>
            ${data.kriteria}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Sebab Uraian</h6>
            ${data.sebab_uraian}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Akibat</h6>
            ${data.akibat}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Saran</h6>
            ${data.saran}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Sumber Data</h6>
            ${data.sumber_data}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Pernyataan Risiko</h6>
            ${data.pernyataan_resiko}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Sebab</h6>
            ${data.sebab}
        </li>
        <li class="list-group-item">
            <h6 class="text-primary">Dampak</h6>
            ${data.dampak}
    </ul>`

        $('#modal-isi').html(text);


    });


});