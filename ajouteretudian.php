<?php  
    session_start();  
    $_SESSION['nom_table'] = 'etudiant';
    header("location:ajouter.php");