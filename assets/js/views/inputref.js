$(document).ready(function () {
    
    let path = 'http://localhost/simako/inspektorat/';

    // tampil data to datatable
    let table = $('#example').DataTable( {
        "ajax": `${path}getdata`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "resiko" },
            { "data": "sebab" },
            { "data": "dampak" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='tes' class="badge badge-pill badge-success item_edit"'>Edit</a>
            <a href="javascript:;" id='tes' class="badge badge-pill badge-danger item_delete"'>Delete</a>`
        }
        ]
    } );


    //add data

    $('#btn-save').on('click', function () {
        let sifat_kegiatan = $('#sifat_kegiatan').val();
        let resiko = $('#resiko').val();
        let sebab = $('#sebab').val();
        let dampak = $('#dampak').val();

        $.ajax({
            type: "POST",
            url: `${path}adddata`,
            data: {
                sifat_kegiatan : sifat_kegiatan,
                resiko : resiko,
                sebab : sebab,
                dampak : dampak
            },
            dataType: "JSON",
            success: function (response) {
                alert('Data Berhasil Ditambahkan');
                 $('#resiko').val("");
                 $('#sebab').val("");
                 $('#dampak').val("");
                 table.ajax.reload();
            }
        });
        
    });

    //end add data
    

//  start delete data
    $('#example').on('click', '.item_delete', function(){
        var data = table.row( $(this).parents('tr') ).data();
        let id = data['id_refrr'];
        let tes = confirm('yakin menghapus??');
        if (tes) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}deletedata`,
                data: {id:id},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    table.ajax.reload();
                }
            });
        }//endif
        
    });

    // end delete data


});