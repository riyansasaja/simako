$(document).ready(function () {

    //========UPDATE 26.03.21 ========
    const prapath = window.location.origin;
    const path = `${prapath}/simako/opd/`;
    //---Tampil data table kegiatan
    let showkegiatan = $('#showkegiatan').DataTable({
        "ajax": `${path}getkegiatan`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "program" },
            { "data": "kegiatan" },
            {
                "data": null,
                "defaultContent": `<a href="javascript:;" id='editkegiatan' class="text-danger item_edit"'><i class="fas fa-edit"></i></a>
            <a href="javascript:;" id='deletekegiatan' class="text-danger item_delete"'><i class="fas fa-trash"></i></a>`
            }
        ]
    });
    // -----

    //========UPDATE 26.03.21 ========
    //---Tampil data table program
    let showprogram = $('#showprogram').DataTable({
        "ajax": `${path}getprogram`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nama_program" },
            { "data": "outcome_program" },
            {
                "data": null,
                "defaultContent": `<a href="javascript:;" class="text-danger item_edit"'><i class="fas fa-edit"></i></a>
                <a href="javascript:;" id='deleteprogram' class="text-danger item_delete"'><i class="fas fa-trash"></i></a>`
            }
        ]
    });
    // -----


    //======


    //add program
    $('#btn_simpan1').on('click', function () {

        // tangkap hasil
        let program = $('#program1').val();
        let outcome = $('#outcomeprogram1').val();

        $.ajax({
            type: "POST",
            url: `${path}addprogram`,
            data: {
                program: program,
                outcome: outcome
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                Swal.fire('Berhasil!', 'Data berhasil diinput', 'success')
                $('[name="program1"]').val("");
                $('[name="outcomeprogram1"]').val("");
                $('#addprogramModal').modal('hide');
                setTimeout(
                    function () {
                        window.location.href = window.location.href
                    }, 1550);
                // window.location.href = window.location.href;
                // showprogram.ajax.reload();
            }
        });

    });
    // =====

    // ---Start get Edit program
    $('#showprogram').on('click', '.item_edit', function () {
        var data = showprogram.row($(this).parents('tr')).data();
        let id = data['id'];
        $('#editprogramModal').modal('show');
        $('[name="id"]').val(id);
        $('[name="nama_program"]').val(data['nama_program']);
        $('[name="outcome_program"]').val(data['outcome_program']);
    });
    // ------

    //--- Start Update program
    $('#btn_update').on('click', function () {

        let id = $('#id').val();
        let nama_program = $('#edit_nama_program').val();
        let outcome_program = $('#editoutcomeprog').val();

        $.ajax({
            type: "POST",
            url: `${path}updateprogram`,
            data: {
                id: id,
                nama_program: nama_program,
                outcome_program: outcome_program
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                $('[name="nama_program"]').val('');
                $('[name="outcome_program"]').val('');
                Swal.fire('Berhasil!', 'Data berhasil diupdate', 'success')
                $('[name="program1"]').val("");
                $('[name="outcomeprogram1"]').val("");
                $('#addprogramModal').modal('hide');
                setTimeout(
                    function () {
                        window.location.href = window.location.href
                    }, 1550);
            }
        });
        return false;

    });
    // -----

    //start delete program
    $('#showprogram').on('click', '.item_delete', function () {
        var data = showprogram.row($(this).parents('tr')).data();
        let id = data['id'];
        //jalankan swal
        Swal.fire({
            title: 'Yakin Menghapus?',
            text: "Klik tombol Hapus jika ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                //lakukan penghapusan
                $.ajax({
                    type: "POST",
                    url: `${path}deleteprogram`,
                    data: { id: id },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data telah terhapus',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(
                            function () {
                                window.location.href = window.location.href
                            }, 1550);

                    }
                });

            }
        });

    });


    //===============================================================================

    //add kegiatan
    $('#btn_simpan').on('click', function () {

        // tangkap hasil
        let program = $('#program').val();
        let outcomeprogram = $('#outcomeProgram').val();
        let kegiatan = $('#kegiatan').val();
        let sifat_kegiatan = $('#sifat_kegiatan').val();
        let unor_tujuan = $('#unor_tujuan').val();

        $.ajax({
            type: "POST",
            url: `${path}addkegiatan`,
            data: {
                program: program,
                outcomeprogram: outcomeprogram,
                kegiatan: kegiatan,
                sifat_kegiatan: sifat_kegiatan,
                unor_tujuan: unor_tujuan
            },
            dataType: "JSON",
            success: function (response) {
                Swal.fire('Data Berhasil diinput!', '', 'success');
                $('[name="kegiatan"]').val("");
                $('#addkegiatanModal').modal('hide');
                showkegiatan.ajax.reload();
            }
        });

    });
    // ------


    //---start delete kegiatan
    $('#showkegiatan').on('click', '.item_delete', function () {
        var data = showkegiatan.row($(this).parents('tr')).data();
        let id = data['id_tk'];

        Swal.fire({
            title: 'Yakin Menghapus?',
            text: data.kegiatan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                //lakukan penghapusan
                $.ajax({
                    type: "POST",
                    url: `${path}deletekegiatan`,
                    data: { id: id },
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        Swal.fire('Data terhapus', '', 'success');
                        showkegiatan.ajax.reload();
                    }
                });
            }
        });
    });

    //---------


    // ---Start get Edit Kegiatan
    $('#showkegiatan').on('click', '.item_edit', function () {
        var data = showkegiatan.row($(this).parents('tr')).data();
        let id = data['id_tk'];
        $('#editkegiatanModal').modal('show');
        $('[name="id_tk"]').val(id);
        $('[name="programedit"]').val(data['program']);
        $('[name="kegiatan"]').val(data['kegiatan']);
        $('[name="sifat_kegiatan"]').val(data['id_sk']);
        $('[name="unor_tujuan"]').val(data['kode_unor']);
    });
    // ------

    //--- Start Update kegiatan
    $('#btn_update_kegiatan').on('click', function () {

        let id_tk = $('#id_tk').val();
        let kegiatan = $('#edit_kegiatan').val();
        let id_sk = $('#edit_sifat_kegiatan').val();
        let kode_unor = $('#edit_unor_tujuan').val();

        $.ajax({
            type: "POST",
            url: `${path}updatekegiatan`,
            data: {
                id_tk: id_tk,
                kegiatan: kegiatan,
                id_sk: id_sk,
                kode_unor: kode_unor,
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                Swal.fire('Data terupdate', '', 'success');
                $('[name="kegiatan"]').val('');
                $('#editkegiatanModal').modal('hide');
                showkegiatan.ajax.reload();
            }
        });
        return false;

    });
    // -----



});