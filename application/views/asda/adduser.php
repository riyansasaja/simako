<main class="add-user mt-5">
    <div class="container">


        <div class="row">

            <div class="col-4">
                <div class="card text-left">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Perhatian!</h4>
                        <p class="card-text">Silahkan Menambahkan User OPD</p>
                        <p class="card-text">User dan Password tersebut akan digunakan oleh masing masing KPD untuk masuk di aplikasi SIMAKO</p>
                    </div>
                </div>
                <div class="bg-adduser">
                    <img class="bg-ketiga" src="<?= base_url('assets/img/'); ?>bg_useradd.png" alt="">
                </div>

            </div>

            <div class="col-8">

                <section class="table">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar OPD</h6>
                        </div>
                        <div class="card-body">
                            <button type="button" name="" data-toggle="modal" data-target="#ModalAddUser" id="addUser" class="btn btn-primary text-white mb-3">Tambah User OPD</button>
                            <div class="table-responsive">
                                <table class="table" id="dataTable" cellspacing="0">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Nama OPD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody id="showdata">



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </section>

</main>


<!-- start modal add user -->
<div class="modal fade" id="ModalAddUser" tabindex="-1" aria-labelledby="ModalAddUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal_alert">
                </div>
                <form>
                    <div class="form-group">
                        <label for="nama">Nama OPD</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_save" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- end modal add user -->

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>



<script>
    $(document).ready(function() {

        $('#dataTable').DataTable();

        tampil_data()

        // start tampil data
        function tampil_data() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url() ?>/user/getUserByAtasan/",
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
                url: "<?= base_url('user/adduser') ?>",
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
</script>