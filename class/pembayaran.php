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

	}
?>