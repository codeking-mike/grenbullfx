<?php
session_start();
include("auth.php");

if(isset($_POST['upload'])){
$target = "../act_pop/";
$target = $target . basename( $_FILES['act_pop']['name']); 
$username=$_POST['username'];
$pic=($_FILES['act_pop']['name']); 

$query = "UPDATE tizeti_db_user SET act_pop='$pic' WHERE username='$username'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['act_pop']['tmp_name'],$target))
{ 
                         $message .= "Your POP has been uploaded successfully";
            				$_SESSION['error']= $message;
            		       header("location:activate.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:activate.php");
            		      exit(0); ; 
}
}

if(isset($_POST['upload2'])){
	
$target = "../act_pop/";
$target = $target . basename( $_FILES['pop']['name']); 
$mergeid=$_POST['mergeid'];
$pic=($_FILES['pop']['name']); 
if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:makeph.php");
            		      exit(0); 
}						  

$query = "UPDATE mergetable SET pop='$pic' WHERE mergeid='$mergeid'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
                         $message .= "Your POP has been uploaded successfully";
            				$_SESSION['error']= $message;
            		       header("location:makeph.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:makeph.php");
            		      exit(0); ; 
}	
	
}
?> 