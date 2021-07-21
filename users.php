<?php

$con = mysqli_connect("localhost:3308", "root", "", "tsf_bank") or die(mysqli_error($con));
$select_query = "SELECT id, name, email, balance  FROM users";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
        
         <link rel="stylesheet"  href="bootstrap.min.css" type=" text/css"> 
        <!-- jQuery library-->
        <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
        
        <!--Latest compiled and minified JavaScript-->
      
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
         <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    <a href="index.php" class="navbar-brand">TSF BANK</a>
                </div>
                
                <div class="collapse navbar-collapse" id="myNavbar">
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                        <li><a href="transfer.php"><span class="glyphicon glyphicon-transfer"></span> Transfer</a></li>
                        <li><a href="transaction_history.php"><span class="glyphicon glyphicon-book"></span> Transaction History</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-xs-12">
                         <br><br>         <br><br>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-5">
                <h2><strong>OUR USERS</strong></h2>
            </div>
        </div>
           <div class="table-responsive"> 
               <table class="table table-striped table-bordered table-hover">
                   
  <tr style="background-color: #5ab4b2;">
         <th>ID</th> <th>NAME </th> <th>EMAIL </th><th>BALANCE</th><th>TRANSFER MONEY</th>
     </tr>
      <?php while (   $row= mysqli_fetch_array($select_query_result)) { ?>
                   
     <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['balance']; ?></td>
         <td> <center><a href="transfer.php" > <button type="button">Transfer</button></a></center></td>
     </tr>
          
     <?php
      }
      ?>
    </table>
           </div>
    </div>
        
         <div class="footer">
  <p><span class="glyphicon glyphicon-copyright-mark"></span> 2021.All Rights Reserved | Design by pushkar</p>
</div>
    </body>
</html>