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
			echo "username atau password salah.";
		}
	}
?>