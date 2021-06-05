$(document).ready(function () {
    const prapath = window.location.origin;
    const path = `${prapath}/simako/bidang/`;

    let show_rtp = $('#tb_show_rtp').DataTable( {
        "ajax": `${path}get_all_rtp`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "resiko" },
            { "data": "uraian_rtp" },
            { "data": "target_waktu" },
            { "data": "pj" },



            {
            "data": null,
            "render" : function (data, type, row) {
                if (row.is_realisasi >=1) {
                    return `<a href="javascript:;" class="text-warning item_edit"'>Edit</i></a>`;
                } else {
                    return `<a href="javascript:;" class="text-primary item_edit"'>Input</i></a>`;
                }
            }
        }
        ]
    } );

    //input realisasi rtp
    $('#tb_show_rtp').on('click', '.item_edit', function(){
        var data = show_rtp.row( $(this).parents('tr') ).data();
        let id_rtp = data['id_rtp'];
        $('#modal_realisasi_rtp').modal('show');
        let pilihan1 =`<option value = '${data['uraian_rtp']}' selected>${data['uraian_rtp']}</option><option value = 'others'>Lainnya ---</option>`;
        let pilihan2 =`<option value = '${data['target_waktu']}' selected>${data['target_waktu']}</option><option value = 'others'>Lainnya ---</option>`;
        let pilihan3 =`<option value = '${data['pj']}' selected>${data['pj']}</option><option value = 'others'>Lainnya ---</option>`;
        $('#id_rtp').val(id_rtp);
        $('#realisasi_uraian_rtp').html(pilihan1);
        $('#realisasi_target_waktu').html(pilihan2);
        $('#realisasi_pj').html(pilihan3);
    });
    // -----

     // show realisasi_rtp
     let show_realisasi_rtp = $('#tb_show_realisasi_rtp').DataTable( {
        "ajax": `${path}get_all_realisasi_rtp`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "resiko"},
            { "data": "realisasi_uraian" },
            { "data": "realisasi_target_waktu" },
            { "data": "realisasi_pj" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='deleteprogram' class="text-danger item_delete"'>Delete</a>`
        }
        ]
    } );

    // ------

         //delete realisasi rtp
         $('#tb_show_realisasi_rtp').on('click', '.item_delete', function(){
            var data = show_realisasi_rtp.row( $(this).parents('tr') ).data();
            let id_rtp = data['id_rtp'];
            let hapus = confirm(`Yakin menghapus ???`);
            if (hapus) {
                //lakukan penghapusan
                $.ajax({
                    type: "POST",
                    url: `${path}delete_realisasi_rtp`,
                    data: {id_rtp:id_rtp},
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