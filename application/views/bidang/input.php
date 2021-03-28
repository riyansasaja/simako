<div class="row justify-content-start mb-3">
    <div class="col">

        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span class=""> Input Analsis Resiko Program </span>
                </div>
                <div class="card-body">

                    <!-- start form` -->
                    <form method="POST" action="<?= base_url('bidang/inputform/') ?>">
                        <div class="form-group row">
                            <label for="program" class="col-sm-2 col-form-label-sm">Program</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="program" name="program">
                                    <option>--- Pilih Salah Satu ---</option>
                                    <?php foreach ($programs as $p) : ?>
                                        <option value="<?= $p['id_tk'] ?>"><?= $p['program'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label for="resiko" class="col-sm-2 col-form-label-sm">Resiko</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="resiko" name="resiko">
                                    <option>---Pilih Salah Satu---</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sebab" class="col-sm-2 col-form-label-sm">Sebab</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="sebab" rows="3" name="sebab" disabled></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dampak" class="col-sm-2 col-form-label-sm">Dampak dan Akibat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="dampak" rows="3" name="dampak" disabled></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skor-kemungkinan" class="col-sm-2 col-form-label-sm">Skor Kemungkinan</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="skor-kemungkinan" name="skor_kemungkinan">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <label for="skor-kemungkinan" class="col-sm-2 col-form-label-sm">Skor Dampak</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="skor-kemungkinan" name="skor_dampak">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
            </div>
        </div>

    </div>
</div>