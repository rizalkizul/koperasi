<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 id="headingLogin1">KOPERASI</h1>
	<h1 id="headingLogin2">YAYASAN ISTIQAMAH</h1>


	  <div class="containerLogin">
	  <form action="controller/loginAdminController.php" method="post">
	    <input type="text" placeholder="Enter Username" name="email" required>
	    <br>
	    <input type="password" placeholder="Enter Password" name="password" required>
	    <br>   
	    <button id="btnLogin" type="submit" name="submit" value="Submit">Login</button>
	    <a href="" style="padding-left: 140px;">Lupa Kata Sandi?</a>
	  </form>

	  <div id="daftar">
	  	<div style="padding-top: 20px; width: 400px;text-align: center; font-size: 18px;">
	    <a href="login.html">Masuk Sebagai Anggota</a>
	  </div>
	  </div>
	  
	  </div>


</body>
</html>