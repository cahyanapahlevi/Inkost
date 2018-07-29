<?php
require 'koneksi.php';
require 'cek1.php';
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
require("menukost.php");

?>
<br>
<br>
<br>

<div class="form">
   
     
         <div class="tab-content">  
        <center><h1> Data Kost </h1></div></center><br>
<br>
<table width="100%" border="1">
<tr bgcolor="#009966">
<td align="center" height="30" bordercolor="#000000"><strong>No.</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>ID Pemilik</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>ID Kost</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Nama Kost</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Alamat Kost</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Stok Kamar</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Jenis Kost</strong></td>
<td align="center" height="30" bordercolor="#000000" colspan="2"><strong>Aksi</strong></td>
</tr>

<?php
$warna1 = "#FFFFFF";
$warna2 = "#CCCCCC";
$warna = $warna1;
$sql_sel = "select * from kost k join admin_kost a on k.kd_adminkost = a.kd_adminkost join jenis j on k.kd_jenis = j.kd_jenis where k.kd_adminkost = '$_SESSION[adminkost]' ";
$query_sel = mysql_query ($sql_sel);
while ($data=mysql_fetch_array($query_sel)){
	if ($warna == $warna1){
		$warna = $warna2;}
	else{$warna = $warna1;}
?>
<tr bgcolor="<?php echo $warna?>">
<td align="center" height="30" bordercolor="#000000"><strong><?php echo ++$no ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[kd_adminkost]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[kd_kost]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[nm_kost]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[alamat_kost]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[stok_kamar]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[jenis]; ?></strong></td>

<td align="center" height="30" bordercolor="#000000"><a href="updatekost.php?edit=<?php echo $data[kd_kost]; ?>"><strong>Update</strong></td>
</tr>
<?php } ?>
</table>
         
  </div>

</body>
</html>