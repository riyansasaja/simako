$(document).ready(function() {

    //========UPDATE 26.03.21 ========
    const prapath = window.location.origin;
    const path = `${prapath}/simako/opd`;
    //---Tampil data table
    let showprogram = $('#showprogram').DataTable( {
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
            "defaultContent": `<a href="javascript:;" id='edit' class="text-danger item_edit"'><i class="fas fa-edit"></i></a>
            <a href="javascript:;" id='delete' class="text-danger item_delete"'><i class="fas fa-trash"></i></a>`
        }
        ]
    } );
    // -----

    //======

    
    //add program
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
                showprogram.ajax.reload();
            }
        });

    });
    // ------

    
    //---start delete Program
    $('#showprogram').on('click', '.item_delete', function(){
        var data = showprogram.row( $(this).parents('tr') ).data();
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
                    showprogram.ajax.reload();
                }
            });
        }//endif
        
    });

    //---------


    // ---Start get Edit Program
    $('#showprogram').on('click', '.item_edit', function(){
        var data = showprogram.row( $(this).parents('tr') ).data();
        let id = data['id_tk'];
        $('#editModal').modal('show');
       $('[name="id_tk"]').val(id);
        $('[name="program"]').val(data['program']);
        $('[name="kegiatan"]').val(data['kegiatan']);
        $('[name="sifat_kegiatan"]').val(data['id_sk']);
        $('[name="unor_tujuan"]').val(data['kode_unor']);
    });
    // ------

    //--- Start Update Program
    $('#btn_update').on('click', function () {
        console.log('tombol ditekan');
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
                showprogram.ajax.reload();
                }
        });
        return false;

    });
    // -----



});