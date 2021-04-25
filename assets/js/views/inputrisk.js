$(document).ready(function () {
    const prapath = window.location.origin;
    const path = `${prapath}/simako/bidang/`;
    let tes = window.location.pathname.split("/").pop()

     // tampil data to datatable
     let table_idev = $('#table_idev').DataTable( {
        "ajax": `${path}getidev/${tes}`,
        searching : false,
        ordering : false,
        paging : false, 
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { data: "resiko" },
            { data: "sebab" },
            { data: "dampak" },
            { data: "n_kemungkinan" },
            { data: "n_dampak" },
            { data: "n_resiko" },
            {
            data: null,
            "render" : function (data, type, row) {
                if (row.n_resiko > 3 ) {
                    return `<a href="javascript:;" id='delete' class="badge badge-pill badge-danger input_rtp"'>Input RTP</a> <br>
                    <a href="javascript:;" id='realisasi' class="badge badge-pill badge-success item_realisasi"'>Realisasi</a> <br>
                    <a href="javascript:;" id='delete' class="badge badge-pill badge-danger item_delete"'>Delete</a>`
                } else {
                    return `<a href="javascript:;" id='realisasi' class="badge badge-pill badge-success item_realisasi"'>Realisasi</a> <br>
                    <a href="javascript:;" id='delete' class="badge badge-pill badge-danger item_delete"'>delete</a>`
                }
            }
            
        }
        ],
        //hitung total lewat footerCallback dataTables

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var total4 = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

            var total5 = api
            .column( 5 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

            var total6 = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

            
            $( api.column( 4 ).footer() ).html(total4);
            $( api.column( 5 ).footer() ).html(total5);
            $( api.column( 6 ).footer() ).html(total6);
        },
        //end

    } );


    //------

    //--add data
    $('#btn_tambah').on('click', function () {
        let id_tk = $('#id_tk').val();
        let resiko = $('#resiko').val();
        let sebab = $('#sebab').val();
        let dampak = $('#dampak').val();
        let n_kemungkinan = $('#n_kemungkinan').val();
        let n_dampak = $('#n_dampak').val();
        let n_resiko = n_kemungkinan * n_dampak;

        $.ajax({
            type: "POST",
            url: `${path}seveidev`,
            data: {
                id_tk : id_tk,
                resiko : resiko,
                sebab : sebab,
                dampak : dampak,
                n_kemungkinan : n_kemungkinan,
                n_dampak : n_dampak,
                n_resiko : n_resiko
            },
            dataType: "JSON",
            success: function (response) {
                alert('Data Berhasil Ditambahkan');
                table_idev.ajax.reload();
            }
        });
        
    });
    // -----


    // -- Delete Data
    $('#table_idev').on('click', '.item_delete', function(){
        var data = table_idev.row( $(this).parents('tr') ).data();
        let id_idev = data['id_idev'];
        let hapus = confirm(`Yakin menghapus ???`);
        if (hapus) {
            //lakukan penghapusan
            $.ajax({
                type: "POST",
                url: `${path}del_idev`,
                data: {id_idev:id_idev},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    table_idev.ajax.reload();
                }
            });
        }//endif
        
    });
    // -----

    //-- Input RTP click
    $('#table_idev').on('click', '.input_rtp', function(){
        var data = table_idev.row( $(this).parents('tr') ).data();
        let id_idev = data['id_idev'];
        window.location.href = `${path}inputrtp/${id_idev}`;
        return
        
        
    });
    // -----



});