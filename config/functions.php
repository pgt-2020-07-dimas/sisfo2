<?php  
	$koneksi = mysqli_connect("localhost","root","","sisfo");
	
	function registrasi($data){

		global $koneksi;
		$username =strtolower(stripcslashes($data['username']));
		$password =mysqli_real_escape_string($koneksi,$data['password']);
		$password2 =mysqli_real_escape_string($koneksi,$data['password2']);


		//cek username 
		$result = mysqli_query($koneksi,"SELECT username FROM user WHERE username ='$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('username sudah terdaftar');

			</script>";
			return false;
		}



		//cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
					alert('Konfirmasi password salah');
				</script>
			";
			return false;
		}

		//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);


		//menambahkan user ke database
		mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$password')");
		return mysqli_affected_rows($koneksi);

	}

	// iki query 
	function query($query) {
		global $koneksi;
		$hasil = mysqli_query($koneksi, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($hasil)) {
			$rows[] = $row;
			
		}
		return $rows;
	}
	function tambah($data) {
		global $koneksi;
		$nim=$data["nim"];
		$nama=$data["nama"];
		$jenis_kelamin=$data["jenis_kelamin"];
		$jurusan = upload();
		if(!$jurusan){
			return false;
		}

		$query = "INSERT INTO mahasiswa 
				VALUES ('','$nim','$nama','$jenis_kelamin','$jurusan')";
		$hasil = mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
		
	}
		//cek upload
	function upload(){

		$namafile = $_FILES['jurusan']['name'];
		$ukuranfile = $_FILES['jurusan']['size'];
		$error = $_FILES['jurusan']['error'];
		$tmpName = $_FILES['jurusan']['tmp_name'];
		//cek belum pilih file
		if($error === 4){
			echo "<script>
					alert('Pilih gambar profil');
					</script>
			";
			return false;
		}
		
		$ekstensiGambarValid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $namafile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		//cek yang diupload bukan gambar
		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script>
					alert('Pilih ekstensi gambar *.jpg,*.jpeg, atau *.png');
					</script>
			";
			return false;
		}
		//cek ukuran gambar
		if ($ukuranfile >= 1000000){

			echo "<script>
					alert('Ukuran file terlalu besar');
					</script>
			";
			
			return false;

		}
		//siap upload
		//generate nama baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
		return $namaFileBaru;
	}

	
	

	function hapus($nim){
		global $koneksi;
		$query = "DELETE FROM mahasiswa WHERE nim = $nim";
		$hasil = mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);

	}

	function ubah($data) {
		global $koneksi;
		$id=$data["id"];
		$nim=$data["nim"];
		$nama=$data["nama"];
		$jenis_kelamin=$data["jenis_kelamin"];

		$gambarlama =$data["gambarlama"];
		//cek apakah user pilih gambar baru atau tidak
		if($_FILES['jurusan']['error'] === 4){
			$jurusan = $gambarlama;
		} else {
			$jurusan=upload();
		}

		


		$query = "UPDATE mahasiswa SET nim ='$nim' , nama ='$nama' , jenis_kelamin='$jenis_kelamin' , jurusan ='$jurusan' WHERE id=$id";
		$hasil = mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}
	function cari($keyword){
		$query = "SELECT nama,tahunmasuk FROM mahasiswa WHERE nim = '$keyword'";

		return query($query);
	}
	function panggilNama($nim){
		 if(isset($nim)){
		   $mahasiswa = cari($nim);
		 }
		$namaMahasiswa = $mahasiswa[0]['nama'];
		return $namaMahasiswa;
	}
	function panggilTahun($nim){
		 if(isset($nim)){
		   $mahasiswa = cari($nim);
		 }
		$tahunMasuk = $mahasiswa[0]['tahunmasuk'];
		return $tahunMasuk;
	}
	function ubahPassword($data){
		global $koneksi;
		$nim = $data['nim'];
		$password = $data['password'];
		$password =mysqli_real_escape_string($koneksi,$data['password']);
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		$query = "UPDATE mahasiswa SET password='$password' WHERE nim=$nim";
		$hasil = mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}
?>