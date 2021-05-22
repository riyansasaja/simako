<!-- form input referensi resiko -->

<div class="row justify-content-start mb-3">

    <div class="col-8">

        <div class="card">
            <div class="card-header">

                <div class="d-flex bd-highlight ">
                    <div class="mr-auto bd-highlight text-primary">
                        Input Referensi
                    </div>
                    <div class="bd-highlight">
                        <a href="" class="btn btn-sm btn-outline-primary align-items-right" data-toggle="modal" data-target="#ModalSK">Tambah Sifat Kegiatan <i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>

            </div>
            <div class="card-body">

                <!-- form inputan -->
                <form>
                    <div class="form-group row">
                        <label for="sifat_kegiatan" class="col-sm-2 col-form-label">Sifat Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sifat_kegiatan" name="sifat_kegiatan">
                                <?php foreach ($sifatkegiatan as $key) : ?>
                                    <option value="<?= $key['id_sk'] ?>"><?= $key['sifat_kegiatan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="resiko" class="col-sm-2 col-form-label">Risiko</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="resiko" rows="3" name="resiko"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sebab" class="col-sm-2 col-form-label">Sebab</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="sebab" rows="3" name="sebab"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dampak" class="col-sm-2 col-form-label">Dampak/<br>Akibat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="dampak" rows="3" name="dampak"></textarea>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="button" id="btn-save" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- end form -->


            </div>
        </div>

    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header p-3">

                <div class="d-flex bd-highlight ">
                    <div class="mr-auto bd-highlight text-primary">
                        Referensi Sifat Kegiatan
                    </div>
                </div>

            </div>
            <div class="card-body">

                <!-- table tampilan data -->
                <table class="table table-sm" id="tbsk">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sifat Kegiatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>

                <!-- end table tampilan data -->


            </div>
        </div>

    </div>


</div>
<!-- end form input referensi resiko -->

<!-- tabel tampilan Ref. Resiko -->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-light">
                <p>DAFTAR REFERENSI RISIKO</p>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="example" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Risiko</th>
                            <th>Sebab</th>
                            <th>Dampak/Akibat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>

    </div>
</div>

<!-- end tampilan ref resiko -->


<!-- modal -->
<!-- Modal Add Sifat Kegiatan -->
<div class="modal fade" id="ModalSK" tabindex="-1" role="dialog" aria-labelledby="modalsk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sifat Kegiatan</h5>
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
    <!-- ------ -->
</div>

<!-- modal Edit Ref Risk -->

<div class="modal fade" id="editrefModal" tabindex="-1" role="dialog" aria-labelledby="modalsk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Referensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" name="id_refrr" id="mid_refrr" hidden>
                    <input type="text" name="id_sk" id="mid_sk" hidden>
                    <div class="form-group row">
                        <label for="sifat_kegiatan" class="col-sm-2 col-form-label">Sifat Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="msifat_kegiatan" name="sifat_kegiatan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="resiko" class="col-sm-2 col-form-label">Risiko</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="mresiko" rows="3" name="resiko"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sebab" class="col-sm-2 col-form-label">Sebab</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="msebab" rows="3" name="sebab"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dampak" class="col-sm-2 col-form-label">Dampak/<br>Akibat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="mdampak" rows="3" name="dampak"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="mbtn_update" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- ------ -->