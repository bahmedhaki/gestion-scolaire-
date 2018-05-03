<?php
    $connect = mysqli_connect("localhost", "root", "", "bd_school");

        if ($_POST['annee_scolaire']!= '' and $_POST['nivea_scolaire'] != '' and $_POST['section'] != '' ){
            $annee_scolaire = mysqli_real_escape_string($connect, $_POST["annee_scolaire"]);  
            $nivea_scolaire = mysqli_real_escape_string($connect, $_POST["nivea_scolaire"]);  
            $section = mysqli_real_escape_string($connect, $_POST["section"]);
            $req=mysqli_query($connect,"SELECT count(*) as nb from class where 	annee_scolaire ='$annee_scolaire' and nivea_scolaire ='$nivea_scolaire' and section ='$section'");
            echo($req);
            $nb=mysqli_fetch_array($req);
            if($nb['nb']>0){
?>
<SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
<?php
    }
    else{
        $sql = "INSERT INTO class (code,annee_scolaire,nivea_scolaire,section)
        VALUES (null,'$annee_scolaire','$nivea_scolaire','$section')";
        mysqli_query($connect,$sql);
?>
<SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT>
<?php
    }
    }
    else{
?>
<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
<?php
    }
?>     
