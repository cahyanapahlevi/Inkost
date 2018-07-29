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

          <form action="" method="post">
          
            <div class="field-wrap">
            Email <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="Nama Kost" name="nm_kost" class="inp" value="<?php echo $_POST[email] ?>" required autocomplete="off" placeholder="(ex:inkost@gmail.com)"/>
          </div><br><br>

                     
          <div class="field-wrap">
          Password <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" class="inp" required autocomplete="off" placeholder="(ex:xxxxxx)" value="<?php echo $_POST[pwd] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           No.Identitas<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="nik" required autocomplete="off" placeholder="(ex:E123456)" value="<?php echo $_POST[nik] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           Nama Lengkap<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="nama_lengkap" required autocomplete="off" placeholder="(ex:Ully Nuhanatika)" value="<?php echo $_POST[nama_lengkap] ?>"/>
          </div><br><br>
          
           <div class="field-wrap">
           Alamat Lengkap<font color="#F00">*harus diisi</font>&nbsp;&nbsp;<textarea type="text" class="inp" name="alamat_lengkap" required autocomplete="off" placeholder="(ex:Jl.Mastrip Timur 87)" ><?php echo $_POST[alamat_lengkap] ?></textarea>
                  </div><br><br>
           
            Jenis Kelamin<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input name="jk" type="radio" value="P" checked="CHECKED" />&nbsp;Pria&nbsp;&nbsp;&nbsp;
         <input type="radio" name="jk" value="W"  />&nbsp;Wanita<br><br><br>
          
			<div class="field-wrap">
           Tanggal Lahir<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="date" class="inp" name="tgl_lahir" required autocomplete="off" value="<?php echo $_POST[tgl_lahir] ?>" placeholder="(ex:tahun/bulan/tanggal)"/>
          </div><br><br>
         
         <div class="field-wrap">
           No telp<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="telp" required autocomplete="off" placeholder="(ex:08x xxx xxx)" value="<?php echo $_POST[telp] ?>"/>
          </div><br><br>
          
          <div class="field-wrap">
           Nama Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="nm_kost" required autocomplete="off" placeholder="(ex:Kost cantik)" value="<?php echo $_POST[nm_kost] ?>"/>
          </div><br><br>
          
                   
          <div class="field-wrap">
           Alamat Kost<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" class="inp" name="alamat_kost" required autocomplete="off" placeholder="(ex:Mastrip 5 No.100)" value="<?php echo $_POST[alamat_kost] ?>"/>
          </div><br><br>
          
          <input type="text" name="kd_adminkost" value="<?php echo $newIDE; ?>"/>
          <input type="text" name="kd_kost" value="<?php echo $newID; ?>"/>
          
          <input type="submit" class="button button-block" name="kost" value="Daftar"/>
          
          </form>
  </div>

</body>
</html>