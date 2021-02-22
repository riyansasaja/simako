<main>


    <section class="rekap">
        <div class="container">
            <!-- Page Heading -->

            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
                <h1 class="h3 mb-0 text-gray-800">ADMIN <?= strtoupper($this->session->userdata('name')); ?></h1>
            </div>
            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Program</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">10 Program</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Inputan Manajemen Resiko</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">5 Program</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-keyboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Program Beresiko Tinggi
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">3 Program</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-surprise fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Inputan RTP</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2 Program</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-creative-commons-sampling fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
        </div>
    </section>

    <section class="table">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Program Bidang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Nilai Resiko</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $i = 1; ?>
                                        <?php foreach ($programs as $p) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $p['program']; ?></td>
                                                <td><?= $p['kegiatan']; ?></td>
                                                <td><?= $p['totalskor']; ?></td>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>