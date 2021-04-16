<?php 
	include '../config.php';
	include 'petugasConfig.php';
	$login = new petugas();
	session_start();
	if (isset($_SESSION['level'])) {
		header('location:tanggapanPetugas.php');
		exit;
	}else{ ?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Login Petugas</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
		  <div class="container-fluid">
		    <a class="navbar-brand position-relative top-50 start-50 translate-middle-x">LOGIN PETUGAS</a>
		  </div>
		</nav>
		<div class="container-fluid w-50 p-5 bg-light shadow p-3 mb-5 bg-body rounded">
			<form method="post">
		 		<input class="form-control py-3 my-3" type="text" name="user" placeholder="username anda">
		 		<input class="form-control py-3 my-3" type="text" name="pass" placeholder="password anda">
		 		<input class="btn btn-primary py-3 my-3 container" type="submit" name="submit" value="Login">
	 		</form>
		</div>
	 	<?php 
	 	if (isset($_POST['submit'])) {
	 		if (isset($_POST['user']) && isset($_POST['pass'])) {
	 			$user = $_POST['user'];
	 			$pass = $_POST['pass'];
	 			$login->login($user, $pass);
	 		}
	 	}
	 	?>
	 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
	</html>

<?php } ?>