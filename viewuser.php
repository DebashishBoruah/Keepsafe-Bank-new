<?php
$db = mysqli_connect('localhost', 'root', '', 'keepsafebank');
$results = mysqli_query($db,"SELECT * FROM createuser"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
        <link href="../../keepsafeBank/css/viewuser.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap-social/bootstrap-social.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <title>View Users List</title>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-dark">
            <div class="container-fluid my-nav">
                <a href="index.html" role="button" class="btn text-white"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                <a class="navbar-brand mr-auto text-white" href="index.html"><img src="photos/logo.png" class="img-fluid" width="190" height="190"></a>
            </div>
          </nav>
        <div class="container my-content">
            <h2 class="text-center" style="padding-bottom:20px">Users list</h2>
         <div class="row">
        <div class="col">
         <div class="table-responsive my-table">
                <table class="table table-striped table-hover">
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
                    <?php } ?>
                </table>
            </div>
         </div>
        </div>
         </div>
        </div>
</div>
<script src="jquery/dist/jquery.slim.min.js"></script>
    <script src="popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
   
</html>
