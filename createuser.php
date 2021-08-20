<?php  
$db = mysqli_connect('localhost', 'root', 'root', 'keepsafebank');
if(!$db){  
  die('Could not connect: '.mysqli_connect_error());  
}  
echo 'Connected successfully<br/>';  
  
$name = "";
$email= "";
$amount="";
$id = 0;
$update = false;

if (isset($_POST['submit'])) {
$name = $_POST['username'];
$email = $_POST['email'];
 $amount = $_POST['amount'];
 mysqli_query($db, "INSERT INTO createuser(id,name,email,amount) VALUES ('$name','$email','$amount')"); 
// }
// if(mysqli_query($conn, $sql)){  
// echo "Record inserted successfully";  
// }else{  
//  echo "Could not insert record: ". mysqli_error($conn);  
//  }  
  
mysqli_close($db);  
}
?> 