<?php
session_start();
require 'connection.php';


    $n = $_POST['name'];
    $t = $_POST['type'];
    $d = $_POST['des'];
    $p = $_POST['price'];
    $sql1 = "SELECT food_id FROM food ORDER BY food_id DESC LIMIT 1";
    $res1 = mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res1)){
     $c=$row['food_id'];
    }
    
    $sql = "insert into food values($c+1,'$n',$p,$t,'$d')";
    $res = mysqli_query($conn,$sql);    
    if(!$res){
    
    echo "<script>alert('Failed to add food try again');</script>";
    echo"<script>window.open('admin.php','_self')</script>";
    }
    else{ echo "<script>alert('added successfully!');</script>";
    
    echo"<script>window.open('admin.php','_self')</script>";
    }
?>