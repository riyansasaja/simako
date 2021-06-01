<div class="row justify-content-start mb-3">
    <div class="col">

        <div class="col-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span class=""> Input Outcome Program dan Tujuan Kegiatan </span>
                </div>
                <div class="card-body">

                    <!-- --Start Tabel -->
                    <table class="table table-borderless" id="tabletk">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Program</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                    </table>
                    <!-- ------ -->


                </div>
            </div>
        </div>

    </div>
</div>


<!-- modal Edit -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
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
                            <textarea class="form-control" name="program" id="program" rows="3" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Outcome Program</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="outcome" id="outcome" rows="3" required disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="kegiatan" id="kegiatan" rows="3" disabled></textarea>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Output Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="output" id="output" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Tujuan Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="tujuan_kegiatan" id="tujuan_kegiatan" rows="3" required></textarea>
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