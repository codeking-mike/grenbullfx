<?php

include("auth.php");

if(isset($_POST['invest'])){ 
  $amount = strip_tags($_POST['inv_amount']);
 //check if the user entered numeric input 
   if(!is_numeric($amount)){
			$message = "What you entered is not a number.";
				$_SESSION['error']= $message;
		       header("location:index.php");
			   exit(0);
		
  }
//check if the user valid investment amount
 elseif($amount < 5000){
			$message = "The amount you enterd is below the minimum investment amount(N5,000). Kindly enter a value greater than N5,000";
				$_SESSION['error']= $message;
		       header("location:index.php");
		 exit(0);
}else{ 
		    $prep_stmt = "SELECT * FROM tbl_investments WHERE username=? AND fulfilled='no'";
            $stmt = $cxn->prepare($prep_stmt);
             if ($stmt) {
            $stmt->bind_param('s', $username);
                 $stmt->execute();
                 $stmt->store_result();
            if( $stmt->num_rows > 0){
				
                //there is already a deposit request
                        $message .= 'Sorry you cant invest at this moment,you already have an investment running. Kindly try again later';
			            $_SESSION['error'] = $message;
                       header("location:index.php");
					   $stmt->close(); 
					   exit(0);
            }else{
				// Add referal bonus here
                $time = date('Y-m-d H:i:s');
				$sql_ship = "INSERT INTO tbl_investments(username, payer_phone, amount_inv2, amount_invested,merged, confirmed, fulfilled)
										VALUES('$username','$user_phone','$amount','$amount','no','no','no')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
			   $transid = mysqli_insert_id($result);
					   $_SESSION['error'] = "Your investment request has been received.";
					   header("location:invest.php");
					   $stmt->close(); 
                
            }			        
		  }
		        
		
		 
}
}




?>