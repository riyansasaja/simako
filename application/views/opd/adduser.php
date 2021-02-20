<main class="inputprogram mt-5">
    <div class="container">
        <div class="row">
            <div class="col">

                <section class="table">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Daftar User Per Bidang</h6>
                                    </div>
                                    <div class="card-body">
                                        <button type="button" name="" id="" class="btn btn-block btn-user bg-kedua text-white mb-3">Add Program</button>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Tujuan</th>
                                                        <th>Program</th>
                                                        <th>Output Kegiatan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tujuan</th>
                                                        <th>Program</th>
                                                        <th>Output Kegiatan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                    <?php for ($i = 1; $i <= 30; $i++) : ?>
                                                        <tr>
                                                            <td>Tiger Nixon</td>
                                                            <td>61</td>
                                                            <td>blabla bla bla bla</td>
                                                            <td>Detail | Edit | Delete</td>
                                                        </tr>
                                                    <?php endfor; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</main>