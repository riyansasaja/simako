<div class="row justify-content-start mb-2">
    <div class="col-6">

        <div class="card">
            <div class="card-header bg-gradient-primary text-light">
                <h5>Daftar Program</h5>
            </div>
            <div class="card-body">
                <table class="table" id="show_program">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Program</th>
                            <th scope="col">Outcome Program</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-6">

        <div class="card">
            <div class="card-header bg-gradient-success text-light">
                <h5>Daftar Realisasi outcome</h5>
            </div>
            <div class="card-body">
                <table class="table" id="show_realisasi_outcome">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Rencana Outcome</th>
                            <th scope="col">Realisasi outcome</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<!-- modal input realisasi -->

<div class="modal fade" id="modal_realisasi_outcome" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Input Realisasi Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_input_realisasi_outcome" method="POST" action="<?= base_url('opd/addrealisasiprogram/') ?>">
                    <input type="text" name="id_program" id="id_program" hidden>

                    <div class="form-group row">
                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Outcome</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="realisasi_outcome" name="realisasi_outcome" onchange="checkrealoutcome(this.value)">
                                </select>
                                <div class="form-group">
                                    <textarea class="form-control" id="other_realisasi_outcome" rows="3" style='display:none;'></textarea>
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
        function checkrealoutcome(val) {
            var select = document.getElementById('realisasi_outcome');
            var textbox = document.getElementById('other_realisasi_outcome');
            if (val == 'others') {
                textbox.style.display = 'block';
                select.removeAttribute('name');
                textbox.setAttribute('name', 'realisasi_outcome');

            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_outcome');
            }
        }
    </script>