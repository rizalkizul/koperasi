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
		include 'logout.php';
	?>
	<h1 class="judulTabel">Tabel Pembayaran</h1>
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
				<div style="overflow: auto;height: 500px;">
				<table class="main css-serial">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 $idididid = $_SESSION['nama'];
						 // echo $idididid;
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT pembayaran.*,anggota.nama as nama_anggota,pengurus.nama as nama_pengurus FROM pembayaran,anggota, pengurus WHERE pembayaran.id_anggota=anggota.id_anggota AND pembayaran.id_pengurus=pengurus.id_pengurus AND anggota.nama='$idididid';");
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
						 					<td class=\"nominalKeu\">Rp. $row[nominal],- </td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
	
</body>
</html>