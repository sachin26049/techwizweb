<?php
session_start();
require 'connection.php';


    $n = $_POST['name'];
    $e = $_POST['email'];
    $m = $_POST['mobile'];
    $p = $_POST['pwd'];
    $sql1 = "SELECT customer_id FROM Customer ORDER BY customer_id DESC LIMIT 1";
    $res1 = mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res1)){
     $c=$row['customer_id'];
    }
    
    $sql = "insert into Customer values($c+1,'$n','$m','$e','$p')";
    $res = mysqli_query($conn,$sql);
    
    if(!$res){
    
    echo "<script>alert('Registration unsuccessful try again');</script>";
    echo"<script>window.open('index.html','_self')</script>";
    }
    else{ echo "<script>alert('Registration successful');</script>";
    
    $_SESSION["name"] =$n;
    $_SESSION["id"] = $c+1;
    echo"<script>window.open('signup2.php','_self')</script>";
    }
?>