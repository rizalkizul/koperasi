<?php
include "../controller/connection.php";

class Listanggota{

	public $db;

	public function __construct(){
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
		exit;
		}
	}

	public function addAnggota($id_pengguna, $nama, $no_hp, $alamat, $gender, $email){
			$id_pengguna = mysqli_real_escape_string($this->db,$_POST['id_pengguna']);
			$nama = mysqli_real_escape_string($this->db,$_POST['nama']);
			$no_hp = mysqli_real_escape_string($this->db,$_POST['no_hp']);
			$alamat = mysqli_real_escape_string($this->db,$_POST['alamat']);
			$gender = mysqli_real_escape_string($this->db,$_POST['gender']);
			$email = mysqli_real_escape_string($this->db,$_POST['email']);


			$sql2="INSERT INTO pengguna (id_pengguna, nama, no_hp, jabatan, alamat, gender, email) VALUES ('$id_pengguna', '$nama', '$no_hp', 'anggota', '$alamat', '$gender', '$email')";

			$result = mysqli_query($this->db,$sql2);

			if($sql2){
   				 echo 'Data berhasil disimpan';
   				 return $result;
					}  else {
 			     echo 'Data gagal disimpan';
					}
	}

	public function deleteAnggota($id_pengguna){
		$id_pengguna = mysqli_escape_string($this->db,$_GET['id_pengguna']);
		$sqlhapus= "DELETE FROM pengguna where id_pengguna= '$id_pengguna'";
		$result = mysqli_query($this->db,$sqlhapus);
		return $result;
	}

	public function updateAnggota($id_pengguna, $nama, $no_hp, $alamat, $gender, $email){
			$id_pengguna = mysqli_escape_string($this->db,$_POST['id_pengguna']);
			$nama = mysqli_real_escape_string($this->db,$_POST['nama']);
			$no_hp = mysqli_real_escape_string($this->db,$_POST['no_hp']);
			$alamat = mysqli_real_escape_string($this->db,$_POST['alamat']);
			$gender = mysqli_real_escape_string($this->db,$_POST['gender']);
			$email = mysqli_real_escape_string($this->db,$_POST['email']);
			$sqlUpdate = "UPDATE pengguna SET nama='$nama', no_hp='$no_hp', alamat='$alamat', gender='$gender', email='$email'  WHERE id_pengguna='$id_pengguna'";
			$result = mysqli_query($this->db,$sqlUpdate);
			// $changeStatus = mysqli_fetch_array($result) or die(mysqli_connect_errno()."Data can not updated");
			return $result;
		}

		public function registAnggota($id_pengguna, $nama, $no_hp, $gender, $alamat, $email, $password){
			$id_pengguna = mysqli_real_escape_string($this->db,$_POST['id_pengguna']);
			$nama = mysqli_real_escape_string($this->db,$_POST['nama']);
			$no_hp = mysqli_real_escape_string($this->db,$_POST['no_hp']);
			$alamat = mysqli_real_escape_string($this->db,$_POST['alamat']);
			$gender = mysqli_real_escape_string($this->db,$_POST['gender']);
			$email = mysqli_real_escape_string($this->db,$_POST['email']);
			$password = mysqli_real_escape_string($this->db,$_POST['password']);

			$sql1="SELECT * FROM pengguna WHERE email='$email'";
			$check = $this->db->query($sql1) ;
			$count_row = $check->num_rows;

			if ($count_row == 0){
				$sql2="INSERT INTO pengguna (id_pengguna, nama, no_hp, jabatan, alamat, gender, email, password) VALUES ('$id_pengguna', '$nama', '$no_hp', 'anggota', '$alamat', '$gender', '$email', '$password')";

			$result = mysqli_query($this->db,$sql2);

			if($sql2){
   				 echo 'Anda berhasil mendaftar';
   				 return $result;
					}  else {
 			     echo 'Anda gagal mendaftar, E-mail sudah terdaftar';
					}
			}
	}

	public function updatePembayaran($id_pembayaran, $id_pengguna, $jenis, $status, $tgl_pembayaran, $penerima, $nominal){
			$id_pembayaran = mysqli_real_escape_string($this->db,$_POST['id_pembayaran']);
			$id_pengguna = mysqli_real_escape_string($this->db,$_POST['id_pengguna']);
			$jenis = mysqli_real_escape_string($this->db,$_POST['jenis']);
			$status = mysqli_real_escape_string($this->db,$_POST['status']);
			$tgl_pembayaran = mysqli_real_escape_string($this->db,$_POST['tgl_pembayaran']);
			$penerima = mysqli_real_escape_string($this->db,$_POST['penerima']);
			$nominal = mysqli_real_escape_string($this->db,$_POST['nominal']);
			$sqlUpdate = "UPDATE pembayaran SET jenis='$jenis', status='$status', tgl_pembayaran='$tgl_pembayaran', penerima='$penerima', nominal='$nominal' WHERE id_pembayaran='$id_pembayaran'";
			$result = mysqli_query($this->db,$sqlUpdate);
			// $changeStatus = mysqli_fetch_array($result) or die(mysqli_connect_errno()."Data can not updated");
			return $result;
		}
}
?>
