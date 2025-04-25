<head>
<style>
    body {
      background-color: #3A3B3C;
      margin: 0; /* Menghilangkan margin bawaan dari body */
    }
    .btn-primary{
        background-color: #5630AB;
        border: 1px solid #5630AB;
    }
    .btn-primary:hover {
    background-color: #140439;
    border:2px solid white;
}
.table-responsive table th{
    font-size: 14px;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
   text-align: center;
}
.table-responsive table td {
    font-size: 14px;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}

</style>

</head>
<body>
<div class="page-header">
    <h1>Data Kriteria</h1>
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
            <input type="hidden" name="m" value="kriteria" />
            <input type="hidden" name="periode" value="<?= get('periode') ?>" />
            <div class="form-group">
                <input class="form-control" type="search" placeholder="Pencarian. . ." name="q" value="<?= get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=kriteria_tambah&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?m=kriteria&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kriteria</th>
                    <th>Atribut</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(get('q'));
            $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' and tahun = '$PERIODE' ORDER BY kode_kriteria");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td class='text-center'><?= $row->kode_kriteria ?></td>
                    <td ><?= $row->nama_kriteria ?></td>
                    <td class='text-center'><?= $row->atribut ?></td>
                    <td class='text-center'>
                        <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=<?= $row->kode_kriteria ?>&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=<?= $row->kode_kriteria ?>&periode=<?= get('periode') ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>