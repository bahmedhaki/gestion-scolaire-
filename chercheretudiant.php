<?php
require_once("verifier.php");
require_once("connection.php");
$motcle=" ";
$motcle2=" ";
$motcle3=" ";
if (isset($_POST['nivea_scolaire']) and isset($_POST['section']) ){
if (isset($_POST['Nom'])){
    $motcle = $_POST['Nom'];
    $motcle2=$_POST['nivea_scolaire'];
    $motcle3=$_POST['section'];
}
}
$req = "SELECT * FROM etudiant where nom like '$motcle' " and "SELECT * FROM class where
 annnee_scolaire like '$motcle2'  and section like '$motcle3' " ;
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="chercheretudiant.php">
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
    Nom:<input type='text' name='Nom' value ="<?php echo($motcle) ?>">         
    <input type='submit' value='chercher'>
    </form>
    <table border = "1" widht="80%">
        <tr>
            <th>Code</th><th>Nom</th><th>Prenom</th><th>telephone</th>
            <th>Address</th><th>Nivea Scolair </th><th>Date De Naissance</th><th>Photo</th>
        </tr>
        <?php  while($info = mysqli_fetch_assoc($excute)) { ?>
        <tr>
              <td><?php echo($info['code'])  ?> </td>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><?php echo($info['telephone'])  ?> </td>
              <td><?php echo($info['address'])  ?> </td>
              <td><?php echo($info['nivea_scolaire'])  ?> </td>
              <td><?php echo($info['date_de_naissance'])  ?> </td>
              <td><img src="<?php echo($info['photo'])  ?>"></td>
              <td><a href ="editetudiant.php ?code=<?php echo($info['code'])  ?>"> EDITER </a> </td>
              <td><a href ="supprimeretudiant.php ?code=<?php echo($info['code'])  ?>"> Supprimer </a> </td>
        </tr>

        <?php } ?> 
    </table>
</body>
</html>