<?php
require "koneksi.php";
if($_POST['login'])
{
	if($_POST[captcha]!=$_SESSION[captcha]) echo'<script type="text/javascript">
alert("Kode salah, Silahkan Mencoba kembali!");
window.location="loginadmin.php";
</script>';
	elseif(mysql_num_rows(mysql_query("select * from admin where username='$_POST[username]' and pwd='$_POST[pwd]'"))==1)
{
	$data=mysql_fetch_array(mysql_query("select kd_admin, username from admin where username='$_POST[username]' and pwd='$_POST[pwd]'"));
	$_SESSION['login']=$data[0];
	$_SESSION['user']=$data[1];
	echo'<script type="text/javascript">
alert("Login berhasil, Selamat Datang :)");
window.location="homeutama.php";
</script>';
}
else {
echo'<script type="text/javascript">
alert("Username/Password salah!");
window.location="loginadmin.php";
</script>';
}
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Admin Utama</title>
	<link rel="stylesheet" href="css/sadmin.css">

	
<body>
     <div class="container w3">
        <h2>Login Admin</h2>
		<form action="" method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" class="name" placeholder="Username" required="">
				<div class="clear"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="pwd" class="password" placeholder="Password" required="">
				<div class="clear"></div>
                </div>
               
                <img src='captcha.php' class="captcha1"><br>
                <font color="#EEEEEE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Masukkan 9 Kode diatas)</font>
<br>

				<input type=text name=captcha class="captcha" placeholder="Captcha" required="">
                
                <div class="clear"></div>
			<div class="login-w3">
					<input type="submit" class="login" name="login" value="Login">
			</div>
			<div class="clear"></div>
		</form>
	</div>
	<div class="footer-w3l">
		<p> &copy; 2016 CT Team </p>
	</div>
</body>
</html>