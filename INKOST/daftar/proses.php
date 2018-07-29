<?php
require ('konek.php');

$email = $_REQUEST['email'];
$username = $_REQUEST['username'];
$pswd = $_REQUEST['pwd'];
$no_identitas = $_REQUEST['no_identitas'];
$nama_lengkap = $_REQUEST['nama_lengkap'];
$alamat_lengkap = $_REQUEST['alamat_lengkap'];
$tgl = $_REQUEST['tgl_lahir'];
$sql =mysql_query( "insert into member (email, username, pwd, no_identitas, nama_lengkap, alamat_lengkap, tgl_lahir) values ('', '$username', '$pswd', '$no_identitas', '$nama_lengkap', 'alamat_lengkap', 'tgl')");
$query = mysql_query($sql);
	if($query_sql) {
		echo "<script> alert (\"data berhasil disimpan\"); window.location=\"hasil2.php\";</script>";
	} 
	else { 
	echo "<script> alert (\"data berhasil disimpan\"); window.location=\"hasil2.php\";</script>";
	}
	
?> 