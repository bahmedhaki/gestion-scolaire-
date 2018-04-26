<?php
session_start();
if ((isset($_SESSION['etudiant'])) or (isset( $_SESSION['prof'])) or (isset( $_SESSION['admin'])) ){
    header("location:index.php");
}
?>