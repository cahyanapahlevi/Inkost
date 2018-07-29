<?php
require('konek.php');
?>
<html>
<head>
<title>Daftar Member</title>
<link rel='stylesheet' type='text/css' href='stylesheet.css'/>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header"><h1>Hasil Input</h1></div>
<div id="wrapper">

<br/><p><a href="index.php">Kembali</a></p><br/>
<table width="100%">
<tr>
<td align="center" height="30" bordercolor="#000000"><strong>Email</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Username</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Password</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>No Identitas</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Nama Lengkap</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Alamat Lengkap</strong></td>
<td align="center" height="30" bordercolor="#000000"><strong>Tanggal Lahir</strong></td>

<?php
$warna1 = "#FFFFFF";
$warna2 = "CCCCCC";
$warna = $warna1;
$sql_sel = "select * from member order by kd_member";
$query_sel = mysql_query($sql_sel);
while($sql_res=mysql_fetch_array($query_sel)){
	if($warna==$warna1){
		$warna=$warna2;}
		else{$warna=$warna1;}
	?>
<tr bgcolor="<?php echo $warna;?>"	>
	<td align="center" height="30" bordercolor="#000000"><strong><?php echo $sql_res[0]; ?></strong></td>
    <td align="center" height="30" bordercolor="#000000"><strong><?php echo $sql_res[1]; ?></strong></td>
    <td align="center" height="30" bordercolor="#000000"><strong><?php echo $sql_res[2]; ?></strong></td>
    <td align="center" height="30" bordercolor="#000000"><strong><?php echo $sql_res[3]; ?></strong></td>
    <td align="center" height="30" bordercolor="#000000"><strong><?php echo $sql_res[4]; ?></strong></td>   
</tr>
<?php } ?>
</table>
</div></div>
</body>
</html>
    	