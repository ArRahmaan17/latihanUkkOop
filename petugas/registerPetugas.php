<?php 
	include '../config.php';
	include 'petugasConfig.php';
	$register = new Petugas();
	session_start();
	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == 'petugas') {
		header('location:tanggapanPetugas.php');
		exit;
		}elseif($_SESSION['level'] == 'admin'){ ?>
			<!DOCTYPE html>
				<html>
				<head>
					<title>Register Petugas</title>
					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
				</head>
				<body>
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
					  <div class="container-fluid">
					    <a class="navbar-brand position-relative top-50 start-50 translate-middle-x">Register Petugas</a>
					  </div>
					</nav>
					<div class="container bg-light my-5 p-5">
						<form action="" method="post">
							<legend>FORM REGISTER PETUGAS</legend>
						<input class="form-control my-4" type="text" minlength="5" maxlength="16" name="nama" placeholder="nama">
						<input class="form-control my-4" type="text" minlength="5" name="user" maxlength="30" placeholder="user">
						<input class="form-control my-4" type="text" minlength="5" name="pass" maxlength="15" placeholder="pass">
						<input class="form-control my-4" type="text" minlength="5" name="telp" maxlength="13" placeholder="telp">
						<select class="form-select my-4" name="level" aria-label=".form-select-sm example">
							<option value="admin">Admin</option>
							<option value="petugas">Petugas</option>
						</select>
						<input class="btn btn-primary py-3 my-3 container" type="submit" name="submit" value="Register">
					</form>
					</div>
					

					<?php 


					if (isset($_POST['submit'])) {
						$nama = $_POST['nama'];
						$user = $_POST['user'];
						$pass = $_POST['pass'];
						$telp = $_POST['telp'];
						$level = $_POST['level'];

						if (isset($_POST['nama'])  && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['telp']) && isset($_POST['level'])) {
							$register->register($nama, $user, $pass, $telp, $level);	
						}else{
							echo "<script>alert('Maaf mungkin format belum benar silahkan isi data anda kembali')</script>";
						}
					}

					 ?>
					 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
				</body>
				</html>
		<?php 
			}
		} 
		?>



