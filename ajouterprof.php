<?php  
    session_start();  
    $_SESSION['nom_table'] = 'prof';
    header("location:ajouter.php");