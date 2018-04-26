<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
$nivea_scolaire=" ";
$section=" ";

if (isset($_POST['nivea_scolaire']) and isset($_POST['section']) ){
    $nivea_scolaire=$_POST['nivea_scolaire'];
    $section=$_POST['section'];
    $nom_module=$_POST['nom_module'];

}
$req1 = mysqli_query($con,"SELECT code_class from class  where nivea_scolaire = '$nivea_scolaire' and section ='$section' ")
                                       or die (mysqli_error($con));
$code_class=mysqli_fetch_assoc($req1);

$req2=mysqli_query($con,"SELECT module from cours where code_class = '".$code_class['code_class']."'") or die (mysqli_error($con));

$req3=mysqli_query($con,"SELECT * from etudiant where code_class='".$code_class['code_class']."' ");

$req4 = mysqli_query($con,"SELECT code_coure from cours  where module ='$nom_module' and code_class = '".$code_class['code_class']."' ")
                                       or die (mysqli_error($con));

$code_cour=mysqli_fetch_assoc($req4);
                                       
?>
<html>
<body>
<form method="post" action="ajouternote.php">
    Class:<td><select name="nivea_scolaire">
            <option>Première année moyenne</option>
            <option>deuxième année moyenne</option>
            <option>troisième année moyenne</option>
            <option>quatrième année moyenne</option>
            </select>
            </td> 
    Section:<td><select name="section" >
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            </select></td> 

    Module:<td><select name="nom_module">
    <?php  while($module = mysqli_fetch_assoc($req2)) { ?>
            <option><?php echo($module['module'])  ?></option>
            </select></td> 
    
    <?php  } ?>          
    <input type='submit' value='chercher'>
    </form>
    <table border = "1" widht="80%">
        <tr>
            <th>Nom</th><th>Prenom</th>
        </tr>
        <?php  while($info = mysqli_fetch_assoc($req3)) { ?>
        <tr>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              
              <td><a href ="saisernote.php ?code=<?php echo($info['code']) ?> ?code_cour=<?php echo($code_cour['code_coure']) ?>
                              ?code_class=<?php echo($code_class['code_class']) ?> "> Ajouter </a> </td>
              <td><a href ="supprimeretudiant.php ?code=<?php echo($info['code'])  ?>"> Supprimer </a> </td>
        </tr>

        <?php  } ?> 
    </table>
</body>
</html>