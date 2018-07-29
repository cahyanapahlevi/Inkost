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
window.location="updatekost.php";
</script>';

}
if(isset($_POST['updatefoto']))
{
	$foto=basename($_FILES['foto']['name']);
	if(mysql_query("Update kost set foto='$foto' where kd_kost = '$_SESSION[kost]'"));
	move_uploaded_file($_FILES['foto']['tmp_name'],'./images/'.$foto);
	header("Location:#");
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
	$_POST['foto']=$edit['foto'];
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
        <center><h1>Update Data Kost </h1></div></center><br>
<br>

<form action="" method="post"  enctype="multipart/form-data">
          
          <div class="field-wrap">
            ID Kost <font color="#F00">*Harap Di ingat</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong><?php echo $_SESSION[kost] ?></strong>
          </div><br><br>
          
          <div class="field-wrap">
           Nama Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="nm_kost" required autocomplete="off" placeholder="(ex:Kost cantik)" value="<?php echo $_POST[nm_kost] ?>"/>
          </div><br><br>
                           
          <div class="field-wrap">
           Alamat Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <textarea type="text" class="inp" name="alamat_kost" required autocomplete="off" placeholder="(ex:Mastrip 5 No.100)" ><?php echo $_POST[alamat_kost] ?></textarea>
          </div><br><br>
          
          <div class="field-wrap">
           Hewan Peliharaan<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="hewan_peliharaan" type="radio" <?php if ($edit['hewan_peliharaan'] == 'Boleh' ) { ?> CHECKED = CHECKED <?php } ?> value="Boleh"/>&nbsp;Boleh&nbsp;&nbsp;&nbsp;
         <input type="radio" name="hewan_peliharaan"  <?php if($edit['hewan_peliharaan'] == 'Tidak Boleh' ) { ?> CHECKED = CHECKED <?php } ?> value="Tidak Boleh"  />&nbsp;Tidak Boleh
          </div><br><br>
          
                   <div class="field-wrap">
           Stok Kamar<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="stok_kamar" required autocomplete="off" placeholder="(ex : 10)" value="<?php echo $_POST[stok_kamar] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           Jenis Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select name="kd_jenis">
   <?php 
$jenis=mysql_query("Select * from jenis");
while($t_jenis=mysql_fetch_array($jenis))
{
	if($t_jenis[kd_jenis]==$_POST[kd_jenis])
	{
		echo"<option value=$t_jenis[kd_jenis] selected>$t_jenis[jenis]</option>";
	}
	else 
	echo"<option value=$t_jenis[kd_jenis]>$t_jenis[jenis]</option>";
}
?>
  </select>
    </div><br><br>
   
   <div class="field-wrap">
           fasilitas Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <textarea type="text" class="inp" name="fasilitas" required autocomplete="off" placeholder="(ex:kasur, kompor, dll.)" ><?php echo $_POST[fasilitas] ?></textarea>
          </div><br><br>
          
             <div class="field-wrap">
Akses Lingk<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          
        
           <textarea type="text" class="inp" name="akses_lingkungan" required autocomplete="off" placeholder="(ex:laundry, market, cuci motor, dll.)" ><?php echo $_POST[akses_lingkungan] ?></textarea></div><br><br>
           
          <div class="field-wrap">
           Foto Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="./images/<?php echo $_POST[foto]; ?>" width="200" height="200"> <br><br>
<input type="file" class="inp" name="foto" value="<?php echo $_POST[foto] ?>"/><br>
<input type="submit" class="button" name="updatefoto" value="Update Foto"/> <font color="#EE0000" >NB : Tombol Update Foto hanya digunakan ketika Anda ingin mengupdate Foto Kost</div><br><br>
          
          
          <input type="submit" class="button button-block" name="update" value="Update"/>
          
          </form>
</div>

</body>
</html>