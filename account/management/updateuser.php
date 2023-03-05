<?php
session_start();
 include("auth.php");

// check if the form was submitted
if(isset($_POST['update'])){
	     
		 $user = $_POST['username'];
		 $id = $_POST['id'];
		 $accname = $_POST['accname'];
		 $accno = $_POST['accno'];
		 $phn = $_POST['phone'];
		 $email = $_POST['email'];
		 
/* Process data when all fields are correct  */

          
		 
         //UPDATE INVESTMENT TABLE
	      $sql_ship = "UPDATE tizeti_db_user SET account_name='$accname', 
		  account_no='$accno', user_phone='$phn' WHERE username='$user'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
           $message .= "User details has been updated successfully.";
				$_SESSION['error']= $message;
		       header("location:edituser.php?id=$id");
		      exit(0); 
			  
			 
         
            

}
if(isset($_POST['update2'])){
    
         $user = $_POST['username'];
         $fullname = $_POST['fullname'];
         $pass = $_POST['password'];
		 $id = $_POST['id'];
		 $accname = $_POST['accname'];
		 $accno = $_POST['accno'];
		 $phn = $_POST['phone'];
		 $email = $_POST['email'];
		 
/* Process data when all fields are correct  */

          
		 
         //UPDATE INVESTMENT TABLE
	      $sql_ship = "UPDATE tizeti_db_user SET account_name='$accname', 
		  account_no='$accno', user_phone='$phn', fullname='$fullname',
		  username='$user', user_password='$pass' WHERE userid='$id'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
           $message .= "Your details has been updated successfully.";
				$_SESSION['error']= $message;
		       header("location:user.php");
		      exit(0);   
    
}
if(isset($_POST['block'])){
   $user = $_POST['username'];
   $id = $_POST['id'];
   $sql_ship = "UPDATE tizeti_db_user SET block='yes' WHERE username='$user'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
           $message .= "User details has been updated successfully.";
				$_SESSION['error']= $message;
		       header("location:edituser.php?id=$id");
		      exit(0); 
	
}
if(isset($_POST['unblock'])){
   $user = $_POST['username'];
   $id = $_POST['id'];
   $sql_ship = "UPDATE tizeti_db_user SET block='no' WHERE username='$user'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
           $message .= "User details has been updated successfully.";
				$_SESSION['error']= $message;
		       header("location:edituser.php?id=$id");
		      exit(0); 
	
}

?>
