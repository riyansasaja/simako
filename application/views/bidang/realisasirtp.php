<div class="row justify-content-start mb-2">
    <div class="col">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Rencana RTP Per Risiko</h5>
            </div>
            <div class="card-body">
                <table class="table" id="tb_show_rtp">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Risiko</th>
                            <th scope="col">Uraian RTP</th>
                            <th scope="col">Target Waktu</th>
                            <th scope="col">PJ</th>
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
                <h5>Daftar Realisasi RTP Per Risiko</h5>
            </div>
            <div class="card-body">
                <table class="table" id="tb_show_realisasi_rtp">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Risiko</th>
                            <th scope="col">Realisasi RTP</th>
                            <th scope="col">Realisasi Target Waktu</th>
                            <th scope="col">Realisasi PJ</th>
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

<div class="modal fade" id="modal_realisasi_rtp" tabindex="-1" aria-labelledby="Modal Realisasi RTP" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Input Realisasi RTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_edit" method="POST" action="<?= base_url('bidang/add_realisasi_rtp'); ?>">
                    <input type="text" name="id_rtp" id="id_rtp" hidden>

                    <!-- <div class="form-group row"> -->
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Uraian RTP</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_uraian_rtp" name="realisasi_uraian_rtp" onchange="Realisasi_uraian_rtp(this.value)">
                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="other_realisasi_uraian_rtp" rows="3" style='display:none;'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Target Waktu</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_target_waktu" name="realisasi_target_waktu" onchange="Realisasi_target_waktu(this.value);">

                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="other_realisasi_target_waktu" rows="3" style='display:none;'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi pj</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_pj" name="realisasi_pj" onchange="Realisasi_pj(this.value);">

                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="other_realisasi_pj" rows="3" style='display:none;'></textarea>
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
        function Realisasi_uraian_rtp(val) {
            var select = document.getElementById('realisasi_uraian_rtp');
            var textbox = document.getElementById('other_realisasi_uraian_rtp');
            if (val == 'others') {
                textbox.style.display = 'block';
                select.removeAttribute('name');
                textbox.setAttribute('name', 'realisasi_uraian_rtp');

            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_uraian_rtp');
            }
        }

        function Realisasi_target_waktu(val) {
            var select = document.getElementById('realisasi_target_waktu');
            var textbox = document.getElementById('other_realisasi_target_waktu');
            if (val == 'others') {

                textbox.style.display = 'block';
                textbox.setAttribute('name', 'realisasi_target_waktu');
                select.removeAttribute('name');
            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_target_waktu');
            }
        }

        function Realisasi_pj(val) {
            var select = document.getElementById('realisasi_pj');
            var textbox = document.getElementById('other_realisasi_pj');
            if (val == 'others') {

                textbox.style.display = 'block';
                textbox.setAttribute('name', 'realisasi_pj');
                select.removeAttribute('name');
            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realisasi_pj');
            }
        }
    </script>