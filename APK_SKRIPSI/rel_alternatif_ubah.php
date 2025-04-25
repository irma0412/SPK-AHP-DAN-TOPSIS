<?php
$PERIODE = isset($_GET['periode']) ? $_GET['periode'] : 0;
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='" . get('ID') . "'");
?>
<head>
<style>
    body {
        background-color: #3A3B3C;
        margin: 0;
    }
    .page-header small {
        color: white;
    }
    .btn-primary {
        background-color: #5630AB;
        border: 1px solid #5630AB;
    }
    .btn-primary:hover {
        background-color: #140439;
        border: 2px solid white;
    }
    .form-group label {
        color: white;
    }
</style>
</head>
<body>
<div class="page-header">
    <h1>Ubah Nilai Bobot &raquo; <small><?= $row->nama_alternatif ?></small></h1>
    <small>Periode <?= $PERIODE ?></small>
</div>
<div class="row">
    <div class="col-sm-4">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <?php
            $rows = $db->get_results("
                SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.nilai 
                FROM tb_rel_alternatif ra 
                INNER JOIN tb_kriteria k 
                ON k.kode_kriteria = ra.kode_kriteria  
                WHERE ra.tahun = '$PERIODE' 
                AND k.tahun = '$PERIODE' -- Filter tambahan untuk kriteria
                AND kode_alternatif = '" . get('ID') . "' 
                ORDER BY k.kode_kriteria
            ");
            if (!$rows) {
                echo "<p style='color: white;'>Tidak ada data untuk periode $PERIODE.</p>";
            } else {
                foreach ($rows as $row) : ?>
                    <div class="form-group">
                        <label><?= $row->nama_kriteria ?></label>
                        <input class="form-control" type="number" min="10" max="100" name="ID-<?= $row->ID ?>" value="<?= $row->nilai ?>" />
                    </div>
                <?php endforeach;
            } ?>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>
