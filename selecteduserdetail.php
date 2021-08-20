<?php

$db = mysqli_connect('localhost', 'root', '', 'keepsafebank');
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $sql = "SELECT * FROM createuser WHERE id=$from";
    $query = mysqli_query($db,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * FROM createuser WHERE name='$to'";
    $query = mysqli_query($db,$sql);
  
    $sql2 = mysqli_fetch_array($query);
 
    if(($amount)<0)
    {
        echo "<script type ='text/javascript'>";
        echo "alert('oops! Negative values cannot be transferred.')";
        echo "</script>";
    }
    else if($amount > $sql1['amount'])
    {
        echo "<script type ='text/javascript'>";
        echo "alert('oops! Insufficient balance to transfer')";
        echo "</script>";   
    }
    else if($amount==0)
    {
        echo "<script type ='text/javascript'>";
        echo "alert('oops! Zero balance in your account')";
        echo "</script>";   
    }
    else
    {
        $newbalance = $sql1['amount'] - $amount;
        $sql = "UPDATE createuser SET amount = $newbalance WHERE id = $from";
        mysqli_query($db,$sql);

        $newbalance = $sql2['amount'] + $amount;
        $sql = "UPDATE createuser SET amount = $newbalance WHERE name='$to'";
        mysqli_query($db,$sql);

        $sender = $sql1['name'];
        $reciever = $sql2['name'];
        $sql = "INSERT INTO transaction(sender,reciever,balance) values('$sender','$reciever','$newbalance')";
        $result= mysqli_query($db,$sql);
        if($result){
            echo "<script> alert('Transaction successful');window.location='selecteduserdetail.php?id=$from';</script>";
        }
        $newbalance =0;
        $amount=0;
        // header('location:'.$_SERVER['HTTP_REFERER']);
        
    }
   
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
        <link href="css/transfermoney.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap-social/bootstrap-social.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <title>Transfer Money</title>
    </head>
    <body>
    <nav class="navbar fixed-top navbar-dark">
            <div class="container-fluid my-nav">
                <a href="index.html" role="button" class="btn text-white"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                <a class="navbar-brand mr-auto text-white" href="index.html"><img src="photos/logo.png" class="img-fluid" width="190" height="190"></a>
            </div>
          </nav>
    <div class="container my-content">
    <?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$update = true;
$results = mysqli_query($db, "SELECT * FROM createuser WHERE id=$id");?>
<h2 class="text-center" style="padding-bottom:20px">Transfer Money</h2>
    <div class="col-lg-10 offset-1">
        <form method="POST" name="tcredit" class="tabletext">
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email id</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tbody>
                        <tr>
                            <th><?php echo $row['name']?></th>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['amount']?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }} ?>
        </div>
                    <br>
        <div class="form-group row my-box">
        <label for="transfer" class="col-md-2 col-form-label">Transfer to</label>
         <div class="col-md-10">
        <select class="form-control" name="to" required>
        <option value=""disabled selected>Choose</option>
        <?php 
        include 'database.php';
         $sid=$_GET['id'];
        $sql="SELECT * FROM createuser WHERE id !=$sid";
        $results=mysqli_query($db,$sql);
        if(!$result)
        {
            echo "Error".$sql."<br>".mysqli_error($db);
        }
        while ($rows = mysqli_fetch_array($results)) {
        ?>
        <option class="table" value="<?php echo $rows['name'];?>">
        <?php echo $rows['name'] ;?> (Balance =
        <?php echo $rows['amount'] ;?>)
        </option>
        <?php } ?>
        <div>
        </select>
        <br>
        </div>
        </div>
        <div class="form-group row">
        <label for="Amount" class="col-md-2 col-form-label">Amount</label>
        <div class="col-md-10">
         <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
         </div>
         </div>
         <div class="form-group row">
        <div class="col-md-7 offset-5">
        <button class="btn btn-lg text-white" name="submit" type="submit" style="background-color:#eb8334;">Submit</button>
         </div>
        </div>
        </form>
        </div>
        </div>
        
    </body>
    <script src="jquery/dist/jquery.slim.min.js"></script>
    <script src="popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
</html>
