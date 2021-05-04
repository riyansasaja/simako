<div class="row justify-content-start mb-3">
    <div class="col">

        <div class="col-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span class=""> Input Analisis Risiko </span>
                </div>
                <div class="card-body">

                    <!-- --Start Tabel -->
                    <table class="table table-borderless table-hover" id="tabletk">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Program</th>
                                <th scope="col">Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list as $l) : ?>
                                <tr class="clickable-row" data-href="<?= base_url('bidang/inputrisk/') . $l['id_tk']; ?>">
                                    <td><?= $i; ?></td>
                                    <td><?= $l['program']; ?></td>
                                    <td><?= $l['kegiatan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- ------ -->


                </div>
            </div>
        </div>

    </div>
</div>