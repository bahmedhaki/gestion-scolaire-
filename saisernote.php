<?php
require_once("verifier.php");
require_once("connection.php");  
if(isset($_POST['nom']) and isset($_POST['prenom'])){
  if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['telephone']!="" and $_POST['address']!="" 
  and $_POST['nivea_scolaire']!="" and $_POST['Date']!=""){

  $code_class=mysqli_query($con,"SELECT code_class from class where niveau='$nivea_etud' and  section='$section'");
  $req=mysqli_query($con,"SELECT count(*) as nb from etudiant where nom='$name' and prenom='$prenom'");
	$nb=mysqli_fetch_array($req);
	if($nb['nb']>0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
  <?php
   
	}
	else{
  $req2="INSERT INTO etudiant (code,nom,prenom,telephone,sex,address,photo,nivea_scolaire,date_de_naissance )
    VALUES (null,'$name', '$prenom','$telephone','$sex','$address','$target_file ','$nivea_etud','$date_naissance','$code_classs')";  
	mysqli_query($con,$req2);
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
    <form method="post" action="saisernote.php" enctype="multipart/form-data">
    <table>
        <tr>
          <td>semester</td>
          <td><input type="text" name="nom" ></td>     
        </tr>
         <tr>
          <td>dovior1</td>
          <td><input type="text" name="dovior1"></td>     
        </tr>
        <tr>
          <td>dovior2</td>
          <td><input type="text" name="dovior2"></td>     
        </tr>
        <tr>
          <td>address</td>
          <td><input type="text" name="address"></td>     
        </tr>
        <tr>
           <td>semester</td>
            <td><select name="semester">
            <option>Première semester</option>
            <option>deuxième semester</option>
            <option>troisième semester</option>
            <option>quatrième semester</option>
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
        <tr>
          <td>photo</td>
          <td><input type="file" name="photo"id="photo"></td>     
        </tr>
           <td>date de naissance</td>
           <td><input type="date" name="Date"></td>     
        </tr> 
          <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
      </tr>
        </table>
            
    </form>
    </body>
</html>