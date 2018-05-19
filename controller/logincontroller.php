<?php
	session_start();
	include_once '../class/pengguna.php';
	$user = new User();

	if (isset($_POST['submit'])) {
		extract($_POST);
		$login = $user->checkLogin($email, $password);
		if ($login) {
			header('Location: ../home.php');
		}else{
			echo "username atau password salah.";
		}
	}
?>