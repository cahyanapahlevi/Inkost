<?php
require 'koneksi.php';
require 'cek1.php';

if(isset($_POST['update']))
{
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
			if(mysql_query("Update kost SET nm_kost='$_POST[nm_kost]',alamat_kost='$_POST[alamat_kost]',hewan_peliharaan='$_POST[hewan_peliharaan]',stok_kamar='$_POST[stok_kamar]',update_terakhir='$tanggal', jam_update = '$jam', kd_jenis='$_POST[kd_jenis]' , fasilitas='$_POST[fasilitas]', akses_lingkungan = '$_POST[akses_lingkungan]' where kd_kost = '$_SESSION[kost]'"))
		echo'<script type="text/javascript">
alert("Berhasil Update");
window.location="datakost.php";
</script>';
else 
echo'<script type="text/javascript">
alert("Tidak Berhasil");
window.location="updatekost.php.php";
</script>';

}

if(isset($_GET['edit']))
{	
	$edit=mysql_fetch_array(mysql_query("select * from kost where kd_kost='$_GET[edit]'"));
	$_SESSION['kost']=$edit[kd_kost];
	$_POST['kd_jenis']=$edit['kd_jenis'];
	$_POST['nm_kost']=$edit['nm_kost'];
	$_POST['alamat_kost']=$edit['alamat_kost'];
	$_POST['hewan_peliharaan']=$edit['hewan_peliharaan'];
	$_POST['stok_kamar']=$edit['stok_kamar'];
	$_POST['fasilitas']=$edit['fasilitas'];
	$_POST['akses_lingkungan']=$edit['akses_lingkungan'];
	
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
        <center><h1>Update Foto Kost </h1></div></center><br>
<br>

          <form action="" method="post">
          
          <div class="field-wrap">
            ID Kost <font color="#F00">*Harap Di ingat</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong><?php echo $_SESSION[kost] ?></strong>
          </div><br><br>
          
          <div class="field-wrap">
           Nama Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="nm_kost" required autocomplete="off" placeholder="(ex:Kost cantik)" value="<?php echo $_POST[nm_kost] ?>"/>
          </div><br><br>
                           
        
          
          
          
          <input type="submit" class="button button-block" name="update" value="Update"/>
          
          </form>
  </div>

</body>
</html>