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
			    <th class="main">No</th>
			    <th class="main">ID</th>
			    <th class="main">Nominal</th>
			    <th class="main">Tanggal</th>
			    <th class="main">Jenis</th>
			    <th class="main">Status</th>
			    <th class="main">Penerima</th>
			  </tr>
			</thead>
				<div style="overflow: auto;height: 50px;">
				<table class="main">
					<tbody style="overflow: auto;height: 50px;">
						 <?php
						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT * FROM pembayaran");
							// $id_pengguna = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	<tr class=\"main\">
						 					<td class=\"no\">999</td>
						 					<td class=\"main\">$row[id_pembayaran]</td>
						 					<td class=\"main\">$row[nominal]</td>
						 					<td class=\"main\">$row[tgl_pembayaran]</td>
						 					<td class=\"main\">$row[jenis]</td>
						 					<td class=\"main\">$row[status]</td>
						 					<td class=\"main\">$row[penerima]</td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
			</div>
		  <!-- <tr>
		  	<td class="main">1</td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  </tr>
		  <tr>
		  	<td class="main">2</td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  </tr>
		  <tr>
		  	<td class="main">3</td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  </tr>
		  <tr>
		  	<td class="main">4</td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  </tr>
		  <tr>
		  	<td class="main">5</td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  </tr>
		  <tr>
		  	<td class="main">6</td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  	<td class="main"></td>
		  </tr> -->
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