<?php
session_start();  
require 'connection.php';


    $n = $_POST['gender'];
    $p1 = $_POST['pre1'];
    $p2= $_POST['pre2'];
    $p3 = $_POST['pre3'];
	$v=$_POST['veg'];
    $a=$_POST['age'];
	$i=$_SESSION["id"];
    //echo "<script>alert($i);</script>";
    $sql = "insert into cust_details values($i,'$n',$p1,$p2,$p3,'$v',$a)";
    $res = mysqli_query($conn,$sql);
    //echo "<script>alert('exe');</script>";
    if(!$res) echo "<script>alert('Registration unsuccessful Error:');</script>";
    else echo "<script>alert('Registration successful');</script>";
    echo"<script>window.open('temp.php','_self')</script>";
	
?>
