<?php
include("auth.php");

if(isset($_GET['trans'])){
	$trans = $_GET['trans'];
	if(mysqli_query($cxn, "DELETE FROM tbl_investments WHERE transid = '$trans'")){
		$message = 'You investment request has been cancelled. Invest now to start earning';
		$_SESSION['error'] = $message;
	    header("location:index.php"); 
		
	}
	
}


?>