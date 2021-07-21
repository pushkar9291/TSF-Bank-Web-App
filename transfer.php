<?php

$con = mysqli_connect("localhost:3308", "root", "", "tsf_bank") or die(mysqli_error($con));
$select_query = "SELECT id, name, email, balance  FROM users";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

$select_nb = "SELECT name, balance  FROM users";
$select_result = mysqli_query($con, $select_nb) or die(mysqli_error($con));

  if(isset($_POST['send']))
 {
   if(!empty($_POST['sender']) && !empty($_POST['receiver']) && !empty($_POST['amount_transferred']))
   {
       
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$amount_transferred = $_POST['amount_transferred'];


 $user_transfer_query = "insert into transaction_history(sender, receiver, amount_transferred)
values ('$sender', '$receiver', '$amount_transferred')";

$user_amount_submit = mysqli_query($con, $user_transfer_query) or
die(mysqli_error($con));

    if($user_amount_submit)
      {
             echo "";
      }
      else
      {
          echo "";
      }
}
 else {
    echo "";
}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transfer</title>
        
          <link rel="stylesheet"  href="bootstrap.min.css" type=" text/css"> 
        <!-- jQuery library-->
        <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
        
        <!--Latest compiled and minified JavaScript-->
      
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="styletransfer.css">
       
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script type="text/javascript">
            function validate(){
                var s1 = document.getElementById('selection1').value;
                var s2 = document.getElementById('selection2').value;
               
                if(s1=="--select sender--" || s2=="--select receiver--"){
                    swal({
                            title: "Empty Fields!",
                            text: "Sender/ Receiver  fields are required!",
                            icon: "warning",
                            
                            });
                    return false;
                }
                else if(s1==s2){
                    
                    swal({
                            title: "Same Fields!",
                            text: "Sender and Receiver can't be same!",
                            icon: "warning",
                            
                            });
                            return false;
                }
                else
        {
            swal({
                            title: "Money Successfully Transfered!",
                          icon: "success",
                            button: "yesss!!",
                         });
                            
        }
                return true;
            }
            
        </script>
    </head>
    <body>
        <div class="container">
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
        </div>
        <div class="container">
        <div class="row">
            <div class="col-xs-12">
                         <br><br>         <br><br>
            </div>
        </div>
            <form name="form1" onsubmit="return validate()" method="post">   
        <div class="transfer-box">
            <h1>TRANSFER</h1>
            
            <div class="textbox">
               
                    <label for="sender"> Sender:</label>
                <i class="fa fa-user" aria-hidden="true"></i>
             
                <select class="opt" name="sender" id="selection1">
                <optgroup>
                    <option value="--select sender--" selected disabled hidden>--select sender--</option>
                    <?php while (   $row= mysqli_fetch_array($select_query_result)) { ?>
                    
                       <option>
                           <?php echo $row['name']; ?>
                         </option>
                       
                        <?php
                       }
                       ?>
                </optgroup>
               </select>
            </div>  
            
            <div class="textbox">
               
                    <label for="receiver"> Receiver:</label>
                    <i class="fa fa-user" aria-hidden="true"></i><br>
                  
                <select  class="opt" name="receiver" class="selection" id="selection2">
                <optgroup>
                    <option value="--select receiver--" selected disabled hidden>--select receiver--</option>
                    <?php while ( $ro= mysqli_fetch_array($select_result)) { ?>
                    
                       <option >
                           <?php echo $ro['name']; ?>
                         </option>
                       
                        <?php
                       }
                       ?>
                </optgroup>
               </select>
            </div> 
    <div class="textbox">
                    
                    <label for="amount"> Amount:</label>
                <input type="number" min="1" max="50000" step="any" class="form-control" name="amount_transferred" required="required">
               
            </div>
            <br>
          <button type="submit" id="sendbtn" class="btn btn-primary" name="send" value="send">Send</button>
        </div>
            </form>
 </div>
</body>
</html>
            
           