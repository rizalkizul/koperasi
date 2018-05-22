<?php
	session_start();
	include_once '../class/anggota.php';
	$listanggota = new Listanggota();
	$p=isset($_GET['p']) ? $_GET['p']:'';
	switch ($p){
		default:

	if (isset($_POST['submit'])) {
		extract($_POST);
		$tambah = $listanggota->addAnggota($id_anggota, $nama, $no_hp, $alamat, $gender, $email);
		if ($tambah) {
			echo $_POST;
			header('Location: ../listAnggotaAdmin.php?p=berhasil#popup2');
		}else{
			echo "username atau password salah.";
		}
	}
	if (isset($_POST['Update'])) {
		extract($_POST);
		$update = $listanggota->updateAnggota($id_anggota, $nama, $no_hp, $alamat, $gender, $email);
		if ($update) {

			header('Location: ../listAnggotaAdmin.php?p=ubah#popup2');
		}else{
			echo "Data gagal di ubah";
		}
	}
	if (isset($_POST['Daftar'])) {
		extract($_POST);
		$tambahAdmin = $listanggota->registAnggota($id_anggota, $nama, $no_hp, $gender, $alamat, $email, $password);
		if ($tambahAdmin) {
			header('Location: ../login.php?p=regist#popup1');
		}else{
			header('Location: ../registrasi.php?p=gagalRegist#popup2');
		}
	}
	break;
	case "hapus":
	if (isset($_GET['id_anggota'])){
		extract($_GET);
		$hapus = $listanggota->deleteAnggota($id_anggota);
		if ($hapus) {
			echo "berhasil hapus";
		} else{
			echo "gagal hapus";
		}
		break;
	}

	
	}
?>