<?php
		session_start();
		require '../config/functions.php';
		//cek cookie
		if (isset($_COOKIE['verify']) && isset($_COOKIE['key'])) {
			
			$verify = $_COOKIE['verify'];
			$key = $_COOKIE['key'];

			//ambil username buat verify dengan key
			$result = mysqli_query($koneksi,"SELECT nama FROM mahasiswa WHERE nim =$verify");
			$row = mysqli_fetch_assoc($result);

			

			//cek cookie dan username

			if ($key === hash('sha256', $row['nama'])) {
				$_SESSION['login'] = true;
			}

		}


		//cek sesi
		if (isset($_SESSION['login'])) {
		header("Location: ../");
		exit;
		}
		
		if (isset($_POST['login'])) {
			
			$nim = $_POST['nim'];
			$password = $_POST['password'];

			$result = mysqli_query($koneksi,"SELECT nim,nama,status,password from mahasiswa WHERE nim='$nim'");
			//cek username
			
			if (mysqli_num_rows($result) === 1) {
				//cek password dan status

				$row = mysqli_fetch_assoc($result);
					//cek status
				if ($row['status'] == '0') {
					echo "<script>
							alert('Mahasiswa sudah tidak aktif');
							document.location.href = '../';
							</script>";
						exit;
				}
				
				
				if(password_verify($password, $row['password'])){

					//set session
					$_SESSION['login'] = true;
					$_SESSION['nim'] = $nim;


					//cek cookie
					if (isset($_POST['remember'])) {
						
						setcookie('verify',$row['nim'],time()+ 60,'/','localhost');
						setcookie('key', hash('sha256', $row['nama']),time()+ 60,'/','localhost');	

					}
					$panggilan = $row['nama'];
					echo "<script>
							alert('Selamat datang $panggilan');
							document.location.href = '../';
						</script>";
						exit;
				}

			}
			$error=true;
		}
		

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/css/util.css">
	<link rel="stylesheet" type="text/css" href="/proyek-sisfo/css/main.css">
<!--===============================================================================================-->

</head>
<body class="bg">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 pt-5 bg-light">
				<form class="login80-form validate-form" action="" method="post">
					<center><img src="/proyek-sisfo/images/logo-poltek.png" style="width: 40%; height: 40%"></center> 
					<span class="login100-form-title p-b-20">
						<br>SISTEM INFORMASI AKADEMIK
					</span>

					<span class="login100-form-title p-b-24">
						
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Masukan NIM">
						<input class="input100" type="text" name="nim">
						<span class="focus-input100" data-placeholder="NIM"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukan password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="row">
						<div class="col text-right">							
							<label class="form-check-label none" for="exampleCheck1" style="margin-right:10%;padding: 0;">Ingat saya</label>
							<input type="checkbox" class="form-check-input none" id="exampleCheck1" name="remember">						
								<?php if (isset($error)): ?>
									<?= "<script>alert('Username atau Password salah!');document.location.href = '../';</script>"?>
								<?php endif ?>

						</div>
						<br>
					<br>

					<button type="submit" class="btn btn-primary btn-user btn-block" name="login">LOGIN</button>


				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/proyek-sisfo/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/proyek-sisfo/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/proyek-sisfo/vendor/bootstrap/js/popper.js"></script>
	<script src="/proyek-sisfo/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/proyek-sisfo/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/proyek-sisfo/vendor/daterangepicker/moment.min.js"></script>
	<script src="/proyek-sisfo/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/proyek-sisfo/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/proyek-sisfo/js/login.js"></script>

</body>
</html>