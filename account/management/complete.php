<?php
session_start();
include("auth.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
   
	$dt = date("Y-m-d H:i:s");
    mysqli_query($cxn, "UPDATE client_withdrawals SET completed='yes', date_withdrawn='$dt' WHERE with_id='$id'");
       $message = "SUCCESSFUL!";
    $_SESSION['error'] = $message;
    header("location:withdrawal.php");
    exit(0);
    
    
}
if(isset($_GET['bn'])){
    $id = $_GET['bn'];
    $dt = date("Y-m-d H:i:s");
    $user = $_GET['user'];
    $amt = $_GET['amt'];
     mysqli_query($cxn, "UPDATE client_withdrawals SET completed='yes', date_withdrawn='$dt' WHERE with_id='$id'");
     
    mysqli_query($cxn, "UPDATE ref_bonus SET amount='0.00' WHERE receiver='$user'");
    $message = "BONUS PAY OUT SUCCESSFUL!";
    $_SESSION['error'] = $message;
    header("location:bonuswithdrawal.php");
    exit(0);
}


?>