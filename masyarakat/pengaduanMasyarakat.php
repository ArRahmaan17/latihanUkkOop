 <?php 

	include '../config.php';
	include 'masyarakatConfig.php';
	$pengaduan = new Masyarakat();
	session_start();
	if ($_SESSION['login'] !== 'masyarakat') {
		header("location:index.php");
		exit;
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pengaduan Keluhan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		    </button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				    <a class="nav-link	" href="loginMasyarakat.php">Login Masyarakat</a>
					<a class="nav-link" href="registerMasyarakat.php">Register</a>
					<a class="nav-link" href="logoutMasyarakat.php">Logout</a>
			    </div>
		    </div>
		</div>
	</nav>
	<div class="container-fluid w-50 my-5 p-5 bg-light">
		<form action="" method="post" enctype="multipart/form-data">
			<legend>FORM PENGADUAN MASYARAKAT</legend>
	 		<textarea class="form-control my-3" name="laporan"></textarea>
	 		<input class="form-control my-3" type="file"  accept="image/png, image/jpeg" name="fotolaporan">
	 		<input class="btn btn-primary py-3 container" type="submit" name="submit" value="Lapor">
 	</form>
	</div>
	
 	<?php 

 	if (isset($_POST['submit'])) {
 		$nik = $_SESSION['nik'];
 		$laporan = $_POST['laporan'];
 		$foto = random_int(1, 1000)."-".$_FILES['fotolaporan']['name'];
 		$foto = str_replace(' ', '', $foto);
 		$tmp_name = $_FILES['fotolaporan']['tmp_name'];
 		move_uploaded_file($tmp_name, "../fotoLaporan/".$foto);
 		
 		$pengaduan->pengaduanMasyarakat($nik, $laporan, $foto);

 	}

 	 ?>
</body>
</html>
<?php } ?>