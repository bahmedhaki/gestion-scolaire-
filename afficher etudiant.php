<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
$req = "SELECT * FROM etudiant";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

</style>
</head>
<body>
    <table id="customers">
        <tr>
            <th>Code</th><th>Nom</th><th>Prenom</th><th>telephone</th>
            <th>Address</th><th>Nivea Scolair </th><th>Date De Naissance</th><th>Photo</th>
        </tr>        
        <?php  while($info = mysqli_fetch_assoc($excute)) { ?>
        <tr>
              <td><?php echo($info['code'])  ?> </td>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><?php echo($info['telephone'])  ?> </td>
              <td><?php echo($info['address'])  ?> </td>
              <td><?php echo($info['nivea_scolaire'])  ?> </td>
              <td><?php echo($info['date_de_naissance'])  ?> </td>
              <td><img style="width: 20%; border-radius: 50%;" src="<?php echo($info['photo'])  ?>"></td>
              <td><a href ="editetudiant.php ?code=<?php echo($info['code'])  ?>"> EDITER </a> </td>
              <td><a href ="supprimeretudiant.php ?code=<?php echo($info['code'])  ?>"> Supprimer </a> </td>
        </tr>
        <?php } ?> 
    </table>
</body>
</html>