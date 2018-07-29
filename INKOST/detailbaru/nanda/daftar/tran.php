
<?php
require('konek.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="datatable/dataTables.bootstrap.css" rel="stylesheet">
<script src="css/jquery.min.js"></script>
<script src="css/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTables.bootstrap.js"></script>
<script>
        $(document).ready(function() { 
            $("#tabel_data").dataTable();
	});
</script>
</head>

<body>
	
   <br><br><br>
    <div class="col-sm-2">
    <div class="container">
  <button type="button" class="btn btn-link"  data-target="#demo">Pembayaran Kost</button><br>
  <button type="button" class="btn btn-link"><a href="satu">Pembayaran Listrik</a></button><br>
  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#tran">Pembelian Token Listrik</button><br>
  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo">Pembelian Pulsa</button><br>
  </div>
  </div>
    
    
    <div class="col-sm-5">
    <div id="demo" >
    <form method="post" action="">
	Pilihan Kost 
    <select name="kost">
    <option>-----Pilih Kost-----</option>
<?php
	$sql_pro = mysql_query("select nama_kost from rekening ;");
	if(mysql_num_rows($sql_pro) !=0 ){
		while($data_pro=mysql_fetch_assoc($sql_pro)){
		echo'<option>'.$data_pro['nama_kost'].'</option>';}}
?>
</select>

<button type="submit" name="cek" value="gfhjgjh">kjhkjhk
</button>
<br><br>
<?php
if(isset($_POST['cek'])){
	$kost=$_POST['kost'];
$query=mysql_fetch_array(mysql_query("Select * from rekening where nama_kost='$kost' "));

?>
Atas Nama	:<?php echo $query['atas_nama']; ?><br><br>
No Rekening	:<?php echo $query['nomor']; ?>
</div>
  <?php
}
 ?>
   
    
    <div id="tran" class="collapse">

   <table id="tabel_data" class="table table-bordered table-striped">
<thead>
<tr>
<td align="center" height="30" bordercolor="#000000"><strong>Nama Kost</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Atas Nama</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>No Rekening</strong></td>
</tr>
</thead>
<tbody>
<?php
$sql_sel = "select * from rekening";
$query_sel = mysql_query($sql_sel);
while($sql_res=mysql_fetch_array($query_sel)){
?>
<tr>
<td align="center" height="50" ><strong><?php echo $sql_res['nama_kost']; ?></strong></td>
<td align="center" height="30" ><strong><?php echo $sql_res['atas_nama']; ?></strong></td>
<td align="center" height="30" ><strong><?php echo $sql_res['nomor']; ?></strong></td>

</tr>
<?php } ?>
</tbody>
</table>
<br><br>
NB : Carilah nama kost yang ingin ada ketahui nomer rekeningnya untuk melakukan pembayaran online
</div></div>


</body>
</html>