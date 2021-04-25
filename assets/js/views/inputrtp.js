$(document).ready(function () {
    const prapath = window.location.origin;
    const path = `${prapath}/simako/bidang/`;
    let tes = window.location.pathname.split("/").pop()

    //---tampil data
    let table_rtp = $('#table_rtp').DataTable( {
        "ajax": `${path}getinputrtp/${tes}`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "uraian_pengendalian" },
            { "data": "hasil_evaluasi" },
            { "data": "uraian_rtp" },
            { "data": "target_waktu" },
            { "data": "pj" },
            { "data": "keterangan" },
            {
            "data": null,
            "defaultContent": `<a href="javascript:;" id='tes' class="badge badge-pill badge-danger item_delete"'>Delete</a>`
        }
        ]
    } );

    // -----
    
    //--add data
    $('#btn_tambah').on('click', function () {
        let id_idev = $('#id_idev').val();
        let uraian_pengendalian = $('#uraian_pengendalian').val();
        let hasil_evaluasi = $('#hasil_evaluasi').val();
        let uraian_rtp = $('#uraian_rtp').val();
        let target_waktu = $('#target_waktu').val();
        let pj = $('#pj').val();
        let keterangan = $('#keterangan').val();

        $.ajax({
            type: "POST",
            url: `${path}savertp`,
            data: {
                id_idev : id_idev,
                uraian_pengendalian : uraian_pengendalian,
                hasil_evaluasi : hasil_evaluasi,
                uraian_rtp : uraian_rtp,
                target_waktu : target_waktu,
                pj : pj,
                keterangan : keterangan
            },
            dataType: "JSON",
            success: function (response) {
                alert('Data Berhasil Ditambahkan');
                $('[name="uraian_pengendalian"]').val("");
                $('[name="hasil_evaluasi"]').val("");
                $('[name="uraian_rtp"]').val("");
                $('[name="target_waktu"]').val("");
                $('[name="pj"]').val("");
                $('[name="keterangan"]').val("");
                table_rtp.ajax.reload();
            }
        });
        
    });
    // -----

    // -- Delete Data
    $('#table_rtp').on('click', '.item_delete', function(){
        var data = table_rtp.row( $(this).parents('tr') ).data();
        let id_rtp = data['id_rtp'];
        let hapus = confirm(`Yakin menghapus ???`);
        if (hapus) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}del_rtp`,
                data: {id_rtp:id_rtp},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    table_rtp.ajax.reload();
                }
            });
        }//endif
        
    });
    // -----


});