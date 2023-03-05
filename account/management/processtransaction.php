<?php
session_start();
 include("auth.php");

// check if the form was submitted
if(isset($_POST['recommit'])){
	     
		 $amount = $_POST['amount'];
		 $buyer_username = $_POST['username'];
		 $transid = $_POST['transid'];
		 $id = $_POST['id'];
		 
/* Process data when all fields are correct */

          $deposit_date = date('Y-m-d H:i:s');
		  $exp_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +6 day'));
		 $expected_amount = (0.4 * $amount) + $amount;
		 $ref_bonus = 500;
		 
         //UPDATE RECOMMITMENT TABLE
	      $sql_ship = "UPDATE tbl_recommitment SET confirmed='yes' WHERE id='$id'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
        //UPDATE WITHDRAWAL TABLE
        mysqli_query($cxn, "UPDATE withdrawals SET recommited='yes' WHERE transid='$transid'");
        
        //INSERT INTO INVESTMENT TABLE
        mysqli_query($cxn, "INSERT INTO tbl_investments(username, amount_invested, date_invested, expected_amount, date_expected, confirmed, completed)
        VALUES ('$buyer_username', '$amount', '$deposit_date', '$expected_amount', '$exp_date', 'yes', 'no')");
					   
		      $message .= "User recommitment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:recommitment.php");
		      exit(0); 
         
            
}

if(isset($_POST['confirm'])){
	     
		 $amount = $_POST['inv_amount'];
		 $payer = $_POST['payer'];
		 $transid = $_POST['trans'];
		if(!is_numeric($amount)){
			$message = "What you entered is not a number.";
				$_SESSION['error']= $message;
		       header("location:confirm.php");
			   exit(0);
		
		}
		
		 
/* Process data when all fields are correct */

          $deposit_date = date('Y-m-d H:i:s');
		  $exp_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +7 day'));
		 $expected_amount = (0.3 * $amount) + $amount;
		 $ref_bonus = 500;
		 
         $sql = "SELECT * FROM tbl_investments WHERE payer='$payer' AND completed='yes'";
         $result = mysqli_query($cxn, $sql);
         if (mysqli_num_rows($result) > 0) {
		 // The user has PH before
		  // Insert the new user into the database
	      $sql_ship = "UPDATE tbl_investments SET amount_invested='$amount', date_invested='$deposit_date', 
		                            expected_amount='$expected_amount', date_expected='$exp_date', confirmed='yes', fulfilled='no' WHERE transid='$transid'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		      $message .= "User payment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:invest.php");
		      exit(0); 
         }else{
            $bonus = 500;
		    $sql = "SELECT referer FROM tizeti_db_user WHERE username = '$payer'";
		    $result2 = mysqli_query($cxn, $sql) or die("mysql_error()");
					      while($row2 = mysqli_fetch_assoc($result2)){
					          extract($row2);
					      }
			 $prep_stmt = "SELECT * FROM ref_bonus WHERE receiver = ? ";
             $stmt = $cxn->prepare($prep_stmt);
            if ($stmt) {
                 $stmt->bind_param('s', $referer);
                $stmt->execute();
                $stmt->store_result();
                $num = $stmt->num_rows;
            }if($num > 0){
                mysqli_query($cxn, "UPDATE ref_bonus SET bonus=bonus + '$bonus' WHERE receiver='$referer'");
            }else{
                mysqli_query($cxn, "INSERT INTO ref_bonus(receiver, bonus) VALUES('$referer', '$bonus')");
            }           
               // Insert the new user into the database
	          $sql_ship = "UPDATE tbl_investments SET amount_invested='$amount', date_invested='$deposit_date', 
		                            expected_amount='$expected_amount', date_expected='$exp_date', confirmed='yes', fulfilled='no' WHERE transid='$transid'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		      $message .= "User payment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:invest.php");
		      exit(0); 
		      
         }
                    
            
         

		        
		
		

           

} 
//process daily investment
if(isset($_POST['fund2'])){
	     
		 $amount = $_POST['amount'];
		 $buyer_username = $_POST['username'];
		 $transid = $_POST['trans'];
		if(!is_numeric($amount)){
			$message = "What you entered is not a number.";
				$_SESSION['error']= $message;
		       header("location:processfund2.php");
			   exit(0);
		
		}
		
		 
/* Process data when all fields are correct */

          $deposit_date = date('Y-m-d H:i:s');
		  $exp_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +1 day'));
		 $expected_amount = (0.1 * $amount) + $amount;
		 
		  // Update users details the in the database
	      $sql_ship = "UPDATE tbl_daily_investments SET amount_invested='$amount', date_invested='$deposit_date', 
		                            expected_amount='$expected_amount', date_expected='$exp_date', confirmed='yes', completed='no' WHERE transid='$transid'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		      $message .= "User payment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:index.php");
		      exit(0); 
} 


?>