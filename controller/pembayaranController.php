<?php
	//session_start();
	include_once '../class/pembayaran.php';
	$pembayaran = new classPembayaran();
	$p=isset($_GET['p']) ? $_GET['p']:'';
	switch ($p){
		default:

	if (isset($_POST['tambahPembayaran'])) {
		extract($_POST);
		$pembayaranAction = $pembayaran->tambahPembayaran($id_pembayaran,$id_anggota,$id_pengurus,$jenis,$status,$nominal);
		if ($pembayaranAction) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	if (isset($_POST['ubahPembayaran'])) {
		extract($_POST);
		$update = $pembayaran->ubahPembayaran($id_pembayaran,$jenis,$status,$nominal);
		if ($update) {
			echo "Data berhasil di ubah";
		}else{
			echo "Data gagal di ubah";
		}
	}
	break;
	case "hapus":
	if (isset($_GET['id_pembayaran'])){
		extract($_GET);
		$hapus = $pembayaran->deletePembayaran($id_pembayaran);
		if ($hapus) {
			echo "berhasil hapus";
		} else{
			echo "gagal hapus";
		}
		break;
	}
}
?>