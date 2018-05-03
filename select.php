<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "bd_school") or die(mysqli_error());  
      $query = "SELECT * FROM etudiant WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <p><img src="img/'.$row["photo"].'" class="img-responsive img-thumbnail" /></p>  
                </tr
                <tr>  
                     <td width="30%"><label>nom</label></td>  
                     <td width="70%">'.$row["nom"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>prenom</label></td>  
                     <td width="70%">'.$row["prenom"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>telephone</label></td>  
                     <td width="70%">'.$row["telephone"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>sex</label></td>  
                     <td width="70%">'.$row["sex"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>address</label></td>  
                     <td width="70%">'.$row["address"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>