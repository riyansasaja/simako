<div class="row justify-content-start mb-3">

    <div class="col">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Sebab</th>
                        <th scope="col">Akibat</th>
                        <th scope="col">Saran</th>
                        <th scope="col">Sumber Data</th>
                        <th scope="col">Pernyataan Risiko</th>
                        <th scope="col">Sebab</th>
                        <th scope="col">Dampak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($listriwayat as $list) : ?>

                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $list['kondisi']; ?></td>
                            <td><?= $list['kriteria']; ?></td>
                            <td><?= $list['sebab_uraian']; ?></td>
                            <td><?= $list['akibat']; ?></td>
                            <td><?= $list['saran']; ?></td>
                            <td><?= $list['sumber_data']; ?></td>
                            <td><?= $list['pernyataan_resiko']; ?></td>
                            <td><?= $list['sebab']; ?></td>
                            <td><?= $list['dampak']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>

</div>