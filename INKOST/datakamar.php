<?php
require 'koneksi.php';
require 'cek1.php';
if(isset($_GET['delete']))
{
			if(mysql_query("DELETE FROM kamar WHERE kd_kamar = '$_GET[delete]'"))
echo'<script type="text/javascript">
alert("Berhasil diHapus");
window.location="datakamar.php";
</script>';
else 
echo'<script type="text/javascript">
alert("Tidak Berhasil");
window.location="datakamar.php.php";
</script>';

}
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
        <center><h1> Data Kamar </h1></div></center><br>
<br>
<table width="100%" border="1">
<tr bgcolor="#009966">
<td align="center" height="30" bordercolor="#000000"><strong>No.</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Tipe Kamar</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Harga Harian</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Harga Bulanan</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Harga Tahunan</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Luas Kamar</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Fasilitas Kamar</strong></td>
<td align="center" height="30" bordercolor="#000000" colspan="2"><strong>Aksi</strong></td>
</tr>

<?php
$warna1 = "#FFFFFF";
$warna2 = "#CCCCCC";
$warna = $warna1;
$sql_sel = "select * from kamar join kost on kamar.kd_kost = kost.kd_kost join tipe on kamar.kd_tipe = tipe.kd_tipe where kost.kd_kost = '$_SESSION[kost]' ";
$query_sel = mysql_query ($sql_sel);
while ($data=mysql_fetch_array($query_sel)){
	if ($warna == $warna1){
		$warna = $warna2;}
	else{$warna = $warna1;}
?>
<tr bgcolor="<?php echo $warna?>">
<td align="center" height="30" bordercolor="#000000"><strong><?php echo ++$no ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[tipe_kamar]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Rp. <?php echo $data[harga_harian]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Rp. <?php echo $data[harga_bulanan]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Rp. <?php echo $data[harga_tahun]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[luas_kamar]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><strong><?php echo $data[fasilitas_kamar]; ?></strong></td>
<td align="center" height="30" bordercolor="#000000"><a href="inputkamar.php?edit=<?php echo $data[kd_kamar]; ?>"><strong>Update</strong></td>
<td align="center" height="30" bordercolor="#000000"><a href="?delete=<?php echo $data[kd_kamar]; ?>"><strong>Delete</strong></td>
</tr>
<?php } ?>
</table>
         
  </div>

</body>
</html>