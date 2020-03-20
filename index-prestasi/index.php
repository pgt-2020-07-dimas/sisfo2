<?php
    session_start();
    $page="index"; 
    if ( !isset($_SESSION['login'])) {
      header("Location: ../login/");
      exit;
    }
      require '../config/functions.php';
      $nim = $_SESSION['nim'];
      $namaMahasiswa = panggilNama($nim);
      $tahunMasuk = panggilTahun($nim);
      $smt1 = $tahunMasuk . 1;
      $smt2 = $smt1 +1;
      $smt3 = $tahunMasuk +1;
      $smt3 .=1;
      $smt4 = $smt3 +1;
      $smt5 = $tahunMasuk+2;
      $smt5 .=1;
      $smt6 = $smt5 +1;
      //ip semester 1
      $mutu1 = 0.0;
      $jmlsks1 = 0;
      $ipk = query("SELECT * FROM `nilaiakademik` WHERE `nim` = $nim && `tahunakademik`= $smt1");      
      foreach ($ipk as $index => $ip) {
            $nim = $ip['nim'];
            $nama = $ip['nama'];
            $mutu1 += $ip['angka']*$ip['sks'];
            $jmlsks1 += $ip['sks'];
            $statusmk1[] = $ip['statusmk'];            
          }
      $ip1 = $mutu1/$jmlsks1;
      $ip1 = number_format($ip1,2);

      //ip semester 2
      $mutu2 = 0.0;
      $jmlsks2 = 0;      
      $ipk = query("SELECT nim,nama,angka,sks FROM `nilaiakademik` WHERE `nim` = '$nim' && `tahunakademik`= '$smt2'");
      foreach ($ipk as $index => $ip) {            
            $mutu2 += $ip['angka']*$ip['sks'];
            $jmlsks2 += $ip['sks'];                      
          }
      $ip2 = $mutu2/$jmlsks2;
      $ip2 = number_format($ip2,2);

      //ip semester 3
      $mutu3 = 0.0;
      $jmlsks3 = 0;      
      $ipk = query("SELECT nim,nama,angka,sks FROM `nilaiakademik` WHERE `nim` = '$nim' && `tahunakademik`= '$smt3'");
      foreach ($ipk as $index => $ip) {            
            $mutu3 += $ip['angka']*$ip['sks'];
            $jmlsks3 += $ip['sks'];                      
          }
      $ip3 = $mutu3/$jmlsks3;
      $ip3 = number_format($ip3,2);

      //ip semester 4
      $mutu4 = 0.0;
      $jmlsks4 = 0;      
      $ipk = query("SELECT nim,nama,angka,sks FROM `nilaiakademik` WHERE `nim` = '$nim' && `tahunakademik`= '$smt4'");
      foreach ($ipk as $index => $ip) {            
            $mutu4 += $ip['angka']*$ip['sks'];
            $jmlsks4 += $ip['sks'];                      
          }
      $ip4 = $mutu4/$jmlsks4;
      $ip4 = number_format($ip4,2);

      //ip semester 5
      $mutu5 = 0.0;
      $jmlsks5 = 0;      
      $ipk = query("SELECT nim,nama,angka,sks FROM `nilaiakademik` WHERE `nim` = '$nim' && `tahunakademik`= '$smt5'");
      foreach ($ipk as $index => $ip) {            
            $mutu5 += $ip['angka']*$ip['sks'];
            $jmlsks5 += $ip['sks'];                      
          }
      $ip5 = $mutu5/$jmlsks5;
      $ip5 = number_format($ip5,2);

      //ip semester 6
      $mutu6 = 0.0;
      $jmlsks6 = 0;      
      $ipk = query("SELECT nim,nama,angka,sks FROM `nilaiakademik` WHERE `nim` = '$nim' && `tahunakademik`= '$smt6'");
      foreach ($ipk as $index => $ip) {            
            $mutu6 += $ip['angka']*$ip['sks'];
            $jmlsks6 += $ip['sks'];                      
          }
      $ip6 = $mutu6/$jmlsks6;
      $ip6 = number_format($ip6,2);
      $ipkum = [$ip1,$ip2,$ip3,$ip4,$ip5,$ip6,];
      $ipksem = array_sum($ipkum)/count($ipkum);
      $ipksem = number_format($ipksem,2);
      if( isset($_POST['cetak'])){
        echo "<script>window.print();</script>";
      }
      
?>
<!doctype html>
<html lang="en">
  <head>
  	<title class="hilang">Sistem Informasi Akademik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/proyek-sisfo/css/style.css">
    <style type="text/css">
      @media print {
        .hilang {
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <?//= var_dump($ipksem);?>
    
		<div class="wrapper d-flex align-items-stretch">
      <!-- Side Bar  -->
      <?php include '../_PARTIAL/sidebar.php';?>
      <!-- Page Content  -->
      <div class="container">
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Rekapitulasi Nilai</h2>
        <!-- Div Data Mahasiswa  -->
    <div class="table-responsive">
      <table class="table  table-sm table-borderless">
            <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $nim?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $nama?></td>
          </tr>
          </table>
          <br>
    <!-- Div Rekapitulasi Nilai  -->
          <table class="table table-striped table-hover table-bordered">
          <caption></caption>
            <thead class="thead-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col"><a class="text-decoration-none text-white" href="/proyek-sisfo/khs?tahunakademik=<?=$smt1;?>">Semester 1</a></th>
              <th scope="col"><a class="text-decoration-none text-white" href="/proyek-sisfo/khs?tahunakademik=<?=$smt2;?>">Semester 2</a></th>
              <th scope="col"><a class="text-decoration-none text-white" href="/proyek-sisfo/khs?tahunakademik=<?=$smt3;?>">Semester 3</a></th>
              <th scope="col"><a class="text-decoration-none text-white" href="/proyek-sisfo/khs?tahunakademik=<?=$smt4;?>">Semester 4</a></th>
              <th scope="col"><a class="text-decoration-none text-white" href="/proyek-sisfo/khs?tahunakademik=<?=$smt5;?>">Semester 5</a></th>
              <th scope="col"><a class="text-decoration-none text-white" href="/proyek-sisfo/khs?tahunakademik=<?=$smt6;?>">Semester 6</a></th>
              <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
             <tr>
              <th scope="row">Kondite</th>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
            </tr>
            <tr>
              <th scope="row">Akademik</th>
              <?php for($i=0;$i<=5;$i++) :;?>         
              <td><?= $ipkum[$i];?></td>              
              <?php endfor;?>
              <td><?=$ipksem?></td>
            </tr>
            <tr>
              <th scope="row">Magang</th>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
              <td>4</td>
            </tr>
            <tr>
              <th colspan="7">IPK Kelulusan</th>
              <td><?= number_format((($ipksem+4+4)/3),2)?></td>
            </tr>
            </tbody>
          </table>
          <br>
          <form class="hilang"method="post" action="">
          <button type="submit" name ="cetak"class="btn btn-primary hilang"><i class="fa fa-print" aria-hidden="true"></i> Cetak Nilai</button>
        </form>
    </div>
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