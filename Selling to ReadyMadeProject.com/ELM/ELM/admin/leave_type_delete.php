<?php
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
$id=$_REQUEST['id'];
$query = "DELETE FROM leave_type WHERE ltype_id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: leave_type.php"); 
?>