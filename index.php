<?php
  session_start();
  $page="beranda";  
  if ( !isset($_SESSION['login'])) {
    header("Location: login/");
    exit;
  }
  //koneksi ke database
    require 'config/functions.php';
    $nim = $_SESSION['nim'];
    $namaMahasiswa = panggilNama($nim);
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
		<link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
		<div class="wrapper d-flex align-items-stretch">
      <!-- Side Bar  -->
      <?php include '_PARTIAL/sidebar.php';?>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Selamat datang <strong><?php echo $namaMahasiswa;?></strong> di Sistem Informasi Akademik Politeknik Gajah Tunggal<br> Anda Login Sebagai <strong>Mahasiswa</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <br>
        <img src="/proyek-sisfo/images/welcome1.jpg" class="img-fluid h-auto" alt="Responsive image">
      </div>
		</div>
  </div>
    <!-- Footer  -->
    <?php include '_PARTIAL/footer.php'?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>