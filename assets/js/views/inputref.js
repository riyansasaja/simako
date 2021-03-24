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

    //------


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

    //---------

    //---Start Get Edit
    $('#example').on('click', '.item_edit', function () {  
        var data = table.row( $(this).parents('tr') ).data();
        let id = data['id_refrr'];
        $.ajax({
            type: "POST",
            url: `${path}getdatabyid`,
            data: {id:id},
            dataType: "JSON",
            success: function (response) {
               $.each(response, function (i, val) { 
                   console.log(val);
                    $('#editrefModal').modal('show');
                    $('[name="id_refrr"]').val(val.id_refrr);
                    $('[name="id_sk"]').val(val.id_sk);
                    $('[name="sifat_kegiatan"]').val(val.sifat_kegiatan);
                    $('[name="resiko"]').val(val.resiko);
                    $('[name="sebab"]').val(val.sebab);
                    $('[name="dampak"]').val(val.dampak);
                   

               }); 
            }
        });
        return false
    });
    // ------

    //---Start Update Data
    $('#mbtn_update').on('click', function () {
        console.log('tombol diteka');
        let id_refrr = $('#mid_refrr').val();
        let id_sk = $('#mid_sk').val();
        let resiko = $('#mresiko').val();
        let sebab = $('#msebab').val();
        let dampak = $('#mdampak').val();

        $.ajax({
            type: "POST",
            url: `${path}updatedata`,
            data: {
                id_refrr: id_refrr,
                id_sk: id_sk,
                resiko: resiko,
                sebab: sebab,
                dampak: dampak,
            },
            dataType: "JSON",
            success: function(response) {
                // console.log(response);
                    $('[name="sifat_kegiatan"]').val("");
                    $('[name="resiko"]').val("");
                    $('#msebab').empty();
                    $('#mdampak').empty();
                    $('#editrefModal').modal('hide');
                    alert('Data Berhasil Dirubah !');
                    table.ajax.reload();
                }
        });
        return false;

    });
    //------
    

//---start delete data
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

    //---------


    //tampil data di tabel sifat kegiatan
    let tbsk = $('#tbsk').DataTable( {
        "searching" : false,
        "ordering": false,
        "info" : false,
        "pagingType": "simple",
        "ajax": `${path}getsk`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "sifat_kegiatan" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='tes' class="badge badge-pill badge-danger item_delete"'>Delete</a>`
        }
        ]
    } );

    // end tampil data di table sifat kegiatan


    //---- delete sifat kegiatan
    $('#tbsk').on('click', '.item_delete', function(){
        let data = tbsk.row( $(this).parents('tr') ).data();
        let id = data['id_sk'];
        let tes = confirm('yakin menghapus??');
        if (tes) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}deletesk`,
                data: {id:id},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    tbsk.ajax.reload();
                }
            });
        }//endif
        
    });

    //---------

});