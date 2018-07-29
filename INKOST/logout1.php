<?php
session_start();
unset ($_SESSION['adminkost']);
echo'<script type="text/javascript">
alert("Anda berhasil Logout!");
window.location="index.php";
</script>';
exit;

?>