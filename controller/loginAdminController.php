<?php
	
	include_once '../class/pengurus.php';
	$pengurus = new Pengurus();

	if (isset($_POST['submit'])) {
		extract($_POST);
		$login = $pengurus->checkLogin($email, $password);
		if ($login) {
			session_start();
			header('Location: ../homeAdmin.php');

		}else{

			header('Location: ../loginAdmin2.php#popup2');
		}
	}
	if (isset($_POST['Daftar'])) {
		extract($_POST);
		$tambahAdmin = $pengurus->registAdmin($id_pengurus, $nama, $no_hp, $gender, $alamat, $jabatan, $email, $password);
		if ($tambahAdmin) {
			header('Location: ../loginAdmin2.php?p=regist#popup2');
		}else{
			header('Location: ../registerAdmin.php?p=gagalRegist#popup2');
		}
	}
?>