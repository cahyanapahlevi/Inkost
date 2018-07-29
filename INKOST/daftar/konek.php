<?php
$konek=mysql_connect('localhost','root','','inkost');
if(!($konek)){
echo"<script language=\"JavaScrip\">\n";
echo"alert(\"Tidak bisa terkoneksi dengan database....!,koneksi akan ditutup..!\");\n";
echo"</script>";
die;
}else{
	$sel=mysql_select_db('inkost');
}
?>