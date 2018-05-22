<?php
	
	include_once '../class/pengguna.php';
	$user = new User();

	if (isset($_POST['submit'])) {
		extract($_POST);
		$login = $user->checkLogin($email, $password);
		if ($login) {
			session_start();
			header('Location: ../home.php');

		}else{
			header('Location: ../login.php#popup1');
		}
	}
?>