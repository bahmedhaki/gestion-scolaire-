<?php
require_once("verifier.php");
require_once("connection.php");
$Année_Scolaire = $_POST['Année_Scolaire']; 
$nivea_scolaire = $_POST['nivea_scolaire'];
$section = $_POST['section'];
$sql = "INSERT INTO class (code,annnee_scolaire,niveau,section)
VALUES (null,'$Année_Scolaire','$nivea_scolaire','$section')";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>    