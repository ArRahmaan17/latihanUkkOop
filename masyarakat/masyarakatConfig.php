<?php
	class Masyarakat{
		private function connect(){
			$conn = new mysqli(host,user,pass,db);
			return $conn;
		}

		public function login($username, $password){
			$con = $this->connect();
			$query = "SELECT * FROM masyarakat WHERE user = '$username' AND pass = '$password'";
			$result = $con->query($query);
			$allData = $result->fetch_all(MYSQLI_ASSOC);
			
			if ($result->num_rows > 0) {
				foreach ($allData as $key => $value) {
					$_SESSION['login'] = 'masyarakat';
					$_SESSION['nik'] = $value['nik'];
					$_SESSION['nama'] = $value['nama'];
				}
				
				header("location:pengaduanMasyarakat.php");
				exit;
				return true;
			}else{
				echo "<script>alert('Login GAGAL')</script>";
				return false;
			}

		}

		public function register($nik, $nama, $username, $password, $telp ){
			$con =$this->connect();
			$query = "INSERT INTO masyarakat VALUES ('$nik','$nama','$username', '$password', '$telp')";
			$result = $con->query($query);

			if ($result) {
				echo "<script>alert('DATA BERHASIL DI TAMBAHKAN')</script>";
				header('location:index.php');
				exit;
			}else{
				echo "<script>alert('data gagal di tambahkan')</script>";
			}
		}

		public function pengaduanMasyarakat($nik, $laporan, $foto){
			$con = $this->connect();
			$nik = $_SESSION['nik'];
			$query = "INSERT INTO pengaduan VALUES (NULL, now(), '$nik', '$laporan' , '$foto' , '0')";
			$result = $con->query($query);

			if ($result) {
				echo "<script>alert('Laporan berhasil diterima')</script>";
			}else{
				echo "<script>alert('Laporan gagal diterima')</script>";
			}
		}

		public function Logout(){
			session_start();
			session_destroy();
		}
	}
	?>