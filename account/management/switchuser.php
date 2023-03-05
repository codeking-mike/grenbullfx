<?php
 include("auth.php");
 if(isset($_GET['u'])){
 $_SESSION['user'] = $_GET['u'];
    header("location:../index.php");
 }else{
	header("location:index.php"); 
	 
 }
 ?>