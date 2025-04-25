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


.table-responsive table th {
  /* Add or remove styles as desired: */
  font-weight: bold; /* Adjust font weight */
  line-height: 1.5; /* Adjust line height */
  text-align: center; /* Set default text alignment */
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-size: 14px;
}
.table-responsive table td {
    font-size: 14px;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}


</style>
</head>
<body>
<div class="page-header">
    <h1>Periode</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="periode" />
            <div class="form-group">
                <input class="form-control" type="search" placeholder="Pencarian. . ." name="q" value="<?= get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=periode_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Nama Periode</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(get('q'));
            $rows = $db->get_results("SELECT * FROM tb_periode WHERE (nama LIKE '%$q%' or tahun LIKE '%$q%' ) ORDER BY tahun");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td class='text-center'><?= $row->tahun ?></td>
                    <td class='text-center'><?= $row->nama ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td class='text-center'>
                        <a class="btn btn-xs btn-warning" href="?m=periode_ubah&ID=<?= $row->tahun ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=periode_hapus&ID=<?= $row->tahun ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>