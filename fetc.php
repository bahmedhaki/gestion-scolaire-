<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "bd_school") or die(mysqli_error());  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM prof WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>