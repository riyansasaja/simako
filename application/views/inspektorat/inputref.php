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
                        <label for="resiko" class="col-sm-2 col-form-label">Resiko</label>
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

</div>
<!-- end form input referensi resiko -->

<!-- tabel tampilan Ref. Resiko -->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-light">
                <p>DAFTAR REFERENSI RESIKO</p>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="example" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Resiko</th>
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