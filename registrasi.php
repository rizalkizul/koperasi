<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
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

<?php
	$p = isset($_GET['p']) ? $_GET['p'] : '';
    switch($p) 
    {
     default :
?>
<body>
	<h1 id="headingLogin1">Selangkah Lagi</h1>
	<h1 id="headingLogin2">Mejadi Bagian dari Kami</h1>

	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
				<th class="spanReg">
					ID
					<br><br>
					Nama
					<br><br>
					Alamat
				</th>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_anggota from anggota order by id_anggota desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_anggota'];
					$trimmed= trim($splitID,"usr");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input style=\"background-color:#ccc\" style=\"background-color=#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr$summed\" readonly=\"true\" required>";
					}
				?>
					<!-- <input type="text" placeholder="ID" name="id_pengguna" required> -->
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <textarea style="font-family: monospace;" name="alamat" placeholder="Alamat" required=""></textarea>
				</th>
				<th class="spanReg2">
					No. HP
					<br></br>
					Jenis Kelamin
					<br><br>
					Email
					<br><br>
					Password
					<br><br><br>
					Konfirmasi Password
				</th>
				<th class="form2">
					<input type="text" placeholder="No. HP" name="no_hp" required>
				    <br>
				    <input type="radio" name="gender" value="Pria" selected>Pria</input><span style="padding-left: 50px"><input type="radio" value="Wanita" name="gender">Wanita</input></span>
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <input type="password" placeholder="Password" name="password" required>
				    <br>
				    <input type="password" placeholder="Masukkan Kembali Password" name="psw" required>
				    <br>
				    
				</th>
			</tr>		
		</table>
		<div class="divBtnDaftar">
				    	<button id="btnDaftar" type="submit" name="Daftar" value="Daftar">Daftar</button><br>
				    </div>
	</form>	
	<a href="login.html"><button id="btnBatalDaftar" type="submit">Batal</button></a>
</body>

<?php
break;
case "regist":
?>
<body>
	<h1 id="headingLogin1">Selangkah Lagi</h1>
	<h1 id="headingLogin2">Mejadi Bagian dari Kami</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Berhasil Registrasi!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		</div>
	</div>
</div>	
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
				<th class="spanReg">
					ID
					<br><br>
					Nama
					<br><br>
					Alamat
				</th>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_anggota from anggota order by id_anggota desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_anggota'];
					$trimmed= trim($splitID,"usr");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input style=\"background-color:#ccc\" style=\"background-color=#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr$summed\" readonly=\"true\" required>";
					}
				?>
					<!-- <input type="text" placeholder="ID" name="id_pengguna" required> -->
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <textarea style="font-family: monospace;" name="alamat" placeholder="Alamat" required=""></textarea>
				</th>
				<th class="spanReg2">
					No. HP
					<br></br>
					Jenis Kelamin
					<br><br>
					Email
					<br><br>
					Password
					<br><br><br>
					Konfirmasi Password
				</th>
				<th class="form2">
					<input type="text" placeholder="No. HP" name="no_hp" required>
				    <br>
				    <input type="radio" name="gender" value="Pria" selected>Pria</input><span style="padding-left: 50px"><input type="radio" value="Wanita" name="gender">Wanita</input></span>
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <input type="password" placeholder="Password" name="password" required>
				    <br>
				    <input type="password" placeholder="Masukkan Kembali Password" name="psw" required>
				    <br>
				    
				</th>
			</tr>		
		</table>
		<div class="divBtnDaftar">
				    	<button id="btnDaftar" type="submit" name="Daftar" value="Daftar">Daftar</button><br>
				    </div>
	</form>	
	<a href="login.html"><button id="btnBatalDaftar" type="submit">Batal</button></a>
</body>
<?php
break;
case "gagalRegist":?>
<body>
	<h1 id="headingLogin1">Selangkah Lagi</h1>
	<h1 id="headingLogin2">Mejadi Bagian dari Kami</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Gagal Registrasi!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		 Email Sudah Terdaftar
		</div>
	</div>
</div>	
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
				<th class="spanReg">
					ID
					<br><br>
					Nama
					<br><br>
					Alamat
				</th>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_anggota from anggota order by id_anggota desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_anggota'];
					$trimmed= trim($splitID,"usr");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input style=\"background-color:#ccc\" style=\"background-color=#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr$summed\" readonly=\"true\" required>";
					}
				?>
					<!-- <input type="text" placeholder="ID" name="id_pengguna" required> -->
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <textarea style="font-family: monospace;" name="alamat" placeholder="Alamat" required=""></textarea>
				</th>
				<th class="spanReg2">
					No. HP
					<br></br>
					Jenis Kelamin
					<br><br>
					Email
					<br><br>
					Password
					<br><br><br>
					Konfirmasi Password
				</th>
				<th class="form2">
					<input type="text" placeholder="No. HP" name="no_hp" required>
				    <br>
				    <input type="radio" name="gender" value="Pria" selected>Pria</input><span style="padding-left: 50px"><input type="radio" value="Wanita" name="gender">Wanita</input></span>
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <input type="password" placeholder="Password" name="password" required>
				    <br>
				    <input type="password" placeholder="Masukkan Kembali Password" name="psw" required>
				    <br>
				    
				</th>
			</tr>		
		</table>
		<div class="divBtnDaftar">
				    	<button id="btnDaftar" type="submit" name="Daftar" value="Daftar">Daftar</button><br>
				    </div>
	</form>	
	<a href="login.html"><button id="btnBatalDaftar" type="submit">Batal</button></a>
</body>
<?php
	break;
	}
?>
</html>