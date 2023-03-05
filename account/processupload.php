<?php
session_start();
include("functions/auth.php");


if(isset($_POST['upload'])){
	
$target = "../images/";
$target = $target . basename( $_FILES['pop']['name']); 
$email=$_POST['email'];
$id = $_POST['hid'];
$pic=($_FILES['pop']['name']); 
if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:payment.php");
            		      exit(0); 
}						  

$query = "UPDATE rev_deposits SET pop='$pic' WHERE id='$id'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
                         $message .= "Your Proof Of Payment has been uploaded successfully. Kindly hold on while your payment is confirmed and your account funded";
            				$_SESSION['error']= $message;
            		       header("location:payment.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:payment.php");
            		      exit(0); ; 
}	
	
}

if(isset($_POST['upload2'])){
	
$target = "act_pop/";
$target = $target . basename( $_FILES['pop']['name']); 
$id=$_POST['trans'];
$pic=($_FILES['pop']['name']); 
if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:invest2.php");
            		      exit(0); 
}						  

$query = "UPDATE tbl_investments2 SET pop='$pic' WHERE id='$id'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
                         $message .= "Your POP has been uploaded successfully";
            				$_SESSION['error']= $message;
            		       header("location:invest2.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:invest2.php");
            		      exit(0); ; 
}	
	
}
?> 