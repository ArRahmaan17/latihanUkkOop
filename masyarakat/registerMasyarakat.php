<?php 
	include '../config.php';
	include 'masyarakatConfig.php';
	$register = new Masyarakat();
	session_start();
	if (isset($_SESSION['login'])) {
		header("location:pengaduanMasyarakat.php");
		exit;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Masyarakat</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" minlength="5" maxlength="16" name="nik" placeholder="nik">
		<input type="text" minlength="5" name="nama" maxlength="30" placeholder="nama">
		<input type="text" minlength="5" name="user" maxlength="15" placeholder="user">
		<input type="text" minlength="5" name="pass" maxlength="15" placeholder="pass">
		<input type="text" minlength="5" name="telp" maxlength="13" placeholder="telp">
		<input type="submit" name="submit" value="Register">
	</form>

	<?php 
		if (isset($_POST['submit'])) {
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$telp = $_POST['telp'];

			if (isset($nik) && isset($nama) &&  isset($user) && isset($pass) && isset($telp)) {
				$register->register($nik, $nama, $user, $pass, $telp);
			}else{
					echo "<script>alert('Maaf mungkin format belum benar silahkan isi data anda kembali')</script>";
			}
		}
	 ?>
</body>
</html>