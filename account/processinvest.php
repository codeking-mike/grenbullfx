<?php

include("auth.php");



if(isset($_POST['deposit'])){ 
	$amount = strip_tags($_POST['amount']);
	$dt = date("Y-m-d H:i:s");
	
	 if(!is_numeric($amount)){
			  $message = "Incorrect Amount";
				  $_SESSION['error']= $message;
				 header("location:deposit.php");
				 exit(0);
		  
		  }
  
   if($amount < 5000){
			  $message = "Le montant minimum du dépôt est de 5000 CFA";
				  $_SESSION['error']= $message;
				 header("location:deposit.php");
		   exit(0);
   }else{

		$sql_ship = "INSERT INTO client_investment2(depositor, fund_date, deposit_amount, payment_confirmed, completed)
		VALUES('$username','$dt', '$amount','no','no')";
		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        $id = mysqli_insert_id($cxn);
				header("location:makepayment.php?id=$id");
				$stmt->close(); 

	 
		
	   
				  
				 
						
				  
							  
			
		   
				  
		  
		   
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
				 header("location:invest.php");
				 exit(0);
		  
		  }
		  
	 if($amount > $account_balance){
			  $message = "Solde insuffisant pour investir. Veuillez déposer plus de fonds sur votre compte";
				  $_SESSION['error']= $message;
				 header("location:invest.php");
				 exit(0);
		  
		  }
  
   if($amount < 5000){
			  $message = "Le montant minimum d'investissement est de 5000 CFA";
				  $_SESSION['error']= $message;
				 header("location:invest.php");
		   exit(0);
  }else{
      
       //check if user has Investment before
		    $check_query = "SELECT * FROM client_investment WHERE payer='$user_id'";
            $check_result = mysqli_query($cxn, $check_query);
            if(mysqli_num_rows($check_result) > 0) {
                
                
        	  if($plan == 'flexi'){
        		
        		$profits = (0.5 * $amount);
        		
        		$returns = $amount + $profits;
        			$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+12 days'));
            
        
        		$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$user_id','$dt', '$amount','$profits','$returns','$exp_date1', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE userid = '$user_id'");
        	   
        				$_SESSION['error'] = "Toutes nos félicitations! Votre investissement a réussi";
        				header("location:invest.php");
        				$stmt->close(); 
        
        	  }else{
                $profits = $amount;
        	
        		$returns = $amount + $profits;
        		$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+25 days'));
        
        		$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
        		VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
        		$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
        		
        		$balance = $account_balance - $amount;
        		//update user_wallet 
        		
        	   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE userid = '$user_id'");
        		
        				$_SESSION['error'] = "Toutes nos félicitations! Votre investissement a réussi";
        				header("location:invest.php");
        				$stmt->close(); 
        
        
        	  }
		
	   
				  
            }else{
                
                        $sql = "SELECT sponsor FROM argent_client_db WHERE user_id = '$user_id'";
            		    $result2 = mysqli_query($cxn, $sql) or die("mysql_error()");
            			$row2 = mysqli_fetch_assoc($result2);
            					extract($row2);
            			
                            mysqli_query($cxn, "UPDATE ref_bonus SET amount=amount + '$ref_bonus' WHERE receiver='$sponsor'");
                            
							if($plan == 'flexi'){
        		
								$profits = (0.5 * $amount);
								
								$returns = $amount + $profits;
									$exp_date1 = date('Y-m-d H:i:s', strtotime($dt . '+12 days'));
							
						
								$sql_ship = "INSERT INTO client_investment(payer, fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
								VALUES('$user_id','$dt', '$amount','$profits','$returns','$exp_date1', '$plan','no')";
								$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
								
								$balance = $account_balance - $amount;
								//update user_wallet 
								
							   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE userid = '$user_id'");
							   
										$_SESSION['error'] = "Toutes nos félicitations! Votre investissement a réussi";
										header("location:invest.php");
										$stmt->close(); 
						
							  }else{
								$profits = $amount;
							
								$returns = $amount + $profits;
								$exp_date2 = date('Y-m-d H:i:s', strtotime($dt . '+25 days'));
						
								$sql_ship = "INSERT INTO client_investment(payer,fund_date, fund_amount, profits, expected_returns, expected_date, plan, completed)
								VALUES('$username','$dt', '$amount','$profits','$returns', '$exp_date2', '$plan','no')";
								$result = mysqli_query($cxn,$sql_ship)  or die("$sql_ship" . mysqli_error($cxn));
								
								$balance = $account_balance - $amount;
								//update user_wallet 
								
							   mysqli_query($cxn, "UPDATE user_wallets SET account_balance='$balance' WHERE userid = '$user_id'");
								
										$_SESSION['error'] = "Toutes nos félicitations! Votre investissement a réussi";
										header("location:invest.php");
										$stmt->close(); 
						
						
							  }
            }
						
				  
							  
			
		   
				  
		  
		   
  }	        
		
		 
}

if(isset($_POST['withdraw'])){ 

    $amount = $_POST['amount'];

	//check if user has Investment before
	$check_query = "SELECT * FROM client_investment WHERE payer='$user_id'";
	$check_result = mysqli_query($cxn, $check_query);
	if(mysqli_num_rows($check_result) < 1) {

		$message .= "You have not made any investments yet. Kindly make an Investment";
			        $_SESSION['error'] = $message;  
			        header("location:withdraw.php");
	                exit(0);
	}else{
    
   
			if($amount == 0.00){
				
				$message .= "You did not enter a valid amount to withdraw";
							$_SESSION['error'] = $message;  
							header("location:withdraw.php");
							exit(0);
				
			}
    
			if($amount > $account_balance){
				
				$message .= "Insuffient balance in your account to withdraw!";
							$_SESSION['error'] = $message;  
							header("location:withdraw.php");
							exit(0);
				
			}else{
			$dt = date("Y-m-d");
			$td = time();
				
						//INSERT INTO WITHDRAWAL
							$sql_ship = "INSERT INTO client_withdrawals(receiver, with_amount, completed, type) VALUES('$user_id', '$amount','no','invest')";
						$result = mysqli_query($cxn,$sql_ship)
								or die("$sql_ship" . mysqli_error($cxn));
								
							mysqli_query($cxn, "UPDATE user_wallets SET account_balance=account_balance - $amount WHERE userid = '$user_id'");
								
							$message .= "Your withdrawal request has been received. Kindly hold on while we process and send the money to your account! You can view staus below";
							$_SESSION['error'] = $message;  
							header("location:withdraw.php");
							exit(0); 
			}
		}
				  
              
                
                
				

}				
              
        


              
            
             


if(isset($_GET['bn'])){
    $bonus = $_GET['bn'];

	//check if user has Investment before
	$check_query = "SELECT * FROM client_investment WHERE payer='$user_id'";
	$check_result = mysqli_query($cxn, $check_query);
	if(mysqli_num_rows($check_result) < 1) {

		$message .= "You have mot invested in any of our plans. Kindly make an Investment";
			        $_SESSION['error'] = $message;  
			        header("location:referals.php");
	                exit(0);
	}
    
    if($bonus < 10000)
     {
      $message .= 'Commission is only withdrawable at 10,000CFA';
			        $_SESSION['error'] = $message;  
			        header("location:referals.php");
	                exit(0);   
    }else{
        $sql = "SELECT * FROM client_withdrawals WHERE receiver='$user_id' AND completed='no' AND type='bonus'";
        $res = mysqli_query($cxn, $sql) or die(mysqli_error());
        if(mysqli_num_rows($res) > 0){
            $message .= "Kindly hold on. You already have a pending withdrawal";
			        $_SESSION['error'] = $message;  
			        header("location:referals.php");
	                exit(0);  
        }
        $sql_ship = "INSERT INTO client_withdrawals(receiver, with_amount, completed, type)
    										VALUES('$user_id', '$bonus','no', 'bonus')";
                   $result = mysqli_query($cxn,$sql_ship)
                           or die("$sql_ship" . mysqli_error($cxn));
                           $message .= "Your request has been received. Kindly hold on you will receive payment.";
			        $_SESSION['error'] = $message;  
			        header("location:referals.php");
	                exit(0);
        
        
    }
               
                    
            
            
             
}
mysqli_close($cxn);

?>
  	
		 
