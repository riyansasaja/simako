<div class="row justify-content-start mb-2">
    <div class="col-6">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Kegiatan</h5>
            </div>
            <div class="card-body">
                <table class="table" id="tb_show_kegiatan">
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
                <table class="table" id="show_realisasi_kegiatan">
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

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<!-- modal input realisasi -->

<div class="modal fade" id="modal_realisasi_kegiatan" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
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
                    <input type="text" name="id_tk" id="id_tk" hidden>

                    <!-- <div class="form-group row"> -->
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_kegiatan" name="realisasi_kegiatan" onchange="Chekrealoutkegiatan(this.value)">
                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="otherrealOutKegiatan" rows="3" style='display:none;'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Realisasi Tujuan Kegiatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="realisasi_tujuan_kegiatan" name="realisasi_tujuan_kegiatan" onchange="Chekrealouttujuankegiatan(this.value);">

                            </select>
                            <div class="form-group">
                                <textarea class="form-control" id="otherrealtujuankegiatan" rows="3" style='display:none;'></textarea>
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
        function Chekrealoutkegiatan(val) {
            var select = document.getElementById('realOutKegiatan');
            var textbox = document.getElementById('otherrealOutKegiatan');
            if (val == 'others') {
                textbox.style.display = 'block';
                select.removeAttribute('name');
                textbox.setAttribute('name', 'realoutkegiatan');

            } else {
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realoutkegiatan');
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
                textbox.style.display = 'none';
                textbox.removeAttribute('name');
                select.setAttribute('name', 'realoutkegiatan');
            }
        }
    </script>