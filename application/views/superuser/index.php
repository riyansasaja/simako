<div class="row">
<div class="col mb-3">
<div class="card">
  <div class="card-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama PEMDA</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Silahkan Inputkan Nama Pemda bersangkutan</small>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-4">
        <div class="card text-left">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add User Asda dan Inspektorat</h6>
            </div>
            <div class="card-body">
                <div id="show_alert"></div>

                <!-- menambahkan form baru -->
                <form>
                <div class="form-group">
    <label for="exampleFormControlSelect1">Jenis Akun </label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>ASDA</option>
      <option>Inspektorat</option>
    </select>
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


<!-- modal -->
<!-- start modal edit user -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="show_alert_edit"></div>
                <form>
                    <input type="text" name="id_edit" id="id_edit" hidden>
                    <div class="form-group">
                        <label for="nama">Nama Bidang/Bagian</label>
                        <input type="text" class="form-control" id="name_edit" name="name_edit" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email_edit" name="email_edit" aria-describedby="emailHelp">
                    </div>
                    <!-- <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password_edit" class="form-control" id="password_edit">
                    </div> -->
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_update" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- end modal add user -->