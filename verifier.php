<?php
session_start();
if (((isset($_SESSION['utlisateur']) and isset( $_SESSION['pass_word']) ))){
    header("location:index.html");
}
?>