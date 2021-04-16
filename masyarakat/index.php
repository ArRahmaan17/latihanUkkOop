<?php 
	include '../config.php';
	include 'masyarakatConfig.php';
	$login = new Masyarakat();
	session_start();
	if (isset($_SESSION['login'])) {
		header('location:pengaduanMasarakat.php');
		exit;
	}else{
	?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login Masyarakat </title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
 </head>
 <body>
	 	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
		  <div class="container-fluid">
		    <a class="navbar-brand position-relative top-50 start-50 translate-middle-x">LOGIN MASYARAKAT</a>
		  </div>
		</nav>
 	<div class="container-fluid w-50 p-5 bg-light shadow p-3 mb-5 bg-body rounded">
 		<form action="" method="post">
 			<input class="form-control py-3 m-2" type="text" name="user" placeholder="username anda">
 			<input class="form-control py-3 m-2" type="text" name="pass" placeholder="password anda">
 			<input class="btn btn-primary py-3 m-2 container" type="submit" name="submit" value="Login">
 		</form>
 	</div>

 	<?php 

 	if (isset($_POST['submit'])) {
			if (isset($_POST['user']) && isset($_POST['pass'])) {
				$username =  $_POST['user'];
				$password = $_POST['pass'];
				$login->login($username,$password);
			}else{
				echo "Username atau Password tidak boleh kosong";
			}
		}

 	 ?>
 
 </body>
 </html>
<?php } ?>
