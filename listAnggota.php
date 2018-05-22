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
		
		include 'logout.php';
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
			<div style="overflow: auto;height: 500px;">
				<table class="main css-serial" id="listAnggota">
					<tbody style="overflow: auto;height: 240px;">
						 <?php

						 	$link = mysqli_connect("localhost", "root", "", "koperasi");
							$result = mysqli_query($link,"SELECT * FROM anggota");
							// $id_anggota = mysqli_fetch_array($result,MYSQLI_ASSOC);
						 	while	($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						 		echo "	
						 				<tr class=\"main\">
						 					<td id=\"noList\" class=\"no\"><a class=\"link\" href=\"listAnggota.php?id_anggota=$row[id_anggota]\"></a></td>
						 					<td class=\"id\">$row[id_anggota]</td>
						 					<td class=\"nama\">$row[nama]</td>
						 					<td class=\"noHP\">$row[no_hp]</td>
						 					<td class=\"jk\">$row[gender]</td>
						 					<td class=\"alamat\">$row[alamat]</td>
						 					<td class=\"email\">$row[email]</td>
						 				</tr>
						 		";
						 	}

						 ?>
				 	</tbody>
				 </table>
	
</body>
</html>