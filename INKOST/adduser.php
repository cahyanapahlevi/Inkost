<?php
require 'koneksi.php';
require 'cek.php';
if(isset($_POST['tambah']))
{
	if($_POST[captcha]!=$_SESSION[captcha]) echo'<script type="text/javascript">
alert("Kode yang Anda masukkan salah, Silahkan Mencoba Kembali!");
window.location="adduser.php";
</script>';
	else if(mysql_query("insert into admin values('','$_POST[username]','$_POST[pwd]')")) echo'<script type="text/javascript">
alert("Berhasil!");
window.location="homeutama.php";
</script>';
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
require("menuadmin.php");
?><br>
<br>
<br><br>

<center><h2>Add User</h2></center><br>
<br>

<table align="center">
<tr>
<td>
		<form action="" method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" class="username" placeholder="Username" required="">
				<div class="clear"></div>
			</div><br>

			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="pwd" class="password" placeholder="Password" required="">
				<div class="clear"></div>
                </div>
               <br>

                <img src='captcha.php' class="captcha1"><br>
                <font color="#000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Masukkan 9 Kode diatas)</font>
<br>

				<input type=text name=captcha class="captcha" placeholder="Captcha" required="">
                
                <div class="clear"></div>
			<div class="login-w3"><br>

					<input type="submit" name="tambah" value="Tambah">
			</div>
			<div class="clear"></div>
		</form></td></tr></table>


</body>
</html>