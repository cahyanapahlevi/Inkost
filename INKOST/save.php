<?php
	require("koneksi.php");
	$b=$_POST['nama_lengkap'];
	$c=$_POST['email'];
	$d=$_POST['saran'];
	$sql="INSERT INTO saran(nama_lengkap, email,saran) VALUES ('$b','$c','$d')";
	$query=mysql_query($sql);
?>