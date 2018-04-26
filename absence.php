<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php"); 
$nom=" ";
$prenom=" ";
$nivea=" ";
$sectio=" ";
$date=" ";
$date_debut=" ";
$date_fin=" ";
$commentaire=" ";

if (isset($_POST['nom']) and isset($_POST['Prenom'])){
if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['debut']!="" and $_POST['fin']!=""
          and $_POST['nivea_scolaire']!="" and $_POST['Date']!="" and $_POST['Presence']!="" and $_POST['justifier']!=""){ 
  
    $nom = $_POST['nom'];
    $date=$_POST['date'];
    $date_debut=$_POST['debut'];
    $date_fin=$_POST['fin'];
    $prenom=$_POST['Prenom'];
    $nivea=$_POST['nivea_scolaire'];
    $sectio=$_POST['section'];
    $Presence=$_POST['Presence'];
    $commentaire=$_POST['commentaire'];
    $justifier=$_POST['justifier'];

$req2= "SELECT 	code_class FROM class where annnee_scolaire like '$nivea'  and section like '$sectio' " ;
$code_class= mysqli_fetch_assoc($req2);

$req = "SELECT count(*) as nb FROM etudiant where nom like '$nom'  and prenom like '$prenom' and code_class='".$code_class['code_class']."' " ;
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
$code_etud = mysqli_fetch_assoc($excute); 
$nb=mysqli_fetch_array($excute);
if($nb['nb'] == 0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement il n'existe pas!");</SCRIPT>
<?php
}
else{
$req3="INSERT INTO absences (id_etudiant,date,heur_debut,heur_fin,presence,commentaire,justifier)
VALUES ('".$code_etud['code']."','$date', '$date_debut','$date_fin','$Presence','$commentaire','$justifier')";  
mysqli_query($con,$req2);
?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
}
}
else{
?><SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
<?php
}
}

?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="absence.php">
    Class:<td><select name="nivea_scolaire">  
            <option>Première année moyenne</option>
            <option>deuxième année moyenne</option>
            <option>troisième année moyenne</option>
            <option>quatrième année moyenne</option>
            </select>
            </td> 
    Section:<td>Section</td>
          <td><select name="section" >
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            </select></td>
    Nom:<input type='text' name='nom' value ="<?php echo($nom) ?>">     
    Prenom:<input type='text' name='prenom' value ="<?php echo($prenom) ?>">  
    <input type='submit' value='chercher'><br><br> 
    Date:<input type='date' name='date' value ="<?php echo($date) ?>">
    Heur_Debut:<input type="time" name='debut'value ="<?php echo($date_debut) ?>" >
    Heur_Fin:<input type="time" name='fin'value ="<?php echo($date_fin) ?>" >
                             
    </form>
    <table border = "1" widht="80%">
        <tr>
             <th>Nom</th><th>Prenom</th><th>Presence</th><th>Justification</th><th>Commentaire</th>
        </tr>
        <?php if($nb['nb'] > 0){
 
        while($info = mysqli_fetch_assoc($excute)) { ?>
        <tr>   
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><input type="hidden" name="Presence" id="Presence">
                      <input type="checkbox"  value="1">En Retard
                      <input type="checkbox"  value="2">Absent</td>
              <td><input type="hidden" name="justifier" id="justifier">
                      <input type="checkbox"  value="1">Oui
                      <input type="checkbox"  value="2">Non  </td>        
              <td><input type='text' name='commentaire' ></td>     
        </tr>
        <?php } } ?> 
    </table>
</body>
</html>