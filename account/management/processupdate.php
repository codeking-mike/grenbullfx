<?php
include("auth.php");

if(isset($_GET['clear'])){
    $u = $_GET['clear'];
    $uid = $_GET['id'];
    
    mysqli_query($cxn, "UPDATE user_wallets SET account_balance = '0.00' WHERE userid='$u'");
    $_SESSION['error'] = "User wallet cleared succesfully!"; 
							            header("location:edituser.php?ed=$u");
                                        $stmt->close(); 
										exit(0);
}
if(isset($_POST['update'])){
    
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	  $uid = $_POST['userid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
	 
    
    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET firstname='$fname', lastname='$lname', phone_no='$phone', user_email='$email', country='$country' WHERE user_id='$uid'");
    
    if($result){
        $_SESSION['error'] = "Profile updated succesfully!"; 
							            header("location:edituser.php?ed=$uid");
                                        $stmt->close(); 
										exit(0);
    }
    
}

//UPDATE COURSE DETAILS

if(isset($_POST['update_admin'])){
    
    $fullname = $_POST['fullname'];
	  $uid = $_POST['userid'];
    $pass = $_POST['pass'];
    $username = $_POST['username'];
    
    
    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET fullname='$fullname', user_password='$pass', username='$username' WHERE user_id='$uid'");
    
    if($result){
        $_SESSION['error'] = "Profile updated succesfully!"; 
							            header("location:editadmin.php?ed=$uid");
                                        $stmt->close(); 
										exit(0);
    }
    
}

//UPDATE COURSE DETAILS

if(isset($_POST['update_inv'])){
    
    $date = $_POST['exp_date'];
	  $uid = $_POST['id'];
   
    
    
    
    $result = mysqli_query($cxn, "UPDATE client_investment SET expected_date='$date' WHERE fund_id='$uid'");
    
    if($result){
        $_SESSION['error'] = "Investment updated succesfully!"; 
							            header("location:editinvestment.php?id=$uid");
                                        $stmt->close(); 
										exit(0);
    }
    
}


//UPDATE CENTRAL ACCOUNT
if(isset($_POST['update_account'])){
    
    $momoname = $_POST['momoname'];
	  $momono = $_POST['momono'];
    $carrier = $_POST['carrier'];
    $id = $_POST['id'];
    
    
    
    $result = mysqli_query($cxn, "UPDATE central_account SET cen_name='$momoname', cen_number='$momono', cen_carrier='$carrier' WHERE id='$id'");
    
    if($result){
        $_SESSION['error'] = "Account updated succesfully!"; 
							            header("location:editaccount.php?ed=$id");
                                        $stmt->close(); 
										exit(0);
    }
    
}




if(isset($_POST['send'])){
    
    $subject = $_POST['subject'];
	 $msg = $_POST['msg'];
	  $uid = $_POST['userid'];
	  $time = date("Y-m-d H:i:s");
	  
   
	  $email = $_POST['email'];
    
    $result = mysqli_query($cxn, "INSERT INTO chat_message(to_user_id, from_user_id, chat_message, timestamp, status) 
	VALUES('$uid', '$adminid', '$msg', '$time', '0')");
    
    if($result){
        $_SESSION['error'] = "Message sent succesfully!"; 
							            header("location:contactuser.php?u=$uid");
                                        $stmt->close(); 
										exit(0);
    }
    
}








//CREATE ADMIN ACCOUNT

if(isset($_POST['create_admin'])){
	$fname = $_POST['fullname'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$dt = date("Y-m-d H:i:s");
	
	
	$query_string = "INSERT INTO argent_client_db(fullname, username, user_password, admin, date_joined, blocked)
	VALUES('$fname','$username', '$pass', 'yes', '$dt', 'no')";
	$result = mysqli_query($cxn, $query_string);
	 $message .= "Admin Created Successfully";
									$_SESSION['error']= $message;
								   header("location:createadmin.php");
								  exit(0);
	
	
	
	
}

//CREATE ACCOUNT
if(isset($_POST['create_account'])){
	$momoname = $_POST['momoname'];
	$momono = $_POST['momono'];
	$carrier = $_POST['carrier'];

	
	
	$query_string = "INSERT INTO central_account(cen_name, cen_number, cen_carrier, status)
	VALUES('$momoname','$momono', '$carrier', '1')";
	$result = mysqli_query($cxn, $query_string);
	 $message .= "Account Added Successfully";
									$_SESSION['error']= $message;
								   header("location:createaccount.php");
								  exit(0);
	
	
	
	
}


//SEND REPLY TO USER

if(isset($_POST['send_reply'])){
	$sender = "Admin";
	$receiver = $_POST['receiver'];
	$msg = $_POST['reply'];
	$dt = date("Y-m-d H:i:s");
	
	$query_string = "INSERT INTO notifications(sender, receiver, message, message_time, status)
	VALUES('$sender', '$receiver', '$msg', '$dt', '0')";
	$result = mysqli_query($cxn, $query_string);
	 $message .= "Reply Sent Successfully";
									$_SESSION['error']= $message;
								   header("location:support.php");
								  exit(0);
	
	
	
	
}


//SEND MESSAGES TO ALL TO USERS

if(isset($_POST['sendtousers'])){
	
	$msg = $_POST['msg'];
	$dt = date("Y-m-d H:i:s");
	
	
	    
	  $query_string = "INSERT INTO notifications(receiver, sender, message, message_time, status)
	VALUES('all', 'Admin', '$msg', '$dt', '0')";
	$result = mysqli_query($cxn, $query_string);
	    
	
	

	 $message .= "Broadcast Message Sent Successfully";
									$_SESSION['error']= $message;
								   header("location:broadcast.php");
								  exit(0);
	
	
	
	
}

if(isset($_POST['confirmpayment'])){
	
	$trans = $_POST['trans'];
	$payer = $_POST['payer'];
	$amount = $_POST['amount'];
	$dt = date("Y-m-d H:i:s");


               
                    mysqli_query($cxn, "UPDATE user_wallets SET account_balance=account_balance + '$amount' WHERE userid='$payer'");
                    
                    $sql_ship = "UPDATE client_investment2 SET fund_date='$dt', payment_confirmed='yes', completed='yes' WHERE transid='$trans'";
                    $result = mysqli_query($cxn,$sql_ship)
                            or die("$sql_ship" . mysqli_error($cxn));
	

	 $message .= "User payment has been confirmed";
									$_SESSION['error']= $message;
								   header("location:invest.php");
								   exit(0);
	
	
	
	
}

if(isset($_POST['confirmpayment2'])){
	
	$trans = $_POST['trans'];
	$payer = $_POST['payer'];
	$amount = $_POST['amount'];
	$dt = date("Y-m-d H:i:s");
	$exp_date = date('Y-m-d H:i:s', strtotime($dt . '+7 days'));
		        $expected_amount = ($amount * 0.5) + $amount;
		       
	
	 		
				  $sql_ship = "UPDATE client_investment2 SET fund_date='$dt', 
            		                            expected_returns='$expected_amount', expected_date='$exp_date', payment_confirmed='yes', completed='yes' WHERE transid='$trans'";
                           $result = mysqli_query($cxn,$sql_ship)
                                   or die("$sql_ship" . mysqli_error($cxn));
				 mysqli_query($cxn, "INSERT INTO client_investment(payer, fund_amount, fund_date, expected_returns, expected_date, payment_confirmed, completed) 
				 VALUES('$payer','$amount', '$dt', '$expected_amount', '$exp_date', 'yes', 'no')");
			

	 $message .= "User payment has been confirmed";
									$_SESSION['error']= $message;
								   header("location:investment2.php");
								  exit(0);
	
	
	
	
}



if(isset($_GET['del'])){
	$id = $_GET['del'];
	mysqli_query($cxn, "DELETE FROM argent_client_db WHERE user_id='$id'");
	$_SESSION['error'] = "User account deleted succesfully!"; 
							            header("location:viewusers.php");
                                        $stmt->close(); 
										exit(0);
}

if(isset($_GET['trans'])){
	$id = $_GET['trans'];
	mysqli_query($cxn, "DELETE FROM client_investment2 WHERE transid='$id'");
	$_SESSION['error'] = "Investment request deleted succesfully!"; 
							            header("location:invest.php");
                                        $stmt->close(); 
										exit(0);
}

if(isset($_GET['wid'])){
	$id = $_GET['wid'];
	mysqli_query($cxn, "DELETE FROM client_withdrawals WHERE with_id='$id'");
	$_SESSION['error'] = "Withdrawal request deleted succesfully!"; 
							            header("location:withdrawal.php");
                                        $stmt->close(); 
										exit(0);
}

if(isset($_GET['wid2'])){
	$id = $_GET['wid2'];
	mysqli_query($cxn, "DELETE FROM client_withdrawals WHERE with_id='$id'");
	$_SESSION['error'] = "Withdrawal request deleted succesfully!"; 
							            header("location:bonuswithdrawal.php");
                                        $stmt->close(); 
										exit(0);
}






?>