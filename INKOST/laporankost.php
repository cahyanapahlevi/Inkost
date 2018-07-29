<?php
require 'koneksi.php';
require 'cek1.php';

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
require("menukost.php");
?>
<br>
<br>
<br>

<div class="form">
 <div class="tab-content">  
        <center><h1>Laporan Transaksi </h1></div></center><br>
<br>

 <script>
$(function() {
$("#datepicker").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
 $(function() {
$("#datepicker2").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});

</script>
<style>
.ui-datepicker td {
    border: 1px solid #CCC;
    padding: 0;
}

.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
    border: solid #FFF;
    border-width: 1px 0 0 1px;
}

</style>
<form action="" method="post">
Dari <input name="tgl1" type="date" id="datepicker" > Hingga <input name="tgl2" type="date" id="datepicker2" >
<input type="submit" name="button" class="btn btn-primary btn-large" value="Cari">
</form>
<hr>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
<tr>
<td>Kode Booking</td>
<td>Kode Member</td>
<td>Tanggal </td>
<td>Jam </td>
<td>Email</td>
<td>Nama Lengkap</td></tr>
   <?php
if(isset($_POST['button']))
{
	$originalDate1 = $_POST['tgl1'];
	$newDate1 = date("Y-m-d", strtotime($originalDate1));
	$originalDate2 = $_POST['tgl2'];
	$newDate2 = date("Y-m-d", strtotime($originalDate2));
	
	$sql="select * from booking join kost on kost.kd_kost = booking.kd_kost join member on member.kd_member = booking.kd_member where kost.kd_kost = '$_SESSION[kost]' AND booking.tanggal between '".$newDate1."' and '".$newDate2."'";
	$q=mysql_query($sql) or die(mysql_error());
	while($r=mysql_fetch_array($q))
	{
		$ts1=strtotime($r['tanggal']);
		
	?>
      <tr>
  	<td><?php echo $r['kd_booking']; ?></td>
    <td><?php echo $r['kd_member']; ?></td>
    <td><?php echo $r['tanggal']; ?></td>
    <td><?php echo $r['jam']; ?></td>
    <td><?php echo $r['email']; ?></td>
    <td><?php echo $r['nama_lengkap']; ?></td>
    
  </tr>
<?php
	}
}
?>
</table>


</div>
</body>
</html>