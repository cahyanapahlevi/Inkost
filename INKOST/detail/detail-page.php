<?php 
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en"><head>
  <title>Detail Page</title>
   <!-- Bootstrap and Font Awesome css -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" >
   <link href='css/bootstrap.min.css' rel='stylesheet'>
   <!--<link href='css/style.css' rel='stylesheet'>-->
   <link href='css/ZoomIN.css' rel='stylesheet'>
   
<!--script other-->
<style>
div.fixed{
	position:fixed;
	bottom:400px;
	right:100px;
	width:200px;
	border : 2px solid #222;
}
</style>
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
    <div class="bg-default">
<script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <!--Zoom Entertainment-->
    <script src="css/zoom-entt.js"></script>
    <!--galery-->
  
  
<!--detail-->
<?php
$query=mysql_fetch_array(mysql_query("Select * from kost left outer join jenis on kost.kd_jenis=jenis.kd_jenis left outer join kamar on kamar.kd_kost=kost.kd_kost left outer join foto on foto.kd_kost=kost.kd_kost "));

?>
<div class="container">
  <h2>&nbsp;<?php echo $query[1]; ?></h2>
  <p>&nbsp;<?php echo $query[3]; ?></p>
    <button type="button" class="btn btn-danger" style="float:left"><?php echo $query[19]; ?></button>
 <br><br>
  <img src="img/<?php echo $query['foto'];?>" class="img-thumbnail" width="700" height="500"> 
</div>
<div class="col-sm-1" id="kiri"></div>
<div class="col-md-1">
<a class="example-image-link" href="img/<?php echo $query['foto1'];?>" data-lightbox="example-set" data-title="Gambar 1">
        <img src="img/<?php echo $query['foto1'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
<a class="example-image-link" href="img/<?php echo $query['foto2'];?>" data-lightbox="example-set" data-title="Gambar 2">
        <img src="img/<?php echo $query['foto2'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
<a class="example-image-link" href="img/<?php echo $query['foto3'];?>" data-lightbox="example-set" data-title="Gambar 3">
        <img src="img/<?php echo $query['foto3'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
<a class="example-image-link" href="img/<?php echo $query['foto4'];?>" data-lightbox="example-set" data-title="Gambar 4">
        <img src="img/<?php echo $query['foto4'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
<a class="example-image-link" href="img/<?php echo $query['foto5'];?>" data-lightbox="example-set" data-title="Gambar 5">
        <img src="img/<?php echo $query['foto5'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
<a class="example-image-link" href="img/<?php echo $query['foto6'];?>" data-lightbox="example-set" data-title="Gambar 6">
        <img src="img/<?php echo $query['foto6'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<br><br><br><br>
<div class="container">
    <br><br><br>	
  <div class="col-sm-9">          
  
<table width="400" border="0">
      	<tr>
        <td width="179"><div class="well" style="float:none">Fasilitas Kamar</div></td>
        <td width="211"><center><?php echo $query['fasilitas']; ?></center></td>
      </tr>
      <tr>
        <td><div class="well" style="float:none">Luas Kamar</div></td>
        <td><center><?php echo $query[25]; ?></center></td>
      </tr>
      <tr>
        <td><div class="well" style="float:none">Kamar Mandi</div></td>
        <td><center><?php echo $query[4]; ?></center></td>
      </tr>
<tr>
        <td><div class="well" style="float:none">Fasilitas Umum</div></td>
        <td><center><?php echo $query[5]; ?></center></td>
      </tr>
<tr>
        <td><div class="well" style="float:none">Parkir</div></td>
        <td><center>-</center>
          </td>
      </tr>
<tr>
        <td><div class="well" style="float:none">Akses Lingkungan</div></td>
        <td><center><?php echo $query[6]; ?></center></td>
      </tr>
<tr>
        <td><div class="well" style="float:none">Keterangan Lain</div></td>
        <td><center>-</center></td>
      </tr>

</table>
</div>
</div>
<div class="fixed"> tsting</div>
<!--booking form-->
    <input type='checkbox' id='btn-modal-zoomIn' hidden>
    <div class='modal-zoomIn'>
		<div class='modal-body'>
				<div class='panel-title'>
					<label for='btn-modal-zoomIn'>X</label>
				</div>
				<div class='panel-body'>
                    <form action="#" method="post">
                         <center><h3>Booking Now</h3></center>
                        <hr size="20px">
                        <br>
                        <div class="radio">
                                <label><input type="radio" name="optradio">Harian</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio">Mingguan</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio">Bulanan</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio">Tahunan</label>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal:</label>
                                <input type="date" class="form-control">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-book"></i>Booking Sekarang</button>
                            </p>

                        </form>
                        <p class="text-center text-muted">Belum Terdaftar?</p>
                    <p class="text-center text-muted"><a href="customer-register.html"><strong>Daftar Sekarang</strong></a></p>
                        <p class="text-center text-muted">Sudah Menjadi Member?</p>
                        <p class="text-center text-muted"><a  href="#" data-toggle="modal" data-target="#login-modal"><strong>Sign IN</strong></a></p>
				</div>
			</div>
		</div>
        <!--chat-->
   <script type='text/javascript'>
       window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",55572]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);
    </script>
 
</body>
</html>
