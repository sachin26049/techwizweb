
<?php
$servername="fdb17.awardspace.net";
    $username="2471855_techwiz";
    $password="techwiz12345";
  
    
    $databasename="2471855_techwiz";
    $conn = mysqli_connect($servername,$username,$password,$databasename);

    if(mysqli_connect_error()){
	    echo "<script>alert('Error in connecting with server');</script>";
    }
    //echo "<script>alert('sucess');</script>";
?>        



