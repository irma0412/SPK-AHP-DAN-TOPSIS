<head>
<style>
    body {
        background-color: #3A3B3C;
        margin: 0; /* Menghilangkan margin bawaan dari body */
    }
    .btn-primary {
        background-color: #5630AB;
        border: 1px solid #5630AB;
    }
    .btn-primary:hover {
        background-color: #140439;
        border: 2px solid white;
    }
    .table-responsive {
        padding-bottom: 20px;
    }
    .table-responsive table th {
        font-size: 14px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-align: center;
    }
    .table-responsive table td {
        font-size: 14px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>
</head>
<body>
<div class="page-header">
    <h1>Nilai Bobot Alternatif</h1>
    <form class="form-inline" action="" method="get">
        <?php
        $periodes = $db->get_results("SELECT * FROM tb_periode ORDER BY tahun");
        ?>
        <input type="hidden" name="m" value="<?= get('m') ?>">
        <div class="form-group">
            <select class="form-control" name="periode">
                <?php foreach ($periodes as $periode) { ?>
                    <option value="<?= $periode->tahun ?>" <?= $periode->tahun == get('periode') ? 'selected' : '' ?>><?= $periode->nama ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-list-alt"></span> Set Periode</button>
        </div>
    </form>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_alternatif" />
            <input type="hidden" name="periode" value="<?= get('periode') ?>" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= get('q') ?>" placeholder="Pencarian" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Siswa</th>
                    <?php
                    $periode = intval(get('periode'));
                    $heads = $db->get_var("SELECT COUNT(*) FROM tb_kriteria WHERE tahun = $periode");
                    if ($heads > 0) :
                        for ($a = 1; $a <= $heads; $a++) {
                            echo "<th>C$a</th>";
                        }
                    endif;
                    ?>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $q = is_null(get('q')) ? '' : get('q');

                $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' AND tahun = $periode ORDER BY CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED), kode_alternatif");
                $data = TOPSIS_get_hasil_analisa();

                foreach ($rows as $row) : ?>
                    <tr>
                        <td class='text-center'><?= $row->kode_alternatif ?></td>
                        <td><?= $row->nama_alternatif ?></td>
                        <?php 
                        foreach ($data[$row->kode_alternatif] as $key => $val) : ?>
                            <td class='text-center'><?= $val ?></td>
                        <?php endforeach ?>
                        <td class='text-center'>
                            <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?= $row->kode_alternatif ?>&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>