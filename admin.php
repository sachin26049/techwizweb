<?php  
 require 'connection.php';
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADMIN</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="responsive-full-background-image.css">


    <!-- Custom styles for this template -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>	
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #90EE90;
    overflow-x: hidden;
    transition: 0.7s;
    padding-top: 60px;
    text-align:center;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.5s;

}

.sidenav a:hover{
    color: black;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.3s;

}
  
  .contain{
  visibility:hidden;
  width:100%;
  height:100%;
  position: fixed;
  z-index: 0;
  padding-top: 10px;
  padding-left:10px;
  top: 0;
  left: 0;
  margin-bottom:50px;
  margin-top:50px;
  }
  .button
  {
  }
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#" onclick="home()">HOME</a>
  <a href="#" onclick="openMenu()">Manage Menu</a>
  <a href="#">View Feedback</a>
  <a href="#">View Orders</a>
</div>


<div class="container text-center"  id="adm">
  <span style="font-size:30px;cursor:pointer;color:white;float:left" onclick="openNav()">&#9776;</span>
  <h1 style="color:white;font-size:50px;font-style: italic;margin-top:40px">Admin Panel</h1>
  <h1 style="color:white"><em>Welcome Admin</em></h1>
  <h2 style="color:white">Select the operations you Want to perform!</h3>
  <br>  
  <a href="#" onclick="openMenu()">Manage Menu</a>
  <a href="#">View Feedback</a>
  <a href="?run" style="margin-bottom:80px">View Orders</a>
  </div>
  <?php
  if(isset($_GET['run']))
  {
  require 'connection.php';

    //echo "<script>alert($n);</script>";
    //$sql = "SELECT o.order_id,o.user_id,oi.item_id,f.food_name FROM food f,order o, order_info oi WHERE f.food_id=oi.item_id and o.order_id=oi.order_id";
    $sqlq="SELECT * FROM order";
    $resu = mysqli_query($conn,$sqlq) or die(mysqli_error());
    echo "<script>alert($resu);</script>";
    if($row=mysqli_fetch_array($resu))
    {
    //echo "id: " . $row['order_id']. " - Name: " . $row['food_name"]. " " . $row["user_id"]. "<br>";
    }
    //if(!$res) echo "<script>alert('Removing unsuccessful Error: ');</script>";
    else echo "<script>alert('Removed successful');</script>";
    //echo"<script>window.open('admin.php','_self')</script>";
  }
  ?>
  <div style="margin-left:10%;margin-top:10%;mrgin-right:5%">
  <div class="container" id="menu" Style="visibility:hidden;width:100%;height:100%;
  position: absolute;
  z-index: 0;
  padding-top: 0px;
  padding-left:0px;
  top: 0;
  left: 0;
  margin-bottom:50px;
  margin-top:5px;">
	<span style="font-size:30px;cursor:pointer;color:white;float:left" onclick="openNav()">&#9776;</span>
	<div class="row" style="margin-top:20%">
	
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#add" data-parent="#menu" 
	style="font-size:20px;padding-right:10%;
        margin-top:5%;width:250px;margin-bottom:5%;margin-left:20%">Add Food Item</button>
    <div id="add" class="collapse" Style="margin-left:10%">
    <form action="addfood.php" method="post">
	<div class="form-group" Style="padding-right:10%;padding-left:5%">
      <label for="name" style="color:white">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name of food" name="name" style="Background-color:white;" required>
    </div>
    <div class="form-group" Style="padding-right:10%;padding-left:5%">
      <label for="price" style="color:white">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" style="Background-color:white" required>
    </div>
	<div class="form-group" Style="padding-right:10%;padding-left:5%">
  <label for="type" style="color:white; font-size:20px">type:</label>
  <select class="form-control" id="type" name="type">
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
    <div class="form-group" Style="padding-right:10%;padding-left:5%">
      <label for="des" style="color:white">Description:</label>
      <input type="text" class="form-control" id="des" placeholder="Enter description" name="des" style="Background-color:white" required>
    </div>
    
    <button type="submit" class="btn btn-default" Style="padding-right:10%;padding-left:10%; margin-bottom:10%;font-size:20px;margin-left:20%">Submit</button>
  </form>
  </div>
  </div>
<div class="row">
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#remove" data-parent="#menu" 
	style="font-size:20px;padding-right:15%;margin-bottom:5%;width:250px; margin-left:20%">Remove Food Item</button>
 <form action="remove.php" method="post">
 <div id="remove" class="collapse" Style="margin-left:10%;margin-right:10%;">
  <label for="name" style="color:white">Food Name:</label>
    <select name="to_user" id="to_user" class="form-control">
<?php
require 'connection.php';
$sql = mysqli_query($conn, "SELECT food_name From food");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['food_name'] ."'>" .$row['food_name'] ."</option>" ;
}
?>
</select>
<button type="submit" class="btn btn-default" 
Style="padding-right:10%;padding-left:10%; margin-bottom:10%;font-size:20px;margin-bottom:2%;margin-left:20%;margin-top:20px;">Submit</button>
    
	    
  </div>
  </form>
  </div>  
  <div class="row">
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#update" data-parent="#menu" 
	style="font-size:20px;padding-right:15%; margin-bottom:10%;width:250px;margin-left:20%">Update Food Item</button>
  <div id="update" class="collapse" Style="margin-left:10%">
    <form action="#" method="post">
	<div class="form-group" Style="padding-right:10%;padding-left:5%">
      <label for="name" style="color:white">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name of food" name="name" style="Background-color:white;" required>
    </div>
	    <button type="submit" class="btn btn-default" 
            Style="padding-right:10%;padding-left:10%; margin-bottom:2%;font-size:20px;margin-left:20%">Submit</button>

</form>
  </div>    
  </div>  
</div>
</div>
<script>
let s;
function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
	/*s=s=window.getComputedStyle(document.getElementById("menu"));
	document.getElementById("menu").style.visibility="hidden";*/
}
function openMenu() {
    document.getElementById("menu").style.visibility="visible";
	document.getElementById("adm").style.visibility="hidden";
closeNav();
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
	/*if(s.visibility === 'visible')
	document.getElementById("menu").style.visibility="visible";*/
}
function home(){
document.getElementById("adm").style.visibility="visible";
document.getElementById("menu").style.visibility="hidden";
closeNav();
}

var $myGroup = $('#menu');
$myGroup.on('show.bs.collapse','.collapse', function() {
    $myGroup.find('.collapse.in').collapse('hide');
});
</script>
     
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>