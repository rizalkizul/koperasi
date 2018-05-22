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
			header('Location: ../tabelKeuanganAdmin.php?p=tambah#popup2');
		}else{
			echo "gagal";
		}
	}
	if (isset($_POST['ubahPembayaran'])) {
		extract($_POST);
		print_r($_POST);
		$update = $pembayaran->ubahPembayaran($id_pembayaran,$id_anggota,$id_pengurus,$jenis,$status,$nominal);
		if ($update) {
			header('Location: ../tabelKeuanganAdmin.php?p=ubah#popup2');
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
			header('Location: ../tabelKeuanganAdmin.php?p=hapus#popup2');
		} else{
			echo "gagal hapus";
		}
		break;
	}
}
?>