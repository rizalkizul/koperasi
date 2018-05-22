<?php
	include_once "../controller/pembayaranController.php";

	/**
	* 
	*/
	class classPembayaran{

		public $db;
		function __construct()
		{
			$this->db = new mysqli('localhost', 'root', '', 'koperasi');
		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
		exit;
		}
	}

		public function tambahPembayaran($id_pembayaran, $id_anggota, $id_pengurus, $jenis, $status, $nominal){
			$id_pembayaran = mysqli_escape_string($this->db,$_POST['id_pembayaran']);
			$id_anggota = mysqli_escape_string($this->db,$_POST['id_anggota']);
			$id_pengurus = mysqli_escape_string($this->db,$_POST['id_pengurus']);
			$jenis = mysqli_escape_string($this->db,$_POST['jenis']);
			$status = mysqli_escape_string($this->db,$_POST['status']);
			$nominal = mysqli_escape_string($this->db,$_POST['nominal']);

			$sqlTambahPembayaran = "INSERT INTO pembayaran 	(id_pembayaran,id_anggota,id_pengurus,jenis,status,nominal) VALUES ('$id_pembayaran','$id_anggota','$id_pengurus','$jenis','$status','$nominal')";
			$result = mysqli_query($this->db,$sqlTambahPembayaran);

			if ($sqlTambahPembayaran) {

				return true;
			}else{
				return false;
			}
		}

		public function deletePembayaran($id_pembayaran){
		$id_pembayaran = mysqli_escape_string($this->db,$_GET['id_pembayaran']);
		$sqlhapus= "DELETE FROM pembayaran where id_pembayaran= '$id_pembayaran'";
		$result = mysqli_query($this->db,$sqlhapus);
		return $result;
		}

		public function ubahPembayaran($id_pembayaran, $id_anggota, $id_pengurus, $jenis, $status, $nominal){
			$id_pembayaran = mysqli_real_escape_string($this->db,$_POST['id_pembayaran']);
			$id_anggota = mysqli_real_escape_string($this->db,$_POST['id_anggota']);
			$id_pengurus = mysqli_real_escape_string($this->db,$_POST['id_pengurus']);
			$jenis = mysqli_real_escape_string($this->db,$_POST['jenis']);
			$status = mysqli_real_escape_string($this->db,$_POST['status']);
			$nominal = mysqli_real_escape_string($this->db,$_POST['nominal']);

			$sqlUpdate = "UPDATE pembayaran SET id_anggota='$id_anggota', id_pengurus='$id_pengurus', jenis='$jenis', status='$status', nominal='$nominal' WHERE id_pembayaran='$id_pembayaran'";
			$result = mysqli_query($this->db,$sqlUpdate);
			// $changeStatus = mysqli_fetch_array($result) or die(mysqli_connect_errno()."Data can not updated");
			return $result;
		}

	}
?>