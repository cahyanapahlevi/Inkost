<?php 
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en"><head>
  <title>Detail Page</title>
   <!-- Bootstrap and Font Awesome css -->
   
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
   <link href='css/ZoomIN.css' rel='stylesheet'>
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
   

<!--script other-->
<style>
body {
	background-color:#CCC;
}
</style>
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
<div class="col-sm-1"></div>
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
        <div class="col-sm-6" id="diam">
     Informasi<br>
    <span class="fa fa-users"></span>
                                Ibu Widya<div class="cp1">
                                                                                                <div class="phone-cp1">
                                    <span class="fa fa-phone"></span>
                                    <a href="tel:089656109000">
                                        089656109000   </a>
                                    <br>                                </div>
                                                            </div>
                                                    
                <div class="harga-properti">
                    <div class="harga-title"><center>Mulai dari</center></div>
                    <div class="harga-min"><center>IDR 350.000</center></div><br>
                    <button class="btn btn-template-main btn-modal-zoomIn"
                                onclick="btn-modal-zoomIn">
                        <label for='btn-modal-zoomIn' class='btn-modal-zoomIn'><i class="fa fa-bed"></i><strong>Booking Sekarang</strong></label></button>
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
    <div style="width: 600px">
            <?php 
    //        menampilkan pesan jika ada pesan
            if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                echo '<div class="pesan">'.$_SESSION['pesan'].'</div>';
            }

    //        mengatur session pesan menjadi kosong
            $_SESSION['pesan'] = '';
            ?>
    <input type='checkbox' id='btn-modal-zoomIn' hidden>
    <div class='modal-zoomIn'>
		<div class='modal-body'>
				<div class='panel-title'>
					<label for='btn-modal-zoomIn'>X</label>
				</div>
				<div class='panel-body'>
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
                                <label for="date">Tanggal:</label>
                                <input type="date" class="form-control" name="tanggal">
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
			</div>
		</div>
        <!--chat-->
  <!-- <script type='text/javascript'>
       window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",55572]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);
    </script>
    <script src="Js/jquery.min.js"></script>
        <script>
//            angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
//            angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
        </script>
        
<!-- YOUR BODY HERE -->

<script type="text/javascript" src="Js/jquery.js"></script>
<script type="text/javascript" src="Js/chat.js"></script>
 
</body>
</html>
