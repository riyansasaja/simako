<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Rencana Risiko Perkegiatan</h5>
            </div>
            <div class="card-body">
                <table class="table" id="tb_show_risiko">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Risiko</th>
                            <th scope="col">Sebab</th>
                            <th scope="col">Dampak</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Realisasi Risiko Perkegiatan</h5>
            </div>
            <div class="card-body">
                <table class="table" id="tb_show_realisasi_risiko">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Realisasi Risiko</th>
                            <th scope="col">Realisasi Sebab</th>
                            <th scope="col">Realisasi Dampak</th>
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

<div class="modal fade" id="modal_realisasi_risiko" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Input Realisasi Risiko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_edit" method="POST" action="<?= base_url('bidang/addrealisasirisiko'); ?>">
                    <input type="text" name="id" id="id_idev" hidden>

                    <!-- <div class="form-group row"> -->
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Risiko</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_risiko" name="realisasi_risiko" onchange="Realisasiresiko(this.value)">
                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="other_realisasi_risiko" rows="3" style='display:none;'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Sebab</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_sebab" name="realisasi_sebab" onchange="Realisasisebab(this.value);">

                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="other_realisasi_sebab" rows="3" style='display:none;'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Dampak/Akibat</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_dampak" name="realisasi_dampak" onchange="Realisasidampak(this.value);">

                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="other_realisasi_dampak" rows="3" style='display:none;'></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- </div> -->
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
        function Realisasiresiko(val) {
            var select = document.getElementById('realisasi_risiko');
            var textbox = document.getElementById('other_realisasi_risiko');
            if (val == 'others') {
                textbox.style.display = 'block';
                select.removeAttribute('name');
                textbox.setAttribute('name', 'realisasi_risiko');

            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_risiko');
            }
        }

        function Realisasisebab(val) {
            var select = document.getElementById('realisasi_sebab');
            var textbox = document.getElementById('other_realisasi_sebab');
            if (val == 'others') {

                textbox.style.display = 'block';
                textbox.setAttribute('name', 'realisasi_sebab');
                select.removeAttribute('name');
            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_sebab');
            }
        }

        function Realisasidampak(val) {
            var select = document.getElementById('realisasi_dampak');
            var textbox = document.getElementById('other_realisasi_dampak');
            if (val == 'others') {

                textbox.style.display = 'block';
                textbox.setAttribute('name', 'realisasi_dampak');
                select.removeAttribute('name');
            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_dampak');
            }
        }
    </script>