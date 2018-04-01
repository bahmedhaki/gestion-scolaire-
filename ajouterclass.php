<?php
require_once("verifier.php");
require_once("connection.php");
if(isset($_POST['Année_Scolaire'])){
    if ($_POST['Année_Scolaire']!= '' and $_POST['nivea_scolaire'] != '' and $_POST['section'] != '' ){
$Année_Scolaire = $_POST['Année_Scolaire']; 
$nivea_scolaire = $_POST['nivea_scolaire'];
$section = $_POST['section'];
$req=mysqli_query($con,"SELECT count(*) as nb from class where 	annnee_scolaire ='$Année_Scolaire' 
and niveau ='$nivea_scolaire' and 	section ='$section'");
echo($req);
$nb=mysqli_fetch_array($req);
if($nb['nb']>0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
<?php
}
else{
$sql = "INSERT INTO class (code,annnee_scolaire,niveau,section)
VALUES (null,'$Année_Scolaire','$nivea_scolaire','$section')";
mysqli_query($con,$sql);
	?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
}
}
else{
?><SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
<?php
}
}
mysqli_close($con);
?>    
<html>
<head>
  <meta charset="UTF-8">
    <title>
    
    </title>
    </head>
<body>
    <form method="post" action="ajouterclass.php" enctype="multipart/form-data">
    <table>
        <tr>
          <td>Année Scolaire</td>
          <td><input type="year" name="Année_Scolaire"></td>     
        </tr>
        <tr>
           <td>niveau d'etude</td>
            <td><select name="nivea_scolaire">
            <option>Première année moyenne</option>
            <option>deuxième année moyenne</option>
            <option>troisième année moyenne</option>
            <option>quatrième année moyenne</option>
            </select>
            </td>     
        </tr>
        <tr>
          <td>Section</td>
          <td><select name="section">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            </select></td>     
        </tr>
        <tr>
         <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
        </table>
            
    </form>
    </body>
</html>