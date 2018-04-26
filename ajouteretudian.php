<?php
require_once("verifier.php");
require_once("connection.php"); 
include("page accueil.php"); 
if(isset($_POST['nom']) and isset($_POST['prenom'])){
  if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['telephone']!="" and $_POST['address']!="" 
  and $_POST['nivea_scolaire']!="" and $_POST['Date']!=""){
  $name = ($_POST['nom']); 
  $prenom = ($_POST['prenom']);
  $sex = ($_POST['sex']);
  $telephone = ($_POST['telephone']);
  $address = ($_POST['address']);
  $nivea_etud = ($_POST['nivea_scolaire']);
  $section = ($_POST['section']);
  $date_naissance = ($_POST['Date']);
  $target_dir = "img/etudiant";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $file_tmp_name = $_FILES['photo']['tmp_name'];
  move_uploaded_file($file_tmp_name,$target_file);
  
  $req=mysqli_query($con,"SELECT count(*) as nb from etudiant where nom='$name' and prenom='$prenom'") or die (mysqli_error($con));
	$nb=mysqli_fetch_array($req);
	if($nb['nb']>0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
  <?php
   
	}
	else{
    $class=mysqli_query($con,"SELECT code_class from class where nivea_scolaire ='$nivea_etud' and  section='$section'") or die (mysqli_error($con));
    $code_class=mysqli_fetch_array($class);
    if($code_class['code_class']==0){
      ?><SCRIPT LANGUAGE="Javascript">alert("erreur! class n'existe pas!");</SCRIPT>
      <?php
      }else{
  $req2="INSERT INTO etudiant (code,nom,prenom,telephone,sex,address,photo,nivea_scolaire,date_de_naissance )
    VALUES (null,'$name', '$prenom','$telephone','$sex','$address','$target_file ','$nivea_etud','$date_naissance','$code_class')";  
	mysqli_query($con,$req2);
  ?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
      }
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
    <form method="post" action="ajouteretudian.php" enctype="multipart/form-data">
    <table>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" ></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"></td>     
        </tr>
         <tr>
          <td>telephone</td>
          <td><input type="text" name="telephone"></td>     
        </tr>
        <tr>
          <td>address</td>
          <td><input type="text" name="address"></td>     
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
        <tr><td>Section</td>
          <td><select name="section">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            </select></td> 
        </tr> 
        <tr>
          <td>photo</td>
          <td><input type="file" name="photo"id="photo"></td>     
        </tr>
        <tr>
           <td>date de naissance</td>
           <td><input type="date" name="Date"></td>     
        </tr> 
        <tr>
        <input type="hidden" name="sex" id="sex">
              <td> <input type="checkbox"  value="1">  Male </td> 
              <td> <input type="checkbox"  value="2"> Femelle </td>
         </tr>
          <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
      </tr>
        </table>
            
    </form>
    </body>
</html>