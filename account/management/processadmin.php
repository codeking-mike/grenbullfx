<?php
//include important bfiles
session_start();
include("auth.php");
//require ("../mailer/PHPMailerAutoload.php");


function clean($str){
	return strip_tags(trim($str));        
}
// check if the form was submitted
if(isset($_POST['account'])){

/* Process data when all fields are correct */

		$phone = $_POST['phone'];
        
         $bank = $_POST['bank'];
        $accname = $_POST['accname'];
		$accno = $_POST['accno'];
        $available='no';
            // Insert the new user into the database
	      $sql_ship = "INSERT INTO act_account(act_contact, act_accname, act_accno, act_bank, available)
										VALUES('$phone','$accname', '$accno', '$bank', '$available')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
              
	   if($result){
		   $message .= 'Account Details has been added successfully';
			$_SESSION['error'] = $message;
		   header("location:account.php");
		   exit(0);
	                  
		
 } 
}
//process admin

if(isset($_POST['admin'])){

/* Process data when all fields are correct */

		$name = $_POST['accname'];
        $no = $_POST['accno'];
		$phone = $_POST['phone'];
		$bank = $_POST['bank'];
         $username = $_POST['username'];
        $upass = $_POST['password'];
        $active='yes';
            // Insert the new user into the database
	      $sql_ship = "INSERT INTO tizeti_admin(admin_name, admin_username, admin_password, active)
										VALUES('$name','$username', '$upass', '$active')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		 $sql_ship2 = "INSERT INTO tizeti_db_user(fullname, user_phone, username, user_password, bank, account_name, account_no, block, activated)
										VALUES('$name', '$phone', '$username','$upass', '$bank', '$name', '$no', 'no', 'no')";
               $result2 = mysqli_query($cxn,$sql_ship2)
                       or die("$sql_ship" . mysqli_error($cxn));
              
	   if($result){
		   $message .= 'Admin Added Successfully!';
			$_SESSION['error'] = $message;
		   header("Location:admin.php");
		   exit(0);
	                  
		
 } 
}

//change roi


?>