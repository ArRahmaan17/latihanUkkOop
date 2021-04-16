<?php 
	class Petugas{

		private function connect(){
			$conn = new mysqli(host,user,pass,db);
			return $conn;
		}
		
		public function login($user, $pass){
			$conn = $this->connect();
			$query = "SELECT * FROM petugas WHERE username = '$user' AND password = '$pass'";
			$result = $conn->query($query);
			$allData = $result->fetch_all(MYSQLI_ASSOC);

			if ($result->num_rows == 1) {
				foreach ($allData as $key => $value) {
					$_SESSION['level'] = $value['level'];
					$_SESSION['namaPetugas'] = $value['namaPetugas'];
					$_SESSION['idPetugas'] = $value['idPetugas'];
				}
				header("location:tanggapanPetugas.php");
				exit;
			}else{
				echo "<script>alert('login gagal')</script>";	
				return false;
			}

		}

		public function register($nama, $user, $pass, $telp, $level){
			$conn= $this->connect();
			$query = "INSERT INTO petugas VALUES (null, '$nama','$user', '$pass', '$telp', '$level')";

			$result = $conn->query($query);

			if ($result) {
				echo"<script>alert('login gagal')</script>";	
				header('location:index.php');
				exit;
			}
			
		}

		public function dataBelumDiProses(){
			$conn = $this->connect();
			$query = "SELECT m.nama as nama, p.idPengaduan as id, p.tglPengaduan as tanggal, p.isiPengaduan as laporan, p.foto  as foto, p.status as status FROM pengaduan p join masyarakat m WHERE p.nikPengadu = m.nik AND p.status = '0'";
			$result = $conn->query($query);
			$allData = $result->fetch_all(MYSQLI_ASSOC);
			$no = 0;
			foreach ($allData as $key => $value) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>".$value['nama']."</td>";
				echo "<td>".$value['tanggal']."</td>";
				echo "<td>".$value['laporan']."</td>";
				echo "<td><img src='../fotoLaporan/".$value['foto']."' style='height:100px'></td>";
				echo "<td>".$value['status']."</td>";
				echo "<td><a class='btn btn-primary py-3 my-3 container' href='?id=".$value['id']."'>Validasi</a></td>";
				echo "</tr>";

			}
		}

		public function dataSedangDiProses(){
			$conn = $this->connect();
			$query = "SELECT m.nama as nama, p.idPengaduan as id, p.tglPengaduan as tanggal, p.isiPengaduan as laporan, p.foto  as foto, p.status as status FROM pengaduan p join masyarakat m WHERE p.nikPengadu = m.nik AND p.status = 'proses'";
			$result = $conn->query($query);
			$allData = $result->fetch_all(MYSQLI_ASSOC);
			$no = 0;
			foreach ($allData as $key => $value) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>".$value['nama']."</td>";
				echo "<td>".$value['tanggal']."</td>";
				echo "<td>".$value['laporan']."</td>";
				echo "<td><img src='../fotoLaporan/".$value['foto']."' style='height:100px'></td>";
				echo "<td>".$value['status']."</td>";
				echo "<td><a class='btn btn-primary py-3 my-3 container' href='?id=".$value['id']."'>Proses</a></td>";
				echo "</tr>";

			}
		}

		public function dataSelesaiDiProses(){
			$conn = $this->connect();
			$query = "SELECT m.nama as nama, p.idPengaduan as id, p.tglPengaduan as tanggal, p.isiPengaduan as laporan, p.foto  as foto, p.status as status FROM pengaduan p join masyarakat m WHERE p.nikPengadu = m.nik AND p.status = 'selesai'";
			$result = $conn->query($query);
			$allData = $result->fetch_all(MYSQLI_ASSOC);
			$no = 0;
			foreach ($allData as $key => $value) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>".$value['nama']."</td>";
				echo "<td>".$value['tanggal']."</td>";
				echo "<td>".$value['laporan']."</td>";
				echo "<td><img src='../fotoLaporan/".$value['foto']."' style='height:100px'></td>";
				echo "<td>".$value['status']."</td>";
				echo "<td><a class='btn btn-primary py-3 my-3 container' href='?id=".$value['id']."'>Selesai</a></td>";
				echo "</tr>";

			}
		}

		function validasiProses($id){
			$conn = $this->connect();
			$query ="UPDATE pengaduan SET status = 'proses' WHERE idPengaduan = '$id'";
			$result = $conn->query($query);
			if ($result) {
				header("location:tanggapanProses.php");
				exit;
			}
			
		}

		function validasiSelesai($id){
			$conn = $this->connect();
			$query ="UPDATE pengaduan SET status = 'selesai' WHERE idPengaduan = '$id'";
			$result = $conn->query($query);
			if ($result) {
				header("location:memberiTanggapan.php");
				exit;
			}
			
		}

	function memberiTanggapan($tanggapan){
			$conn = $this->connect();
			$idPengadu = $_SESSION['id'];
			$idPetugas = $_SESSION['idPetugas'];
			$_SESSION['sudahDitanggapi'] = true;
			$query ="INSERT INTO tanggapan VALUES (null,$idPengadu, now(), '$tanggapan', $idPetugas)";
			$result = $conn->query($query);	

			if ($result) {
				header("location:tanggapanSelesai.php");
				exit;
			}
		}

		public function generateLaporan(){
			echo "<script>window.print()</script>";
		}

		public function tanggapan(){
			$conn= $this->connect();
			$query = "SELECT * FROM tanggapan ";
			$result = $conn->query($query);

			$allData = $result->fetch_all(MYSQLI_ASSOC);
			$no=0;
			foreach ($allData as $key => $value) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>".$value['idTanggapan']."</td>";
				echo "<td>".$value['idPengadu']."</td>";
				echo "<td>".$value['tglTanggapan']."</td>";
				echo "<td>".$value['tanggapan']."</td>";
				echo "<td>".$value['idPetugas']."</td>";
				echo "</tr>";
			}
			$this->generateLaporan();
		}
		public function logout(){
			session_start();
			session_unset();
			session_destroy();
		}
	}
 ?>