<?php
 session_start();  
 require 'connection.php';
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Signup</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="responsive-full-background-image.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  </head>
  <body>
    <div style="margin-left:10%;margin-top:10%;mrgin-right:5%">
    <?php
      
         echo '<h1 style="color:white;font-size:50px;font-style: italic;">Welcome <span style="color:blue"> ' .$_SESSION["name"].'</span></h1>';
      
    ?>
    <h1 style="color:white;font-size:50px;font-style: italic;">Your Details!!</h1>
	<div class="container">
        <div class="table-responsive">          
  <table class="table" style="color:white" >
	<?php
        $i=$_SESSION["id"];       
      $sql1 = "SELECT * FROM Customer WHERE customer_id=$i";
    $res1 = mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res1)){
	 echo '<tr><td >NAME:</td><td>'.$row["name"].'</tr>';
	 echo '<tr><td>Customer ID:</td><td>'.$row['customer_id'].'</tr>';
	 echo '<tr><td>EMAIL:</td><td>'.$row["Email"].'</tr>';
	 echo '<tr><td>Mobile no:</td><td>'.$row["mobile"].'</tr>';
    }
	$sql2 = "SELECT * FROM cust_details WHERE cid=$i";
    $res2 = mysqli_query($conn,$sql2);
    while($row=mysqli_fetch_array($res2)){
     
	 echo '<tr><td>GENDER:</td><td>'.$row["gender"].'</tr>';
	 echo '<tr><td>Age:</td><td>'.$row['age'].'</tr>';
	 echo '<tr><td>VEGETARIAN?:</td><td>'.$row["veg"].'</tr>';
         
        //session_unset(); 

// destroy the session 
//session_destroy(); 
    }
         
        
    ?>
    
  </table>
  </div>
  <a href="logout.php" class="btn btn-default" Style="margin-bottom:10% ;margin-left:30%;padding-left:10px;padding-right:10px;font-size:20px">Logout</a>
  </div> 
  
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>