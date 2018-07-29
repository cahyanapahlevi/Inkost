<?php
require 'koneksi.php';
require 'cek.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
<title>INKOST</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<body>
<!--Header-->

<?php 
require("menuadmin.php");
?><br>
<br>
<br><br>


<table width="100%" border="1">
<tr bgcolor="#009966">
<td align="center" height="30" bordercolor="#000000"><strong>No.</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>ID Admin Kost</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Email</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Nomor Identitas</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Nama Lengkap</strong></td>
<td align="center" height="30" bordercolor="#000000" colspan="2"><strong>Aksi</strong></td>
</tr>

<?php
$warna1 = "#FFFFFF";
$warna2 = "#CCCCCC";
$warna = $warna1;
$sql_sel = "select * from admin_kost ";
$query_sel = mysql_query ($sql_sel);
while ($data=mysql_fetch_array($query_sel)){
	if ($warna == $warna1){
		$warna = $warna2;}
	else{$warna = $warna1;}
?>
<tr bgcolor="<?php echo $warna?>">
<td align="center" height="30" bordercolor="#000000"><strong><?php echo ++$no ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[kd_adminkost]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[email]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[nik]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[nama_lengkap]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><a href="?lihat=<?php echo $data[kd_kost]; ?>"><strong>Lihat	</strong></td>
<td align="center" height="30" bordercolor="#000000"><a href="?delete=<?php echo $data[kd_kost]; ?>"><strong>Delete</strong></td>
</tr>
<?php } ?>
</table>

</body>
</html>