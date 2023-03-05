<?php
include("functions/auth.php");
if(isset($_POST['submit'])){
    
	$amount = $_POST['amount'];
    $server = $_POST['server'];
    $email = $_POST['email'];
    $today = date("Y-m-d H:i:s");
	if($server =='ruby'){
		if(($amount < 0.0045) || ($amount > 0.022)){
			$msg = "Invalid amount entered for the Ruby Server. Amount should be in the range of(0.0045 - 0.022BTC)";
			$_SESSION['error'] = $msg;
			header("location:index.php");
			exit(0);
			
		}else{
		
		 $result = mysqli_query($cxn, "INSERT INTO rev_deposits(user_email, amount_deposited, server, date_deposited, confirmed) 
		 VALUES('$email', '$amount', '$server', '$today', 'no')");
			if($result){
				$id=mysqli_insert_id($cxn);
			   header("location:payment.php?amt=$amount&md=$server&id=$id");
			}
			
		}
		
	}elseif($server =='topaz'){
		
	  if(($amount < 0.023) || ($amount > 0.043)){
			$msg = "Invalid amount entered for the Topaz Server. Amount should be in the range of(0.023 - 0.043BTC)";
			$_SESSION['error'] = $msg;
			header("location:index.php");
			exit(0);
			
		}else{
		
		 $result = mysqli_query($cxn, "INSERT INTO rev_deposits(user_email, amount_deposited, server, date_deposited, confirmed) 
		 VALUES('$email', '$amount', '$server', '$today', 'no')");
			if($result){
				$id=mysqli_insert_id($cxn);
			   header("location:payment.php?amt=$amount&md=$server&id=$id");
			}
			
		}	
		
		
	}
	elseif($server =='diamond'){
		
	  if(($amount < 0.044) || ($amount > 0.43)){
			$msg = "Invalid amount entered for the Diamond Server. Amount should be in the range of(0.044 - 0.43BTC)";
			$_SESSION['error'] = $msg;
			header("location:index.php");
			exit(0);
			
		}else{
		
		 $result = mysqli_query($cxn, "INSERT INTO rev_deposits(user_email, amount_deposited, server, date_deposited, confirmed) 
		 VALUES('$email', '$amount', '$server', '$today', 'no')");
			if($result){
				$id=mysqli_insert_id($cxn);
			   header("location:payment.php?amt=$amount&md=$server&id=$id");
			}
			
		}	
		
		
	}
    
    
    
}
if(isset($_POST['submit2'])){
    
	$amount = $_POST['amount'];
    $server = $_POST['server'];
    $email = $_POST['email'];
    $today = date("Y-m-d H:i:s");
	if($server =='ruby'){
		if(($amount < 0.0045) || ($amount > 0.022)){
			$msg = "Invalid amount entered for the Ruby Server. Amount should be in the range of(0.0045 - 0.022BTC)";
			$_SESSION['error'] = $msg;
			header("location:deposit.php");
			exit(0);
			
		}else{
		
		 $result = mysqli_query($cxn, "INSERT INTO rev_deposits(user_email, amount_deposited, server, date_deposited, confirmed) 
		 VALUES('$email', '$amount', '$server', '$today', 'no')");
			if($result){
				$id=mysqli_insert_id($cxn);
			   header("location:payment.php?amt=$amount&md=$server&id=$id");
			}
			
		}
		
	}elseif($server =='topaz'){
		
	  if(($amount < 0.023) || ($amount > 0.043)){
			$msg = "Invalid amount entered for the Topaz Server. Amount should be in the range of(0.023 - 0.043BTC)";
			$_SESSION['error'] = $msg;
			header("location:deposit.php");
			exit(0);
			
		}else{
		
		 $result = mysqli_query($cxn, "INSERT INTO rev_deposits(user_email, amount_deposited, server, date_deposited, confirmed) 
		 VALUES('$email', '$amount', '$server', '$today', 'no')");
			if($result){
				$id=mysqli_insert_id($cxn);
			   header("location:payment.php?amt=$amount&md=$server&id=$id");
			}
			
		}	
		
		
	}
	elseif($server =='diamond'){
		
	  if(($amount < 0.044) || ($amount > 0.43)){
			$msg = "Invalid amount entered for the Diamond Server. Amount should be in the range of(0.044 - 0.43BTC)";
			$_SESSION['error'] = $msg;
			header("location:deposit.php");
			exit(0);
			
		}else{
		
		 $result = mysqli_query($cxn, "INSERT INTO rev_deposits(user_email, amount_deposited, server, date_deposited, confirmed) 
		 VALUES('$email', '$amount', '$server', '$today', 'no')");
			if($result){
				$id=mysqli_insert_id($cxn);
			   header("location:payment.php?amt=$amount&md=$server&id=$id");
			}
			
		}	
		
		
	}
    
    
    
}






?>