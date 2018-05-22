<?php


$link = mysqli_connect("localhost", "root", "", "koperasi");
$results = mysqli_query($link,"SELECT id_anggota FROM anggota;");
echo "<select>";
while	($result1 = mysqli_fetch_array($results,MYSQLI_ASSOC)){
	echo "<option value=\"$result1[id_anggota]\">$result1[id_anggota]</option>";
}
echo "</select>";
?>