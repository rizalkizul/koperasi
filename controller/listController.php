<?php
	session_start();
	include_once '../class/anggota.php';
	$listanggota = new Listanggota();
	$p=isset($_GET['p']) ? $_GET['p']:'';
	switch ($p){
		default:

	if (isset($_POST['submit'])) {
		extract($_POST);
		$tambah = $listanggota->addAnggota($id_pengguna, $nama, $no_hp, $alamat, $gender, $email);
		if ($tambah) {
			echo $_POST;
			header('Location: ../home.php');
		}else{
			echo "username atau password salah.";
		}
	}
	if (isset($_POST['Update'])) {
		extract($_POST);
		$update = $listanggota->updateAnggota($id_pengguna, $nama, $no_hp, $alamat, $gender, $email);
		if ($update) {
			echo "Data berhasil di ubah";
		}else{
			echo "Data gagal di ubah";
		}
	}
	if (isset($_POST['Daftar'])) {
		extract($_POST);
		$tambah = $listanggota->registAnggota($id_pengguna, $nama, $no_hp, $gender, $alamat, $email, $password);
		if ($tambah) {
			header('Berhasil Mendaftar');
		}else{
			echo "Gagal Mendaftar";
		}
	}
	break;
	case "hapus":
	echo "bebas";
	if (isset($_GET['id_pengguna'])){
		extract($_GET);
		$hapus = $listanggota->deleteAnggota($id_pengguna);
		if ($hapus) {
			echo "berhasil hapus";
		} else{
			echo "gagal hapus";
		}
		break;
	}

	
	}
?>