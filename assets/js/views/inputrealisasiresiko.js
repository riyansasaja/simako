$(document).ready(function () {
    
    const prapath = window.location.origin;
    const path = `${prapath}/simako/bidang/`;

    let tb_show_risiko = $('#tb_show_risiko').DataTable( {
        "ajax": `${path}get_all_idev`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "kegiatan" },
            { "data": "resiko" },
            { "data": "sebab" },
            { "data": "dampak" },



            {
            "data": null,
            "render" : function (data, type, row) {
                if (row.realisasi_idev >=1) {
                    return `<a href="javascript:;" class="text-warning item_edit"'>Edit</i></a>`;
                } else {
                    return `<a href="javascript:;" class="text-primary item_edit"'>Input</i></a>`;
                }
            }
        }
        ]
    } );

    //input realisasi risiko
    $('#tb_show_risiko').on('click', '.item_edit', function(){
        var data = tb_show_risiko.row( $(this).parents('tr') ).data();
        let id_idev = data['id_idev'];
        $('#modal_realisasi_risiko').modal('show');
        let pilihan1 =`<option value = '${data['resiko']}' selected>${data['resiko']}</option><option value = 'others'>Lainnya ---</option>`;
        let pilihan2 =`<option value = '${data['sebab']}' selected>${data['sebab']}</option><option value = 'others'>Lainnya ---</option>`;
        let pilihan3 =`<option value = '${data['dampak']}' selected>${data['dampak']}</option><option value = 'others'>Lainnya ---</option>`;
        $('#id_idev').val(id_idev);
        $('#realisasi_risiko').html(pilihan1);
        $('#realisasi_sebab').html(pilihan2);
        $('#realisasi_dampak').html(pilihan3);
    });
    // -----

     // show realisasi_risiko
     let show_realisasi_risiko = $('#tb_show_realisasi_risiko').DataTable( {
        "ajax": `${path}get_all_idev_realisasi`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "kegiatan"},
            { "data": "realisasi_resiko" },
            { "data": "realisasi_sebab" },
            { "data": "realisasi_dampak" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='deleteprogram' class="text-danger item_delete"'>Delete</a>`
        }
        ]
    } );

    // ------

     //delete realisasi risiko
     $('#tb_show_realisasi_risiko').on('click', '.item_delete', function(){
        var data = show_realisasi_risiko.row( $(this).parents('tr') ).data();
        let id_idev = data['id_idev'];
        let hapus = confirm(`Yakin menghapus ???`);
        if (hapus) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}delete_realisasi_risiko`,
                data: {id_idev:id_idev},
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