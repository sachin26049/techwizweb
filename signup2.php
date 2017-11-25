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
      
         echo '<h1 style="color:white;font-size:50px;font-style: italic;">Welcome  <span style="color:blue">' .$_SESSION["name"].'</span></h1>';
      
    ?>
    <h1 style="color:white;font-size:50px;font-style: italic;">Just a few more Details!!</h1>
	<div class="container">
	<form action="signup3.php" method="post">
	<div class="form-group">
	<label for="gender" style="color:white; font-size:30px">Gender:</label>
	<br>
	<label class="radio-inline" style="color:white; font-size:20px; margin-right:10px">
      <input type="radio" name="gender" value="male" >Male
    </label>
    <label class="radio-inline" style="color:white; font-size:20px; margin-right:10px">
      <input type="radio" name="gender" value="female">female
    </label>
    <label class="radio-inline" style="color:white; font-size:20px;margin-right:10px">
      <input type="radio" name="gender" value="other">others
    </label>
    </div>
    <br>
	<div class="form-group">
	<label style="color:white; font-size:30px">Food Preferences:</label><br>
  <label for="pre1" style="color:white; font-size:20px">Preferences 1:</label>
  <select class="form-control" id="pre1" name="pre1">
    <?php
       $query = "SELECT * FROM foodtype";
       $res= mysqli_query($conn, $query); 
       while($row=mysqli_fetch_array($res)){
     $i=$row['tid'];
     $t=$row['type'];
         echo '<option value=" '.$i.' "> '.$t.' </option>';
       }
    ?>
  </select>
  <label for="pre2" style="color:white; font-size:20px">Preferences 2:</label>
  <select class="form-control" id="pre2" name="pre2">
    <?php
       $query = "SELECT * FROM foodtype";
 $res= mysqli_query($conn, $query); 
       while($row=mysqli_fetch_array($res)){
     $i=$row['tid'];
     $t=$row['type'];
         echo '<option value=" '.$i.' "> '.$t.' </option>';
       }
    ?>
  </select>
  
  <label for="pre3" style="color:white; font-size:20px">Preferences 3:</label>
  <select class="form-control" id="pre3" name="pre3">
    <?php
       $query = "SELECT * FROM foodtype";
 $res= mysqli_query($conn, $query); 
       while($row=mysqli_fetch_array($res)){
     $i=$row['tid'];
     $t=$row['type'];
         echo '<option value=" '.$i.' "> '.$t.' </option>';
       }
    ?>
  </select>
</div>
<br>
<div class="form-group">
	<label for="veg" style="color:white; font-size:30px">Are you a Vegetarian??:</label>
	<br>
	<label class="radio-inline" style="color:white; font-size:20px; margin-right:10px">
      <input type="radio" name="veg" value="yes" >yes
    </label>
    <label class="radio-inline" style="color:white; font-size:20px; margin-right:10px">
      <input type="radio" name="veg" value="no">no
    </label>
    </div>
    <br>
    <div class="form-group">
    <label for="age" style="color:white; font-size:30px">Your Age?:</label>
    <input type="number" name="age" id="age" min="10" max="100" class="form-control" style="Background-color:white">
    </div>
    <button type="submit" class="btn btn-default" Style="padding-right:10%;padding-left:10%; margin-bottom:10%;font-size:20px;margin-left:20%">Submit</button>
  </form>
  </div> 
  
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>