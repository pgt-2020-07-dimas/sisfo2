<?php
 session_start();
 $page="evaluasi"; 
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
   $smt =[$smt1,$smt2,$smt3,$smt4,$smt5,$smt6];
   $imax =count($smt);
   if(isset($_POST['pilih'])){
    $tahunakademik = $_POST['tahunakademik'];
    $result = query("SELECT nama,mk,status,tahun from evaluasidosen where tahun="$tahunakademik);
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
      <div id="content" class="p-4 p-md-5 pt-5 text-dark">
        <div class="container">
          <!-- header-->
          <h2 class="mb-4">Evaluasi Proses Perkuliahan</h2>
        </div>          
        <div class="container">
          <!--TABEL PILIH TAHUN-->
          <form method="post" action="">
              <table class="table-sm font-weight-bold ">
                      <tr>
                        <td>Tahun Akademik</td>
                        <td>:</td>
                        <td><select class="form-control form-control-sm" name="tahunakademik">
                          <?php for($i=0;$i<$imax;$i++) :?>
                            
                              <option value="<?=$smt[$i];?>"><?=$smt[$i];?></option>
                            
                          <?php endfor;?>
                          </select>
                        </td>
                        <td>
                          <a href="#" type="submit" name="pilih"class="badge badge-primary">Pilih</a>
                        </td>
                      </tr>
              </table>
            </form>
          <!-- END TABEL PILIH TAHUN-->
          <!-- TABEL DAFTAR DOSEN-->
              <table class="table table-sm table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                   <th>No.</th> 
                   <th>Dosen</th>
                   <th>Mata Kuliah</th>
                   <th>Status</th>
                 </tr>
                </thead>
                <tbody>
                  <tr class="table-warning">
                    <td>1.</td>
                    <td>AHMAD ZOHARI,S.T.,M.T.</td>
                    <td>Praktek Teknologi Mekanik</td>
                    <td class="text-center align-middle"><a href="#" class="badge badge-danger">Isi</a></td>
                  </tr>
                  <tr class="table-success">
                    <td>2.</td>
                    <td>DYAN PUSPITASARI, S.Pd.</td> 
                    <td>Bahasa Inggris 1</td>
                    <td class="text-center align-middle">Sudah Terisi</td>
                  </tr>
                </tbody>
              </table>
          <!-- END TABEL DAFTAR DOSEN-->
          <!-- AWAL EVALUASI DOSEN-->
          <p class="font-weight-bold">Pilihlah dengan skala angka dari satu sampai lima, dimana satu adalah nilai terendah dan 5 adalah nilai tertinggi!</p>
          <!-- FORM EVALUASI-->
          <div class="row">
            <!-- kolom kanan-->
            <div class="col-md-6">
              <h6>A. Penyajian Kuliah</h6>
              <form>                
                <table class="table table-sm table-borderless">
                  <tr>
                    <td>1.</td>
                    <td>Dosen mengajar sesuai dengan jadwal kuliah yang telah ditentukan</td>
                    <td>
                      <select class="form-control-sm">
                        <option selected>-</option>
                        <?php for($i=1;$i<=5;$i++) : ?>
                        <option><?= $i ?></option>
                        <?php endfor?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Dosen mengajar sesuai dengan jadwal kuliah yang telah ditentukan</td>
                    <td>
                      <select class="form-control-sm">
                        <option selected>-</option>
                        <?php for($i=1;$i<=5;$i++) : ?>
                        <option><?= $i ?></option>
                        <?php endfor?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Dosen mengajar sesuai dengan jadwal kuliah yang telah ditentukan</td>
                    <td>
                      <select class="form-control-sm">
                        <option selected>-</option>
                        <?php for($i=1;$i<=5;$i++) : ?>
                        <option><?= $i ?></option>
                        <?php endfor?>
                      </select>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
            <!-- kolom kiri-->
            <div class="col-md-6">
              
            </div>
            
          </div>
          <!-- END FORM EVALUASI--> 
          <!-- END EVALUASI DOSEN-->
            </div>           
        <!-- END CONTAINER-->
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