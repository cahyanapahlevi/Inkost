<?php
require 'koneksi.php';

$data=mysql_fetch_array(mysql_query("select * from admin where kd_admin='$_SESSION[login]'"));
?>
<!DOCTYPE html>

<html lang="en">
<head>
<title>INKOST</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<body>
<!--Header-->


	<div class="header">
		<!--Top-Bar-->
			
				<div class="top-bar">
				<div class="container">
					<div class="header-nav">
						<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								
								<h1><a class="navbar-brand" href="">CT Team</a></h1>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="linkEffects linkHoverEffect_12">
									<ul>
										 
										<li><a class="scroll" href="listkost.php"><span>List Kost</span></a></li> 
										<li><a class="scroll" href="listmember.php"><span>List Member </span></a></li> 
                                        <li><a class="scroll" href="saran.php"><span>Pesan</span></a></li>
										                                                                                
                                       <li><div class="dropdown">
  										<button class="dropbtn"><font color="#000"> Hi, Admin <?php echo $data[username];?> </font></button> 										 <div class="dropdown-content">
   										
                                        <a href="adduser.php"><font color="#000">Add User</font></a>
                                        <a href="logoutadmin.php"><font color="#000">Logout</font></a>
                                        
                                        </div></div></li>
                                        
                                       
													 
										 
									</ul>
								</nav>	
							</div>
						</nav>
					</div>
				</div>
			</div>