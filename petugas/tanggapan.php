<?php 
	include '../config.php';
	include 'petugasConfig.php';
	$generatelaporan = new Petugas();
	session_start();
	if ($_SESSION['level'] === 'admin') {
?>
	 	<!DOCTYPE html>
			<html>
			<head>
				<title></title>
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
						    <a class="nav-link " href="tanggapanPetugas.php">Laporan Masyarakat</a>
							<a class="nav-link" href="tanggapanProses.php">Laporan Di Proses</a>
						    <a class="nav-link" href="tanggapanSelesai.php">Laporan Selesai</a>
						    <a class="nav-link active" aria-current="page" href="tanggapan.php">Tanggapan </a>
						    <a class="nav-link left" href="logoutAdmin.php">Logout</a>
				    		</div>
					    </div>
					</div>
				</nav>
				<table>
					<thead>
						<tr>
							<th>nomer</th>
							<th>nama pengadu</th>
							<th>Tanggal Pengaduan</th>
							<th>Laporan</th>
							<th>Foto Laporan</th>
							<th>Status Laporan</th>
							<th>Tanggapi Laporan</th>
						</tr>
					</thead>
					<tbody>
						<?php $generatelaporan->tanggapan(); ?>
					</tbody>
				</table>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
			</body>
	</html>
<?php			
	}else{
		$generatelaporan->logout();
		header('location:index.php');
		exit;
	}
 ?>