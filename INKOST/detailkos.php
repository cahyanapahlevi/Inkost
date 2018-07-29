<?php 
require 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>INKOST</title>

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


<!-- start-smoth-scrolling -->
</head>
<body>
<!--Header-->
<?php
require("menuutama.php");
$a=mysql_query("Select * from kost left outer join jenis on kost.kd_jenis=jenis.kd_jenis left outer join kamar on kamar.kd_kost=kost.kd_kost left outer join foto on foto.kd_kost=kost.kd_kost where kost.kd_kost='$_SESSION[kost]'");
($query=mysql_fetch_array($a));
?>
<br>
<br>
<br>

 
<div class="container">
  <h2>&nbsp;<?php echo $query['nm_kost']; ?></h2>
  <p>&nbsp;<?php echo $query['alamat_kost']; ?></p>
    <button type="button" class="btn btn-danger" style="float:left"><?php echo $query['jenis']; ?></button>
 <br><br>
  <img src="images/<?php echo $query['foto1'];?>" class="img-thumbnail" width="580" height="580"> 
</div>
<div class="col-sm-1"></div>
<div class="col-md-1">
      <a class="example-image-link" href="images/<?php echo $query['foto1'];?>" data-lightbox="example-set" data-title="Gambar 1">
        <img src="images/<?php echo $query['foto2'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
      <a class="example-image-link" href="images/<?php echo $query['foto2'];?>" data-lightbox="example-set" data-title="Gambar 2">
        <img src="images/<?php echo $query['foto3'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
      <a class="example-image-link" href="images/<?php echo $query['foto3'];?>" data-lightbox="example-set" data-title="Gambar 3">
        <img src="images/<?php echo $query['foto4'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
      <a class="example-image-link" href="images/<?php echo $query['foto4'];?>" data-lightbox="example-set" data-title="Gambar 4">
        <img src="images/<?php echo $query['foto5'];?>" class="img-thumbnail" style="width:80px;height:60px">
      </a>
    </div>
<div class="col-md-1">
      <a class="example-image-link" href="images/<?php echo $query['foto5'];?>" data-lightbox="example-set" data-title="Gambar 5">
        <img src="images/<?php echo $query['foto6'];?>" class="img-thumbnail" style="width:80px;height:60px">
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
        <td><center><?php echo $query['luas_kamar']; ?></center></td>
      </tr>
      <tr>
        <td><div class="well" style="float:none">Kamar Mandi</div></td>
        <td><center><?php echo $query['fasilitas_kamar']; ?></center></td>
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
        </div></div>
</body>
</html>
