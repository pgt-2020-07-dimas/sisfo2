<?php 
    session_start();
    $page="poin"; 
    if ( !isset($_SESSION['login'])) {
      header("Location: ../login/");
      exit;
    }
      require '../config/functions.php';
      $nim = $_SESSION['nim'];
      $namaMahasiswa = panggilNama($nim);
      $mahasiswa = query("SELECT `id`,`nim`,`nama`,`jenispoin`,`tanggal`,`poin`,`keterangan` FROM `logkondite` WHERE nim = $nim");


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
        <div class="container font-weight-bold text-dark">
          <!--Header -->
        <h2 class="mb-4">Kondite Mahasiswa</h2>
        
          <div class="row">
            <div class="col-md-9">
              <table class="table-sm">
                <tr>
                  <td>NIM</td>
                  <td>:</td>
                  <td><?= $mahasiswa[0]["nim"] ?></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?= $mahasiswa[0]["nama"] ?></td>
                </tr>
              </table>
            </div>
            <div class="col-md-3">
              <table class="table-sm">
                <tr>
                  <td>Total Poin</td>
                  <td>:</td>
                  <td>
                    <?php 
                    $jumlah=0;
                    foreach($mahasiswa as $index => $poin ){
                      $jumlah += $poin['poin'];
                    }
                    
                    $total = 80+$jumlah;
                    echo $total;
                    ?>                    
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <br>
        <!-- Tabel -->
        <table class="table table-sm table-hover">
          <thead class="thead-dark">
            <tr>
              <th>No.</th> 
              <th>Jenis Poin</th> 
              <th>Poin</th>
              <th>Tanggal</th> 
              <th>Keterangan</th>             
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>    
            <?php foreach ($mahasiswa as $row) : ?>
            <tr <?php if($row["poin"]<0) {
              echo "class='table table-danger'";
            } else {
              echo "class='table table-success'";
            }?>
            >
              <td><?= $i; ?></td>
              <td><?= $row["jenispoin"];?></td>
              <td><?= $row["poin"];?></td>
              <td><?= $row["tanggal"];?></td>
              <td><?= $row["keterangan"];?></td>
            </tr>
             <?php $i++; ?>
             <?php endforeach; ?>
            
          </tbody>
        </table>
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