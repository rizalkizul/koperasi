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
	<h1 class="judulTabel">List Anggota Koperasi</h1>
	<div class="container">
  		
	  		<table class="main">
	  			<thead>
				  <tr class="main">
				    <th class="main">No</th>
				    <th class="main">ID</th>
				    <th class="main">Nama</th>
				    <th class="main">No. HP</th>
				    <th class="main">Jenis Kelamin</th>
				    <th class="main">Alamat</th>
				    <th class="main">Jabatan</th>
				    <th class="main">Email</th>
				  </tr>
				</thead>
			</table>
			<div style="overflow: auto;height: 240px;">
				<table class="main">
					<tbody style="overflow: auto;height: 240px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT * FROM pengguna");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"no\">999</td>
						 					<td class=\"main\">$row[id_pengguna]</td>
						 					<td class=\"main\">$row[nama]</td>
						 					<td class=\"main\">$row[no_hp]</td>
						 					<td class=\"main\">$row[gender]</td>
						 					<td class=\"alamat\">$row[alamat]</td>
						 					<td class=\"main\">$row[jabatan]</td>
						 					<td class=\"main\">$row[email]<span style=\"float:right;\"> <a href=\"controller/listController.php?p=hapus&id_pengguna=$row[id_pengguna]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span> </td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID" name="id_pengguna" required>
				    <br>
				    <input type="text" placeholder="Nama" name="nama" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" required>
				    <br>
				    <input type="text" placeholder="Jabatan" name="jabatan" required>
				</th>
				<th class="form2">
					<input type="text" placeholder="Alamat" name="alamat" required>
				    <br>
				    <input type="radio" name="gender" value="Pria" checked>Pria </input> <span style="padding-left: 50px">
				    <input type="radio" name="gender" value="Wanita">Wanita</input></span>
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="submit" value="Submit">Tambah</button>
				    </div>
				    <button id="btnUbahListAnggota" type="submit">Ubah</button> <button id="btnCancel" type="submit">Hapus</button>
				</th>
			</tr>		
		</table>
	</form>	
	</div>
	
</body>
</html>