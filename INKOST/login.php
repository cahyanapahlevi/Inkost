<?php
require "koneksi.php";
if($_POST['member'])
{
	if(mysql_num_rows(mysql_query("select * from member where email='$_POST[email]' and pwd='$_POST[pwd]'"))==1)
{
	$data=mysql_fetch_array(mysql_query("select kd_member, email from member where  email='$_POST[email]' and pwd='$_POST[pwd]'"));
	$_SESSION['member']=$data[0];
	
	echo'<script type="text/javascript">
alert("Login berhasil, Selamat Datang :)");
window.location="index.php";
</script>';
}
else {
echo'<script type="text/javascript">
alert("ID/Email/Password salah!");
window.location="login.php";
</script>';
}      
}

if($_POST['adminkost'])
{
	if(mysql_num_rows(mysql_query("select * from admin_kost where email='$_POST[email]' and pwd='$_POST[pwd]'"))==1)
{
	$data=mysql_fetch_array(mysql_query("select kd_adminkost, email from admin_kost where  email='$_POST[email]' and pwd='$_POST[pwd]'"));
	$_SESSION['adminkost']=$data[0];
	
	echo'<script type="text/javascript">
alert("Login berhasil, Selamat Datang :)");
window.location="homekost.php";
</script>';
}
else {
echo'<script type="text/javascript">
alert("ID/Email/Password salah!");
window.location="login.php";
</script>';
}      
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/normalize.min.css">

  
      <link rel="stylesheet" href="css/slogin.css">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#Member">Member</a></li>
        <li class="tab"><a href="#PemilikKost">Pemilik Kost</a></li>
      </ul>
         <div class="tab-content">  
        <div id="Member">   
  <h3><font color="#FF0000">*</font> Jadilah Member untuk mendapat fasilitas terbaik</h3>
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
              ID<span class="req">*</span>
            </label>
            <input type="text" name="kd_member" required autocomplete="off"/>
          </div><br><br>

           <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div><br><br>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="pwd" required autocomplete="off"/>
          </div><br><br>

           <img src='captcha.php'><br><br>

                <font color="#EEEEEE">(Masukkan 9 Kode diatas)</font>
<br> <br>
          <div class="field-wrap">
            <label>
              Captcha<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div> <br><br>
          
          <input type="submit" class="button button-block" name="member" value="Login"/>
		  <h2><a href="daftarmember.php"><font color="#DDD">&nbsp;Sign Up!</font></a></h2>
          
          </form>
  </div>
          
        <div id="PemilikKost">   
        <h3><font color="#FF0000">*</font> Anda pemilik Kost bergabunglah bersama kami</h3>
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
              ID<span class="req">*</span>
            </label>
            <input type="text" name="kd_adminkost" required autocomplete="off"/>
          </div><br><br>
           <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div><br><br>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="pwd" required autocomplete="off"/>
       
</div><br><br>
 <img src='captcha.php'><br><br>

                <font color="#EEEEEE">(Masukkan 9 Kode diatas)</font>
<br> <br>
          <div class="field-wrap">
            <label>
              Captcha<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div> <br><br>
          
          <input type="submit" class="button button-block" name="adminkost" value="Login"/>
          
 
          
          </form>
          </div>

        </div>


  <script src='js/jquery.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
