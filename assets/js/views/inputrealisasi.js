$(document).ready(function () {
    const prapath = window.location.origin;
    const path = `${prapath}/simako/bidang/`;

    let show_kegiatan = $('#tb_show_kegiatan').DataTable( {
        "ajax": `${path}geTK`,
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
            "render" : function (data, type, row) {
                if (row.realisasi >=1) {
                    return `<a href="javascript:;" class="text-warning item_edit"'>Edit</i></a>`;
                } else {
                    return `<a href="javascript:;" class="text-primary item_edit"'>Input</i></a>`;
                }
            }
        }
        ]
    } );

    // ---Start get Edit kegiatan
    $('#tb_show_kegiatan').on('click', '.item_edit', function(){
        var data = show_kegiatan.row( $(this).parents('tr') ).data();
        let id_tk = data['id_tk'];
        $('#modal_realisasi_kegiatan').modal('show');
       $('[name="id_tk"]').val(id_tk);
       let option1 =`<option value = '${data['output']}' selected>${data['output']}</option><option value = 'others'>Lainnya ---</option`;
       let option2 =`<option value = '${data['tujuan']}' selected>${data['tujuan']}</option><option value = 'others'>Lainnya ---</option`;
       $('#realisasi_kegiatan').html(option1);
       $('#realisasi_tujuan_kegiatan').html(option2);
    });
    // ------

    // show realisasi_kegiatan
    let show_realisasi_kegiatan = $('#show_realisasi_kegiatan').DataTable( {
        "ajax": `${path}get_realisasi_tk`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "kegiatan"},
            { "data": "realisasi_output_kegiatan" },
            { "data": "realisasi_tujuan_kegiatan" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='deleteprogram' class="text-danger item_delete"'>Delete</a>`
        }
        ]
    } );

    // ------

    //delete realisasi
    $('#show_realisasi_kegiatan').on('click', '.item_delete', function(){
        var data = show_realisasi_kegiatan.row( $(this).parents('tr') ).data();
        let id_tk = data['id_tk'];
        let hapus = confirm(`Yakin menghapus ???`);
        if (hapus) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}delete_realisasi_tk`,
                data: {id_tk:id_tk},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    window.location.href = window.location.href;
                }
            });
        }//endif
        
    });
    // ----


});





