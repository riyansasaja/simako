<div class="row justify-content-start mb-3">
    <div class="col">

        <div class="card">
            <div class="card-body">

                <!-- form -->
                <form method="POST" action="">
                    <input type="text" name="id_user" value="<?= $this->session->userdata('id'); ?>" hidden>
                    <div class="form-group row">
                        <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="kondisi" rows="3" name="kondisi"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kriteria" class="col-sm-2 col-form-label">Kriteria</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="kriteria" rows="3" name="kriteria"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="uraian" rows="5" name="sebab_uraian"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akibat" class="col-sm-2 col-form-label">Akibat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="uraian" rows="5" name="akibat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saran" class="col-sm-2 col-form-label">Saran</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="saran" rows="5" name="saran"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sumber_data" class="col-sm-2 col-form-label">Sumber Data</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="sumber_data" rows="5" name="sumber_data"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pernyataan" class="col-sm-2 col-form-label">Pernyataan Resiko</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="pernyataan" rows="5" name="pernyataan_resiko"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sebab" class="col-sm-2 col-form-label">Sebab</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="sebab" rows="5" name="sebab"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dampak" class="col-sm-2 col-form-label">Dampak</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="dampak" rows="5" name="dampak"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tindak_lanjut" id="exampleRadios1" value="1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Sudah Ditindaklanjuti
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tindak_lanjut" id="exampleRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Belum Ditindaklanjuti
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- ------ -->

            </div>
        </div>


    </div>
</div>