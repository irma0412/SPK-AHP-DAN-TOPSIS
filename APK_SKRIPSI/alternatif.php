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
.pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            background-color: #5630AB;
            border: 1px solid #5630AB;
            margin: 0 4px;
            border-radius: 4px;
        }
        .pagination a:hover {
            background-color: #140439;
            border: 2px solid white;
        }
        .pagination .active {
            background-color: #140439;
            border: 2px solid white;
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
    <h1>Data Alternatif</h1>
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
        <form class="form-inline" action="" method="get">
    <?php
    $periodes = $db->get_results("SELECT * FROM tb_periode ORDER BY tahun");
    $kelasList = $db->get_results("SELECT DISTINCT kelas FROM tb_alternatif WHERE tahun = " . get('periode'));
    ?>
    <input type="hidden" name="m" value="<?= get('m') ?>">

        
    </form>
    

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="alternatif" />
            <input type="hidden" name="periode" value="<?= get('periode') ?>" />
            <div class="form-group">
                <input class="form-control" type="search" placeholder="Pencarian. . ." name="q" value="<?= get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?m=alternatif&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
            

        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(get('q'));
            $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE (nama_alternatif LIKE '%$q%' and tahun = $PERIODE) ORDER BY CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED), kode_alternatif;");
            $no = 0;

            // Tambahkan variabel untuk halaman
            $items_per_page = 20;
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($current_page - 1) * $items_per_page;
            $paged_rows = array_slice($rows, $start, $items_per_page);

            $no_start = ($current_page - 1) * $items_per_page + 1; // Hitung nomor awal pada halaman ini

foreach ($paged_rows as $row) : ?>
    <tr>
        <td class='text-center'><?= $no_start++ ?></td> <!-- Tambahkan nomor berurutan -->
        <td class='text-center'><?= $row->kode_alternatif ?></td>
        <td><?= $row->nama_alternatif ?></td>
        <td class='text-center'><?= $row->kelas ?></td>
        <td class='text-center'>
            <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=<?= $row->kode_alternatif ?>&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=<?= $row->kode_alternatif ?>&periode=<?= get('periode') ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
<?php endforeach; ?>
            
        </table>
    </div>
     <!-- Tambahkan tombol Next -->
     <div class="pagination">
            <?php
            $total_items = count($rows);
            $total_pages = ceil($total_items / $items_per_page);

            if ($total_pages > 1) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a href="?m=alternatif&periode=' . get('periode') . '&q=' . get('q') . '&page=' . $i . '" ' . ($i == $current_page ? 'class="active"' : '') . '>' . $i . '</a>';
                }
            }
            ?>
        </div>
</div>
