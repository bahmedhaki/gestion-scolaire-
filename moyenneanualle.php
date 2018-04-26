<?php
$Première_semester="Première semester";
$deuxième_semester="deuxième semester";
$troisième_semester="troisième semester";
$resultat=0;

$req=mysqli_query($con,"SELECT count(note_semester) as nb from note where code_etud ='$code_etud' and  semester ='$Première_semester'
                           semester ='$deuxième_semester'  semester ='$troisième_semester'  ");

$nb=mysqli_fetch_array($req);
if($nb['nb']==0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement n'existe pas !");</SCRIPT>
<?php
    header("location:ajouternote.php");
}
else{
while ($moyenne=mysqli_fetch_array($nb)){
$resultat=$resultat+$moyenne['note_semester'];
}

$note_annualle=$resultat / 3 ;


$sql = "UPDATE note set note_annualle='$note_annualle' where code_etud='$code_etud'";
mysqli_query($con, $sql) or die (mysqli_error($con));
}
?>
