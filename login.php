<?php
session_start(); 
require 'connection.php';


    
    $e = $_POST['email'];
    $p = $_POST['pwd'];
    //echo "<script>alert('$e');</script>";
    $sql1 = "SELECT id,email,pass FROM admin Where email='$e'";
    $res1 = mysqli_query($conn,$sql1);
	
    if($row=mysqli_fetch_array($res1)){
    //echo "<script>alert('$p');</script>";
    $c=$row['id'];
	$n=$row['email'];
        $p1=$row['pass'];
	
    //echo "<script>alert('$p');</script>";
    //echo "<script>alert('$c'+'$p1');</script>";
	if($p == $p1)
	{
	echo "<script>alert('admin login successful');</script>";
	$_SESSION["email"] =$n;
        $_SESSION["id"] = $c;
        echo"<script>window.open('admin.php','_self')</script>"; 	
	}
        else
        {
        echo "<script>alert('Wrong password');</script>";
        echo"<script>window.open('index.html','_self')</script>";
        }
        }
        else
        {
    $sql1 = "SELECT customer_id,name,password FROM Customer Where Email='$e'";
    $res1 = mysqli_query($conn,$sql1);
	
    if($row=mysqli_fetch_array($res1)){
    //echo "<script>alert('$p');</script>";
    $c=$row['customer_id'];
	$n=$row['name'];
        $p1=$row['password'];
	
    //echo "<script>alert('$p');</script>";
    //echo "<script>alert('$c'+'$p1');</script>";
	if($p == $p1)
	{
	echo "<script>alert('login successful');</script>";
	$_SESSION["name"] =$n;
        $_SESSION["id"] = $c;
        echo"<script>window.open('menu.php','_self')</script>"; 	
	}
        else
	{
	echo "<script>alert('Wrong password');</script>";
        echo"<script>window.open('index.html','_self')</script>";	
	}		
		
	}
	else
	{
	$sql1 = "SELECT * FROM Customer Where mobile=$e";
    $res1 = mysqli_query($conn,$sql1);
	
    if($row=mysqli_fetch_array($res1)){
    $c=$row['customer_id'];
	$p1=$row['password'];
	$n=$row['name'];
	if($p==$p1)
	{
	echo "<script>alert('Registration successful');</script>";
	$_SESSION["name"] =$n;
        $_SESSION["id"] = $c;
        echo"<script>window.open('temp.php','_self')</script>"; 	
	}
    else
	{
	echo "<script>alert('Wrong password');</script>";
    echo"<script>window.open('index.html','_self')</script>";	
	}		
		
	}
        
    else
    {
    echo "<script>alert('Wrong Email/phone no.');</script>";
    echo"<script>window.open('index.html','_self')</script>";
	}		
	}
	}
       
        
?>