<?php
require_once("verifier.php");
require_once("connection.php");
$Code = $_GET['code'];
$req ="SELECT nom FROM  etudiant where (code=$Code) ";
$rs=mysqli_query($con,$req) or die(mysql_error($con));
$etud=mysqli_fetch_assoc($rs);
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="modifieretudian.php" enctype="multipart/form-data">
    <table border = "1" widht="80%">
        <tr>
          <td>Code</td>
          <td><input type="text" name="code" value="<?php echo($etud['code']) ?>"></td>     
        </tr>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" value="<?php echo($etud['nom']) ?>"></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"value="<?php echo($etud['prenom']) ?>"></td>     
        </tr>
        <tr>
        <input type="hidden" name="sex" id="sex">
                      <input type="checkbox"  value="1"> male
                      <input type="checkbox"  value="2"> femelle
         </tr>
         <tr>
          <td>telephone</td>
          <td><input type="text" name="telephone"value="<?php echo($etud['telephone']) ?>"></td>     
        </tr>
        <tr>
          <td>address</td>
          <td><input type="text" name="address"value="<?php echo($etud['address']) ?>"></td>     
        </tr>
        <tr>
          <td>niveau d'etude</td>
          <td><input type="text" name="nivea_scolaire"value="<?php echo($etud['nivea_scolaire']) ?>"></td>     
        </tr>
        
        <tr>
          <td>photo</td>
          <td><input type="file" name="photo"id="photo"></td>     
        </tr> 
        <tr>
          <td>photo</td>
          <td><img src="<?php echo($etud['photo'])  ?>"></td>     
        </tr> 
        <tr>
           <td>date de naissance</td>
           <td><input type="date_add" name="Date"value="<?php echo($etud['date_de_naissance']) ?>"></td>     
        </tr> 
          <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
      </tr>
        </table>
            
    </form>  
</body>
</html>
<?php
mysqli_free_result($rs);
mysqli_close($con);
?>