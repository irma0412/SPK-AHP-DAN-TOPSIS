<!-- Judul Halaman -->
<h1>Kriteria</h1>

<!-- Informasi Periode -->
<small>Periode <?= get('periode') ?></small>

<!-- Tabel Kriteria -->
<table>
    <thead>
        <!-- Header Tabel -->
        <tr>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Atribut</th>
        </tr>
    </thead>
    
    <!-- Menampilkan Data Kriteria dari Database -->
    <?php
    // Mendapatkan nilai pencarian dari parameter 'q' dalam URL
    $q = esc_field(get('q'));

    // Mengambil data kriteria dari database berdasarkan periode dan kriteria pencarian
    $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' and tahun = '$PERIODE' ORDER BY kode_kriteria");

    // Inisialisasi variabel nomor urut
    $no = 0;

    // Looping untuk menampilkan setiap baris data kriteria dalam tabel
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row->kode_kriteria ?></td>
            <td><?= $row->nama_kriteria ?></td>
            <td><?= $row->atribut ?></td>
        </tr>
    <?php endforeach; ?>
</table>
