<!DOCTYPE html>
<html lang="en">

<head>
 <style>
  
    body {
    background-color: #13072E;

      margin: 0; /* Menghilangkan margin bawaan dari body */
    }
    .box1{
    width:100%;
    height:500px;
    background:#291458;
    border-radius: 20px;
    }
    .page-header {
      padding: 0%;
      text-align: center;
      display: flex; /* Menggunakan flexbox */
      align-items: center; /* Mengatur elemen untuk berada di tengah vertikal */
      justify-content: center; /* Mengatur elemen agar berada di tengah horizontal */
    }
    .page-header p {
     
      color: white;
      padding-left: 30px;
      margin-right: 20px; /* Memberikan margin kanan antara teks dan gambar */
      font-size: 18px;
      font-family:Verdana, Geneva, Tahoma, sans-serif;
    }


     h1 {
      color: white;
      padding-top: 20px;
      padding-left: 30px;
      text-shadow: 5px 5px 5px black;
      font-size: 45px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;

    }
 
  .page-header img{
    width: 210px;
    height: auto;
  }
  .container-fluid.profile {
    padding-top: 0; /* Menghapus padding top pada class container-fluid.profile */
  }
  .col-md-3 h5{
  color : white;
  text-shadow: 5px 5px 5px black;
      font-size: 16px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
  }
  .col-md-3 img {
    width: 100px;
    height: auto;
    border-radius: 50%;
    border: 1px solid #291458; /* Menambah border dengan ketebalan 3px dan warna putih */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Menambah efek bayangan pada gambar */
    transition: transform 0.3s ease-in-out; /* Menambahkan efek transisi pada transformasi */
  }

  .col-md-3 img:hover {
    transform: scale(1.1); /* Membesarkan gambar ketika dihover */
  }
    .footer {
    background-color: #13072E;
    color: white;
    text-align: center;
  }


   </style>
</head>
  <body>

  <div class="box1">
    <h1>SPK Metode AHP dan TOPSIS</h1>
  <!-- Bagian Header dengan keterangan singkat mengenai tujuan dan metode yang digunakan -->
<div class="page-header">
    <p>
        Website ini memanfaatkan dua metode pendukung keputusan, yakni AHP dan TOPSIS.
        Pendekatan ini didasarkan pada prinsip bahwa alternatif terbaik tidak hanya memiliki
        jarak terpendek dari solusi ideal positif, tetapi juga harus memiliki jarak terpanjang
        dari solusi ideal negatif. Tujuan dari penerapan metode ini adalah untuk memberikan
        rekomendasi dalam menentukan siswa berprestasi di lingkungan SMK Yapermas Jakarta Pusat
        sesuai dengan harapan yang diinginkan.
    </p>
    <img src="assets/img/gif-unscreen.gif">
</div>
<!-- Bagian Container untuk profil dengan tiga kolom, masing-masing mewakili metode AHP, TOPSIS, dan Kontak -->
<div class="container-fluid profile pt-5 pb-5">
    <div class="container text-center">
        <div class="row pt-4 ">
            <!-- Kolom pertama dengan informasi dan gambar Metode AHP -->
            <div class="col-md-3 ">
            <img src="assets/img/ahppp.png">
                <h5 class="mt-3"> Metode AHP</h5>
            </div>
            <!-- Kolom kedua dengan informasi dan gambar Metode TOPSIS -->
            <div class="col-md-3 ">
                <img src="assets/img/spkok.png">
                <h5 class="mt-3"> SPK</h5>
            </div>
            <!-- Kolom ketiga dengan informasi dan gambar Kontak -->
            <div class="col-md-3 ">
                <img src="assets/img/topsiss.png">
                <h5 class="mt-3"> Metode TOPSIS</h5>
            </div>
                 </div>
        </div>
      </div>
      </div>
</body>

</html>
