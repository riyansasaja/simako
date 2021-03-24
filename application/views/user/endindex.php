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


<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- custom js -->
<script src="<?= base_url('assets/') ?>js/views/asda/adduser.js"></script>

</body>

</html>