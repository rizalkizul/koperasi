<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/css/styleTable.css" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

		    $('#listAnggota tr').click(function() {
		        var href = $(this).find("a").attr("href");
		        if(href) {
		            window.location = href;
		        }
		    });

		});
	</script>
	<script type="text/javascript">
$(document).ready(function() {
    $('#btnCancel').click(function() {
       document.getElementById('ids').value = "";
    	document.getElementById('namas').value = "";
    });
    });
	</script>
	<script type="text/javascript">
		var index = iDisplayIndex +1;
	$('td:eq(0)',nRow).html(index);
	return nRow;
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
<body class="mainBody">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<h1 class="judulTabel">List Anggota Koperasi</h1>
	<div class="container">
  		
	  		<table class="main">
	  			<thead>
				  <tr class="main">
				    <th class="no">No</th>
				    <th class="id">ID</th>
				    <th class="nama">Nama</th>
				    <th class="noHP">No. HP</th>
				    <th class="jk">Jenis Kelamin</th>
				    <th class="alamat">Alamat</th>
				    <th class="email">Email</th>
				  </tr>
				</thead>
			</table>
			<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="listAnggota">
					<tbody style="overflow: auto;height: 240px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT * FROM anggota");
							// $id_anggota = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	
						 				<tr class=\"main\">
						 					<td id=\"noList\" class=\"no\"><a class=\"link\" href=\"listAnggotaAdmin.php?id_anggota=$row[id_anggota]\"></a></td>
						 					<td class=\"id\">$row[id_anggota]</td>
						 					<td class=\"nama\">$row[nama]</td>
						 					<td class=\"noHP\">$row[no_hp]</td>
						 					<td class=\"jk\">$row[gender]</td>
						 					<td class=\"alamat\">$row[alamat]</td>
						 					<td class=\"email\">$row[email]<span style=\"float:right;\"> <a href=\"controller/listController.php?p=hapus&id_anggota=$row[id_anggota]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span> </td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
			if (isset($_GET['id_anggota'])) {

				$idid = $_GET['id_anggota'];
				$link = mysqli_connect("localhost", "root", "", "koperasi");
				$sqlEd = mysqli_query($link,"SELECT * FROM anggota WHERE id_anggota='$idid'");
				if($data = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC))
					{
						$id = $data['id_anggota'];
						$nama = $data['nama'];
						$noHP = $data['no_hp'];
						$alamat = $data['alamat'];
						$gender = $data['gender'];
						$email = $data['email'];

			?>

	<form action="controller/listController.php" method="post">
		<table class="form" id="formAnggota">
			<tr>
				<th class="form1">
					<input class="ids" type="text" placeholder="ID" name="id_anggota" value="<?php echo "$id"?>" readonly="true" required>
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" value="<?php echo "$nama"?>" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" value="<?php echo "$noHP"?>" required>
				    <br>
				    <?php
				    if ($gender == "Pria"){
				    	echo "
				    <input type=\"radio\" name=\"gender\" value=\"Pria\" checked>Pria </input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"gender\" value=\"Wanita\">Wanita</input></span>";
					}else{
						
						echo "
				    <input type=\"radio\" name=\"gender\" value=\"Pria\">Pria </input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"gender\" value=\"Wanita\" checked>Wanita</input></span>";
					}
				    ?>
				<br>	
				</th>
				<th class="form2">
					<!-- <input type="text" placeholder="Alamat" name="alamat" value="<?php echo "$alamat"?>" required> -->
				    
				    <textarea class="alamat" name="alamat" placeholder="Alamat" required>
<?php echo "$alamat"?></textarea>
				    <br>
				    <input type="text" placeholder="Email" name="email" value="<?php echo "$email"?>" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="Update">Ubah</button>
				    </div>
				</th>
			</tr>		
		</table>
	</form>	
					<a href="listAnggotaAdmin.php"><button id="btnCancel">Batal Ubah</button></a>
	<?php
}
}else{ ?>
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
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
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr$summed\" readonly=\"true\" required>";
					}
				?>

					<!-- <input id="ids" type="text" placeholder="ID" name="id_anggota" required> -->
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" required>
				    <br>
				    <input type="radio" name="gender" value="Pria">Pria </input> <span style="padding-left: 50px">
				    <input type="radio" name="gender" value="Wanita">Wanita</input></span>
				</th>
				<th class="form2">
					<!-- <input type="text" placeholder="Alamat" name="alamat" required> -->
				    <textarea class="alamat" name="alamat" placeholder="Alamat" required></textarea>
				    
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="submit" value="Submit">Tambah</button>
				    </div>
				</th>
			</tr>		
		</table>
	</form>	
	<?php
}

?>
	</div>
	
</body>
<?php
	break;
	case "berhasil":
?>
<body class="mainBody">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<h1 class="judulTabel">List Anggota Koperasi</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Data Berhasil Ditambahkan!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		</div>
	</div>
</div>	

	<div class="container">
  		
	  		<table class="main">
	  			<thead>
				  <tr class="main">
				    <th class="no">No</th>
				    <th class="id">ID</th>
				    <th class="nama">Nama</th>
				    <th class="noHP">No. HP</th>
				    <th class="jk">Jenis Kelamin</th>
				    <th class="alamat">Alamat</th>
				    <th class="email">Email</th>
				  </tr>
				</thead>
			</table>
			<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="listAnggota">
					<tbody style="overflow: auto;height: 240px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT * FROM anggota");
							// $id_anggota = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	
						 				<tr class=\"main\">
						 					<td id=\"noList\" class=\"no\"><a class=\"link\" href=\"listAnggotaAdmin.php?id_anggota=$row[id_anggota]\"></a></td>
						 					<td class=\"id\">$row[id_anggota]</td>
						 					<td class=\"nama\">$row[nama]</td>
						 					<td class=\"noHP\">$row[no_hp]</td>
						 					<td class=\"jk\">$row[gender]</td>
						 					<td class=\"alamat\">$row[alamat]</td>
						 					<td class=\"email\">$row[email]<span style=\"float:right;\"> <a href=\"controller/listController.php?p=hapus&id_anggota=$row[id_anggota]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span> </td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
			if (isset($_GET['id_anggota'])) {

				$idid = $_GET['id_anggota'];
				$link = mysqli_connect("localhost", "root", "", "koperasi");
				$sqlEd = mysqli_query($link,"SELECT * FROM anggota WHERE id_anggota='$idid'");
				if($data = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC))
					{
						$id = $data['id_anggota'];
						$nama = $data['nama'];
						$noHP = $data['no_hp'];
						$alamat = $data['alamat'];
						$gender = $data['gender'];
						$email = $data['email'];

			?>

	<form action="controller/listController.php" method="post">
		<table class="form" id="formAnggota">
			<tr>
				<th class="form1">
					<input class="ids" type="text" placeholder="ID" name="id_anggota" value="<?php echo "$id"?>" readonly="true" required>
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" value="<?php echo "$nama"?>" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" value="<?php echo "$noHP"?>" required>
				    <br>
				    <?php
				    if ($gender == "Pria"){
				    	echo "
				    <input type=\"radio\" name=\"gender\" value=\"Pria\" checked>Pria </input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"gender\" value=\"Wanita\">Wanita</input></span>";
					}else{
						
						echo "
				    <input type=\"radio\" name=\"gender\" value=\"Pria\">Pria </input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"gender\" value=\"Wanita\" checked>Wanita</input></span>";
					}
				    ?>
				<br>	
				</th>
				<th class="form2">
					<!-- <input type="text" placeholder="Alamat" name="alamat" value="<?php echo "$alamat"?>" required> -->
				    
				    <textarea class="alamat" name="alamat" placeholder="Alamat" required>
<?php echo "$alamat"?></textarea>
				    <br>
				    <input type="text" placeholder="Email" name="email" value="<?php echo "$email"?>" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="Update">Ubah</button>
				    </div>
				</th>
			</tr>		
		</table>
	</form>	
					<a href="listAnggotaAdmin.php"><button id="btnCancel">Batal Ubah</button></a>
	<?php
}
}else{ ?>
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
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
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr$summed\" readonly=\"true\" required>";
					}
				?>

					<!-- <input id="ids" type="text" placeholder="ID" name="id_anggota" required> -->
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" required>
				    <br>
				    <input type="radio" name="gender" value="Pria">Pria </input> <span style="padding-left: 50px">
				    <input type="radio" name="gender" value="Wanita">Wanita</input></span>
				</th>
				<th class="form2">
					<!-- <input type="text" placeholder="Alamat" name="alamat" required> -->
				    <textarea class="alamat" name="alamat" placeholder="Alamat" required></textarea>
				    
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="submit" value="Submit">Tambah</button>
				    </div>
				</th>
			</tr>		
		</table>
	</form>	
	<?php
}

?>
	</div>
	
</body>
<?php
	break;
	case "ubah":
?>
<body class="mainBody">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<h1 class="judulTabel">List Anggota Koperasi</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Data Berhasil Diubah!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		</div>
	</div>
</div>	

	<div class="container">
  		
	  		<table class="main">
	  			<thead>
				  <tr class="main">
				    <th class="no">No</th>
				    <th class="id">ID</th>
				    <th class="nama">Nama</th>
				    <th class="noHP">No. HP</th>
				    <th class="jk">Jenis Kelamin</th>
				    <th class="alamat">Alamat</th>
				    <th class="email">Email</th>
				  </tr>
				</thead>
			</table>
			<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="listAnggota">
					<tbody style="overflow: auto;height: 240px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT * FROM anggota");
							// $id_anggota = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	
						 				<tr class=\"main\">
						 					<td id=\"noList\" class=\"no\"><a class=\"link\" href=\"listAnggotaAdmin.php?id_anggota=$row[id_anggota]\"></a></td>
						 					<td class=\"id\">$row[id_anggota]</td>
						 					<td class=\"nama\">$row[nama]</td>
						 					<td class=\"noHP\">$row[no_hp]</td>
						 					<td class=\"jk\">$row[gender]</td>
						 					<td class=\"alamat\">$row[alamat]</td>
						 					<td class=\"email\">$row[email]<span style=\"float:right;\"> <a href=\"controller/listController.php?p=hapus&id_anggota=$row[id_anggota]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span> </td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
			if (isset($_GET['id_anggota'])) {

				$idid = $_GET['id_anggota'];
				$link = mysqli_connect("localhost", "root", "", "koperasi");
				$sqlEd = mysqli_query($link,"SELECT * FROM anggota WHERE id_anggota='$idid'");
				if($data = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC))
					{
						$id = $data['id_anggota'];
						$nama = $data['nama'];
						$noHP = $data['no_hp'];
						$alamat = $data['alamat'];
						$gender = $data['gender'];
						$email = $data['email'];

			?>

	<form action="controller/listController.php" method="post">
		<table class="form" id="formAnggota">
			<tr>
				<th class="form1">
					<input class="ids" type="text" placeholder="ID" name="id_anggota" value="<?php echo "$id"?>" readonly="true" required>
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" value="<?php echo "$nama"?>" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" value="<?php echo "$noHP"?>" required>
				    <br>
				    <?php
				    if ($gender == "Pria"){
				    	echo "
				    <input type=\"radio\" name=\"gender\" value=\"Pria\" checked>Pria </input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"gender\" value=\"Wanita\">Wanita</input></span>";
					}else{
						
						echo "
				    <input type=\"radio\" name=\"gender\" value=\"Pria\">Pria </input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"gender\" value=\"Wanita\" checked>Wanita</input></span>";
					}
				    ?>
				<br>	
				</th>
				<th class="form2">
					<!-- <input type="text" placeholder="Alamat" name="alamat" value="<?php echo "$alamat"?>" required> -->
				    
				    <textarea class="alamat" name="alamat" placeholder="Alamat" required>
<?php echo "$alamat"?></textarea>
				    <br>
				    <input type="text" placeholder="Email" name="email" value="<?php echo "$email"?>" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="Update">Ubah</button>
				    </div>
				</th>
			</tr>		
		</table>
	</form>	
					<a href="listAnggotaAdmin.php"><button id="btnCancel">Batal Ubah</button></a>
	<?php
}
}else{ ?>
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
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
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_anggota\" value=\"usr$summed\" readonly=\"true\" required>";
					}
				?>

					<!-- <input id="ids" type="text" placeholder="ID" name="id_anggota" required> -->
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" required>
				    <br>
				    <input type="radio" name="gender" value="Pria">Pria </input> <span style="padding-left: 50px">
				    <input type="radio" name="gender" value="Wanita">Wanita</input></span>
				</th>
				<th class="form2">
					<!-- <input type="text" placeholder="Alamat" name="alamat" required> -->
				    <textarea class="alamat" name="alamat" placeholder="Alamat" required></textarea>
				    
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="submit" value="Submit">Tambah</button>
				    </div>
				</th>
			</tr>		
		</table>
	</form>	
	<?php
}

?>
	</div>
	
</body>
<?php
	break;
}
?>
</html>