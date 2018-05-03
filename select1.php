<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "bd_school");
 $query = "SELECT * FROM etudiant WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Nom</label></td>  
            <td width="70%">'.$row["nom"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Prenom</label></td>  
            <td width="70%">'.$row["prenom"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Sex</label></td>  
            <td width="70%">'.$row["sex"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Telephone</label></td>  
            <td width="70%">'.$row["telephone"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Address</label></td>  
            <td width="70%">'.$row["address"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>