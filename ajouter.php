<?php  
//index.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "bd_school");
$query = "SELECT * FROM " . $_SESSION['nom_table']. " ORDER BY id DESC";
$result = mysqli_query($connect, $query);
 ?>  
 
    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PHP Ajax Insert Data in MySQL By Using Bootstrap Modal</h4>
    </div>
    <div class="modal-body">
        <form method="post" id="insert_form">
        <label>Enter Employee Name</label>
        <input type="text" name="nom" id="nom" class="form-control" />
        <br />
        <label>Enter Employee Address</label>
        <textarea name="prenom" id="prenom" class="form-control"></textarea>
        <br />
        <label>Select Gender</label>
        <select name="sex" id="sex" class="form-control">
        <option value="Male">Male</option>  
        <option value="Female">Female</option>
        </select>
        <br />  
        <label>Enter Designation</label>
        <input type="text" name="telephone" id="telephone" class="form-control" />
        <br />  
        <label>Enter Age</label>
        <input type="text" name="address" id="address" class="form-control" />
        <br />
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
 
<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#nom').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#prenom').val() == '')  
  {  
   alert("Address is required");  
  }  
  else if($('#telephone').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
});  
 </script>