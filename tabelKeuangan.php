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
</head>
<body class="mainBody">
	<?php
		include 'header.php';
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
				<table class="main css-serial">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus;");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"noKeu\"></td>
						 					<td class=\"idKeu\">$row[id_pembayaran]</td>
						 					<td class=\"idAnggotaKeu\">$row[id_anggota]</td>
						 					<td class=\"namaAnggotaKeu\">$row[nama_anggota]</td>
						 					<td class=\"idPengKeu\">$row[id_pengurus]</td>
						 					<td class=\"namaPengKeu\">$row[nama_pengurus]</td>
						 					<td class=\"jenisKeu\">$row[jenis]</td>
						 					<td class=\"statusKeu\">$row[status]</td>
						 					<td class=\"tanggalKeu\">$row[tanggal]</td>
						 					<td class=\"nominalKeu\">Rp. $row[nominal],- <span style=\"float:right;\"> <a href=\"controller/\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span></td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
		  
		</table>
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID" name="id_pembayaran" required>
				    <br>
				    <input type="text" placeholder="Nominal" name="nominal" required>
				    <br>
				    <input type="text" placeholder="Tanggal" name="tgl_pembayaran" required>
				    <br>
				    <input type="text" placeholder="Jenis" name="jenis" required>
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="status" required>
				    <br>
				    <input type="text" placeholder="Penerima" name="penerima" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit" name="Update_pembayaran" value="Update_pembayaran">Ubah</button>
				    </div>
				    <button id="btnCancel" type="reset" value="reset">Batal</button>
				</th>
			</tr>		
		</table>
	</form>	
	</div>
	
</body>
</html>