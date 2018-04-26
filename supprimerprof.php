<?php
require_once("verifier.php");
require_once("connection.php");
$Code = $_GET['code'];
$req ="DELETE FROM prof where (code=$Code) ";
mysqli_query($con,$req) or die(mysql_error($con));
require_once("afficherprof.php");
?>