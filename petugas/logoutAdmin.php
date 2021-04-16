<?php 

	include 'petugasConfig.php';
	$Logout = new Petugas();

	$Logout->logout();

	header('location:index.php');
	exit;

 ?>