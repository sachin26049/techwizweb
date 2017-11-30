<?php
require 'connection.php';


    $n = $_POST['to_user'];
    //echo "<script>alert($n);</script>";
    $sql = "DELETE FROM food WHERE food_name='$n'";
    $res = mysqli_query($conn,$sql);
    //echo "<script>alert('exe');</script>";
    if(!$res) echo "<script>alert('Removing unsuccessful Error:');</script>";
    else echo "<script>alert('Removed successful');</script>";
    echo"<script>window.open('admin.php','_self')</script>";
	
?>
