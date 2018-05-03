<?php  
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "bd_school")or die(mysqli_error()); 
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
      $prenom = mysqli_real_escape_string($connect, $_POST["prenom"]);  
      $sex = mysqli_real_escape_string($connect, $_POST["sex"]);  
      $telephone = mysqli_real_escape_string($connect, $_POST["telephone"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE " . $_SESSION['nom_table']. "   
           SET nom='$nom',   
           prenom='$prenom',   
           sex='$sex',   
           telephone = '$telephone',   
           address = '$address',  
           photo = '' 
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO " . $_SESSION['nom_table']. "(nom, prenom, sex, telephone, address, photo)  
           VALUES('$nom', '$prenom', '$sex', '$telephone', '$address', '')
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM " . $_SESSION['nom_table']. " ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="55%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                          <th width="15%">Supprimer</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["nom"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                          <td><a href ="supprimer"' . $_SESSION['nom_table']. '".php ?id="' .$row['id'] . '""> Supprimer </a> </td>
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>