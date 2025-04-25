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
select.form-control option {
  font-family:Verdana, Geneva, Tahoma, sans-serif; /* Ganti dengan font yang diinginkan */
  font-size: 14px; /* Ganti dengan ukuran font yang diinginkan */
}
#myDropdown select option {
  font-family: sans-serif; /* Ganti dengan font yang diinginkan */
  font-weight: bold; /* Tambahkan penebalan jika diinginkan */
}


</style>
</head>
<body>
<div class="page-header">
    <h1>Nilai Bobot Kriteria</h1>
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
<?php
if ($_POST) include 'aksi.php';

$rows = $db->get_results("SELECT k.kode_kriteria, rk.ID1, rk.ID2, nilai 
    FROM tb_rel_kriteria rk INNER JOIN tb_kriteria k ON k.kode_kriteria=rk.ID1 
    where rk.tahun = '$PERIODE'
    ORDER BY ID1, ID2");
$criterias = array();
$data = array();
foreach ($rows as $row) {
    $criterias[$row->ID1] = $row->kode_kriteria;
    $data[$row->ID1][$row->ID2] = $row->nilai;
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline" action="?m=rel_kriteria&periode=<?= get('periode') ?>" method="post">
            <div class="form-group">
                <select class="form-control" name="ID1">
                    <?= get_kriteria_option(post('ID1')) ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="nilai">
                    <?= AHP_get_nilai_option(post('nilai')) ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="ID2">
                    <?= get_kriteria_option(post('ID2')) ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Ubah</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php
                    $visibleCriterias = array_keys($data);
                    $visibleCriterias = array_slice($visibleCriterias, 0, 4); // Ambil 4 kriteria pertama
                    foreach ($visibleCriterias as $key) {
                        echo "<th>{$criterias[$key]}</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $a = 1;
                foreach ($data as $key => $value) : ?>
                    <tr>
                        <th class="nw"><?= $criterias[$key] ?></th>
                        <?php
                        $b = 1;
                        foreach ($visibleCriterias as $k) {
                            $valueToShow = isset($value[$k]) ? round($value[$k], 3) : ''; // Tambahkan penanganan jika data tidak ada
                            if ($key == $k)
                            $class = 'success';
                        elseif ($b > $a)
                            $class = 'danger';
                        else
                            $class = '';
                            echo "<td class='$class'>$valueToShow</td>";
                            $b++;
                        }
                        ?>
                    </tr>
                <?php $a++;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>
