<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
$nivea_scolaire=$_POST['nivea_scolaire'];
$section=$_POST['section'];
$nom_module=$_POST['nom_module'];

if($_SESSION['etudiant']){
    $code=$_SESSION['id_etudiant'];
    $req3=mysqli_query($con,"SELECT * from etudiant where code ='$code'");
    $code_class=mysqli_fetch_assoc($req3);

    $req2=mysqli_query($con,"SELECT module from cours where code_class = '".$code_class['code_class']."'") or die (mysqli_error($con));

    $req4 = mysqli_query($con,"SELECT code_coure from cours  where module ='$nom_module' and code_class = '".$code_class['code_class']."' ")
                                       or die (mysqli_error($con));

    $req = mysqli_query($con,"SELECT * FROM note where  code_class ='".$code_class['code_class']."' ") or die (mysqli_error($con));
}
else{    
$req1 = mysqli_query($con,"SELECT code_class from class  where nivea_scolaire = '$nivea_scolaire' and section ='$section' ")
                                           or die (mysqli_error($con));
$code_class=mysqli_fetch_assoc($req1);

$req2=mysqli_query($con,"SELECT module from cours where code_class = '".$code_class['code_class']."'") or die (mysqli_error($con));


$req3=mysqli_query($con,"SELECT * from etudiant where code_class='".$code_class['code_class']."' ");

$req4 = mysqli_query($con,"SELECT code_coure from cours  where module ='$nom_module' and code_class = '".$code_class['code_class']."' ")
                                       or die (mysqli_error($con));
$req = mysqli_query($con,"SELECT * FROM note where  code_class ='".$code_class['code_class']."' ") or die (mysqli_error($con));

}

$req = mysqli_query($con,"SELECT * FROM note where  code_class ='".$code_class['code_class']."' ") or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="affichernote.php">

    <table border = "1" widht="80%">
    <tr>
        <tr>
       <?php if(!($_SESSION['etudiant'])){ ?>
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
    
        <td>Module</td><select name="nom_module">
    <?php  while($module = mysqli_fetch_assoc($req2)) { ?>
            <option><?php echo($module['module'])  ?></option>
            </select></td> 
    <?php  } } ?> 
        <tr>
         <td>submit</td>
          <td><input type="submit" value="cherche"></td>     
        </tr>
        <tr>
            </th>Nom<th></th>Prenom<th>Semester</th><th>Devoir1</th><th>Devoir2</th>
            <th>Examan</th><th>Control Continue</th><th>Moyenne</th><th>Moyenne Semester</th><th>Moyenne Annuelle</th>
        </tr>
        
        <?php  while($etud = mysqli_fetch_assoc($req3)) { ?>
            <tr>
              <td><?php echo($etud['nom'])  ?> </td>
              <td><?php echo($etud['prenom'])  ?> </td>
        
        <?php if($_SESSION['etudiant']) { ?>      
        <?php while($module=mysqli_fetch_assoc($req2)) { ?>
            <td><?php echo($module['module']);   
            $nom_modules=$module['module'];
            $req = mysqli_query($con,"SELECT * FROM note where  module=$nom_modules and code_class ='".$code_class['code_class']."' ") or die (mysqli_error($con));?> </td>
        <?php while($info = mysqli_fetch_assoc($req)) { ?>
              <td><?php echo($info['semester'])  ?> </td>
              <td><?php echo($info['devoir1'])  ?> </td>
              <td><?php echo($info['devoir2'])  ?> </td>
              <td><?php echo($info['examan'])  ?> </td>
              <td><?php echo($info['control'])  ?> </td>
              <td><?php echo($info['note'])  ?> </td>
              <td><?php echo($info['note_semester'])  ?> </td>
              <td><?php echo($info['note_annualle'])  ?> </td>
            

        </tr>

        <?php } } } else{ 
              while($info = mysqli_fetch_assoc($req)) { ?>
        
                <td><?php echo($info['semester'])  ?> </td>
                <td><?php echo($info['devoir1'])  ?> </td>
                <td><?php echo($info['devoir2'])  ?> </td>
                <td><?php echo($info['examan'])  ?> </td>
                <td><?php echo($info['control'])  ?> </td>
                <td><?php echo($info['note'])  ?> </td>
                <td><?php echo($info['note_semester'])  ?> </td>
                <td><?php echo($info['note_annualle'])  ?> </td>
        <?php } } } ?> 
    </table>
</body>
</html>