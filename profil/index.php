<?php
  session_start();
  $page="profil"; 
  if ( !isset($_SESSION['login'])) {
    header("Location: ../login/");
    exit;
  }
    require '../config/functions.php';
    $nim = $_SESSION['nim'];
    $namaMahasiswa = panggilNama($nim);
    
    $detailProfil = query("SELECT nim,
            nama,
            programstudi,
            tempatlahir,
            tanggallahir,
            tahunmasuk,
            kelas
     FROM mahasiswa WHERE nim = $nim");

    foreach ($detailProfil as $isiProfil) {
      $nim = $isiProfil['nim'];
      $nama = $isiProfil['nama'];
      $programstudi = $isiProfil['programstudi'];
      $tempatlahir = $isiProfil['tempatlahir'];
      $tanggallahir = $isiProfil['tanggallahir'];
      $tahunmasuk = $isiProfil['tahunmasuk'];
      $kelas = $isiProfil['kelas'];
      
    }
    if (isset($_POST["ubah"])){
      
      if ( ubahPassword($_POST) > 0 ) {
        echo ("
        <script type='text/javascript'>
          alert('Berhasil mengubah password');
          document.location.href = 'index.php';
        </script>
          ");
      } else {
        echo "
        <script>
          alert('Gagal mengubah password');
          
        </script>
          ";

      }
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
        <div class="container">
          <h2 align="center">Profil Mahasiswa</h2><br>
        <center><img style="width: 15%; height: 15%"; class="img-fluid " src="../images/default-logo-2.png"></center><br><br>
        <form class="container-fluid" method="post" action="">
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="nim" name="nim" value="<?= $nim; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $nama; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Program Studi</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="program_studi" value="<?= $programstudi; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="tmp_lahir" value="<?= $tempatlahir; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" readonly class="form-control-plaintext" id="tgl_lahir" value="<?= $tanggallahir; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Masuk</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="tahun_msk" value="<?= $tahunmasuk; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="kelas" value="<?= $kelas; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" required class="form-control-plaintext" id="password" placeholder="Masukan Password Baru">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="ubah">Ganti Password</button>
        </form><br>
           
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