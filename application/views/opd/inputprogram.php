<main class="inputprogram mt-5">
    <div class="container">
        <div class="row">
            <div class="col">

                <section class="table">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Input Program Kegiatan</h6>
                                    </div>
                                    <div class="card-body">
                                        <button type="button" name="" id="" class="btn btn-block btn-user bg-kedua text-white mb-3" data-toggle="modal" data-target="#addModal">Tambah Program Kegiatan</button>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Tujuan</th>
                                                        <th>Program</th>
                                                        <th>Output Kegiatan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!-- <tfoot>
                                                    <tr>
                                                        <th>Tujuan</th>
                                                        <th>Program</th>
                                                        <th>Output Kegiatan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot> -->
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

            </div>
        </div>
    </div>
</main>


<!-- modal Add -->

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_add">

                    <div class="form-group row">
                        <label for="tujuan_pd" class="col-sm-2 col-form-label">Tujuan Perangkat Daerah</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="tujuan_pd" id="tujuan_pd" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sasaran_pd" class="col-sm-2 col-form-label">Sasaran Perangkat Daerah</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="sasaran_pd" id="sasaran_pd" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="program" id="program" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="kegiatan" id="kegiatan" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="output_kegiatan" class="col-sm-2 col-form-label">Output Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="output_kegiatan" id="output_kegiatan" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tujuan_kegiatan" class="col-sm-2 col-form-label">Tujuan Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="tujuan_kegiatan" id="tujuan_kegiatan" rows="3" required></textarea>
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

<!-- end modal add -->