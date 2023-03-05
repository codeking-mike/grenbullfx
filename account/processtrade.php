<?php
include("functions/auth.php");
if(isset($_POST['buy'])){
    
	$amount = $_POST['amount'];
   // $tp = $_POST['tp'];
   // $sl = $_POST['sl'];
    $duration = $_POST['duration'];
    $today = date("Y-m-d H:i:s");
	if($amount > $account_balance ){
		
			$msg = "Insufficient balance to execute trade. Kindly add more funds to your account to get started";
			$_SESSION['error'] = $msg;
			header("location:tradingzone.php");
			exit(0);
			
		}else{

            $balance = $account_balance - $amount;
            $check_inv = "SELECT * FROM trade_zone WHERE trader='$username' AND completed='yes'";
						$res_inv =mysqli_query($cxn, $check_inv);
						if(mysqli_num_rows($res_inv) > 0 ){

                                     $result = mysqli_query($cxn, "UPDATE trade_zone SET trade_amount='$amount', trade_date='$today',
                                     duration='$duration', completed='no' WHERE trader='$username'");
                                   
                                        if($result){
                                            mysqli_query($cxn, "UPDATE user_wallet SET account_balance='$balance', open_trade='$amount' WHERE username='$username'");
                                            $msg = "Trade executed successfully!. ";
                                            $_SESSION['error'] = $msg;
                                            header("location:tradingzone.php");
                                            exit(0);  
			   
			                            }
							
						}else{
		
                                        $qry = "INSERT INTO trade_zone(trader, trade_amount, trade_date, duration, completed) VALUES('$username', '$amount', '$today', '$duration', 'no')";
                                        $result=mysqli_query($cxn, $qry) or die("Error". mysqli_error($cxn));
                                            if($result){
                                                mysqli_query($cxn, "UPDATE user_wallet SET account_balance='$balance', open_trade='$amount', trade_duration='$duration' WHERE username='$username'");
                                                $msg = "Trade executed successfully!. ";
                                                $_SESSION['error'] = $msg;
                                                header("location:tradingzone.php");
                                                exit(0);  
                                            
                                            }
			
		                }
		
	}
}
    if(isset($_POST['sell'])){
    
        $amount = $_POST['amount'];
        
        $today = date("Y-m-d H:i:s");
        if($amount > $account_balance ){
            
                $msg = "Insufficient balance to execute trade.";
                $_SESSION['error'] = $msg;
                header("location:tradingzone.php");
                exit(0);
                
            }else{
                
            
                mysqli_query($cxn, "UPDATE trade_zone SET completed='yes' WHERE trader='$username'");
                if($result){
                   
                    $msg = "Trade executed successfully!. ";
                    $_SESSION['error'] = $msg;
                    header("location:tradingzone.php");
                    exit(0);  
                   
                }
                
            }
            
        }
    
    
    
    







?>