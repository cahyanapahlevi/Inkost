<?php
	require("koneksi.php");
if($_POST['input'])
{
	$b=$_POST['nama_lengkap'];
	$c=$_POST['email'];
	$d=$_POST['saran'];
	if(mysql_query("INSERT INTO saran(nama_lengkap, email,saran) VALUES ('$b','$c','$d')"))
	echo'<script type="text/javascript">
alert("Berhasil ");
window.location="contact.php";
</script>';
else 
echo'<script type="text/javascript">
alert("Tidak Berhasil");
window.location="contact.php";
</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>INKOST</title>

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/styleall.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body>
	
 <!-- [CONTACT]
 ============================================================================================================================-->
<?php

require("menuutama.php");
?>	

 <section class="contact-remsh white-background black" id="contact">
 <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="sectionTitle text-center">
                        <br><br>				
						<h2><strong>CONTACT US</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                                   
                    </div>

                    <form id="contact-form" method="POST" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputNama1">Nama</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputE-mail1">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMessage">Message</label>
                            <textarea class="form-control" rows="3" name="saran"></textarea>
                        </div>
                        
                        <input type="submit" class="btn btn-primary black-background" id="contactbtn" name="input" value="Submit">
                    </form>

                </div>
            </div>

        </div>
 </section>
<br>
<br>
<br>
<br>
<br>

 <!-- [/CONTACT]

  <!-- [FOOTER]
=============================================================================================================================-->

 <footer class="footer">
  
					<div class="container">
						<div class="footer-info col-md-12 text-center">
							<ul>
								<li><a href="#">JEMBER</a></li>
								<li><a href="#">+580-698-5024</a></li>
								<li><a href="#">inkost@gmail.com</a></li>
							</ul>
						</div>
						<div class="footer-social-icons col-md-12 text-center">
							<ul>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				  
     
     
 </footer>
 
 <section class="sub-footer">
					<div class="container">
						<div class="copyright-text col-md-6 col-sm-6 col-xs-12">
							<p>© 2016 CTeam.</p>
						</div>
						<div class="designed-by col-md-6 col-sm-6 col-xs-12">
							<p>Designed by: <a href="#">CTeam</a></p>
						</div>
					</div>
				</section>

 <!-- [/FOOTER]
=============================================================================================================================-->
 
 
</body>
</html>
