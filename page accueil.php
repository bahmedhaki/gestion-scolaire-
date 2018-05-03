<?php

require_once("connection.php");
$req = "SELECT * FROM etudiant";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style1.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="style2.css">
<link rel="stylesheet" href="style3.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<div >
  <?php
    //include("ajouter.php");
  ?>
</div>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img\img_avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a onclick="FuncEnseignant()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Enseignant<i class="fa fa-caret-down"></i></a>
    <div id="Enseignant" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficherprof.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Enseignant </a>
      <a href="#" data-toggle="modal" data-target="#add_data_Modal" class="w3-bar-item w3-button">Ajouter un prof</a>
      <a href="#" class="w3-bar-item w3-button">Chercher un prof</a>
    </div>
    <a onclick="FuncEtudiants()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Etudiants <i class="fa fa-caret-down"></i></a>
    <div id="Etudiants" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficher etudiant.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Etudiants </a>
      <a  href="ajouteretudian.php" class="w3-bar-item w3-button">Ajouter un étudiant</a>
      <a href="chercheretudiant.php" class="w3-bar-item w3-button">Chercher un étudiant</a>
    </div>
    <a onclick="FuncMatières()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Matières <i class="fa fa-caret-down"></i></a>
    <div id="Matières" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficher etudiant.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Matières </a>
      <a href="ajoutermatier.php" class="w3-bar-item w3-button">Ajouter un Matières</a>
      <a href="#" class="w3-bar-item w3-button">Chercher un Matières</a>
    </div>
    <a onclick="FuncClasse()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Salle DE Classe <i class="fa fa-caret-down"></i></a>
    <div id="Classe" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficher etudiant.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Classes </a>
      <a href="#" data-toggle="modal" data-target="#add_data_Modal" class="w3-bar-item w3-button">Ajouter Un Classe</a>
      <a href="afficherclass.php" class="w3-bar-item w3-button">Chercher Un Classe</a>
    </div>
    <a onclick="FuncAbsences()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Absences <i class="fa fa-caret-down"></i></a>
    <div id="Absences" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="ListeAbsences.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Absences </a>
      <a href="#" class="w3-bar-item w3-button">Ajouter Un Absence</a>
      <a href="#" class="w3-bar-item w3-button">Chercher Un Absences</a>
    </div>
    <a onclick="FuncNote()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Note <i class="fa fa-caret-down"></i></a>
    <div id="Note" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="affichernote.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Note </a>
      <a href="#" class="w3-bar-item w3-button">Ajouter Un Note</a>
      <a href="#" class="w3-bar-item w3-button">Chercher Un Note</a>
    </div>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Envoyer Message</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Views</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

<script>
// Accordion 
function FuncEnseignant() {
        var x = document.getElementById("Enseignant");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
function FuncEtudiants() {
        var x = document.getElementById("Etudiants");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncMatières() {
        var x = document.getElementById("Matières");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncClasse() {
        var x = document.getElementById("Classe");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncAbsences() {
        var x = document.getElementById("Absences");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncNote() {
        var x = document.getElementById("Note");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }                    
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");
// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");
// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}
// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>