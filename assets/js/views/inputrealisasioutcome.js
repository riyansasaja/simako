$(document).ready(function () {
    const prapath = window.location.origin;
    const path = `${prapath}/simako/opd/`;

    let show_program = $('#show_program').DataTable( {
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

      // ---Start get Edit program
      $('#show_program').on('click', '.item_edit', function(){
        var data = show_program.row( $(this).parents('tr') ).data();
        let id = data['id'];
        $('#modal_realisasi_outcome').modal('show');
       $('[name="id_program"]').val(id);
       let text1 =`<option value = '${data['outcome_program']}' selected>${data['outcome_program']}</option><option value = 'others'>Lainnya ---</option`;
       $('#realisasi_outcome').html(text1);
    });
    // ------

    // show realisasi_outcome
    let show_realisasi_outcome = $('#show_realisasi_outcome').DataTable( {
        "ajax": `${path}get_realisasi_program`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { 
                "data": "outcome_program"
            },
            { "data": "realisasi_outcome_program" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='deleteprogram' class="text-danger item_delete"'>Delete</a>`
        }
        ]
    } );

    // ------

    //delete realisasi
    $('#show_realisasi_outcome').on('click', '.item_delete', function(){
        var data = show_realisasi_outcome.row( $(this).parents('tr') ).data();
        let id = data['id'];
        let hapus = confirm(`Yakin menghapus ${data['nama_program']}???`);
        if (hapus) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}deleterealisasiprogram`,
                data: {id:id},
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