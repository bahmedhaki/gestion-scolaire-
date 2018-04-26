<?php
require_once("verifier.php");
require_once("connection.php");
$code = $_POST['code'];
$name = $_POST['nom']; 
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$target_dir = "img/prof";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_tmp_name = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp_name,$target_file);
$sql = "UPDATE etudiant set nom='$name', prenom='$prenom',telephone='$telephone', address ='$address',photo='$target_file', where code='$code'";
mysqli_query($con, $sql) or die (mysqli_error($con));
require_once("afficher etudiant.php");
mysqli_close($con);

?>    
