
<h1>Hasil Perhitungan</h1>
<small>Periode <?= get('periode') ?></small>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class='text-center'>Rank</th>
            <th class='text-center'>Kode</th>
            <th class='text-center'>Nama Alternatif</th>
            <th class='text-center'>Kelas</th>
            <th class='text-center'>Total</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(get('q'));
    $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE tahun=$PERIODE AND nama_alternatif LIKE '%$q%' ORDER BY total DESC");
    $no = 0;

    foreach ($rows as $row) : ?>
        <tr>
            <td class='text-center'><?= $row->rank ?></td>
            <td class='text-center'><?= $row->kode_alternatif ?></td>
            <td><?= $row->nama_alternatif ?></td>
            <td class='text-center'><?= $row->kelas ?></td>
            <td><?= $row->total ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>