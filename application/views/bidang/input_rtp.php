<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p><span class="font-weight-bold">Program</span> <br><?= $rtp[0]['program'] ?></p>
                        <p><span class="font-weight-bold">Kegiatan</span> <br><?= $rtp[0]['kegiatan'] ?></p>
                    </div>
                    <div class="col-6">
                        <p><span class="font-weight-bold">output</span><br><?= $rtp[0]['output'] ?></p>
                        <p><span class="font-weight-bold">tujuan</span><br><?= $rtp[0]['tujuan'] ?></p>
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
                Daftar RTP
            </div>
            <div class="card-body">
                <p><span class="font-weight-bold">Risiko</span><br><?= $rtp[0]['resiko'] ?></p>
                <table id="table_rtp" class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4" class="bg-secondary text-light">Pengendalian yang sudah Ada</th>
                            <th colspan="5" class="bg-secondary text-light">Rencana Tindak Pengendalian (RTP)</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Uraian <br> pengendalian</th>
                            <th scope="col">Hasil <br> evaluasi</th>
                            <th scope="col">Uraian <br> Rencana</th>
                            <th scope="col">Target Waktu</th>
                            <th scope="col">PJ</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-start">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Tambah RTP
            </div>
            <div class="card-body">
                <form>
                    <input type="text" id="id_idev" name="id_idev" value="<?= $rtp[0]['id_idev'] ?>" hidden>
                    <div class="form-group">
                        <label for="resiko">Risiko</label>
                        <textarea class="form-control" id="resiko" name="resiko" rows="3" readonly><?= $rtp[0]['resiko'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="uraian_pengendalian">Uraian Pengendalian</label>
                        <textarea class="form-control" id="uraian_pengendalian" name="uraian_pengendalian" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hasil_evaluasi">Hasil Evaluasi</label>
                        <textarea class="form-control" id="hasil_evaluasi" name="hasil_evaluasi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="uraian_rtp">Uraian RTP</label>
                        <textarea class="form-control" id="uraian_rtp" name="uraian_rtp" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="target_waktu">Target Waktu</label>
                        <textarea class="form-control" id="target_waktu" name="target_waktu" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pj">Penanggung Jawab</label>
                        <textarea class="form-control" id="pj" name="pj" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary" type="submit" id="btn_tambah" style="width: 40%;">Tambah Data</button>
                <button class="btn btn-warning d-none" id="btn_edit" style="width: 40%;">Update Data</button>
                <button class="btn btn-secondary d-none" id="btn_cancel" style="width: 40%;">Batal</button>
            </div>
        </div>
    </div>
</div>