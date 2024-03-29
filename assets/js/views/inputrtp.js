$(document).ready(function () {
    const prapath = window.location.origin;
    const path = `${prapath}/simako/bidang/`;
    let tes = window.location.pathname.split("/").pop()

    //---tampil data
    let table_rtp = $('#table_rtp').DataTable({
        "ajax": `${path}getinputrtp/${tes}`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "uraian_pengendalian" },
            { "data": "hasil_evaluasi" },
            { "data": "uraian_rtp" },
            { "data": "target_waktu" },
            { "data": "pj" },
            { "data": "keterangan" },
            {
                "data": null,
                "defaultContent": `<a href="javascript:;" id='tes' class="badge badge-pill badge-warning item_edit"'>Edit</a>
                <a href="javascript:;" id='tes' class="badge badge-pill badge-danger item_delete"'>Delete</a>`
            }
        ]
    });

    // -----

    //--add data
    $('#btn_tambah').on('click', function () {
        let id_idev = $('#id_idev').val();
        let uraian_pengendalian = $('#uraian_pengendalian').val();
        let hasil_evaluasi = $('#hasil_evaluasi').val();
        let uraian_rtp = $('#uraian_rtp').val();
        let target_waktu = $('#target_waktu').val();
        let pj = $('#pj').val();
        let keterangan = $('#keterangan').val();

        $.ajax({
            type: "POST",
            url: `${path}savertp`,
            data: {
                id_idev: id_idev,
                uraian_pengendalian: uraian_pengendalian,
                hasil_evaluasi: hasil_evaluasi,
                uraian_rtp: uraian_rtp,
                target_waktu: target_waktu,
                pj: pj,
                keterangan: keterangan
            },
            dataType: "JSON",
            success: function (response) {
                Swal.fire('Data berhasil ditambahkan!', '', 'success');
                $('[name="uraian_pengendalian"]').val("");
                $('[name="hasil_evaluasi"]').val("");
                $('[name="uraian_rtp"]').val("");
                $('[name="target_waktu"]').val("");
                $('[name="pj"]').val("");
                $('[name="keterangan"]').val("");
                table_rtp.ajax.reload();
            }
        });

    });
    // -----

    //tampil data untuk edit data
    $('#table_rtp').on('click', '.item_edit', function () {
        let data = table_rtp.row($(this).parents('tr')).data();
        $('#btn_tambah').attr('class', 'btn btn-primary d-none');
        $('#btn_edit').attr('class', 'btn btn-warning');
        $('#btn_cancel').attr('class', 'btn btn-secondary');
        $.ajax({
            type: "POST",
            url: `${path}getinputrtp/${tes}`,
            dataType: "JSON",
            success: function (response) {
                let data = response.data['0'];
                console.log(data);
                let id_idev = $('#id_idev').val(data.id_rtp);
                let uraian_pengendalian = $('#uraian_pengendalian').val(data.uraian_pengendalian);
                let hasil_evaluasi = $('#hasil_evaluasi').val(data.hasil_evaluasi);
                let uraian_rtp = $('#uraian_rtp').val(data.uraian_rtp);
                let target_waktu = $('#target_waktu').val(data.target_waktu);
                let pj = $('#pj').val(data.pj);
                let keterangan = $('#keterangan').val(data.keterangan);

            }
        });
    });

    //---- end

    //tombol edit data ditekan
    $('#btn_edit').on('click', function () {
        let id_rtp = $('#id_idev').val();
        let uraian_pengendalian = $('#uraian_pengendalian').val();
        let hasil_evaluasi = $('#hasil_evaluasi').val();
        let uraian_rtp = $('#uraian_rtp').val();
        let target_waktu = $('#target_waktu').val();
        let pj = $('#pj').val();
        let keterangan = $('#keterangan').val();

        $.ajax({
            type: "POST",
            url: `${path}edit_rtp`,
            data: {
                id_rtp: id_rtp,
                uraian_pengendalian: uraian_pengendalian,
                hasil_evaluasi: hasil_evaluasi,
                uraian_rtp: uraian_rtp,
                target_waktu: target_waktu,
                pj: pj,
                keterangan: keterangan
            },
            dataType: "JSON",
            success: function (response) {
                Swal.fire('Data diupdate!', '', 'success')
                $('[name="uraian_pengendalian"]').val("");
                $('[name="hasil_evaluasi"]').val("");
                $('[name="uraian_rtp"]').val("");
                $('[name="target_waktu"]').val("");
                $('[name="pj"]').val("");
                $('[name="keterangan"]').val("");
                $('#btn_tambah').attr('class', 'btn btn-primary');
                $('#btn_edit').attr('class', 'btn btn-warning d-none');
                $('#btn_cancel').attr('class', 'btn btn-secondary d-none');


                table_rtp.ajax.reload();
            }
        });
    });

    //---end

    //btn-cancel ditekan 
    $('#btn_cancel').on('click', function () {
        $('[name="uraian_pengendalian"]').val("");
        $('[name="hasil_evaluasi"]').val("");
        $('[name="uraian_rtp"]').val("");
        $('[name="target_waktu"]').val("");
        $('[name="pj"]').val("");
        $('[name="keterangan"]').val("");
        $('#btn_tambah').attr('class', 'btn btn-primary');
        $('#btn_edit').attr('class', 'btn btn-warning d-none');
        $('#btn_cancel').attr('class', 'btn btn-secondary d-none');
    });
    //---end


    // -- Delete Data
    $('#table_rtp').on('click', '.item_delete', function () {
        //ambil data dari table
        var data = table_rtp.row($(this).parents('tr')).data();
        //ambil id_rtp
        let id_rtp = data['id_rtp'];
        //swal confirmasi hapus
        Swal.fire({
            title: 'Yakin Menghapus Data RTP?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                //jika klik hapus
                $.ajax({
                    type: "POST",
                    url: `${path}del_rtp`,
                    data: { id_rtp: id_rtp },
                    dataType: "JSON",
                    success: function (response) {
                        //swal info data dihapus
                        Swal.fire('Data Dihapus!', '', 'success')
                        table_rtp.ajax.reload();
                    }
                });
            }
        });

    });
    // -----


});