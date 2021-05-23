$(document).ready(function() {

    //========UPDATE 26.03.21 ========
    const prapath = window.location.origin;
    const path = `${prapath}/simako/opd/`;
    //---Tampil data table kegiatan
    let showkegiatan = $('#showkegiatan').DataTable( {
        "ajax": `${path}getkegiatan`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "program" },
            { "data": "kegiatan" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='editkegiatan' class="text-danger item_edit"'><i class="fas fa-edit"></i></a>
            <a href="javascript:;" id='deletekegiatan' class="text-danger item_delete"'><i class="fas fa-trash"></i></a>`
        }
        ]
    } );
    // -----

        //========UPDATE 26.03.21 ========
        //---Tampil data table program
        let showprogram = $('#showprogram').DataTable( {
            "ajax": `${path}getprogram`,
            "columns": [
                { 
                    "data": null,"sortable": false, 
                     render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;}  
                },
                { "data": "nama_program" },
                { "data": "outcome_program" },
                {
                "data": null,
                "defaultContent": `<a href="javascript:;" id='editprogram' class="text-danger item_edit"'><i class="fas fa-edit"></i></a>
                <a href="javascript:;" id='deleteprogram' class="text-danger item_delete"'><i class="fas fa-trash"></i></a>`
            }
            ]
        } );
        // -----


    //======


    //add program
    $('#btn_simpan1').on('click', function() {

        // tangkap hasil
        let program = $('#program1').val();
        let outcome = $('#outcomeprogram1').val();

        $.ajax({
            type: "POST",
            url: `${path}addprogram`,
            data: {
                program : program,
                outcome: outcome
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                alert('Data Berhasil di Input')
                $('[name="program1"]').val("");
                $('[name="outcomeprogram1"]').val("");
                $('#addprogramModal').modal('hide');
                showprogram.ajax.reload();
            }
        });

    });
    // =====

    
    //add kegiatan
    $('#btn_simpan').on('click', function() {

        // tangkap hasil
        let program = $('#program').val();
        let kegiatan = $('#kegiatan').val();
        let sifat_kegiatan = $('#sifat_kegiatan').val();
        let unor_tujuan = $('#unor_tujuan').val();

        $.ajax({
            type: "POST",
            url: `${path}addkegiatan`,
            data: {
                program : program,
                kegiatan: kegiatan,
                sifat_kegiatan : sifat_kegiatan,
                unor_tujuan : unor_tujuan
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                alert('Data Berhasil di Input')
                $('[name="tujuan_pd"]').val("");
                $('[name="sasaran_pd"]').val("");
                $('[name="program"]').val("");
                $('[name="kegiatan"]').val("");
                $('[name="output_kegiatan"]').val("");
                $('[name="tujuan_kegiatan"]').val("");
                $('[name="sifat_kegiatan"]').val("");
                $('[name="unor_tujuan"]').val("");
                $('#addModal').modal('hide');
                showkegiatan.ajax.reload();
            }
        });

    });
    // ------

    
    //---start delete kegiatan
    $('#showkegiatan').on('click', '.item_delete', function(){
        var data = showkegiatan.row( $(this).parents('tr') ).data();
        let id = data['id_tk'];
        let hapus = confirm(`Yakin menghapus ${data['program']}???`);
        if (hapus) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}deletekegiatan`,
                data: {id:id},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    showkegiatan.ajax.reload();
                }
            });
        }//endif
        
    });

    //---------


    // ---Start get Edit Kegiatan
    $('#showkegiatan').on('click', '.item_edit', function(){
        var data = showkegiatan.row( $(this).parents('tr') ).data();
        let id = data['id_tk'];
        $('#editkegiatanModal').modal('show');
       $('[name="id_tk"]').val(id);
        $('[name="program"]').val(data['program']);
        $('[name="kegiatan"]').val(data['kegiatan']);
        $('[name="sifat_kegiatan"]').val(data['id_sk']);
        $('[name="unor_tujuan"]').val(data['kode_unor']);
    });
    // ------

    //--- Start Update Program
    $('#btn_update').on('click', function () {
      
        let id_tk = $('#id_tk').val();
        let program = $('#edit_program').val();
        let kegiatan = $('#edit_kegiatan').val();
        let id_sk = $('#edit_sifat_kegiatan').val();
        let kode_unor = $('#edit_unor_tujuan').val();

        $.ajax({
            type: "POST",
            url: `${path}updatekegiatan`,
            data: {
                id_tk: id_tk,
                program: program,
                kegiatan: kegiatan,
                id_sk: id_sk,
                kode_unor: kode_unor,
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                $('[name="program"]').val('');
                $('[name="kegiatan"]').val('');
                alert('Data Berhasil Dirubah !');
                $('#editModal').modal('hide');
                $('#editkegiatanModal').modal('hide');
                showkegiatan.ajax.reload();
                }
        });
        return false;

    });
    // -----



});