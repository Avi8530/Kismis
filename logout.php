<?php
session_start();
session_destroy();
header("Location: Buyer/login.php");
exit();
?>
