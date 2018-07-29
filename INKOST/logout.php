<?php
session_start();
unset ($_SESSION['member']);
echo'<script type="text/javascript">
alert("Anda berhasil Logout!");
window.location="index.php";
</script>';
exit;

?>