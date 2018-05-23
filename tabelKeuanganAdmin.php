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

		    $('#tabelKeuangan tr').click(function() {
		        var href = $(this).find("a").attr("href");
		        if(href) {
		            window.location = href;
		        }
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
	$p=isset($_GET['p']) ? $_GET['p']:'';
	switch ($p){
		default:
?>
<body class="mainBody">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<h1 class="judulTabel">Tabel Keuangan</h1>
	<div class="container">
  		<table class="main">
  			<thead>
			  <tr class="main">
			    <th class="noKeu">No</th>
			    <th class="idKeu">ID Pembayaran</th>
			    <th class="idAnggotaKeu">ID Anggota</th>
			    <th class="namaAnggotaKeu">Nama Anggota</th>
			    <th class="idPengKeu">ID Staff</th>
			    <th class="namaPengKeu">Nama Staff</th>
			    <th class="jenisKeu">Jenis</th>
			    <th class="statusKeu">Status</th>
			    <th class="tanggalKeu">Tanggal</th>
			    <th class="nominalKeu">nominal</th>
			  </tr>
			</thead>
			</table>
				<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="tabelKeuangan">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus;");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"noKeu\"><a class=\"link\" href=\"tabelKeuanganAdmin.php?id_pembayaran=$row[id_pembayaran]\"></a></td>
						 					<td class=\"idKeu\">$row[id_pembayaran]</td>
						 					<td class=\"idAnggotaKeu\">$row[id_anggota]</td>
						 					<td class=\"namaAnggotaKeu\">$row[nama_anggota]</td>
						 					<td class=\"idPengKeu\">$row[id_pengurus]</td>
						 					<td class=\"namaPengKeu\">$row[nama_pengurus]</td>
						 					<td class=\"jenisKeu\">$row[jenis]</td>
						 					<td class=\"statusKeu\">$row[status]</td>
						 					<td class=\"tanggalKeu\">$row[tanggal]</td>
						 					<td class=\"nominalKeu\">Rp. $row[nominal],- <span style=\"float:right;\"> <a href=\"controller/pembayaranController.php?p=hapus&id_pembayaran=$row[id_pembayaran]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span></td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
				if (isset($_GET['id_pembayaran'])) {
					$idididididididid = $_GET['id_pembayaran'];
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus AND pembayaran.id_pembayaran='$idididididididid';");
					if ($datas = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$id_pembayaran	= $datas['id_pembayaran'];
						$id_anggota = $datas['id_anggota'];
						$id_pengurus = $datas['id_pengurus'];
						$jenis = $datas['jenis'];
						$status = $datas['status'];
						$nominal = $datas['nominal'];
					}
			?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID Pembayaran" name="id_pembayaran" value="<?php echo "$id_pembayaran"?>" readonly="true" required>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					$result3 = mysqli_fetch_array($results,MYSQLI_ASSOC);
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option value=\"$id_anggota\">$id_anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				     $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option value=\"$id_pengurus\">$id_pengurus</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";


				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->
				    <?php
				    if ($jenis == "Wajib") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\" checked>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					elseif ($jenis == "Pokok") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\" checked>Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					else{
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\" checked>Sukarela</input></span>";
					}
				    ?>
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" value="<?php echo "$status"?>" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" value="<?php echo "$nominal"?>" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="ubahPembayaran" value="ubahPembayaran">Ubah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
				</th>
			</tr>		
		</table>
	</form>	
	<a href="tabelKeuanganAdmin.php"><button id="btnCancel">Batal</button></a>

	<?php
		}else{
	?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_pembayaran from pembayaran order by id_pembayaran desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pembayaran'];
					$trimmed= trim($splitID,"pmb");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb$summed\" readonly=\"true\" required>";
					}
				?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option>ID Anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option>ID Staff</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->

				    <input type="radio" name="jenis" value="Pria"d>Wajib</input> <span style="padding-left: 50px">
				    <input type="radio" name="jenis" value="Pokok">Pokok</input></span>
				    <span style="padding-left: 50px"><input type="radio" name="jenis" value="Sukarela">Sukarela</input></span>
					
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="tambahPembayaran">Tambah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
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
case "tambah":
?>
<body class="mainBody">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<h1 class="judulTabel">Tabel Keuangan</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Data Berhasil Ditambahkan!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		 Email Sudah Terdaftar
		</div>
	</div>
</div>	

	<div class="container">
  		<table class="main">
  			<thead>
			  <tr class="main">
			    <th class="noKeu">No</th>
			    <th class="idKeu">ID Pembayaran</th>
			    <th class="idAnggotaKeu">ID Anggota</th>
			    <th class="namaAnggotaKeu">Nama Anggota</th>
			    <th class="idPengKeu">ID Staff</th>
			    <th class="namaPengKeu">Nama Staff</th>
			    <th class="jenisKeu">Jenis</th>
			    <th class="statusKeu">Status</th>
			    <th class="tanggalKeu">Tanggal</th>
			    <th class="nominalKeu">nominal</th>
			  </tr>
			</thead>
			</table>
				<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="tabelKeuangan">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus;");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"noKeu\"><a class=\"link\" href=\"tabelKeuanganAdmin.php?id_pembayaran=$row[id_pembayaran]\"></a></td>
						 					<td class=\"idKeu\">$row[id_pembayaran]</td>
						 					<td class=\"idAnggotaKeu\">$row[id_anggota]</td>
						 					<td class=\"namaAnggotaKeu\">$row[nama_anggota]</td>
						 					<td class=\"idPengKeu\">$row[id_pengurus]</td>
						 					<td class=\"namaPengKeu\">$row[nama_pengurus]</td>
						 					<td class=\"jenisKeu\">$row[jenis]</td>
						 					<td class=\"statusKeu\">$row[status]</td>
						 					<td class=\"tanggalKeu\">$row[tanggal]</td>
						 					<td class=\"nominalKeu\">Rp. $row[nominal],- <span style=\"float:right;\"> <a href=\"controller/pembayaranController.php?p=hapus&id_pembayaran=$row[id_pembayaran]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span></td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
				if (isset($_GET['id_pembayaran'])) {
					$idididididididid = $_GET['id_pembayaran'];
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus AND pembayaran.id_pembayaran='$idididididididid';");
					if ($datas = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$id_pembayaran	= $datas['id_pembayaran'];
						$id_anggota = $datas['id_anggota'];
						$id_pengurus = $datas['id_pengurus'];
						$jenis = $datas['jenis'];
						$status = $datas['status'];
						$nominal = $datas['nominal'];
					}
			?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID Pembayaran" name="id_pembayaran" value="<?php echo "$id_pembayaran"?>" readonly="true" required>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option>ID Anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option>ID Staff</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->
				    <?php
				    if ($jenis == "Wajib") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\" checked>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					elseif ($jenis == "Pokok") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\" checked>Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					else{
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\" checked>Sukarela</input></span>";
					}
				    ?>
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" value="<?php echo "$status"?>" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" value="<?php echo "$nominal"?>" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="ubahPembayaran" value="ubahPembayaran">Ubah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
				</th>
			</tr>		
		</table>
	</form>	
	<a href="tabelKeuanganAdmin.php"><button id="btnCancel">Batal</button></a>

	<?php
		}else{
	?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_pembayaran from pembayaran order by id_pembayaran desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pembayaran'];
					$trimmed= trim($splitID,"pmb");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb$summed\" readonly=\"true\" required>";
					}
				?>
				    <br>
				   <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option>ID Anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option>ID Staff</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->

				    <input type="radio" name="jenis" value="Pria"d>Wajib</input> <span style="padding-left: 50px">
				    <input type="radio" name="jenis" value="Pokok">Pokok</input></span>
				    <span style="padding-left: 50px"><input type="radio" name="jenis" value="Sukarela">Sukarela</input></span>
					
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="tambahPembayaran">Tambah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
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
	<h1 class="judulTabel">Tabel Keuangan</h1>

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
			    <th class="noKeu">No</th>
			    <th class="idKeu">ID Pembayaran</th>
			    <th class="idAnggotaKeu">ID Anggota</th>
			    <th class="namaAnggotaKeu">Nama Anggota</th>
			    <th class="idPengKeu">ID Staff</th>
			    <th class="namaPengKeu">Nama Staff</th>
			    <th class="jenisKeu">Jenis</th>
			    <th class="statusKeu">Status</th>
			    <th class="tanggalKeu">Tanggal</th>
			    <th class="nominalKeu">nominal</th>
			  </tr>
			</thead>
			</table>
				<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="tabelKeuangan">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus;");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"noKeu\"><a class=\"link\" href=\"tabelKeuanganAdmin.php?id_pembayaran=$row[id_pembayaran]\"></a></td>
						 					<td class=\"idKeu\">$row[id_pembayaran]</td>
						 					<td class=\"idAnggotaKeu\">$row[id_anggota]</td>
						 					<td class=\"namaAnggotaKeu\">$row[nama_anggota]</td>
						 					<td class=\"idPengKeu\">$row[id_pengurus]</td>
						 					<td class=\"namaPengKeu\">$row[nama_pengurus]</td>
						 					<td class=\"jenisKeu\">$row[jenis]</td>
						 					<td class=\"statusKeu\">$row[status]</td>
						 					<td class=\"tanggalKeu\">$row[tanggal]</td>
						 					<td class=\"nominalKeu\">Rp. $row[nominal],- <span style=\"float:right;\"> <a href=\"controller/pembayaranController.php?p=hapus&id_pembayaran=$row[id_pembayaran]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span></td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
				if (isset($_GET['id_pembayaran'])) {
					$idididididididid = $_GET['id_pembayaran'];
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus AND pembayaran.id_pembayaran='$idididididididid';");
					if ($datas = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$id_pembayaran	= $datas['id_pembayaran'];
						$id_anggota = $datas['id_anggota'];
						$id_pengurus = $datas['id_pengurus'];
						$jenis = $datas['jenis'];
						$status = $datas['status'];
						$nominal = $datas['nominal'];
					}
			?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID Pembayaran" name="id_pembayaran" value="<?php echo "$id_pembayaran"?>" readonly="true" required>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option>ID Anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option>ID Staff</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->
				    <?php
				    if ($jenis == "Wajib") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\" checked>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					elseif ($jenis == "Pokok") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\" checked>Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					else{
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\" checked>Sukarela</input></span>";
					}
				    ?>
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" value="<?php echo "$status"?>" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" value="<?php echo "$nominal"?>" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="ubahPembayaran" value="ubahPembayaran">Ubah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
				</th>
			</tr>		
		</table>
	</form>	
	<a href="tabelKeuanganAdmin.php"><button id="btnCancel">Batal</button></a>

	<?php
		}else{
	?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_pembayaran from pembayaran order by id_pembayaran desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pembayaran'];
					$trimmed= trim($splitID,"pmb");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb$summed\" readonly=\"true\" required>";
					}
				?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option>ID Anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option>ID Staff</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->

				    <input type="radio" name="jenis" value="Pria">Wajib</input> <span style="padding-left: 50px">
				    <input type="radio" name="jenis" value="Pokok">Pokok</input></span>
				    <span style="padding-left: 50px"><input type="radio" name="jenis" value="Sukarela">Sukarela</input></span>
					
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="tambahPembayaran">Tambah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
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
case "hapus":
?>
<body class="mainBody">
	<?php
		include 'headerAdmin.php';
		include 'logoutAdmin.php';
	?>
	<h1 class="judulTabel">Tabel Keuangan</h1>

	<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Data Terhapus!!!</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		</div>
	</div>
</div>	

	<div class="container">
  		<table class="main">
  			<thead>
			  <tr class="main">
			    <th class="noKeu">No</th>
			    <th class="idKeu">ID Pembayaran</th>
			    <th class="idAnggotaKeu">ID Anggota</th>
			    <th class="namaAnggotaKeu">Nama Anggota</th>
			    <th class="idPengKeu">ID Staff</th>
			    <th class="namaPengKeu">Nama Staff</th>
			    <th class="jenisKeu">Jenis</th>
			    <th class="statusKeu">Status</th>
			    <th class="tanggalKeu">Tanggal</th>
			    <th class="nominalKeu">nominal</th>
			  </tr>
			</thead>
			</table>
				<div style="overflow: auto;height: 240px;">
				<table class="main css-serial" id="tabelKeuangan">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus;");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"noKeu\"><a class=\"link\" href=\"tabelKeuanganAdmin.php?id_pembayaran=$row[id_pembayaran]\"></a></td>
						 					<td class=\"idKeu\">$row[id_pembayaran]</td>
						 					<td class=\"idAnggotaKeu\">$row[id_anggota]</td>
						 					<td class=\"namaAnggotaKeu\">$row[nama_anggota]</td>
						 					<td class=\"idPengKeu\">$row[id_pengurus]</td>
						 					<td class=\"namaPengKeu\">$row[nama_pengurus]</td>
						 					<td class=\"jenisKeu\">$row[jenis]</td>
						 					<td class=\"statusKeu\">$row[status]</td>
						 					<td class=\"tanggalKeu\">$row[tanggal]</td>
						 					<td class=\"nominalKeu\">Rp. $row[nominal],- <span style=\"float:right;\"> <a href=\"controller/pembayaranController.php?p=hapus&id_pembayaran=$row[id_pembayaran]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span></td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
				if (isset($_GET['id_pembayaran'])) {
					$idididididididid = $_GET['id_pembayaran'];
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus AND pembayaran.id_pembayaran='$idididididididid';");
					if ($datas = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$id_pembayaran	= $datas['id_pembayaran'];
						$id_anggota = $datas['id_anggota'];
						$id_pengurus = $datas['id_pengurus'];
						$jenis = $datas['jenis'];
						$status = $datas['status'];
						$nominal = $datas['nominal'];
					}
			?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID Pembayaran" name="id_pembayaran" value="<?php echo "$id_pembayaran"?>" readonly="true" required>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					$result3 = mysqli_fetch_array($results,MYSQLI_ASSOC);
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option value=\"$id_anggota\">$id_anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					$result3 = mysqli_fetch_array($resultss,MYSQLI_ASSOC);
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option value=\"$id_pengurus\">$id_pengurus</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->
				    <?php
				    if ($jenis == "Wajib") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\" checked>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					elseif ($jenis == "Pokok") {
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\" checked>Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\">Sukarela</input></span>";
					}
					else{
				    echo "
				    <input type=\"radio\" name=\"jenis\" value=\"Wajib\"d>Wajib</input> <span style=\"padding-left: 50px\">
				    <input type=\"radio\" name=\"jenis\" value=\"Pokok\">Pokok</input></span>
				    <span style=\"padding-left: 50px\"><input type=\"radio\" name=\"jenis\" value=\"Sukarela\" checked>Sukarela</input></span>";
					}
				    ?>
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" value="<?php echo "$status"?>" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" value="<?php echo "$nominal"?>" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="ubahPembayaran" value="ubahPembayaran">Ubah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
				</th>
			</tr>		
		</table>
	</form>	
	<a href="tabelKeuanganAdmin.php"><button id="btnCancel">Batal</button></a>

	<?php
		}else{
	?>
	<form action="controller/pembayaranController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<?php
					$link = mysqli_connect("localhost", "root", "", "koperasi");
					$sqlEd = mysqli_query($link,"select id_pembayaran from pembayaran order by id_pembayaran desc limit 1;");
					$dataID = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC);
					$splitID = $dataID['id_pembayaran'];
					$trimmed= trim($splitID,"pmb");
					$summed = $trimmed + 1;
					$length = strlen($summed);

					if ($length == 1) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb00$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 2) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb0$summed\" readonly=\"true\" required>";
					}
					elseif ($length == 3) {
						echo "<input class=\"ids\" type=\"text\" placeholder=\"ID\" name=\"id_pembayaran\" value=\"pmb$summed\" readonly=\"true\" required>";
					}
				?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$results = mysqli_query($link,"SELECT id_anggota, nama FROM anggota;");
					echo "<select name=\"id_anggota\" class =\"selectTabelKeu\">
							<option>ID Anggota</option>";
					while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
						echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]	$result1[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br>
				    <?php
				    $link = mysqli_connect("localhost", "root", "", "koperasi");
					$resultss = mysqli_query($link,"SELECT id_pengurus, nama FROM pengurus;");
					echo "<select name=\"id_pengurus\" class=\"selectTabelKeu\">
					<option>ID Staff</option>";
					while	($result2 = mysqli_fetch_array($resultss,MYSQLI_ASSOC)){
						echo "<option value=\"$result2[id_pengurus]\">$result2[id_pengurus]	$result2[nama]</option>";
					}
					echo "</select>";

				    ?>
				    <br><!-- 
				    <input type="text" placeholder="Jenis" name="jenis" required> -->

				    <input type="radio" name="jenis" value="Pria"d>Wajib</input> <span style="padding-left: 50px">
				    <input type="radio" name="jenis" value="Pokok">Pokok</input></span>
				    <span style="padding-left: 50px"><input type="radio" name="jenis" value="Sukarela">Sukarela</input></span>
					
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="tambahPembayaran">Tambah</button>
				    </div>
				    <!-- <button id="btnCancel" type="reset" value="reset">Batal</button> -->
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