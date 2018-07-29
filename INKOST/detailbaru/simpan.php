<?php
    require("koneksi.php");
    $a=$_POST['waktu'];
    $b=$_POST['tanggal'];
    $sql="INSERT INTO booking(waktu,tanggal) values('$a','$b')";
    $query=mysql_query($sql);
?>
<script>
window.location="deatil-page.php"
</script>