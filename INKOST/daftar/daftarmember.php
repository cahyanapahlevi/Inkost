<?php
require("konek.php");
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Daftar Member</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="slogin.css">

  
</head>

<body>
<div id="header"><center><img src="coba1.png"></center> <h1> Form Daftar Member </h1></div> 

  <div class="form">
   
     
         <div class="tab-content">  
        
          <form action="" method="post">
          
            <div class="field-wrap">
            Email <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" class="inp" required autocomplete="off" placeholder="(ex:inkost@gmail.com)"/>
          </div><br><br>

           <div class="field-wrap">
           Username <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" class="inp" required autocomplete="off" placeholder="(ex:inkost)"/>
          </div><br><br>
          
          <div class="field-wrap">
          Password <font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" class="inp" required autocomplete="off" placeholder="(ex:xxxxxx)"/>
          </div><br><br>
          
          <div class="field-wrap">
           No.Identitas<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="no_identitas" required autocomplete="off" placeholder="(ex:E123456)"/>
          </div><br><br>
          
          <div class="field-wrap">
           Nama Lengkap<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="inp" name="nama_lengkap" required autocomplete="off" placeholder="(ex:Ully Nuhanatika)"/>
          </div><br><br>
          
           <div class="field-wrap">
           Alamat Lengkap<font color="#F00">*harus diisi</font>&nbsp;&nbsp;<input type="text" class="inp" name="alamat_lengkap" required autocomplete="off" placeholder="(ex:Jl.Mastrip Timur 87)"/>
          </div><br><br>

          
          Jenis Kelamin<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input name="jk" type="radio" value="Pria" checked="CHECKED" />&nbsp;Pria&nbsp;&nbsp;&nbsp;
         <input type="radio" name="jk" value="Wanita" />&nbsp;Wanita<br><br>

<br>
          
			<div class="field-wrap">
           Tanggal Lahir<font color="#F00">*harus diisi</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="date" class="inp" name="tanggal" required autocomplete="off" placeholder="(ex:hh/bb/tttt)"/>
          </div><br><br>
          <input type="submit" class="button button-block" name="member" value="Login"/>
          
          </form>
  </div>
          
       
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
