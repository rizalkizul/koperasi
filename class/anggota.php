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

	public function addAnggota($id_pengguna, $nama, $no_hp, $jabatan, $alamat, $gender, $email){
			$id_pengguna = mysqli_real_escape_string($this->db,$_POST['id_pengguna']);
			$nama = mysqli_real_escape_string($this->db,$_POST['nama']);
			$no_hp = mysqli_real_escape_string($this->db,$_POST['no_hp']);
			$jabatan = mysqli_real_escape_string($this->db,$_POST['jabatan']);
			$alamat = mysqli_real_escape_string($this->db,$_POST['alamat']);
			$gender = mysqli_real_escape_string($this->db,$_POST['gender']);
			$email = mysqli_real_escape_string($this->db,$_POST['email']);


			$sql2="INSERT INTO pengguna (id_pengguna, nama, no_hp, jabatan, alamat, gender, email) VALUES ('$id_pengguna', '$nama', '$no_hp', '$jabatan', '$alamat', '$gender', '$email')";

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
}
?>
