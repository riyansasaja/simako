$(document).ready(function() {

    const path = 'http://localhost/simako/user'

    $('#dataTable').DataTable();

    tampil_data()

    // start tampil data
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
                                <a href="javascript:;" class="badge badge-pill badge-danger item_delete" data="${d.id}">Delete</a>
                                </td>
                            </tr>`;
                });
                $('#showdata').html(html);
            }
        });
    }
    // end tampil data

    //start add data
    $('#btn_save').on('click', function() {
        // console.log('tombolditekan');
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();

        $.ajax({
            type: "POST",
            url: `${path}/adduser`,
            data: {
                name: name,
                email: email,
                password: password
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


    });//end add data

    //cancel on click
    $('#btn_cancel').on('click', function(){
        console.log('btn-cancel clikc');    
        $('#name').val("");
        $('#email').val("");
        $('#password').val("");
    }); //end cancel on click

    //start delete data
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
        
    });//end delete


    // start edit data
    
    // end edit data



});