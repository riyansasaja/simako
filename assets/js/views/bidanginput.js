$(document).ready(function () {
    let path = 'http://localhost/simako/bidang/'
    

    // ---start tampil data
    let tabletk = $('#tabletk').DataTable(
        {

        "ajax": `${path}getk`,
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
            "defaultContent": `<a href="javascript:;" id='edit' class="text-primary item_edit"'><i class="fas fa-keyboard"></i> Input</a>`
        }
        ]

        });
        //------

        //--ambil data untuk edit
        $('#tabletk').on('click', '.item_edit', function(){
            var data = tabletk.row( $(this).parents('tr') ).data();
            let id = data['id_tk'];
            $('#editModal').modal('show');
            $('[name="id_tk"]').val(id);
            $('[name="program"]').val(data['program']);
            $('[name="kegiatan"]').val(data['kegiatan']);
            $('[name="outcome"]').val(data['outcome']);
            $('[name="output"]').val(data['output']);
            $('[name="tujuan_kegiatan"]').val(data['tujuan']);
        });
    // ------

    //--Update
    $('#btn_update').on('click', function () {
        // console.log('tombol ditekan');
        let id_tk = $('#id_tk').val();
        let outcome = $('#outcome').val();
        let output = $('#output').val();
        let tujuan_kegiatan = $('#tujuan_kegiatan').val();

        $.ajax({
            type: "POST",
            url: `${path}updatetk`,
            data: {
                id_tk: id_tk,
                outcome: outcome,
                output: output,
                tujuan_kegiatan: tujuan_kegiatan
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                $('[name="id_tk"]').val('');
                $('[name="program"]').val('');
                $('[name="kegiatan"]').val('');
                $('[name="outcome"]').val('');
                $('[name="output"]').val('');
                $('[name="tujuan_kegiatan"]').val('');
                alert('Data Berhasil Diinput !');
                $('#editModal').modal('hide');
                tabletk.ajax.reload();
                }
        });
        return false;

    });
    // -----


});