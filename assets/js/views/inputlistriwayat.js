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


    //item view
    $('#table-listriwayat').on('click', '.item_view', function () {
        let data = listriwayat.row($(this).parents('tr')).data();
        $('#listRiwayatDetailModal').modal('show');
        let text = `<ul class="list-group">
        <li class="list-group-item">
            <h5 class="text-primary">Kondisi</h5>
            ${data.kondisi}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Kriteria</h5>
            ${data.kriteria}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Sebab Uraian</h5>
            ${data.sebab_uraian}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Akibat</h5>
            ${data.akibat}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Saran</h5>
            ${data.saran}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Sumber Data</h5>
            ${data.sumber_data}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Pernyataan Risiko</h5>
            ${data.pernyataan_resiko}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Sebab</h5>
            ${data.sebab}
        </li>
        <li class="list-group-item">
            <h5 class="text-primary">Dampak</h5>
            ${data.dampak}
    </ul>`

        $('#modal-isi').html(text);


    });

    //---end

    //item edit

    $('#table-listriwayat').on('click', '.item_edit', function () {
        const data = listriwayat.row($(this).parents('tr')).data();
        const id = data.id;
        console.log(id);
        window.location.href = `${url}editlistriwayat/${id}`;

    });
    //---end

    //item delete
    $('#table-listriwayat').on('click', '.item_delete', function () {
        let data = listriwayat.row($(this).parents('tr')).data();
        const id = data.id;
        console.log(id);
        Swal.fire({
            title: 'Yakin Menghapus?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Hapus`,
            denyButtonText: `Tidak`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: `${url}delete_listriwayat/`,
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                });
                Swal.fire('Data Dihapus!', '', 'success')
                listriwayat.ajax.reload();
            } else if (result.isDenied) {
                Swal.fire('Data tidak dihapus', '', 'info')
            }
        })
        return;


    });
    //---end

    //script untuk tampilan flash data
    const flashdata = $('.flash-data').data('flashdata');
    //jika ada flash data
    if (flashdata) {
        //tampilkan swal
        Swal.fire({
            icon: 'success',
            title: flashdata,
            showConfirmButton: false,
            timer: 2000
        })
    }

});