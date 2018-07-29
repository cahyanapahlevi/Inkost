<?php 
require "koneksi.php";
if($_POST[go])
{
$qry="Select * from kost JOIN kamar ON kost.kd_kost=kamar.kd_kost JOIN jenis ON kost.kd_jenis=jenis.kd_jenis JOIN foto ON kost.kd_kost=foto.kd_kost WHERE kost.nm_kost like '%$_POST[cari]%' ORDER BY kost.nm_kost DESC";
} else { 
	$jml=mysql_num_rows(mysql_query("Select * from kost JOIN kamar ON kost.kd_kost=kamar.kd_kost JOIN jenis ON kost.kd_jenis=jenis.kd_jenis JOIN foto ON kost.kd_kost=foto.kd_kost"));
	$jml_hal=ceil($jml/6);
	if (empty($_GET[hal])) $_GET[hal]=1;
	
	$mulai=($_GET[hal]-1)*6;
	
	$qry="Select * from kost JOIN kamar ON kost.kd_kost=kamar.kd_kost JOIN jenis ON kost.kd_jenis=jenis.kd_jenis JOIN foto ON kost.kd_kost=foto.kd_kost ORDER BY kost.kd_kost DESC LIMIT $mulai,6";
}

if($_GET['detail'])
{
$detail=mysql_fetch_array(mysql_query("Select * from kost where kd_kost='$_GET[detail]'"));
$_SESSION['kost']=$detail[kd_kost];
header('Location:detail.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>INKOST</title>

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


<!-- start-smoth-scrolling -->
</head>
<body>
<!--Header-->
<?php
require("menuutama.php");
?>	
  
  <br>
<br><br>
<table border=0 width="1000px">
<tr>
<td width=50>&nbsp;</td>
<td width=200> <strong>Kategori Jenis Kost </strong><?php
            $kategori=mysql_query("select jenis, jenis.kd_jenis, count(kost.kd_kost) as jml from jenis join kost on kost.kd_jenis=jenis.kd_jenis group by jenis");
            $no=1;
            while($k=mysql_fetch_array($kategori)){
              if(($no % 2)==0){
                echo " <br><a href='?kode=$k[kd_jenis]'>$k[jenis] ($k[jml])</a>";
              }
              else{
                echo "<br><a href='?kode=$k[kd_jenis]'> $k[jenis] ($k[jml])</a>";              
              }
              $no++;
            }
            ?>  <br>
     </td>

<td width=750><table border="0" align="center">
<form method="post" action="">
<input type="text" name="cari" size="100" placeholder="Search">&nbsp;
<br><br>
Urut Berdasarkan : <select name="urut">
<option name="rendah" value="rendah" <?php if(($_POST['urut'])=="rendah") echo "SELECTED";?> > HARGA TERENDAH</option>
<option name="tinggi" value="tinggi" <?php if(($_POST['urut'])=="tinggi") echo "SELECTED";?> > HARGA TERTINGGI </option>
</select>&nbsp;&nbsp;
<input type="submit" name="go" value="GO" >
</form>
<br><br><br>
<?php
if(($_POST['urut'])== "rendah") 
{
	$kost=mysql_query("Select * from kost JOIN kamar ON kost.kd_kost=kamar.kd_kost JOIN jenis ON kost.kd_jenis=jenis.kd_jenis JOIN foto ON kost.kd_kost=foto.kd_kost WHERE kost.nm_kost like '%$_POST[cari]%' ORDER BY kamar.harga_harian ASC");
}
else if(($_POST['urut'])== "tinggi")
{
	$kost=mysql_query("Select * from kost JOIN kamar ON kost.kd_kost=kamar.kd_kost JOIN jenis ON kost.kd_jenis=jenis.kd_jenis JOIN foto ON kost.kd_kost=foto.kd_kost WHERE kost.nm_kost like '%$_POST[cari]%' ORDER BY kamar.harga_harian DESC");
}
else {
	$kost=mysql_query("Select * from kost JOIN kamar ON kost.kd_kost=kamar.kd_kost JOIN jenis ON kost.kd_jenis=jenis.kd_jenis JOIN foto ON kost.kd_kost=foto.kd_kost ORDER BY kost.kd_kost DESC"); }
	while($a=mysql_fetch_array($kost))
{
$i++;

$foto[$i]=$a[foto1];
$nm_kost[$i]=$a[nm_kost];
$alamat_kost[$i]=$a[alamat_kost];
$harga_harian[$i]=$a[harga_harian];
$kd_kost[$i]=$a[kd_kost];
$kd_kamar[$i]=$a[kd_kamar];
}
for($j=1;$j<=$i;$j+=3)
{
?>
<tr>
<td width="400" height="50" align="center">
<a href="?detail=<?php echo $kd_kost[$j];?>"><?php if($foto[$j]!=NULL){?><img src="./images/<?php echo $foto[$j]; ?>" width="200" height="200" ></a><?php } ?>
</td>
<td width="400" height="50" align="center">
<a href="?detail=<?php echo $kd_kost[$j+1];?>"><?php if($foto[$j+1]!=NULL){?><img src="./images/<?php echo $foto[$j+1]; ?>" width="200" height="200" ></a><?php } ?>
</td>
<td width="400" height="50" align="center">
<a href="?detail=<?php echo $kd_kost[$j+2];?>"><?php if($foto[$j+2]!=NULL){?><img src="./images/<?php echo $foto[$j+2]; ?>" width="200" height="200"></a><?php } ?>
</td>
</tr>
<tr>
<td width="400" height="50" align="center">
<?php if($foto[$j]!=NULL){?><h3><?php echo $nm_kost[$j] ?><?php } ?></h3> 
<?php if($foto[$j]!=NULL){?><h4><?php echo $alamat_kost[$j]; ?><?php } ?></h4> 
<?php if($foto[$j]!=NULL){?><h2>Rp.<?php echo $harga_harian[$j]; ?><?php } ?></h4>
</td>
<td width="400" height="50" align="center">
<?php if($foto[$j+1]!=NULL){?><h3><?php echo $nm_kost[$j+1] ?><?php } ?></h3> 
<?php if($foto[$j+1]!=NULL){?><h4><?php echo $alamat_kost[$j+1]; ?><?php } ?></h4> 
<?php if($foto[$j+1]!=NULL){?><h2>Rp.<?php echo $harga_harian[$j+1]; ?><?php } ?></h4>
</td>
<td width="400" height="50" align="center">
<?php if($foto[$j+2]!=NULL){?><h3><?php echo $nm_kost[$j+2] ?><?php } ?></h3> 
<?php if($foto[$j+2]!=NULL){?><h4><?php echo $alamat_kost[$j+2]; ?><?php } ?></h4> 
<?php if($foto[$j+2]!=NULL){?><h2>Rp.<?php echo $harga_harian[$j+2]; ?><?php } ?></h4>
</td>
</tr>
<?php } ?>
</table></td></tr></table>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
Hal <?php 
	for ($m=1; $m<=$jml_hal; $m++)
	{
		echo "<a href=kost.php?hal=$m>$m</a> ";
	
	}
?>
  
  
    
    
    

	
    </body>
    </html>