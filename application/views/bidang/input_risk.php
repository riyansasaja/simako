<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p><span class="font-weight-bold">Program</span> <br><?= $list[0]['program'] ?></p>
                    </div>
                    <div class="col-6">
                        <p><span class="font-weight-bold">Kegiatan</span><br><?= $list[0]['kegiatan'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row justify-content-start mb-2">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Daftar Analis Risiko
            </div>
            <div class="card-body">
                <table id="table_idev" class="table table-bordered">
                    <thead>
                        <tr>

                            <th colspan="4" class="bg-secondary text-light">Identifikasi Risiko</th>
                            <th colspan="4" class="bg-secondary text-light">Analisis Risiko</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Risiko</th>
                            <th scope="col">Sebab</th>
                            <th scope="col">Dampak</th>
                            <th scope="col">Skor<br>Kemungkinan</th>
                            <th scope="col">Skor<br>Dampak</th>
                            <th scope="col">Skor<br>Risiko</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr class="bg-warning text-dark">
                            <th colspan="4" class="text-center">Total Skor</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-start">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Tambah Analisis Risiko
            </div>
            <div class="card-body">
                <form>
                    <input type="text" id="id_tk" name="id_tk" value="<?= $list[0]['id_tk'] ?>" hidden>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="resiko">Risiko</label>
                            <select id="resiko" class="form-control" name="resiko">
                                <option selected>---Pilih Salah Satu ---</option>
                                <?php foreach ($ref_risk as $ref) : ?>
                                    <option value="<?= $ref['resiko'] ?>"><?= $ref['resiko'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="sebab">Sebab</label>
                            <select id="sebab" class="form-control" name="sebab">
                                <option selected>---Pilih Salah Satu ---</option>
                                <?php foreach ($ref_risk as $ref) : ?>
                                    <option value="<?= $ref['sebab'] ?>"><?= $ref['sebab'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="n_kemungkinan">Skor Kemungkinan</label>
                            <input type="number" min='1' max='10' class="form-control" id="n_kemungkinan" name="n_kemungkinan">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="dampak">Dampak/Akibat</label>
                            <select id="dampak" class="form-control" name="dampak">
                                <option selected>---Pilih Salah Satu ---</option>
                                <?php foreach ($ref_risk as $ref) : ?>
                                    <option value="<?= $ref['dampak'] ?>"><?= $ref['dampak'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="n_dampak">Skor Dampak</label>
                            <input type="number" min='1' max='10' class="form-control" id="n_dampak" name="n_dampak">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block btn-lg" type="submit" id="btn_tambah">Tambah</button>
            </div>
        </div>
    </div>
</div>