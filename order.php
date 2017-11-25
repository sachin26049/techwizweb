<?php
session_start();
require 'connection.php';


	//echo "<script>alert('in order.php');</script>";
    $id =$_POST['id'];;
    $c = $_POST['count'];;
    $t = $_POST['table'];;
    
    //echo "<script>alert('destroyed');</script>";
    if(isset($_SESSION['order_id']) && !empty($_SESSION['order_id'])) {
    $o=$_SESSION['order_id'];
     $sql = "insert into orders_info values($o,$id,$c)";
	 $res = mysqli_query($conn,$sql);
	 if($res)
	    echo "<script>alert('order placed');</script>";
     else
		 echo "<script>alert('order failed');</script>";
}
else{
echo "<script>alert('in else.php');</script>";
    $sql1 = "SELECT `order_id` FROM `order` ORDER BY order_id DESC LIMIT 1";
    $res1 = mysqli_query($conn,$sql1);
    echo "<script>alert('exe');</script>";
    while($row=mysqli_fetch_array($res1)){
     $o=$row['order_id']+1;
     echo "<script>alert($o);</script>";
    }
    
    $cid=$_SESSION["id"];
    echo "<script>alert($cid);</script>";
    $curr_timestamp = date('Y-m-d H:i:s');
    
    echo "<script>alert($curr_timestamp);</script>";
    $sql = "INSERT INTO `order` VALUES ($o,$cid,$t,'$curr_timestamp')";
       
    $res = mysqli_query($conn,$sql);
    echo "<script>alert('exe');</script>";
 
    if($res)
	 {
		echo "<script>alert('order placed');</script>";	 
		$_SESSION['order_id']=$o;
                if(isset($_SESSION['order_id']) && !empty($_SESSION['order_id'])) {
    $o=$_SESSION['order_id'];
     $sql = "insert into orders_info values($o,$id,$c)";
	 $res = mysqli_query($conn,$sql);
	 if($res)
	    echo "<script>alert('order placed');</script>";
     else
		 echo "<script>alert('order failed');</script>";
                
	 }
         }
         else
         echo "<script>alert('order failed');</script>";
	 //echo("Error description: " . mysqli_error($conn));
    }
    
?>