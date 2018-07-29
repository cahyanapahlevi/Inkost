<?php
require("koneksi.php");

// membaca kode barang terbesar
$query = "SELECT max(kd_kost) as maxKode FROM kost";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kodekost = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodekost, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "C";
$newID = $char . sprintf("%03s", $noUrut);


$qry = "SELECT max(kd_adminkost) as max FROM admin_kost";
$hsl = mysql_query($qry);
$dt  = mysql_fetch_array($hsl);
$kost = $dt['max'];

$noUrut = (int) substr($kost, 3, 3);


$noUrut++;
$string = "A";
$newIDE = $string . sprintf("%03s", $noUrut);

if($_POST['kost'])
{
mysql_query("Insert into admin_kost values('$_POST[kd_adminkost]','$_POST[email]','$_POST[pwd]','$_POST[nik]','$_POST[nama_lengkap]','$_POST[alamat_lengkap]',
'$_POST[tgl_lahir]','$_POST[jk]','$_POST[telp]')")or die (mysql_error());
mysql_query("Insert Into kost(kd_kost,nm_kost,alamat_kost,kd_jenis,kd_adminkost) values('$_POST[kd_kost]','$_POST[nm_kost]','$_POST[alamat_kost]','$_POST[kd_jenis]','$_POST[kd_adminkost]')") or die (mysql_error());
echo "<script>
alert('Terima Kasih, Anda Sudah Daftar, Tunggu Kode Konfirmasi pada Email/No. Telefon Anda dalam 2 x 24 jam');
window.location='login.php';
</script>";	
}

 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Daftar Pemilik Kost</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/jquery.min.js"></script>
	<!--Load Script and Stylesheet -->
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<link type="text/css" href="css/datepicker.css" rel="stylesheet" />
	<!---->
  
      <link rel="stylesheet" href="css/sdaftar.css">
  
</head>

<body>


<div id="header"><center><img src="images/coba1.png"></center> <h1> Form Daftar Pemilik Kost </h1></div> 

  <div class="form">
   
     
         <div class="tab-content">  
        
          <form action="" method="post">
          
            <div class="field-wrap">
            Email <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" class="inp" value="<?php echo $_POST[email] ?>" required autocomplete="off" placeholder="(ex:inkost@gmail.com)"/>
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
          
          <input type="hidden" name="kd_adminkost" value="<?php echo $newIDE; ?>"/>
          <input type="hidden" name="kd_kost" value="<?php echo $newID; ?>"/>
          
          <input type="submit" class="button button-block" name="kost" value="Daftar"/>
          
          </form>
  </div>
          
       

<script src="js/index.js"></script></body>
</html>
