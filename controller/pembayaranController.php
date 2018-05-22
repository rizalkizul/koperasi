<?php
	// session_start();
	include_once '../class/pembayaran.php';
	$pembayaran = new classPembayaran();
	if (isset($_POST['tambahPembayaran'])) {
		extract($_POST);
		$pembayaranAction = $pembayaran->tambahPembayaran($id_pembayaran,$id_anggota,$id_pengurus,$jenis,$status,$nominal);
		if ($pembayaranAction) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
?>