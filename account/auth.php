<?php
session_start();
include("db_connect.php");


if(isset($_SESSION['user'])){
$userid = $_SESSION['user']; 
 
 $sql = "SELECT * FROM argent_client_db WHERE user_id='$userid'";
 $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
 while($row = mysqli_fetch_assoc($result)){
	 extract($row);
 }	
 $sql1 = "SELECT * FROM user_wallets WHERE userid='$userid'";
 $res=mysqli_query($cxn, $sql1) or die("Couldnt Fetch Data 2");
 while($row = mysqli_fetch_assoc($res)){
	 extract($row);
 }	
 
 
}else{
	$_SESSION['error'] = "Kindly Login to continue";
	header("location:./login.php");
	exit(0);
} 
//function to determine if a user has been merged to PH




?>