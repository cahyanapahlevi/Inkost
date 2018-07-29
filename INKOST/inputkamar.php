<?php
require 'koneksi.php';
require 'cek1.php';

if(isset($_POST['input']))
{
mysql_query("Insert into kamar values('','$_SESSION[kost]','$_POST[kd_tipe]','$_POST[harga_harian]', '$_POST[harga_bulanan]', '$_POST[harga_tahun]','$_POST[luas_kamar]','$_POST[fasilitas_kamar]')")or die (mysql_error());
echo "<script>
alert('Input Data Kamar Berhasil');
window.location='datakamar.php';
</script>";	
}
if(isset($_POST['update']))
{
			if(mysql_query("Update kamar SET kd_tipe = '$_POST[kd_tipe]',harga_harian = '$_POST[harga_harian]',harga_bulanan = '$_POST[harga_bulanan]',harga_tahun = '$_POST[harga_tahun]', luas_kamar = '$_POST[luas_kamar]',fasilitas_kamar = '$_POST[fasilitas_kamar]' where kd_kamar= '$_POST[kd_kamar]'"))
echo'<script type="text/javascript">
alert("Berhasil Update");
window.location="datakamar.php";
</script>';
else 
echo'<script type="text/javascript">
alert("Tidak Berhasil");
window.location="updatekamar.php.php";
</script>';

}
if(isset($_GET['edit']))
{	
	$edit=mysql_fetch_array(mysql_query("select * from kamar where kd_kamar='$_GET[edit]'"));
	$_SESSION['kost']=$edit[kd_kost];
	$_POST['harga_harian']=$edit['harga_harian'];
	$_POST['harga_bulanan']=$edit['harga_bulanan'];
	$_POST['harga_tahun']=$edit['harga_tahun'];
	$_POST['luas_kamar']=$edit['luas_kamar'];
	$_POST['kd_kamar']=$edit['kd_kamar'];
	$_POST['kd_tipe']=$edit['kd_tipe'];
	$_POST['fasilitas_kamar']=$edit['fasilitas_kamar'];

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
        <center><?php if (empty($_GET[edit])) {?><h1>Input Data Kamar </h1><?php } else { ?><h1>Update Data Kamar </h1><?php } ?></div></center><br>
<br>

          <form action="" method="post" >
          
           <div class="field-wrap">
           Tipe Kamar<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select name="kd_tipe">
   <?php 
$jenis=mysql_query("Select * from tipe");
while($t_jenis=mysql_fetch_array($jenis))
{
	if($t_jenis[kd_tipe]==$_POST[kd_tipe])
	{
		echo"<option value=$t_jenis[kd_tipe] selected>$t_jenis[tipe_kamar]</option>";
	}
	else 
	echo"<option value=$t_jenis[kd_tipe]>$t_jenis[tipe_kamar]</option>";
}
?>
  </select>
    </div><br><br>
    
          <div class="field-wrap">
           Harga Harian<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="harga_harian" required autocomplete="off" placeholder="(ex:40000)" value="<?php echo $_POST[harga_harian] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           Harga Bulanan<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="harga_bulanan" required autocomplete="off" placeholder="(ex:350000)" value="<?php echo $_POST[harga_bulanan] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           Harga Tahunan<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="harga_tahun" required autocomplete="off" placeholder="(ex:14000000)" value="<?php echo $_POST[harga_tahun] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           Luas Kamar<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="luas_kamar" required autocomplete="off" placeholder="(ex:4 x 3)" value="<?php echo $_POST[luas_kamar] ?>"/>
          </div><br><br>
                           
          <div class="field-wrap">
           fasilitas Kamar<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <textarea type="text" class="inp" name="fasilitas_kamar" required autocomplete="off" placeholder="(ex:kamar mandi dalam, kipas, shower, dll.)" ><?php echo $_POST[fasilitas_kamar] ?></textarea>
          </div><br><br>
          
          <input type="hidden" name="kd_kamar" value="<?php echo $_POST[kd_kamar] ?>">
          <input type="hidden" name="kd_kost" value="<?php echo $_SESSION[kost] ?>"/>
         
          
          <?php if (empty($_GET[edit])) {?><input type="submit" class="button button-block" name="input" value="Input"/><?php } else { ?>
          <input type="submit" class="button button-block" name="update" value="Update"/><?php } ?>
          
          </form>
</div>

</body>
</html>