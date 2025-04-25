<?php
include 'functions.php';
if (empty($_SESSION['login']))
  header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
 <!-- Pengaturan karakter set dan kompatibilitas browser -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Deskripsi singkat mengenai situs web -->
<meta name="description" content="Sistem Pendukung Keputusan (SPK) Metode Analytical Hierarchy Proccess(AHP) dan Technique For Others Reference by Similarity to Ideal Solution (TOPSIS) berbasis web dengan PHP dan MySQL. Studi kasus: pemilihan siswa berprestasi." />

<!-- Kata kunci untuk SEO dan pengindeksan -->
<meta name="keywords" content="Sistem Pendukung Keputusan, Decision Support System, Analytical Hierarchy Proccess, AHP, Technique For Others Reference by Similarity to Ideal Solution, TOPSIS, pemilihan siswa berprestasi, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery" />

<!-- Favicon untuk situs web -->
<link rel="icon" href="favicon.ico">

<!-- URL kanonikal situs web -->
<link rel="canonical" href="http://ilmuskripsi.com" />

<!-- Judul halaman web -->
<title>SPK Metode AHP dan TOPSIS</title>

<!-- Pemanggilan stylesheet untuk menggunakan tema Bootstrap Flatly -->
<link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet" />

<!-- Pemanggilan stylesheet  tambahan untuk css navbar -->
<link href="assets/css/navbar.css" rel="stylesheet" />

<!-- Pemanggilan stylesheet tambahan untuk gaya umum -->
<link href="assets/css/general.css" rel="stylesheet" />

<!-- Pemanggilan script jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Pemanggilan script Bootstrap untuk fungsi JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>


  <style>

    body{
      background-color: #13072E;
    }
    /* Gaya Navbar Brand (logo) */
.navbar-default .navbar-brand img {
    max-height: 55px;
    width: 125px;
    display: block;
    margin: 0 auto;
}
.nav a{
  font-size: 18px;
  font-family:Arial, Helvetica, sans-serif;
  font-weight: bold;
  text-shadow: 1px 1px 8px black;
}
       .footer {
    background-color: #13072E;
    color: white;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  .footer p{
    color: white;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }
  </style>
</head>

<body>
  <!-- Navbar dengan gaya default dan posisi statis -->
<nav class="navbar navbar-default navbar-static-top">
  
  <!-- Tautan ke halaman utama dengan logo -->
  <a class="navbar-brand" href="?"><img src="assets/img/logo.png" ></a>

  <!-- Container untuk mengelompokkan elemen navbar -->
  <div class="container">
    
    <!-- Bagian header navbar dengan tombol toggle untuk responsif mobile -->
    <div class="navbar-header">
      
      <!-- Tombol toggle untuk menu responsif -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <!-- Penanda visual untuk tombol toggle -->
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Container dengan id #navbar untuk menyesuaikan menu pada resolusi kecil -->
    <div id="navbar" class="navbar-collapse collapse">
      
      <!-- Daftar navigasi dengan class navbar-nav untuk penataan horizontal -->
      <ul class="nav navbar-nav">
        
        <!-- Item navigasi untuk Periode -->
        <li class="<?= isActive(['periode', 'periode_tambah']) ?>" class="?m=periode">
          <a href="?m=periode&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-list-alt"></span> Periode</a>
        </li>

        <!-- Item navigasi untuk Kriteria (dropdown) -->
        <li class="<?= isActive(['kriteria', 'rel_kriteria', 'kriteria_tambah', 'kriteria_ubah']) ?>" class="dropdown">
          <a href="?m=kriteria&periode=<?= get('periode') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="glyphicon glyphicon-th-large"></span> Kriteria <span class="caret"></span>
          </a>
          <!-- Sub-menu untuk Kriteria -->
          <ul class="dropdown-menu" role="menu">
            <li class="<?= isActive(['kriteria', 'kriteria_tambah', 'kriteria_ubah']) ?>">
              <a href="?m=kriteria&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-th-large"></span> Data Kriteria</a>
            </li>
            <li class="<?= isActive('rel_kriteria') ?>">
              <a href="?m=rel_kriteria&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-th-list"></span> Nilai bobot kriteria</a>
            </li>
          </ul>
        </li>

        <!-- Item navigasi untuk Alternatif (dropdown) -->
        <li class="<?= isActive(['alternatif', 'rel_alternatif', 'alternatif_tambah', 'alternatif_ubah', 'rel_alternatif_ubah']) ?>" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span>
          </a>
          <!-- Sub-menu untuk Alternatif -->
          <ul class="dropdown-menu" role="menu">
            <li class="<?= isActive(['alternatif', 'alternatif_tambah', 'alternatif_ubah']) ?>">
              <a href="?m=alternatif&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-user"></span> Data Alternatif</a>
            </li>
            <li class="<?= isActive(['rel_alternatif', 'rel_alternatif_ubah']) ?>">
              <a href="?m=rel_alternatif&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-signal"></span> Nilai bobot alternatif</a>
            </li>
          </ul>
        </li>

        <!-- Item navigasi untuk Perhitungan -->
        <li class="<?= isActive('hitung') ?>">
          <a href="?m=hitung&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a>
        </li>

        <!-- Item navigasi untuk Logout -->
        <li class="<?= isActive('logout') ?>">
          <a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </li>
      </ul>

      <!-- Elemen tambahan dalam navbar jika diperlukan -->
      <div class="navbar-text"></div>
    </div><!--/.nav-collapse -->
     </div>
  </nav>

  <div class="container">
    <?php
    // Memeriksa apakah file modul ($mod) yang diinginkan ada
    if (file_exists($mod . '.php')) {
      
      // Memeriksa apakah modul bukan termasuk ['periode', 'periode_cetak', 'periode_tambah', 'periode_ubah']
      if (!in_array($mod, ['periode', 'periode_cetak', 'periode_tambah', 'periode_ubah'])) {
        
        // Pengecekan periode: Apakah parameter 'periode' telah diberikan dalam URL
        if (is_null(get('periode'))) {
          
          // Jika tidak ada periode yang diberikan, mencari periode terbaru dari database
          $row = $db->get_row("SELECT * FROM tb_periode ORDER BY tahun DESC LIMIT 1");
          
          // Jika tidak ada periode yang tersedia
          if (is_null($row)) {
            // Redirect ke halaman 'periode' jika belum ada periode yang tersedia
            redirect_js("index.php?m=periode");
          } else {
            // Redirect ke modul yang diminta dengan menggunakan periode terbaru
            redirect_js("index.php?m=$mod&periode=$row->tahun");
          }
          
          // Memastikan tidak ada eksekusi kode lanjutan setelah redirect
          die;
        }
      

        // jika parameter periode ada
        $row = $db->get_row("SELECT * FROM tb_periode WHERE tahun='" . get('periode') . "'");
        if (is_null($row)) {
          // jika periode tidak valid
          $row = $db->get_row("SELECT * FROM tb_periode order by tahun desc limit 1");

          if (is_null($row)) {
            // jika periode belum ada
            redirect_js("index.php?m=periode");
          } else {
            // lempar jika periode tidak valid ke periode terbaru
            redirect_js("index.php?m=$mod&periode=$row->tahun");
          }
        }
      }
      // Mengambil nilai dari parameter 'periode' dalam URL
      $PERIODE = get('periode');
      // Memasukkan konten modul yang sesuai dengan variabel $mod
  // Jika $mod adalah 'periode', 'periode_cetak', 'periode_tambah', atau 'periode_ubah',
  // maka akan memuat file modul tersebut. Jika tidak, akan memuat 'home.php'.
      include $mod . '.php';
    } else {
      include 'home.php';
    }
    ?>
  </div>
  <!-- Bagian Footer -->
  <footer class="footer bg-primary">
    <div class="container">
       <!-- Menampilkan informasi hak cipta dengan tahun saat ini -->
      <p>Copyright &copy; <?= date('Y') ?> Irma Suryani <em class="pull-right"></em></p>
    </div>
  </footer>
</body>

</html>