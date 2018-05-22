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
	<style type="text/css">
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: rgba(242, 50, 29, 0.7);
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #fff;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #fff;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
  color: #fff;
}
	</style>
</head>
<body>
	<h1 id="headingLogin1">KOPERASI</h1>
	<h1 id="headingLogin2">YAYASAN ISTIQAMAH</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Email dan Password SALAH!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			periksa kembali email dan password yang anda masukkan.
		</div>
	</div>
</div>	

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