<?php 
include("page1.php");
require_once("connection.php");
$login = $_POST['login'];
$mot_de_pass = $_POST['pass'];
$ps=MD5($mot_de_pass);
$req = mysqli_query($con,"SELECT count(*) as nb FROM user where user='$login' and password = '$ps' ") or die (mysqli_error($con));
$info = mysqli_fetch_assoc($req);
if($info['nb']== 1){
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$req1=mysqli_query($con,"SELECT code  FROM etudiant where nom='$nom' and prenom = '$prenom' ") or die (mysqli_error($con));
$etud = mysqli_fetch_assoc($req1);
    session_start();
    if($info['type_user']=="etudiant"){
        $_SESSION['etudiant']=$info['login'];
        $_SESSION['id_etudiant']=$etud['code'];
    }
    elseif($info['type_user']=="prof"){
        $_SESSION['prof']=$info['login'];
    }
    elseif($info['type_user']=="admin")
        $_SESSION['admin']=$info['login'];

    header("location:afficher etudiant.php");
}
else{
?><SCRIPT LANGUAGE="Javascript">alert("mot de pass ou login incorrect !!");</SCRIPT>
<?php  
        header("location:index.php");      
}    ?> 
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<form method="post" action="valider.php" enctype="multipart/form-data">
    <table>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" ></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"></td>     
        </tr>
    <table>
</form>
</body>
</html> 
  