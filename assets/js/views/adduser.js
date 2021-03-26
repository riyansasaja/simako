$(document).ready(function() {

    
    $('#dataTable').DataTable();
    const path = 'http://localhost/simako/user'

    tampil_data()

    //---Tampil data
    function tampil_data() {
        $.ajax({
            type: "GET",
            url: `${path}/getUserByAtasan/`,
            async: true,
            dataType: "json",
            success: function(data) {
                let html = '';

                $.each(data, function(i, d) {
                    // console.log(d);
                    html += `<tr>
                                <td>${d.name}</td>
                                <td class="text-right">
                                <a href="javascript:;" class="badge badge-pill badge-success item_edit" data="${d.id}">Edit</a>
                                <a href="javascript:;" class="badge badge-pill badge-secondary item_reset" data="${d.id}">Reset</a>
                                <a href="javascript:;" class="badge badge-pill badge-danger item_delete" data="${d.id}">Delete</a>
                                </td>
                            </tr>`;
                });
                $('#showdata').html(html);
            }
        });
    }//------

    //--- Add data
    $('#btn_save').on('click', function() {
        // console.log('tombolditekan');
        let name = $('#name').val();
        let email = $('#email').val();
        // let password = $('#password').val();

        $.ajax({
            type: "POST",
            url: `${path}/adduser`,
            data: {
                name: name,
                email: email
                // password: password
            },
            dataType: "JSON",
            success: function(response) {
                // console.log(response);
                if (response.status == 'unsuccess') {
                    $('#show_alert').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ${response.message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`);
                } else {
                    $('[name="name"]').val("");
                    $('[name="email"]').val("");
                    $('[name="password"]').val("");
                    $('#show_alert').empty();
                    $('#ModalAddUser').modal('hide');
                    tampil_data();
                }


            }
        });


    });
    //------

    //---cancel on click
    $('#btn_cancel').on('click', function(){
        console.log('btn-cancel clikc');    
        $('#name').val("");
        $('#email').val("");
        $('#password').val("");
    }); 
    //------

    //--- Delete data
    $('#showdata').on('click','.item_delete', function(){
        let id = $(this).attr('data');
        let tes = confirm('Yakin Menghapus data?');
        if (tes) {
            
            $.ajax({
                type: "POST",
                url: `${path}/deleteuser`,
                data: {id:id},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Terhapus!!');
                    tampil_data();
                    
                }
            });
            return false;
        }
        
    });
    //------

    //--- Reset password
    $('#showdata').on('click','.item_reset', function(){
        let id = $(this).attr('data');
        let check = confirm('Yakin Mereset Password?');
        if (check) {
            
            $.ajax({
                type: "POST",
                url: `${path}/resetuser`,
                data: {id:id},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    alert('Data Berhasil direset!!');
                    tampil_data();
                    
                }
            });
            return false;
        }
        
    });
    //------
    
    // --Get edit
    $('#showdata').on('click', '.item_edit', function () {  
        let id = $(this).attr('data');
        $.ajax({
            type: "POST",
            url: `${path}/getuserbyid`,
            data: {id:id},
            dataType: "JSON",
            success: function (response) {
               $.each(response, function (i, val) { 
                    $('#modalEdit').modal('show');
                    $('[name="id_edit"]').val(val.id);
                    $('[name="name_edit"]').val(val.name);
                     $('[name="email_edit"]').val(val.email);
                    //  $('[name="password_edit"]').val(val.password);
               }); 
            }
        });
        return false
    });
     // -------

    //--- Update Data
    $('#btn_update').on('click', function () {
        let id_edit = $('#id_edit').val();
        let name_edit = $('#name_edit').val();
        let email_edit = $('#email_edit').val();

        $.ajax({
            type: "POST",
            url: `${path}/updateuser`,
            data: {
                id_edit :id_edit,
                name_edit: name_edit,
                email_edit: email_edit,
            },
            dataType: "JSON",
            success: function(response) {
                // console.log(response);
                if (response.status == 'unsuccess') {
                    $('#show_alert_edit').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ${response.message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`);
                } else {
                    $('[name="name_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('#show_alert').empty();
                    $('#modalEdit').modal('hide');
                    tampil_data();
                }


            }
        });


    });
    //------



});