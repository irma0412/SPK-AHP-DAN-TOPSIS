<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='" . get('ID') . "'");
?>
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
.form-group label{
    color:white;
}
</style>

</head>
<body>
<div class="page-header">
    <h1>Ubah Data Alternatif</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?= $row->kode_alternatif ?>" />
            </div>
            <div class="form-group">
                <label>Nama Siswa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= $row->nama_alternatif ?>" />
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <textarea class="form-control" name="kelas"><?= $row->kelas ?></textarea>
            </div>
            <div class="page-header">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>