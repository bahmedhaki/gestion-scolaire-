<?php
require_once("connection.php");
$login = $_POST['login'];
$mot_de_pass = $_POST['pass'];
$ps=MD5($mot_de_pass);
$req= "SELECT * FROM user where user='$login' and password = '$ps' ";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
if ($info = mysqli_fetch_assoc($excute)){ 
    session_start();
    $_SESSION['nom_table'] = '';
    $_SESSION['utlisateur']=$info['login'];
    $_SESSION['pass_word']=$info['pass'];
    header("location:page accueil.php");
}
else{
?><SCRIPT LANGUAGE="Javascript">alert("mot de pass ou login incorrect !!");</SCRIPT>
<?php    
    require_once("index.php");
}    


?>