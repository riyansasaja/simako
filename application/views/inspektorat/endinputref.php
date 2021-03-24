<!-- Modal SK -->
<!-- Modal -->
<div class="modal fade" id="ModalSK" tabindex="-1" role="dialog" aria-labelledby="modalsk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form -->
                <form action="<?= base_url('inspektorat/addsk') ?>" method="POST">
                    <div class="form-group">
                        <label for="sifatkegiatan">Sifat / Jenis Kegiatan</label>
                        <input type="text" class="form-control" id="sifatkegiatan" name="sifat_kegiatan" required>
                        <small id="emailHelp" class="form-text text-muted">Inputkan Jenis Kegiatan yang mau ditambahkan</small>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal SK -->






    <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url('assets/') ?>js/views/inputref.js"></script>

    </body>

    </html>