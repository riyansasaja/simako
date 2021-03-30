<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p>Program <br><?= $list[0]['program'] ?></p>
                    </div>
                    <div class="col-6">
                        <p>Kegiatan <br><?= $list[0]['kegiatan'] ?></p>
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
                Daftar Analis Resiko
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th colspan="4" class="bg-secondary text-light">Identifikasi Resiko</th>
                            <th colspan="3" class="bg-secondary text-light">Analisis Resiko</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Resiko</th>
                            <th scope="col">Sebab</th>
                            <th scope="col">Dampak</th>
                            <th scope="col">Skor<br>Kemungkinan</th>
                            <th scope="col">Skor<br>Dampak</th>
                            <th scope="col">Skor<br>Resiko</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>1</td>
                            <td>4</td>
                            <td>8</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-warning text-dark">
                            <th colspan="4" class="text-center">Total Skor</th>
                            <th>1</th>
                            <th>4</th>
                            <th>8</th>
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
                Tambah Analisis Resiko
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="resiko">Resiko</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="sebab">Sebab</label>
                            <select id="sebab" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="n_kemungkinan">Skor Kemungkinan</label>
                            <input type="number" class="form-control" id="n_kemungkinan" name="n_kemungkinan">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="dampak">Dampak/Akibat</label>
                            <select id="dampak" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="n_dampak">Skor Dampak</label>
                            <input type="number" class="form-control" id="n_dampak" name="n_dampak">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Tambah</button>
            </div>
        </div>
    </div>
</div>

<?php var_dump($ref_risk); ?>