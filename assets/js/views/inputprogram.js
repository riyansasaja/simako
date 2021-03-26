$(document).ready(function() {

    //========UPDATE 26.03.21 ========

    let path = 'http://localhost/simako/opd/'

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
            "defaultContent": `<a href="javascript:;" id='edit' class="badge badge-pill badge-danger item_edit"'>Edit</a>
            <a href="javascript:;" id='delete' class="badge badge-pill badge-danger item_delete"'>Delete</a>`
        }
        ]
    } );
    // -----

    //======

    
    //add program
    $('#btn_simpan').on('click', function() {

        // tangkap hasil
        let tujuan_pd = $('#tujuan_pd').val();
        let sasaran_pd = $('#sasaran_pd').val();
        let program = $('#program').val();
        let kegiatan = $('#kegiatan').val();
        let output_kegiatan = $('#output_kegiatan').val();
        let tujuan_kegiatan = $('#tujuan_kegiatan').val();
        let sifat_kegiatan = $('#sifat_kegiatan').val();
        let unor_tujuan = $('#unor_tujuan').val();

        $.ajax({
            type: "POST",
            url: `${path}addkegiatan`,
            data: {
                tujuan_pd : tujuan_pd,
                sasaran_pd : sasaran_pd,
                program : program,
                kegiatan: kegiatan,
                output_kegiatan : output_kegiatan,
                tujuan_kegiatan : tujuan_kegiatan,
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

    // ---EditProgram
    
    // ------



});