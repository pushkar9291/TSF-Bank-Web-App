<?php

$con = mysqli_connect("localhost:3308", "root", "", "tsf_bank") or die(mysqli_error($con));
$select_query = "SELECT  id,sender, receiver, amount_transferred, time  FROM transaction_history";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transaction History</title>
        
      <link rel="stylesheet"  href="bootstrap.min.css" type=" text/css"> 
        <!-- jQuery library-->
        <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
        
        <!--Latest compiled and minified JavaScript-->
      
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="stylehistory.css">
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
            <div class="col-xs-6 col-xs-offset-4">
                <h2><strong>TRANSACTION HISTORY</strong></h2>
            </div>
        </div>
           <div class="table-responsive"> 
               <table class="table table-striped table-bordered table-hover">
                   
  <tr style="background-color: #5ab4b2;">
         <th>S.NO </th> <th>SENDER </th> <th>RECEIVER </th><th>AMOUNT TRANSFERRED</th><th>TRANSFER DATE & TIME</th> <th>TRANSACTION ID</th>
     </tr>
    <?php $sno=1; ?>
      <?php while (   $row= mysqli_fetch_array($select_query_result)) { ?>
                   
     <tr>
         <td><?php echo $sno; ?></td>
         <td><?php echo $row['sender']; ?></td>
         <td><?php echo $row['receiver']; ?></td>
         <td><?php echo $row['amount_transferred']; ?></td>
         <td><?php echo $row['time']; ?></td>
         <td><?php echo $row['id']; ?></td>
     </tr>
        <?php $sno++;?>
         
     <?php
      }
      ?>
    </table>
           </div>
    </div>
        
        
  <div class="footer bottom fhit">
  <p><span class="glyphicon glyphicon-copyright-mark"></span> 2021.All Rights Reserved | Design by pushkar</p>
</div>
    </body>
</html>



