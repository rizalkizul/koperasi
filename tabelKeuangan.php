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
		  <tr>
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
		  </tr>
		</table>
	<form>
		<table class="form">
			<tr>
				<th class="form1">
					<input type="text" placeholder="ID" name="uname" required>
				    <br>
				    <input type="password" placeholder="Nominal" name="psw" required>
				    <br>
				    <input type="text" placeholder="Tanggal" name="uname" required>
				    <br>
				    <input type="password" placeholder="Jenis" name="psw" required>
				</th>
				<th class="form2">
					<input type="text" placeholder="Status" name="uname" required>
				    <br>
				    <input type="password" placeholder="Penerima" name="psw" required>
				    <br>
				    <div class="divBtnUbah">
				    	<button id="btnUbah" type="submit">Ubah</button>
				    </div>
				    <button id="btnCancel" type="submit">Batal</button>
				</th>
			</tr>		
		</table>
	</form>	
	</div>
	
</body>
</html>