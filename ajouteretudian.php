<?php
require_once("verifier.php");
require_once("connection.php");
$name = $_POST['nom']; 
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$nivea_etud = $_POST['nivea_scolaire'];
$date_naissance = $_POST['Date'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_tmp_name = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp_name,$target_file);

$sql = "INSERT INTO etudiant (code,nom,prenom,telephone,address,photo,nivea_scolaire,date_de_naissance )
VALUES (null,'$name', '$prenom','$telephone','$address','$target_file ','$nivea_etud','$date_naissance')";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>    
<html>
<body>
<table border = "1" widht="80%">
        <tr>
          <td>nom</td>
          <td><?php echo($name)?></td>     
        </tr>
        <tr>
          <td>prenom</td>
          <td><?php echo($prenom)?></td>     
        </tr>    
        <tr>
          <td>telephone</td>
          <td><?php echo ($telephone)?></td>     
        </tr>  
        <tr>
          <td>address</td>
          <td><?php echo ($address)?></td>     
        </tr>  
        <tr>
          <td>nivea d''etude</td>
          <td><?php echo ($nivea_etud)?></td>     
        </tr> 
        <tr>
          <td>Date de naissance</td>
          <td><?php echo ($date_naissance)?></td>     
        </tr>  
        <tr>
          <td>photo</td>
          <td><img src="<?php echo ($target_file)?>"></td>     
        </tr>  
</table>    
</body>
</html>