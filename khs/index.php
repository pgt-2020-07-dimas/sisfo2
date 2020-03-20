<?php
  session_start();
   $page="khs"; 
   if ( !isset($_SESSION['login'])) {
     header("Location: ../login/");
     exit;
   }
     require '../config/functions.php';
     $nim = $_SESSION['nim'];
     $namaMahasiswa = panggilNama($nim);
     $tahunakademik =$_GET['tahunakademik'];
     $mutu = 0.0;
     $jmlsks = 0;
      $ipk = query("SELECT kodemk,namamk,sks,angka,huruf FROM `nilaiakademik` WHERE `nim` = $nim && `tahunakademik`= $tahunakademik");    
      foreach ($ipk as $index => $ip) {            
            $mutu += $ip['angka']*$ip['sks'];
            $jmlsks += $ip['sks'];                      
          }
      $ip = $mutu/$jmlsks;
      $ip = number_format($ip,2);


      if( isset($_POST['cetak'])){
        echo "<script>window.print();</script>";
      }
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sistem Informasi Akademik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/proyek-sisfo/css/style.css">
  </head>
  <body>		
    
		<div class="wrapper d-flex align-items-stretch">
      <!-- Side Bar  -->
      <?php include '../_PARTIAL/sidebar.php';?>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
        <!-- Div Data Mahasiswa  -->
    <div class="container">
      <h2 class="mb-4">Kartu Hasil Studi</h2>
      <table class="table table-sm table-borderless">
            <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $nim;?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $namaMahasiswa;?></td>
          </tr>
          <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td><?= $tahunakademik;?></td>
          </tr>
          </table>
          <br>
    <!-- Div Data Mahasiswa  -->
          <table class="table table-striped table-hover table-bordered">
          <caption></caption>
            <thead class="thead-dark">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Kode MK</th>
              <th scope="col">Matakuliah</th>
              <th scope="col">SKS</th>
              <th scope="col">Nilai</th>
              <th scope="col">Mutu</th>
            </tr>
            </thead>            
            <tbody>
              <?php $i=1; ?>    
              <?php foreach ($ipk as $row) : ?> 
             <tr>
              <td><?= $i; ?></td>
              <td><?= $row["kodemk"];?></td>
              <td><?= $row["namamk"];?></td>
              <td><?= $row["sks"];?></td>
              <td><?= $row["angka"];?></td>
              <td><?= $row["huruf"];?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>           
            </tbody>
          </table>
          <br>
          <table class="table">
            <tr>
            <td>Jumlah SKS</td>
            <td>:</td>
            <td><?=$jmlsks;?></td>
          </tr>
          <tr>
            <td>IP Kedisiplinan</td>
            <td>:</td>
            <td>4</td>
          </tr>
          <tr>
            <td>IP Akademik</td>
            <td>:</td>
            <td><?=$ipk;?></td>
          </tr>
          <tr>
            <td>IP Magang</td>
            <td>:</td>
            <td>4</td>
          </tr>
          </table>
          <br>
          <form method="post" action="">
          <button type="submit" name="cetak" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Cetak Nilai</button>
        </form>
    </div>
      </div>
		</div>
    <!-- Footer  -->
    <?php include '../_PARTIAL/footer.php'?>
    <script src="/proyek-sisfo/js/jquery.min.js"></script>
    <script src="/proyek-sisfo/js/popper.js"></script>
    <script src="/proyek-sisfo/js/bootstrap.min.js"></script>
    <script src="/proyek-sisfo/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>