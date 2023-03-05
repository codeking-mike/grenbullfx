<?php
session_start();
include("functions/auth.php");

if(isset($_POST['withdraw'])){
    $earnings = $_POST['earnings'];
    $mode = $_POST['mode'];
    $address = $_POST['address'];
    $today = time();
	$today2 = date("Y-m-d");
	$with_date = strtotime($_POST['date']);
	
    if($today > $with_date){
		  
		  $query = "SELECT * FROM rev_withdrawals WHERE user_email='$user_email' AND paid='no'";
		  $rs = mysqli_query($cxn, $query);
		  if(mysqli_num_rows($rs) > 0){
                    $message .= 'Withdrawal request rejected!. You can only place one withdrawal request at a time!';
			        $_SESSION['error'] = $message;  
			        header("location:withdrawal.php");
	                exit(0); 
		  }else{
			  
          $sql_ship = "INSERT INTO rev_withdrawals(user_email, with_amount, mode, address, paid, date_withdrawn)
    										VALUES('$user_email', '$earnings','$mode','$address', 'no','$today2')";
                   $result = mysqli_query($cxn,$sql_ship)
                           or die("$sql_ship" . mysqli_error($cxn));
            // insert 20% recommitment into database
            
            
			  
                    $message .= 'Your withdrawal request has been received. You will receive payment into your account shortly!';
			        $_SESSION['error'] = $message;  
			        header("location:with_chart.php");
	                exit(0); 
      }
	}else{
                    $message .= 'Sorry! You can only make withdrawals after 10days of investing. Kindly try again later';
			        $_SESSION['error'] = $message;  
			        header("location:withdrawal.php");
	                exit(0);   
    }
	
}

if(isset($_POST['reinvest'])){
    $earnings = $_POST['earnings'];
    $today = date("Y-m-d H:i:s");
    $exp_en = (0.2 * $earnings) + $earnings;
	$daily_en = ($exp_en/10);
	$exp_date = date('Y-m-d H:i:s', strtotime($today . '+10 day'));
    $today2 = time();
	$with_date = strtotime($_POST['date']);
	
    if($today2 > $with_date){
		
          $result2 = mysqli_query($cxn, "UPDATE rev_wallet SET account_balance=account_balance + '$earnings', earnings='$exp_en', daily_earning='$daily_en',
	 withdrawal_date='$exp_date', last_deposit_date='$today', active='yes' WHERE user_email='$user_email'"); 

	 $result = mysqli_query($cxn,$sql_ship)
                           or die("$sql_ship" . mysqli_error($cxn));
            // insert 20% recommitment into database
            
            
			  
                    $message .= 'Your investment has been rolled over. Thanks for choosing Lennox Bitcoin';
			        $_SESSION['error'] = $message;  
			        header("location:withdrawal.php");
	                exit(0); 
    }
	else{
                    $message .= 'Sorry! You can only make withdrawals after 10days of investing. Kindly try again later';
			        $_SESSION['error'] = $message;  
			        header("location:withdrawal.php");
	                exit(0);   
    }
	
}
  
                
    
        
			  
			  
                   
                
                   
              
            
             
     

                


?>