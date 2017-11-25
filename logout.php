<?php
 session_start();  
 require 'connection.php';
  session_unset(); 

// destroy the session 
session_destroy(); 
echo"<script>window.open('index.html','_self')</script>";
?>