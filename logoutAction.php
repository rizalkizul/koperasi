<?php
include_once '../class/pengguna.php';
session_start();
$user = new User();
$user->userLogout();
header('Location: ../../login.html');
?>