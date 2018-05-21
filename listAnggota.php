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
							$result = mysqli_query($link,"SELECT * FROM pengguna");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	
						 				<tr class=\"main\">
						 					<td id=\"noList\" class=\"no\"><a class=\"link\" href=\"listAnggota.php?id_pengguna=$row[id_pengguna]\"></a></td>
						 					<td class=\"id\">$row[id_pengguna]</td>
						 					<td class=\"nama\">$row[nama]</td>
						 					<td class=\"noHP\">$row[no_hp]</td>
						 					<td class=\"jk\">$row[gender]</td>
						 					<td class=\"alamat\">$row[alamat]</td>
						 					<td class=\"email\">$row[email]<span style=\"float:right;\"> <a href=\"controller/listController.php?p=hapus&id_pengguna=$row[id_pengguna]\" onClick=\"return confirm('Anda yakin ingin menghapus data?')\"> <img style=\"height:30px;\" src=\"assets/img/delete.png\"> </a> </span> </td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
			<?php
			if (isset($_GET['id_pengguna'])) {

				$idid = $_GET['id_pengguna'];
				$link = mysqli_connect("localhost", "root", "", "koperasi");
				$sqlEd = mysqli_query($link,"SELECT * FROM pengguna WHERE id_pengguna='$idid'");
				if($data = mysqli_fetch_array($sqlEd, MYSQLI_ASSOC))
					{
						$id = $data['id_pengguna'];
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
					<input id="ids" type="text" placeholder="ID" name="id_pengguna" value="<?php echo "$id"?>" required>
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama" value="<?php echo "$nama"?>" required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" value="<?php echo "$noHP"?>" required>
				</th>
				<th class="form2">
					<input type="text" placeholder="Alamat" name="alamat" value="<?php echo "$alamat"?>" required>
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
				    <input type="text" placeholder="Email" name="email" value="<?php echo "$email"?>" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="submit" value="Submit">Tambah</button>
				    </div>
				    <button id="btnUbahListAnggota" type="submit" name="Update" value="Update">Ubah</button> <button id="btnCancel" type="reset" value="Reset" onclick="clear()">Bersihkan Field</button>
				</th>
			</tr>		
		</table>
	</form>	
	<button id="btnCancel" type="reset" value="Reset">Bersihkan Field</button>
	<?php
}
}else{ ?>
	<form action="controller/listController.php" method="post">
		<table class="form">
			<tr>
				<th class="form1">
					<input id="ids" type="text" placeholder="ID" name="id_pengguna"required>
				    <br>
				    <input id="namas" type="text" placeholder="Nama" name="nama"required>
				    <br>
				    <input type="text" placeholder="No.HP" name="no_hp" required>
				</th>
				<th class="form2">
					<input type="text" placeholder="Alamat" name="alamat" required>
				    <br>
				    
				    <input type="radio" name="gender" value="Pria">Pria </input> <span style="padding-left: 50px">
				    <input type="radio" name="gender" value="Wanita">Wanita</input></span>
				    <br>
				    <input type="text" placeholder="Email" name="email" required>
				    <br>
				    <div class="divBtnTambahListAnggota">
				    	<button id="btnUbah" type="submit" name="submit" value="Submit">Tambah</button>
				    </div>
				    <button id="btnUbahListAnggota" type="submit" name="Update" value="Update">Ubah</button> <button id="btnCancel" type="reset" value="Reset" onclick="clear()">Bersihkan Field</button>
				</th>
			</tr>		
		</table>
	</form>	
	<?php
}

?>
	</div>
	
</body>
</html>