<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php"); 
$name = $_POST['nom']; 
$prenom = $_POST['prenom'];
$justifier=$_POST['justifier'];
$commentaire=$_POST['commentaire'];
$rs=mysqli_query($con,"SELECT code FROM  etudiant where (nom='$name') and (prenom='$prenom')") or die(mysql_error($con));
$code_etud=mysqli_fetch_assoc($rs);
$req=mysqli_query($con,"SELECT * FROM  absences where (id_etudiant='".$code_etud['code']."')") or die(mysql_error($con));
$etud=mysqli_fetch_assoc($req);
$sql = "UPDATE absences set justifier='$justifier', commentaire='$commentaire' where (id_etudiant='".$code_etud['code']."')";
mysqli_query($con, $sql) or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="AffectAbsence.php" enctype="multipart/form-data">
    <table border = "1" widht="80%">
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" value="<?php echo($_POST['nom']) ?>"></td>     
        </tr>
         <tr>
          <td>Prenom</td>
          <td><input type="text" name="prenom" value="<?php echo($_POST['prenom']) ?>"></td>     
        </tr>
        <td>Justification</td>
        <tr><input type="hidden" name="justifier" id="justifier" value="<?php echo($etud['justifier']) ?>" >
                      <input type="checkbox"  value="1">Oui
                      <input type="checkbox"  value="2">Non 
        </tr>
         <tr>
          <td>Commentaire</td>
          <td><input type="text" name="commentaire"value="<?php echo($etud['commentaire']) ?>"></td>     
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
mysqli_close($con);
?>