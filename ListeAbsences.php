<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
$date = ($_POST['date']);
$req ="SELECT count(*) as nb from  absences where (date=$date) ";
$rs=mysqli_query($con,$req) or die(mysql_error($con));
if($rs['nb'] == 0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet date n'existe pas!");</SCRIPT>
<?php } ?>
<html>
<body>
<form method="post" action="AffectAbsence.php" enctype="multipart/form-data">
Date:<input type='date' name='date' value ="<?php echo($date) ?>">         
    <input type='submit' value='chercher'>
<table border = "1" widht="80%">
        <tr>
           <th>Nom</th><th>Prenom</th><th>Justification</th><th>Commentaire</th>
        </tr>
        <?php  while($etud= mysqli_fetch_assoc($rs)) { ?>
        <tr>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><?php echo($info['justifier'])  ?> </td>
              <td><?php echo($info['commentaire'])  ?> </td>
        </tr>
        <tr>
        <td><a href ="send.php ?code=<?php echo($info['code'])  ?>"> Send Message </a> </td>
        </tr>
        <tr> 
          <td>submit</td>
          <td><input type="submit" value="AffectAbsence" ></td>     
        </tr>
        <?php } ?> 
    </table>
</body>
</html>
