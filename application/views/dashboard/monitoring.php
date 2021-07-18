<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <div class="">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <label for="exampleFormControlSelect1">Silah Pilih Monitoring</label>
                    </h6>
                    <select class="form-control" id="monitoring">
                        <option value="m_inputanprogram">Monitoring Inputan Program Kegiatan</option>
                        <option value="m_inputanrisiko">Monitoring Inputan Risiko</option>
                        <option value="m_inputanrtp">Monitoring Inputan RTP</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="show" id="m_inputanprogram">
    <div class="row">
        <!-- Monitoring Input Program -->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Inputan Program Kegiatan</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="monitoring_inputan_program">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">OPD</th>
                                <th scope="col">Program</th>
                                <th scope="col">Outcome</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Output</th>
                                <th scope="col">Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="show" id="m_inputanrisiko">
    <div class="row">
        <!-- Monitoring Input Program -->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Inputan Risiko</h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark" id="monitoring_inputan_risiko">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">OPD</th>
                                <th scope="col">Program</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Risiko</th>
                                <th scope="col">Sebab</th>
                                <th scope="col">Dampak</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="show" id="m_inputanrtp">
    <div class="row">
        <!-- Monitoring Input Program -->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Inputan RTP</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="monitoring_inputan_rtp">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">OPD</th>
                                <th scope="col">kegiatan</th>
                                <th scope="col">Risiko</th>
                                <th scope="col">Uraian RTP</th>
                                <th scope="col">Target Waktu</th>
                                <th scope="col">PJ</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>