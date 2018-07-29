<?php
require 'koneksi.php';
$query1=mysql_fetch_array(mysql_query("Select * from admin_kost where kd_adminkost='$_SESSION[adminkost]'"));


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
								
								<h1><a class="navbar-brand" href="">INKOST</a></h1>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="linkEffects linkHoverEffect_12">
									<ul>
										<li><a class="scroll" href="laporankost.php"><span>Laporan</span></a></li> 
										<div class="dropdown"><li><a class="scroll" ><span>Data</span></a>
                                        <div class="dropdown-content">
   										<a href="datakost.php"><font color="#000">Kost</font></a>
                                        <a href="datakamar.php"><font color="#000">Kamar</font></font></a></div></div></li>
                                        
                                        <div class="dropdown"><li><a class="scroll" ><span>Input Data</span></a>
										<div class="dropdown-content">
   										<a href="inputkamar.php"><font color="#000">Kamar</font></font></a>
                                        <a href="inputrekening.php"><font color="#000">Rekening</font></a>
                                        </div></div></li>
                                                                                                                         
                                       <li><div class="dropdown">
  										<button class="dropbtn"><font color="#000"> Welcome, <?php echo $query1[nama_lengkap];?> </font></button> 										 <div class="dropdown-content">
   										
                                        <a href="logoutadmin.php"><font color="#000">Logout</font></a></div></div></li>
                                        
                                       
													 
										 
									</ul>
								</nav>	
							</div>
						</nav>
					</div>
				</div>
			</div>