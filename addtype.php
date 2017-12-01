<?php
session_start();
require 'connection.php';


    
    $t = $_POST['type'];
    
    $sql1 = "SELECT tid FROM foodtype ORDER BY tid DESC LIMIT 1";
    $res1 = mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res1)){
     $c=$row['tid'];
    }
    
    $sql = "insert into foodtype values($c+1,'$t')";
    $res = mysqli_query($conn,$sql);    
    if(!$res){
    
    echo "<script>alert('Failed to add food type try again');</script>";
    echo"<script>window.open('admin.php','_self')</script>";
    }
    else{ echo "<script>alert('Type added successfully!');</script>";
    
    echo"<script>window.open('admin.php','_self')</script>";
    }
?>