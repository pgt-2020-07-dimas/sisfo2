<?php
$beranda='';
$profil='';
$index_prestasi='';
$evaluasi_dosen='';
$poin='';
$aktif="class='active bg-primary'";
if ($page == "beranda") {
  $beranda = $aktif;
} elseif ($page =="profil"){
  $profil=$aktif;
} elseif ($page =="index"){
  $index_prestasi=$aktif;
} elseif ($page =="khs"){
  $index_prestasi=$aktif;
} elseif ($page =="evaluasi"){
  $evaluasi_dosen=$aktif;
} elseif ($page =="poin"){
  $poin=$aktif;
} 

  echo "

	<nav id='sidebar' class='bg-dark'>
				<div class='custom-menu'>
					<button type='button' id='sidebarCollapse' class='btn btn-primary'>
	        </button>
        </div>
	  		<div class='img bg-wrap text-center py-2' style='background-image: url(/proyek-sisfo/images/bg.jpg);'>
	  			<div class='user-logo'>
	  				<div class='img' style='background-image: url(/proyek-sisfo/images/default-logo-2.1.png);'></div>
	  				<h3>$namaMahasiswa</h3>
	  			</div>
	  		</div>
        <ul class='list-unstyled components mb-5'>
          <li $beranda>
            <a href='/proyek-sisfo/'><span class='fa fa-home mr-3'></span> Beranda</a>
          </li>
          <li $profil>
              <a href='/proyek-sisfo/profil/'><span class='fa fa-user-circle-o mr-3'></span> Profil</a>
          </li>
          <li $index_prestasi>
            <a href='/proyek-sisfo/index-prestasi/'><span class='fa fa-book mr-3'></span> Index Prestasi</a>       	          
          </li>
          <li $evaluasi_dosen>
            <a href='/proyek-sisfo/evaluasi-dosen/'><span class='fa fa-pencil-square-o mr-3'></span> Evaluasi Dosen</a>
          </li>
          <li $poin>
            <a href='/proyek-sisfo/poin/'><span class='fa fa-trophy mr-3'></span> Poin</a>
          </li>
          <li>
            <a href='/proyek-sisfo/logout/'><span class='fa fa-sign-out mr-3'></span> Log Out</a>
          </li>
        </ul>
    	</nav>
    	"

 ?>