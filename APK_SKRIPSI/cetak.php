<?php include 'functions.php'; ?>
<!doctype html>
<html>

<head>
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            font-size: 14px;
        }

        h1 {
            font-size: 18px;
            border-bottom: 2px solid #333;
            padding: 8px 0;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            font-family:Verdana, Geneva, Tahoma, sans-serif; /* Mengganti dengan jenis font yang diinginkan */
        }

        th {
            text-align: center;
            background-color: #f2f2f2;
        }

        .wrapper {
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        @media print {
            body {
                background-color: #fff;
            }

            h1 {
                border-bottom: none;
            }

            table {
                margin-bottom: 0;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="wrapper">
        <?php
        if (is_file($mod . '_cetak.php'))
            // cek periode
            if (is_null(get('periode'))) {
                $row = $db->get_row("SELECT * FROM tb_periode order by tahun desc limit 1");
                redirect_js("index.php?m=$mod&periode=$row->tahun");
                die;
            }

        $row = $db->get_row("SELECT * FROM tb_periode WHERE tahun='" . get('periode') . "'");
        if (is_null($row)) {
            echo <<<HTML
                <div class="page-header">
                    <h1>Periode Tidak Ditemukan</h1>
                </div>
            HTML;
            die;
        }

        $PERIODE = get('periode');
        include $mod . '_cetak.php';
        ?>
    </div>
</body>

</html>