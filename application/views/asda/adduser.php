<main class="add-user mt-5">
    <div class="container">


        <div class="row">

            <div class="col-4">
                <div class="card text-left">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add OPD User</h6>
                    </div>
                    <div class="card-body">
                        <div id="show_alert"></div>

                        <!-- menambahkan form baru -->
                        <form>
                            <div class="form-group">
                                <label for="nama">Nama OPD</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="button" id="btn_cancel" class="btn btn-secondary">Cancel</button>
                            <button type="button" id="btn_save" class="btn btn-primary">Add User</button>

                        </form>
                        <!-- end form add user -->

                    </div>
                </div>
            </div>

            <div class="col-8">

                <section class="table">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of OPD</h6>
                        </div>
                        <div class="card-body">
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
<!-- custom js -->
<script src="<?= base_url('assets/') ?>js/views/asda/adduser.js"></script>