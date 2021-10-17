<?php
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';

$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$page=$_REQUEST['page'];

$update="update leave_request set req_status='".$type."' where req_id='".$id."'";

$strore = mysqli_query($conn, $update) or die(mysqli_error());
header("Location:".$page.".php"); 