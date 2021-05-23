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
                        <tr>
                            <th scope="row">1</th>
                            <td>Pengembangan Mutu Pendidikan Dasar</td>
                            <td>Rehabilitasi RKB Sekolah Dasar</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modalrealkegiatan">Input</a>
                            </td>
                        </tr>

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

                <form id="form_edit">
                    <input type="text" name="id_tk" id="id_tk" hidden>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Outcome Program</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Seluruh bangunan SD dalam kondisi baik dan termanfaatkan</option>
                                <option>--lainnya--</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>100 RKB</option>
                                <option>--lainnya--</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Tujuan Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Terlaksananya rehabilitasi atas 100 RKB SD yang tepat waktu dan sesuai spesifikasi</option>
                                <option>--lainnya--</option>
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

<!-- end modal input realisasi -->