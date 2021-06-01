<div class="row justify-content-start mb-2">
    <div class="col-6">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Kegiatan</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Program</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kegiatan as $keg) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $keg['program'] ?></td>
                                <td><?= $keg['kegiatan'] ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#modalrealkegiatan">Input</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-6">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Realisasi</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Realisasi Output Kegiatan</th>
                            <th scope="col">Realisasi Tujuan Kegiatan</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($real_kegiatan as $rk) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $rk['kegiatan'] ?></td>
                                <td><?= $rk['real_output'] ?></td>
                                <td><?= $rk['real_tujuan_kegiatan'] ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#updatemodal">edit</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<!-- modal input realisasi -->

<div class="modal fade" id="modalrealkegiatan" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Input Realisasi Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_edit" method="POST" action="<?= base_url('bidang/addrealisasikegiatan'); ?>">
                    <input type="text" value="<?= $kegiatan[0]['id_tk'] ?>" name="id_tk" id="id_tk" hidden>

                    <div class="form-group row">
                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Kegiatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="realOutKegiatan" name="realoutkegiatan" onchange="Chekrealoutkegiatan(this.value)">
                                    <option value="<?= $kegiatan[0]['output'] ?>"><?= $kegiatan[0]['output'] ?></option>
                                    <option value="others">--lainnya--</option>
                                </select>
                                <div class="form-group">
                                    <textarea class="form-control" id="otherrealOutKegiatan" rows="3" style='display:none;'></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Tujuan Kegiatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="realouttujuankegiatan" name="realouttujuankegiatan" onchange="Chekrealouttujuankegiatan(this.value);">
                                    <option value="<?= $kegiatan[0]['tujuan'] ?>"><?= $kegiatan[0]['tujuan'] ?> </option>
                                    <option value="others">--lainnya--</option>
                                </select>
                                <div class="form-group">
                                    <textarea class="form-control" id="otherrealtujuankegiatan" rows="3" style='display:none;'></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_update">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end modal input realisasi -->







    <!-- script js -->

    <script>
        function Chekrealoutkegiatan(val) {
            var select = document.getElementById('realOutKegiatan');
            var textbox = document.getElementById('otherrealOutKegiatan');
            if (val == 'others') {
                textbox.style.display = 'block';
                select.removeAttribute('name');
                textbox.setAttribute('name', 'realoutkegiatan');

            } else {
                textbox.style.display = 'none';
            }
        }

        function Chekrealouttujuankegiatan(val) {
            var select = document.getElementById('realtujuankegiatan');
            var textbox = document.getElementById('otherrealtujuankegiatan');
            if (val == 'others') {

                textbox.style.display = 'block';
                textbox.setAttribute('name', 'realouttujuankegiatan');
                select.removeAttribute('name');
            } else {
                element.style.display = 'none';
            }
        }
    </script>