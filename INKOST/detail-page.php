<?php 
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en"><head>
  <title>Detail Page</title>
   <!-- Bootstrap and Font Awesome css -->
   <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
   <link href="css/kanan.css" rel="stylesheet" type="text/css" media="all" />
   <link href='css/ZoomIN.css' rel='stylesheet' type="text/css" media="all" />
   <link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
   <!--script others-->
 <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
    <script type="text/javascript">
        $(function() {
            var offset = $("#diam").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#diam").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#diam").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
function myFunction() {
    var x = document.getElementById('chatbox');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
</head>
<body>
<?php
require("menuutama.php");
?>
 <br>
<br><br>
    
  
<!--detail-->
<?php
$brg=mysql_query("Select * from kost join jenis on kost.kd_jenis=jenis.kd_jenis join kamar on kamar.kd_kost=kost.kd_kost where kost.kd_kost = '$_SESSION[kost]'");
($query=mysql_fetch_array($brg));
?>
<div class="container">
  <h2><?php echo $query[nm_kost]; ?></h2>
  <p><?php echo $query[alamat_kost]; ?></p>
    <button type="button" class="btn btn-danger" style="float:left"><?php echo $query[jenis]; ?></button>&nbsp;


<?php 
$rating1=$query[rating];
$voter1=$query[voter];
if($rating1 == 0 || $voter1 == 0)
{
	$rate1 = 0;
}
else
{
    $rata = $rating1/$voter1;
    $rate1 = round($rata);               
}
if($rate1 == 1)
{
echo "<img src='images/star1.png' width='20' />";
}
else if($rate1 == 2)
{
for($i=1;$i<=2;$i++)
echo "<img src='images/star1.png' width='20' />";
}
else if($rate1 == 3)
{
for($i=1;$i<=3;$i++)
echo "<img src='images/star1.png' width='20' />";
}
else if($rate1 == 4)
{
for($i=1;$i<=4;$i++)
echo "<img src='images/star1.png' width='v' />";
}
else if($rate1 == 5)
{
for($i=1;$i<=5;$i++)
echo "<img src='images/star1.png' width='20' /> ";
}	
?>
 <br><br>

  <img src="images/<?php echo $query['foto'];?>" class="img-thumbnail" width="600" height="600"> 
</div>
<div class="container">
    <br><br><br>	
  <div class="col-sm-9">          
  
<table width="633" border="0">
<tr>
        <td><div class="well" style="float:none">Hewan Peliharaan</div></td>
        <td><center><?php echo $query[hewan_peliharaan]; ?></center></td>
      </tr>
        <tr>
        <td><div class="well" style="float:none">Fasilitas Umum</div></td>
        <td><center><?php echo $query[fasilitas]; ?></center></td>
      </tr>
<tr>  
   	  <tr>
        <td width="173"><div class="well" style="float:none">Fasilitas Kamar</div></td>
        <td width="450"><center><?php echo $query['fasilitas_kamar']; ?></center></td>
      </tr>
      <tr>
        <td><div class="well" style="float:none">Luas Kamar</div></td>
        <td><center>
          <?php echo $query[luas_kamar]; ?> m
        </center></td>
      </tr>
 
        <td><div class="well" style="float:none">Akses Lingkungan</div></td>
        <td><center><?php echo $query[akses_lingkungan]; ?></center></td>
      </tr>

</table>
</div>
 <div class="col-sm-6" id="diam">
        <div class="harga-properti">
                    <div class="harga-title"><center>Mulai dari</center></div>
                    <div class="harga-min"><center>IDR 350.000</center></div><br>
                    <button class="btn btn-template-main" id="myBtn"><i class="fa fa-bed"></i>Booking Sekarang</button>
                    <button class="btn btn-template-main"
                                onclick="click_love(this);" data="inactive">
                            Simpan
                        </button>
                                                        </div><br>
                    <div class="update-desktop">
              <?php 
                   date_default_timezone_set("Asia/Jakarta");
echo "Update terakhir pada: " ."<br>".date("h:i:s a")." ".date("Y-m-d"); ?> <br>
              <span class="update-note">*Data bisa berubah sewaktu-waktu</span>
            </div>
		 <div class="Chat">
                            <h4>Ingin tau Lebih Lanjut:</h4>
                            <p>
                                <button  class="btn btn-template-main" href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $query['kd_adminkost'];?>')"><i class="fa fa-comments"></i>Mulai Obrolan</button>
                            </p>
                        </div>
                    
    </div>
        </div>  
    <!--booking form-->
    <div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
  				<center><h1>Booking</h1></center></div>
				<div class="modal-body">
                    <form action="simpan.php" method="post">
                         <center><h3>Booking Now</h3></center>
                        <hr size="20px">
                        <br>
                        <div class="radio">
                                <label><input type="radio" name="waktu" value="harian">Harian</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="waktu" value="mingguan">Mingguan</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="waktu" value="bulanan">Bulanan</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="waktu" value="tahunan">Tahunan</label>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal:</label><br>
                                <input type="date" name="tanggal">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-book"></i>Booking Sekarang</button>
                            </p>

                        </form>
                        <p class="text-center text-muted">Belum Terdaftar?</p>
                    <p class="text-center text-muted"><a href="#"><strong>Daftar Sekarang</strong></a></p>
                        <p class="text-center text-muted">Sudah Menjadi Member?</p>
                        <p class="text-center text-muted"><a  href="#" data-toggle="modal" data-target="#login-modal"><strong>Sign IN</strong></a></p>
				</div>
    <div class="modal-footer">
      </div>
  </div>

</div>			
                
<!-- YOUR BODY HERE -->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
