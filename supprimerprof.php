<?php
require_once("verifier.php");
require_once("connection.php");
$Code = $_GET['id'];
$req ="DELETE FROM prof where (id=$Code) ";
mysqli_query($con,$req) or die(mysql_error($con));
require_once("afficherprof.php");
?>