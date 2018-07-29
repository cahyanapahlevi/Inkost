<?php
require("koneksi.php");

// membaca kode barang terbesar
$query = "SELECT max(kd_member) as maxKode FROM member";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kodemember = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodemember, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "B";
$newID = $char . sprintf("%03s", $noUrut);

if($_POST['member'])
{
mysql_query("Insert into member values('$_POST[kd_member]','$_POST[email]','$_POST[pwd]','$_POST[no_identitas]','$_POST[nama_lengkap]','$_POST[alamat_lengkap]','$_POST[jk]','$_POST[tgl_lahir]','$_POST[no_telp]')");
echo "<script>
alert('Anda Sudah Daftars');
window.location='login.php';
</script>";	
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Daftar Member</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/normalize.min.css">

  
      <link rel="stylesheet" href="css/sdaftar.css">

  
</head>

<body>
<div id="header"><center><img src="images/coba1.png"></center> <h1> Form Daftar Member </h1></div> 

  <div class="form">
   
     
         <div class="tab-content">  
        
          <form action="" method="post">
          <div class="field-wrap">
            ID <font color="#F00">*Harap Di ingat</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong><?php echo $newID ?></strong>
          </div><br><br>
          
           <div class="field-wrap">
            Email <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" class="inp" required autocomplete="off" value="<?php echo $_POST[email] ?>" placeholder="(ex:inkost@gmail.com)"/>
          </div><br><br>

                    
          <div class="field-wrap">
          Password <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" class="inp" required autocomplete="off" value="<?php echo $_POST[pwd] ?>"  placeholder="(ex:xxxxxx)"/>
          </div><br><br>
          
          <div class="field-wrap">
           No. Identitas<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="no_identitas" required autocomplete="off" value="<?php echo $_POST[no_identitas] ?>" placeholder="(ex:E123456)"/>
          </div><br><br>
          
          <div class="field-wrap">
           Nama Lengkap<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="nama_lengkap" required autocomplete="off" value="<?php echo $_POST[nama_lengkap] ?>" placeholder="(ex:Ully Nuhanatika)"/>
          </div><br><br>
                   
          Jenis Kelamin<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input name="jk" type="radio" value="P" checked="CHECKED" />&nbsp;Pria&nbsp;&nbsp;&nbsp;
         <input type="radio" name="jk" value="W"  />&nbsp;Wanita<br><br><br>
          
			<div class="field-wrap">
           Tanggal Lahir<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="date" class="inp" name="tgl_lahir" required autocomplete="off" value="<?php echo $_POST[tgl_lahir] ?>" placeholder="(ex:tahun/bulan/tanggal)"/>
          </div><br><br>
		  
		  <div class="field-wrap">
           Alamat Lengkap<font color="#F00">*harus diisi</font>&nbsp;&nbsp;<input type="text" class="inp" name="alamat_lengkap" required autocomplete="off" value="<?php echo $_POST[alamat_lengkap] ?>" placeholder="(ex:Jl.Mastrip Timur 87)"/>
          </div><br><br>
		  
		  <div class="field-wrap">
           No. Telp / WA <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="no_telp" required autocomplete="off" value="<?php echo $_POST[no_telp] ?>" placeholder="(ex:081xxx)"/>
          </div><br><br>
		  
		  
          <input type="submit" class="button button-block" name="member" value="Daftar"/>
          
          </form>
  </div>
          
       
  <script src='js/jquery.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
