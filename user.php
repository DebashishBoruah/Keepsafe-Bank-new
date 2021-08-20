<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
        <link href="css/createUserDesign.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap-social/bootstrap-social.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <title>Create User</title>
            </head>
    <body>
        <nav class="navbar fixed-top navbar-dark">
            <div class="container-fluid my-nav">
                <a href="index.html" role="button" class="btn text-white"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                <a class="navbar-brand mr-auto text-white" href="index.html"><img src="photos/logo.png" class="img-fluid" width="190" height="190"></a>
            </div>
          </nav>
          <div class="container my-box">
              <div class="row">
                  <div class="col-sm-8 types">
                      <h1>Create User</h1>
                    <form action="user.php" method="POST">
                        <div class="form-group row">
                            <label for="Username" class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="UserName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Emailid" class="col-md-2 col-form-label">Email Id</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email id">
                            </div>    
                        </div>
                        <div class="form-group row">
                            <label for="Amount" class="col-md-2 col-form-label">Amount</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <button class="btn btn-md text-white" name="submit" type="submit" style="background-color:#eb8334;">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="col-sm-4">
                     <img src="photos/back1.png" width="400" height="400"> 
                   </div>
              </div>
          </div>
          <footer class="text-center">
                    <p>© Copyright 2021 Debashish Boruah</p>
          </footer>
          <script src="jquery/dist/jquery.slim.min.js"></script>
          <script src="popper.js/dist/umd/popper.min.js"></script>
          <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
// include_once 'database.php';
$db = mysqli_connect('localhost', 'root', '', 'keepsafebank');
if(!$db){  
  die('Could not connect: '.mysqli_connect_error());  
}
else
{
$name = "";
$email= "";
$amount="";
$id = 0;
$update = false;

if (isset($_POST['submit'])) {
$name = $_POST['username'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$sql = "INSERT INTO createuser(name,email,amount)VALUES('$name','$email','$amount')";
$result=mysqli_query($db, $sql);
if($result)
{
  echo "<script> alert('hurray, user created')</script>";
}
else {
  echo "<script>'Error: ' . $sql . '<br>' . mysqli_error($db)</script>";
}  
mysqli_close($db);  
}   
}
?> 