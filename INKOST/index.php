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
header('Location:detail-page.php');
}
if($_GET[rating])
{
	mysql_query("Update kost SET rating=rating+".$_GET[rating].", voter=voter+1, rate=rating/voter where kd_kost = '$_GET[kd_kost]'");
	//mysql_query("Insert into rating values('','$_GET[kd_kost]','$_GET[rating]')");
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>INKOST</title>

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<head>
<style type="text/css">

</style>
<!-- start-smoth-scrolling -->
</head>
<body onLoad="MM_preloadImages('images/star1.png')" >
<!--Header-->
<?php
require("menuutama.php");
?>	
		<!--//Top-Bar-->
		<!--Slider-->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="slider-img">
							<img src="images/banner1.png" class="img-responsive" alt="Real Plot">
						</div>
						<div class="slider-info">
							<span class="italic"> </span>
							<h4>Mau Cari Kos - Kosan ? </h4>
							<h3> INKOST Solusinya</h3>
						    
							
						</div>
					</li>
					<li>
						<div class="slider-img">
							<img src="images/banner1.png" class="img-responsive" alt="Real Plot">
						</div>
						<div class="slider-info">
							<span class="italic"> </span>
							<h4>Mau Cari Kos - Kosan ? </h4>
							<h3> INKOST Solusinya</h3>
						    
							
						</div>
					</li>
					<li>
						<div class="slider-img">
							<img src="images/banner1.png" class="img-responsive" alt="Real Plot">
						</div>
						<div class="slider-info">
							<span class="italic"> </span>
							<h4>Mau Cari Kos - Kosan ? </h4>
							<h3> INKOST Solusinya</h3>
						    
							
						</div>
					</li>
					<li>
						<div class="slider-img">
							<img src="images/banner1.png" class="img-responsive" alt="Real Plot">
						</div>
						<div class="slider-info">
							<span class="italic"> </span>
							<h4>Mau Cari Kos - Kosan ? </h4>
							<h3> INKOST Solusinya</h3>
						    
							
						</div>
					</li>

				</ul>
				
			</div>
			<div class="clearfix"></div>
		</div>
		<!--//Slider-->
	</div>
<!--//Header-->
  
  <br>
<br>
<table border="0" align="center">
<form method="post" action="">
<center><input type="text" name="cari" size="100" placeholder="Search">&nbsp;
<br><br>
Urut Berdasarkan : <select name="urut">
<option name="rendah" value="rendah" <?php if(($_POST['urut'])=="rendah") echo "SELECTED";?> > HARGA TERENDAH</option>
<option name="tinggi" value="tinggi" <?php if(($_POST['urut'])=="tinggi") echo "SELECTED";?> > HARGA TERTINGGI </option>
</select>&nbsp;&nbsp;
<input type="submit" name="go" value="GO" ></center>
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
$rating[$i]=$a[rating];
$rate[$i]=$a[rate];
$voter[$i]=$a[voter];
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
<?php if($foto[$j]!=NULL){?>
<?php 
$rating1=$rating[$j];
$voter1=$voter[$j];
if($rating1 == 0 || $voter1 == 0)
{
	$rate1 = 0;
}
else
{
    $rata = $rating1/$voter1;
    $rate1 = round($rata);               
}
if($rate1 == 1)
{
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 2)
{
for($i=1;$i<=2;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 3)
{
for($i=1;$i<=3;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 4)
{
for($i=1;$i<=4;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 5)
{
for($i=1;$i<=5;$i++)
echo "<img src='images/star1.png' width='25' /> ";
}	
?><?php } ?></td>
<td width="400" height="50" align="center">
<?php if($foto[$j+1]!=NULL){?>
<?php 
$rating1=$rating[$j+1];
$voter1=$voter[$j+1];
if($rating1 == 0 || $voter1 == 0)
{
	$rate1 = 0;
}
else
{
    $rata = $rating1/$voter1;
    $rate1 = round($rata);               
}
if($rate1 == 1)
{
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 2)
{
for($i=1;$i<=2;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 3)
{
for($i=1;$i<=3;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 4)
{
for($i=1;$i<=4;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 5)
{
for($i=1;$i<=5;$i++)
echo "<img src='images/star1.png' width='25' /> ";
}	
?><?php } ?></td>
<td width="400" height="50" align="center">
<?php if($foto[$j+2]!=NULL){?>
<?php 
$rating1=$rating[$j+2];
$voter1=$voter[$j+2];
if($rating1 == 0 || $voter1 == 0)
{
	$rate1 = 0;
}
else
{
    $rata = $rating1/$voter1;
    $rate1 = round($rata);               
}
if($rate1 == 1)
{
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 2)
{
for($i=1;$i<=2;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 3)
{
for($i=1;$i<=3;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 4)
{
for($i=1;$i<=4;$i++)
echo "<img src='images/star1.png' width='25' />";
}
else if($rate1 == 5)
{
for($i=1;$i<=5;$i++)
echo "<img src='images/star1.png' width='25' /> ";
}	
?><?php } ?></td></tr>

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
<tr>
<td align="center">
<?php if($foto[$j]!=NULL){?>
<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j],"&rating=1"; ?>"><img src=images/star.png width=25 id=star1<?php echo $j ?> onMouseOver="MM_swapImage('star1<?php echo $j ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j],"&rating=2"; ?>"><img src=images/star.png width=25 id=star2<?php echo $j ?> onMouseOver="MM_swapImage('star1<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j],"&rating=3"; ?>"><img src=images/star.png width=25 id=star3<?php echo $j ?> onMouseOver="MM_swapImage('star1<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j],"&rating=4"; ?>"><img src=images/star.png width=25 id=star4<?php echo $j ?> onMouseOver="MM_swapImage('star1<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star4<?php echo $j ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j ?>','','images/star.png',1);MM_swapImage('star4<?php echo $j ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j],"&rating=5"; ?>"><img src=images/star.png width=25 id=star5<?php echo $j ?> onMouseOver="MM_swapImage('star1<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star4<?php echo $j ?>','','images/star1.png',1);MM_swapImage('star5<?php echo $j ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j ?>','','images/star.png',1);MM_swapImage('star4<?php echo $j ?>','','images/star.png',1);MM_swapImage('star5<?php echo $j ?>','','images/star.png',1)"/></a>

<?php } ?>
</td>
<td align="center">
<?php if($foto[$j+1]!=NULL){?>
<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+1],"&rating=1"; ?>"><img src=images/star.png width=25 id=star1<?php echo $j+1 ?> onMouseOver="MM_swapImage('star1<?php echo $j+1 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+1 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+1],"&rating=2"; ?>"><img src=images/star.png width=25 id=star2<?php echo $j+1 ?> onMouseOver="MM_swapImage('star1<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+1],"&rating=3"; ?>"><img src=images/star.png width=25 id=star3<?php echo $j+1 ?> onMouseOver="MM_swapImage('star1<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j+1 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j+1 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+1],"&rating=4"; ?>"><img src=images/star.png width=25 id=star4<?php echo $j+1 ?> onMouseOver="MM_swapImage('star1<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star4<?php echo $j+1 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star4<?php echo $j+1 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+1],"&rating=5"; ?>"><img src=images/star.png width=25 id=star5<?php echo $j+1 ?> onMouseOver="MM_swapImage('star1<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star4<?php echo $j+1 ?>','','images/star1.png',1);MM_swapImage('star5<?php echo $j+1 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star4<?php echo $j+1 ?>','','images/star.png',1);MM_swapImage('star5<?php echo $j+1 ?>','','images/star.png',1)"/></a>
<?php } ?>
</td>
<td align="center">
<?php if($foto[$j+2]!=NULL){?>
<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+2],"&rating=1"; ?>"><img src=images/star.png width=25 id=star1<?php echo $j+2 ?> onMouseOver="MM_swapImage('star1<?php echo $j+2 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+2 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+2],"&rating=2"; ?>"><img src=images/star.png width=25 id=star2<?php echo $j+2 ?> onMouseOver="MM_swapImage('star1<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+2],"&rating=3"; ?>"><img src=images/star.png width=25 id=star3<?php echo $j+2 ?> onMouseOver="MM_swapImage('star1<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j+2 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j+2 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+2],"&rating=4"; ?>"><img src=images/star.png width=25 id=star4<?php echo $j+2 ?> onMouseOver="MM_swapImage('star1<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star4<?php echo $j+2 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star4<?php echo $j+2 ?>','','images/star.png',1)"/></a>

<a href="<?php echo "$php_self?kd_kost=",$kd_kost[$j+2],"&rating=5"; ?>"><img src=images/star.png width=25 id=star5<?php echo $j+2 ?> onMouseOver="MM_swapImage('star1<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star3<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star4<?php echo $j+2 ?>','','images/star1.png',1);MM_swapImage('star5<?php echo $j+2 ?>','','images/star1.png',1)" onMouseOut="MM_swapImgRestore;MM_swapImage('star1<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star2<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star3<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star4<?php echo $j+2 ?>','','images/star.png',1);MM_swapImage('star5<?php echo $j+2 ?>','','images/star.png',1)"/></a>
<?php } ?>

</td>
</tr>
<?php } ?>

</table>


  
  
    
    

</body>
</html>

