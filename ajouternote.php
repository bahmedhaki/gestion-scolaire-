<?php
require_once("verifier.php");
require_once("connection.php");
$nivea_scolaire=" ";
$section=" ";
if (isset($_POST['nivea_scolaire']) and isset($_POST['section']) ){
  $nivea_scolaire=$_POST['nivea_scolaire'];
    $section=$_POST['section'];
}
$rs = mysqli_query($con,"SELECT code_class from class  where nivea_scolaire = '$nivea_scolaire' and section ='$section' ")
                                       or die (mysqli_error($con));
$etud=mysqli_fetch_assoc($rs);
$req2=mysqli_query($con,"SELECT nom_module from cours where code_class = '$etud['code_class']'") or die (mysqli_error($con));
$req3=mysqli_query($con,"SELECT nom and prenom from etudiant where code_class='$etud['code_class']' ");
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
    Section:<td>Section</td>
          <td><select name="section" >
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            </select></td> 
    module:<td>module</td>
    <td><select name="module">
    <?php  while($module = mysqli_fetch_assoc($req2)) { ?>
            <option><?php echo($module['nom_module'])  ?></option>
            </select></td>     
    <input type='submit' value='chercher'>
    </form>
    <table border = "1" widht="80%">
        <tr>
            <th>Nom</th><th>Prenom</th>
        </tr>
        <?php  while($class = mysqli_fetch_assoc($req3)) { ?>
        <tr>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><a href ="editetudiant.php ?code=<?php echo($info['code'])  ?>"> Ajouter </a> </td>
              <td><a href ="supprimeretudiant.php ?code=<?php echo($info['code'])  ?>"> Supprimer </a> </td>
        </tr>

        <?php } ?> 
    </table>
</body>
</html>