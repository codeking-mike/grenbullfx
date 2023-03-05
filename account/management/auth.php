<?php
session_start();
include("../db_connect.php");

if(isset($_SESSION['admin'])){
$adminid = $_SESSION['admin'];
	
}else{
	$_SESSION['error'] = "Kindly Login to continue";
	header("location:../login.php");
	exit(0);
}
//function to determine if a user has been merged to PH




?>