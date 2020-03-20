<?php 

	session_start();
	$_SESSION['login']= false;
	session_unset();
	session_destroy();

	setcookie('verify','',time()-3600);
	setcookie('key','',time()-3600);


	header("Location: ../login/");


 ?>