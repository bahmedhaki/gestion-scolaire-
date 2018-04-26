<!doctype html>
<?php if(isset($_POST['abc'])){ 
// Authorisation details.
$code_etudiant=$_GET['code'];
$req1=mysqli_query($con,"SELECT telephone  from etudiant where code ='$code_etudiant'");
$number=mysqli_fetch_array($req1);
$numbers=$number['telephone']; 
$username = "dedjell.bahmed@gmail.com"; 
$hash = "eef1455957b2627740ebb315d6d56ac14c073f91c1a3b5bda9391941c3d23846"; 
// Config variables. Consult http://api.txtlocal.com/docs for more info. 
$test = "0"; 
// Data for text message. This is the text message data. 
$sender = "school"; // This is who the message appears to be from. 
$message = $_POST['mess']; 
// 612 chars or less 
// A single number or a comma-seperated list of numbers 
$message = urlencode($message); 
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test; 
$ch = curl_init('http://api.txtlocal.com/send/?'); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$result = curl_exec($ch); // This is the result from the API 
curl_close($ch); 
echo($result); 
} 
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<form method="post" action="apismsphp.php">
<table align="center">
<tr>
<td>message:</td>
<td><textarea name="mess" placeholder="enter your message"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="abc" value="send"></td>
</tr>
</table>
</form>
</body>
</html>