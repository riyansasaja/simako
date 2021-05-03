<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-body bg-secondary text-light">
                <div class="row">
                    <div class="col-6">
                        <p><span class="font-weight-bold">Program</span> <br><?= $resiko[0]['program'] ?></p>
                        <p><span class="font-weight-bold">Kegiatan</span> <br><?= $resiko[0]['kegiatan'] ?></p>
                    </div>
                    <div class="col-6">
                        <p><span class="font-weight-bold">output</span><br><?= $resiko[0]['output'] ?></p>
                        <p><span class="font-weight-bold">tujuan</span><br><?= $resiko[0]['tujuan'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="row justify-content-start mb-2">
    <div class="col">
        <div class="card">
            <div class="card-header bg-primary text-light">
                Daftar Realisasi
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($realisasi as $real) : ?>
                        <div class="col-4">
                            <?php foreach ($resiko as $risk) : ?>
                                <p><span class="font-weight-bold">Resiko</span><br><?= $risk['resiko'] ?></p>
                            <?php endforeach; ?>
                            <p> <?= $real['kejadian'] ?></p>
                            <p><span class="font-weight-bold">Uraian</span><br><?= $real['uraian'] ?></p>
                        </div>
                        <div class="col-4">
                            <p><span class="font-weight-bold">Waktu Pelaksanaan</span><br><?= $real['waktu'] ?></p>
                            <p><span class="font-weight-bold">PJ</span><br><?= $real['pj'] ?></p>

                        </div>

                        <div class="col-4">

                            <a class="btn btn-danger btn-sm" href="<?= base_url('bidang/delrealisasi/') . $resiko[0]['id_idev'] . '/' . $real['id_realisasi']; ?>">Delete</a>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row justify-content-start">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-light">
                Input Realisasi
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="text" id="id_idev" name="id_idev" value="<?= $resiko[0]['id_idev'] ?>" hidden>
                    <div class="form-group">
                        <label for="resiko">Resiko</label>
                        <textarea class="form-control" id="resiko" name="resiko" rows="3" readonly><?= $resiko[0]['resiko'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="uraian_pengendalian">Kejadian Resiko</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kejadian" id="exampleRadios1" value="Teridentifikasi">
                            <label class="form-check-label" for="exampleRadios1">
                                Terindentifikasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kejadian" id="exampleRadios2" value="Tidak Teridentifikasi">
                            <label class="form-check-label" for="exampleRadios2">
                                Tidak Terindentifikasi
                            </label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="pj">Penanggung Jawab</label>
                        <textarea class="form-control" id="pj" name="pj" rows="3"></textarea>
                        <!-- <select class="form-control" id="pj" name="pj" rows="3">
                            <?php foreach ($rtp as $u) : ?>
                                <option selected>--Pilih Salah Satu -- </option>
                                <option value="<?= $u['pj'] ?>"><?= $u['uraian_rtp'] ?></option>
                            <?php endforeach; ?>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <textarea class="form-control" id="uraian" name="uraian" rows="3"></textarea>
                        <!-- <select class="form-control" id="uraian" name="uraian" onchange="CheckData (this.value);">
                            <?php foreach ($rtp as $u) : ?>
                                <option selected>--Pilih Salah Satu -- </option>
                                <option value="<?= $u['uraian_rtp'] ?>"><?= $u['uraian_rtp'] ?></option>
                                <option value="others">Lainnya </option>
                            <?php endforeach; ?>
                        </select> -->
                    </div>
                    <!-- <div class="form-group">
                        <textarea class="form-control" id="uraian_other" rows="3"></textarea>
                    </div> -->


                    <div class="form-group">
                        <label for="target_waktu"> Waktu</label>
                        <textarea class="form-control" id="target_waktu" name="waktu" rows="3"></textarea>
                    </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn_tambah">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>