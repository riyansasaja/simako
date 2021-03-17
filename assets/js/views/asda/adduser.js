$(document).ready(function() {

    $('#dataTable').DataTable();

    tampil_data()

    // start tampil data
    function tampil_data() {
        $.ajax({
            type: "GET",
            url: "http://localhost/simako/user/getUserByAtasan/",
            async: true,
            dataType: "json",
            success: function(data) {
                let html = '';

                $.each(data, function(i, d) {
                    // console.log(d);
                    html += `<tr>
                                <td>${d.name}</td>
                                <td>Detail | Edit | Delete</td>
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
            url: "http://localhost/simako/user/adduser",
            data: {
                name: name,
                email: email,
                password: password
            },
            dataType: "JSON",
            success: function(response) {
                // console.log(response);
                if (response.status == 'unsuccess') {
                    $('#modal_alert').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ${response.message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`);
                } else {
                    $('[name="name"]').val("");
                    $('[name="email"]').val("");
                    $('[name="password"]').val("");
                    $('#modal_alert').empty();
                    $('#ModalAddUser').modal('hide');
                    tampil_data();
                }


            }
        });


    });

    //end add data



});