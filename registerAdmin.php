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
	<script type="text/javascript">

  document.addEventListener("DOMContentLoaded", function() {

    // JavaScript form validation

    var checkPassword = function(str)
    {
      var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
      return re.test(str);
    };

    var checkEmail = function(e)
    {
    {
      if(this.email.value == "") {
        alert("Error: Username cannot be blank!");
        this.email.focus();
        e.preventDefault(); // equivalent to return false
        return;
      }
      re = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
      if(!re.test(this.email.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        this.email.focus();
        e.preventDefault();
        return;
      }
      if(this.pwd1.value != "" && this.pwd1.value == this.pwd2.value) {
        if(!checkPassword(this.pwd1.value)) {
          alert("Password yang anda masukkan tidak valid!");
          this.pwd1.focus();
          e.preventDefault();
          return;
        }
      } else {
        alert("Error: Mohon periksa password yang anda masukkan dan konfirmasi password!");
        this.pwd1.focus();
        e.preventDefault();
        return;
      }
      alert("Password sesuai!");
    };

    var myForm = document.getElementById("registerForm");
    myForm.addEventListener("submit", checkEmail, true);

    // HTML5 form validation

    var supports_input_validity = function()
    {
      var i = document.createElement("input");
      return "setCustomValidity" in i;
    }

    if(supports_input_validity()) {
      var emailInput = document.getElementById("field_email");
      emailInput.setCustomValidity(emailInput.title);

      var pwd1Input = document.getElementById("field_pwd1");
      pwd1Input.setCustomValidity(pwd1Input.title);

      var pwd2Input = document.getElementById("field_pwd2");

      // input key handlers

      uemailInput.addEventListener("keyup", function(e) {
        emailInput.setCustomValidity(this.validity.patternMismatch ? emailInput.title : "");
      }, false);

      pwd1Input.addEventListener("keyup", function(e) {
        this.setCustomValidity(this.validity.patternMismatch ? pwd1Input.title : "");
        if(this.checkValidity()) {
          pwd2Input.pattern = RegExp.escape(this.value);
          pwd2Input.setCustomValidity(pwd2Input.title);
        } else {
          pwd2Input.pattern = this.pattern;
          pwd2Input.setCustomValidity("");
        }
      }, false);

      pwd2Input.addEventListener("keyup", function(e) {
        this.setCustomValidity(this.validity.patternMismatch ? pwd2Input.title : "");
      }, false);

    }

  }, false);

</script>
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

	<form id="registerForm" action="controller/loginAdminController.php" method="post">
		<table class="form">
			<tr>
				<th class="spanReg">
					ID
					<br><br>
					Nama
					<br><br>
					Alamat
					<br><br><br><br>
					Jabatan
				</th>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_pengurus from pengurus order by id_pengurus desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pengurus'];
					$trimmed= trim($splitID,"st");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input style=\"background-color:#ccc\" style=\"background-color=#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st$summed\" readonly=\"true\" required>";
					}
				?>
					<!-- <input type="text" placeholder="ID" name="id_pengguna" required> -->
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <textarea style="font-family: monospace;" name="alamat" placeholder="Alamat" required=""></textarea>
				    <br>
				    <input type="text" placeholder="Jabatan" name="jabatan" required>
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
				    <input id="field_email" type="text" placeholder="Email" name="email"title="Email harus mengandung @ dan domain." type="password" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				    <br>
				    <input id="field_pwd1" type="password" placeholder="Password" name="password" title="Password minimal 6 karakter, termasuk kapital dan nomor." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
				    <br>
				    <input id="field_pwd2" type="password" placeholder="Masukkan Kembali Password" name="psw" title="Masukkan password yang sama." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
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
	<form action="controller/loginAdminController.php" method="post">
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
					$sqlEd = mysqli_query($link,"select id_pengurus from pengurus order by id_pengurus desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pengurus'];
					$trimmed= trim($splitID,"st");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input style=\"background-color:#ccc\" style=\"background-color=#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st$summed\" readonly=\"true\" required>";
					}
				?>
					<!-- <input type="text" placeholder="ID" name="id_pengguna" required> -->
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <textarea style="font-family: monospace;" name="alamat" placeholder="Alamat" required=""></textarea>
				    <br>
				    <input type="text" placeholder="Jabatan" name="jabatan" required>
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
				    <input id="field_email" type="text" placeholder="Email" name="email"title="Email harus mengandung @ dan domain." type="password" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				    <br>
				    <input id="field_pwd1" type="password" placeholder="Password" name="password" title="Password minimal 6 karakter, termasuk kapital dan nomor." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
				    <br>
				    <input id="field_pwd2" type="password" placeholder="Masukkan Kembali Password" name="psw" title="Masukkan password yang sama." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
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
	<form action="controller/loginAdminController.php" method="post">
		<table class="form">
			<tr>
				<th class="spanReg">
					ID
					<br><br>
					Nama
					<br><br>
					Alamat
					<br><br><br><br>
					Jabatan
				</th>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_pengurus from pengurus order by id_pengurus desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pengurus'];
					$trimmed= trim($splitID,"st");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input style=\"background-color:#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input style=\"background-color:#ccc\" style=\"background-color=#ccc\" class=\"idss\" type=\"text\" placeholder=\"ID\" name=\"id_pengurus\" value=\"st$summed\" readonly=\"true\" required>";
					}
				?>
					<!-- <input type="text" placeholder="ID" name="id_pengguna" required> -->
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <textarea style="font-family: monospace;" name="alamat" placeholder="Alamat" required=""></textarea>
				    <br>
				    <input type="text" placeholder="Jabatan" name="jabatan" required>
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
				    <input id="field_email" type="text" placeholder="Email" name="email"title="Email harus mengandung @ dan domain." type="password" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				    <br>
				    <input id="field_pwd1" type="password" placeholder="Password" name="password" title="Password minimal 6 karakter, termasuk kapital dan nomor." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
				    <br>
				    <input id="field_pwd2" type="password" placeholder="Masukkan Kembali Password" name="psw" title="Masukkan password yang sama." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
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