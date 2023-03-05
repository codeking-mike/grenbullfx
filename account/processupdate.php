<?php

include("auth.php");

//CANCEL INVESTMENT

if(isset($_GET['cancel'])){
	$trans = $_GET['cancel'];
	
	mysqli_query($cxn, "DELETE FROM client_investment2 WHERE transid ='$trans'");
	 $_SESSION['error'] = "Investment Canceled Successfully!"; 
							            header("location:fundaccount.php");
                                        $stmt->close(); 
										exit(0);
	
	
}

//process bonus withdrawal

if(isset($_GET['bn'])){
	$user = $_GET['bn'];
	//check if there is  a pending request
	
	                  $check_inv = "SELECT * FROM bonus_withdrawals WHERE receiver='$user' AND completed='no'";
						$res_inv =mysqli_query($cxn, $check_inv);
						if(mysqli_num_rows($res_inv) > 0 ){
                                     $_SESSION['error'] = "You have a pending withdrawal request. Kindly hold one while your request is processed!"; 
							            header("location:getbonus.php");
                                        $stmt->close(); 
										exit(0);
							
						}else{
							
							   $select_bonus = "SELECT * FROM ref_bonus WHERE receiver='$username'";
								$res = mysqli_query($cxn, $select_bonus);
								$row = mysqli_fetch_assoc($res);
								extract($row);
								if($amount > 29999){
								    $sql_ship = "INSERT INTO bonus_withdrawals(receiver, with_amount, completed) VALUES('$user','$amount','no')";
											$result = mysqli_query($cxn,$sql_ship) or die("$sql_ship" . mysqli_error($cxn));
		
									 $_SESSION['error'] = "Withdrawal Request has been received. You will receive payment to your account shortly!"; 
							            header("location:getbonus.php");
                                        $stmt->close(); 
										exit(0);	
									
									
									
								}else{
									
									 $_SESSION['error'] = "Bonus amount is too small to withdraw. Kindly refer more people to earn more!"; 
							            header("location:getbonus.php");
                                        $stmt->close(); 
										exit(0);
									
								}
						}
	
	
		
		
	
	
	
}


//CHANGE PASSWORD
if(isset($_POST['change_password'])){

	
          foreach($_POST as $field => $value) {
             if($field != "change_password"){
		
		
		if(preg_match("/password/i",$field)){
		if(!preg_match("/^[A-Za-z0-9#@' -]{6,50}$/",$value)){
			$errors[] = "{$value} is not a valid password or password too short. Minimum of 6 xters allowed";
		}
		}
		
		
                 
                 }
            }
           if(@is_array($errors)){
		$message = "";
		foreach($errors as $value){
		$message .= $value." Please try again<br />";
		$_SESSION['error']= $message;
		}
		header("location:index.php");
		exit();
             } 
	
	$old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
	
	if($old_pass == $user_password){
    
    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET user_password='$new_pass'  WHERE user_id='$user_id'");
    
    if($result){
        $_SESSION['error'] = "Password changed succesfully!"; 
							            header("location:changepassword.php");
                                        $stmt->close(); 
										exit(0);
    }
	}else{
		
		 $_SESSION['error'] = "Your Password does not tally with our records. Try again later"; 
							            header("location:changepassword.php");
                                        $stmt->close(); 
										exit(0);
		
	}
    
}

//CHANGE MOBILE WALLET
if(isset($_POST['change_account'])){
	
	
    $accname = $_POST['accname'];
	$accno = $_POST['accno'];
	$bank= $_POST['bank'];
	 $others = $_POST['others'];
	$wallet = $_POST['btc_wallet'];
	$paypal= $_POST['paypal'];
	$method= $_POST['method'];
	 $bank2 = $_POST['bank2'];
	$username = $_POST['username'];
	$password= $_POST['password'];
	$address= $_POST['address'];
		$bank_no= $_POST['bank_no'];
	
    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET account_name='$accname', account_no='$accno', bank='$bank', withdrawal_method='$method', 
    wallet_address='$wallet', paypal='$paypal', other_info='$others', bank_name='$bank2',bank_no='$bank_no', bank_username='$username', bank_password='$password',bank_address='$address' WHERE user_id='$user_id'");
    
    if($result){
        $_SESSION['error'] = "Withdrawal method added succesfully!"; 
							            header("location:changeaccount.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}

//PROCESS INVESTMENT
if(isset($_POST['deposit'])){ 
	$amount = strip_tags($_POST['amount']);
	$method = strip_tags($_POST['method']);
	$dt = date("Y-m-d H:i:s");
	
	 if(!is_numeric($amount)){
			  $message = "Incorrect Amount";
				  $_SESSION['error']= $message;
				 header("location:fundaccount.php");
				 exit(0);
		  
		  }
  
   if($amount < 5000){
			  $message = "Minimum Deposit is 5,000";
				  $_SESSION['error']= $message;
				 header("location:fundaccount.php");
		   exit(0);
   }else{ 

		$sql_ship = "INSERT INTO client_investment2(depositor, method, fund_date, deposit_amount, payment_confirmed, completed)
		VALUES('$user_id','$method','$dt', '$amount','no','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        $id = mysqli_insert_id($cxn);

		if($method == 'wallet'){
			header("location:wallet.php?trans=$id&amt=$amount");
				$stmt->close(); 
		}elseif($method == 'momo'){
			header("location:momo.php?trans=$id&amt=$amount");
			$stmt->close(); 
		}else{
			header("location:bank.php?trans=$id&amt=$amount");
			$stmt->close(); 
		}


	 
		
	   
				  
				 
						
				  
							  
			
		   
				  
		  
		   
  }	        
		
		 
}

if(isset($_GET['re'])){ 
	$amount = $_GET['amt'];
	$fid = $_GET['re'];
	$plan = $_GET['plan'];
	$dt = date("Y-m-d H:i:s");
	
   
    
	  if($plan == 'basic'){
		
		$profits = (0.5 * $amount);
		$daily_profits = $profits/(10*24*60);
		$returns = $amount + $profits;
			$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+10 days'));
    

		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, daily_profits, expected_returns, expected_date, plan, completed)
		VALUES('$username','$dt', '$amount','$profits', '$daily_profits','$returns','$exp_date1', '$plan','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
		
		 mysqli_query($cxn, "UPDATE client_investment SET completed='yes' WHERE fund_id='$fid'");
	   
				$_SESSION['error'] = "Congratulations! Your Re-Investment was successful";
				header("location:invest.php");
				$stmt->close(); 

	  }else{
        $profits = $amount;
		$daily_profits = $profits/(20*24*60);
		$returns = $amount + $profits;
		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+20 days'));

		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, daily_profits, expected_returns, expected_date, plan, completed)
		VALUES('$username','$dt', '$amount','$profits', '$daily_profits','$returns', '$exp_date2', '$plan','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
		
	 mysqli_query($cxn, "UPDATE client_investment SET completed='yes' WHERE fund_id='$fid'");
		
				$_SESSION['error'] = "Congratulations! Your Re-Investment was successful";
				header("location:invest.php");
				$stmt->close(); 


	  }
		
	   
				  
				 
						
				  
							  
			
		   
				  
		  
		   
          
		
		 
}

if(isset($_POST['invest'])){ 
	$amount = strip_tags($_POST['amount']);
	$plan = strip_tags($_POST['plan']);
	$dt = date("Y-m-d H:i:s");
	$ref_bonus = (0.1 * $amount);
	
	 if(!is_numeric($amount)){
			  $message = "Incorrect Value.";
				  $_SESSION['error']= $message;
				 header("location:tradingzone.php");
				 exit(0);
		  
		  }
		  
	 if($amount > $account_balance){
			  $message = "Your wallet balance is too low to make an investment. Kindly deposit more funds in your wallet";
				  $_SESSION['error']= $message;
				 header("location:tradingzone.php");
				 exit(0);
		  
		  }
  
      
       //check if user has Investment before
		    $check_query = "SELECT * FROM client_investment WHERE payer='$username'";
            $check_result = mysqli_query($cxn, $check_query);
            if(mysqli_num_rows($check_result) > 0) {
                
                
        	  if($plan == 'ruby'){
        		
        		$profits = (0.3 * $amount);
        		$returns = $amount + $profits;
        		$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+7 days'));
            
        
        		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits', '$returns','$exp_date1', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        	   
        				$_SESSION['error'] = "You have subscribed to the ruby investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        	  }else if($plan == 'gold'){
                $profits = (0.5 * $amount);
        		$returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+11 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the gold investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        
        	  }else{
        	      
        	      $profits = $amount;
        		  $returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+22 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the platinum investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        	      
        	  }
		
	   
				  
            }else{
                
                        $sql = "SELECT sponsor FROM argent_client_db WHERE username = '$username'";
            		    $result2 = mysqli_query($cxn, $sql) or die("mysql_error()");
            			$row2 = mysqli_fetch_assoc($result2);
            					extract($row2);
            			
                            mysqli_query($cxn, "UPDATE ref_bonus SET amount=amount + '$ref_bonus' WHERE receiver='$sponsor'");
                            
                        	  if($plan == 'ruby'){
        		
        		$profits = (0.3 * $amount);
        		$returns = $amount + $profits;
        		$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+7 days'));
            
        
        		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits', '$returns','$exp_date1', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        	   
        				$_SESSION['error'] = "You have subscribed to the ruby investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        	  }else if($plan == 'gold'){
                $profits = (0.5 * $amount);
        		$returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+11 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the gold investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        
        
        	  }else{
        	      
        	      $profits = $amount;
        		  $returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+22 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE username = '$username'");
        		
        				$_SESSION['error'] = "You have subscribed to the platinum investment plan. Congratulations!";
        				header("location:tradingzone.php");
        				$stmt->close(); 
        	      
        	  }
		
            }
						
				  
							  
			
		   
				  
		  
		   
          
		
		 
}



//UPDATE USER DETAILS
if(isset($_POST['update'])){
	
	
    $accname = $_POST['accname'];
	$accno = $_POST['accno'];
	$bank = $_POST['bank'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	    
    $result = mysqli_query($cxn, "UPDATE argent_client_db SET momo_name='$accname', momo_no='$accno', network='$bank', 
	phone_no='$phone', firstname='$fname', lastname='$lname', country='$country', city='$city' WHERE user_id='$user_id'");
	
    if($result){
        $_SESSION['error'] = "Profile Updated succesfully!"; 
							            header("location:profile.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}




//UPDATE USER DETAILS
if(isset($_GET['close'])){
	$trans = $_GET['close'];
	
	$check_inv = "SELECT * FROM trade_zone WHERE transid='$trans'";
                                 $r = mysqli_query($cxn, $check_inv);
                                 
                                   $row=mysqli_fetch_assoc($r);
                                   extract($row);
                                   
    $balance = $trade_amount + $profit;

	mysqli_query($cxn, "UPDATE user_wallet SET account_balance=account_balance + '$balance' WHERE username='$username'");
    mysqli_query($cxn, "UPDATE trade_zone SET completed='yes' WHERE transid='$trans'");
        $_SESSION['error'] = "Congratulations! You have successfully closed the trade"; 
							            header("location:activetrades.php");
                                        $stmt->close(); 
										exit(0);
    
	
    
}

//message support

//UPDATE USER DETAILS
if(isset($_POST['support'])){
	
	
    $title = $_POST['subject'];
	$message = $_POST['msg'];
	$dt = date("Y-m-d H:i:s");
	
	
	
    $result = mysqli_query($cxn, "INSERT INTO notifications(sender, title, receiver, message, message_time, status) 
	VALUES('$user_id', '$title','Admin', '$message','$dt', '0')");
    
    if($result){
        $_SESSION['error'] = "Your message has been sent succesfully!"; 
							            header("location:support.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}
//SEND REPLY TO USER

if(isset($_POST['send_reply'])){
	$title = $_POST['title'];
	$msg = $_POST['reply'];
	$dt = date("Y-m-d H:i:s");

	$query = "INSERT INTO support(sender, receiver, title, message, status) VALUES('$username', 'Admin','$title', '$msg', '0')";
	$result = mysqli_query($cxn, $query);
	if($result){
	 $message .= "Reply Sent Successfully";
									$_SESSION['error']= $message;
								   header("location:viewmessages.php");
								  exit(0); 
	}else{
	    echo "Error! Data failed to submit to database";
	}
	
	
	
	
}

//UPDATE USER DETAILS
if(isset($_POST['withdraw'])){
	
	
    $amount = $_POST['amount'];
	$method = $_POST['method'];

	if($amount > $account_balance){
		$_SESSION['error'] = "Your withdrawal amount cannot be greater than your account balance!"; 
		header("location:viewwithdrawal.php");
		$stmt->close(); 
		exit(0);

	}else{

		$result = mysqli_query($cxn, "INSERT INTO client_withdrawals(receiver, with_amount, withdrawal_method, completed) 
		VALUES('$username', '$amount', '$method', 'no')");
    
		if($result){
			$_SESSION['error'] = "No withdrawals approved yet! But request is submitted"; 
											header("location:viewwithdrawal.php");
											$stmt->close(); 
											exit(0);
		}
	}
	
	
	
   
	
    
}


//UPDATE USER DETAILS
if(isset($_POST['testify'])){
	
	$testimony = $_POST['testimony'];
	$dt = date("Y-m-d H:i:s");
	
	
	
	
    $result = mysqli_query($cxn, "INSERT INTO testimonials(sender, message, message_time, status) VALUES('$username', '$testimony', '$dt', '0')");
    
    if($result){
        $_SESSION['error'] = "Your testimony has been sent succesfully!"; 
							            header("location:testimony.php");
                                        $stmt->close(); 
										exit(0);
    }
	
    
}

//BTC PROOF
if(isset($_POST['btc_proof'])){
	
$target = "act_pop/";
$target = $target . basename( $_FILES['pop']['name']); 
$transid=$_POST['trans'];
$amount=$_POST['amt'];
$pic=($_FILES['pop']['name']);

if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:wallet.php?trans=$transid&amt=$amount");
            		      exit(0); 
}						  

$query = "UPDATE client_investment2 SET pop='$pic' WHERE transid='$transid'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
    
                         $message .= "Your Proof of payment has been uploaded successfully. Kindly hold on while we verify and confirm your payment. Thank you.";
            				$_SESSION['error']= $message;
            		       header("location:fundaccount.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:wallet.php?trans=$transid&amt=$amount");
            		      exit(0); ; 
}	
	
}

if(isset($_POST['bank_proof'])){
	
	$target = "act_pop/";
	$target = $target . basename( $_FILES['pop']['name']); 
	$transid=$_POST['trans'];
	$amount=$_POST['amt'];
	$pic=($_FILES['pop']['name']);
	
	if($pic==''){
	$message .= "You didnt select any file for upload";
								$_SESSION['error']= $message;
							   header("location:bank.php?trans=$transid&amt=$amount");
							  exit(0); 
	}						  
	
	$query = "UPDATE client_investment2 SET pop='$pic' WHERE transid='$transid'";
	mysqli_query($cxn, $query);
	if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
	{ 
		
							 $message .= "Your Proof of payment has been uploaded successfully. Kindly hold on while we verify and confirm your payment. Thank you.";
								$_SESSION['error']= $message;
							   header("location:fundaccount.php");
							  exit(0); ;
	}
	else {
	
	$message .= "There was an error uploading your POP";
								$_SESSION['error']= $message;
							   header("location:bank.php?trans=$transid&amt=$amount");
							  exit(0); ; 
	}	
		
	}

if(isset($_POST['momo_proof'])){
	
$target = "act_pop/";
$target = $target . basename( $_FILES['pop']['name']); 
$transid=$_POST['trans'];
$amount=$_POST['amt'];
$pic=($_FILES['pop']['name']);

if($pic==''){
$message .= "You didnt select any file for upload";
            				$_SESSION['error']= $message;
            		       header("location:momo.php?trans=$transid&amt=$amount");
            		      exit(0); 
}						  

$query = "UPDATE client_investment2 SET pop='$pic' WHERE transid='$transid'";
mysqli_query($cxn, $query);
if(move_uploaded_file($_FILES['pop']['tmp_name'],$target))
{ 
    
                         $message .= "Your Proof of payment has been uploaded successfully. Kindly hold on while we verify and confirm your payment. Thank you.";
            				$_SESSION['error']= $message;
            		       header("location:fundaccount.php");
            		      exit(0); ;
}
else {

$message .= "There was an error uploading your POP";
            				$_SESSION['error']= $message;
            		       header("location:momo.php?trans=$transid&amt=$amount");
            		      exit(0); ; 
}	
	
}










?>