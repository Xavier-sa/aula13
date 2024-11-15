<?php


session_start();
session_unset();
session_destroy();
header("Location: app/view/Usuario/Login.php");
exit;

?>
