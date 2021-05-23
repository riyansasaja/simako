<div class="row justify-content-start mb-3">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Program</h6>
            </div>
            <div class="card-body">
                <button type="button" name="" id="" class="btn btn-block btn-user  bg-primary text-white mb-3" data-toggle="modal" data-target="#addprogramModal">Tambah Program</button>
                <div class="table-responsive">
                    <table class="table" id="showprogram" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Program</th>
                                <th>Outcome Program</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>

</div>


<!-- input kegiatan di pisahkan dari program, programnya dipilih dari db progarm -->
<div class="row justify-content-start mb-3">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Kegiatan</h6>
            </div>
            <div class="card-body">
                <button type="button" name="" id="" class="btn btn-block btn-user  bg-primary text-white mb-3" data-toggle="modal" data-target="#addkegiatanModal">Tambah Kegiatan</button>
                <div class="table-responsive">
                    <table class="table" id="showkegiatan" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Program</th>
                                <th>Kegiatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>

</div>

<!-- end input kegiatan -->



<!-- modal Add Program-->

<div class="modal fade" id="addprogramModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_addprogram">
                    <div class="form-group row">
                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="program1" id="program1" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="program" class="col-sm-2 col-form-label">Outcome Program</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="outcomeprogram1" id="outcomeprogram1" rows="3" required></textarea>
                        </div>
                    </div>



                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan1">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- end modal add program -->

<!-- modal Add Kegiatan-->

<div class="modal fade" id="addkegiatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_add">
                    <div class="form-group row">
                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="program" name="program">
                                <?php foreach ($program as $prog) : ?>
                                    <option value="<?= $prog['nama_program']; ?>"><?= $prog['nama_program']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="kegiatan" id="kegiatan" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sifat_kegiatan" class="col-sm-2 col-form-label">Sifat Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sifat_kegiatan" id="sifat_kegiatan">
                                <?php foreach ($sifat_kegiatan as $sk) : ?>
                                    <option value="<?= $sk['id_sk']; ?>"><?= $sk['sifat_kegiatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="unor_tujuan" class="col-sm-2 col-form-label">Bidang Pelaksana</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="unor_tujuan" id="unor_tujuan">
                                <?php foreach ($bidang as $b) : ?>
                                    <option value="<?= $b['id']; ?>"><?= $b['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- end modal add kegiatan -->

<!-- modal Edit -->

<div class="modal fade" id="editkegiatanModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_edit">
                    <input type="text" name="id_tk" id="id_tk" hidden>

                    <div class="form-group row">
                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="program" id="edit_program" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="kegiatan" id="edit_kegiatan" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sifat_kegiatan" class="col-sm-2 col-form-label">Sifat Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sifat_kegiatan" id="edit_sifat_kegiatan">
                                <?php foreach ($sifat_kegiatan as $sk) : ?>
                                    <option value="<?= $sk['id_sk']; ?>"><?= $sk['sifat_kegiatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="unor_tujuan" class="col-sm-2 col-form-label">Bidang Pelaksana</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="unor_tujuan" id="edit_unor_tujuan">
                                <?php foreach ($bidang as $b) : ?>
                                    <option value="<?= $b['id']; ?>"><?= $b['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_update">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- end modal edit -->