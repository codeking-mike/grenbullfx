<?php
session_start();
//include important bfiles
include("auth.php");

// check if the form was submitted
if(isset($_POST['confirm'])){
	     
		 $amount = $_POST['amount'];
		 $transid = $_POST['trans'];
		 $payer = $_POST['payer'];
		 
/* Process data when all fields are correct */

          $deposit_date = date('Y-m-d H:i:s');
		  $half_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +5 day'));
		   $full_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +10 day'));
		 $expected_amount = (0.5 * $amount) + $amount;
		 $half_amount = ($expected_amount/2);
		 $interest =  (0.5 * $amount);
		 $ref_bonus = 0.05 * $amount;
		 
         $sql = "SELECT * FROM tbl_investments WHERE transid='$transid' AND fulfilled='yes'";
                   $result = mysqli_query($cxn, $sql);
         if (mysqli_num_rows($result) > 0) {
		 // The user has PH before
		  // Insert the new user into the database
	      $sql_ship = "UPDATE tbl_investments SET date_invested='$deposit_date', tot_amt_expected='$expected_amount', interest='$interest',
half_amt_exp='$half_amount', sec_amt_expected='$half_amount', first_date='$half_date', second_date='$full_date',
confirmed='yes', fulfilled='no', level='1' WHERE transid='$transid'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		      $message .= "User payment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:invest.php");
		      exit(0); 
         }else{
            
		    $sql = "SELECT referer FROM prov_user_tbl WHERE username = '$payer'";
		    $result2 = mysqli_query($cxn, $sql) or die("mysql_error()");
					      while($row2 = mysqli_fetch_assoc($result2)){
					          extract($row2);
					      }
			 $prep_stmt = "SELECT * FROM ref_bonus WHERE username = ? ";
             $stmt = $cxn->prepare($prep_stmt);
            if ($stmt) {
                 $stmt->bind_param('s', $referer);
                $stmt->execute();
                $stmt->store_result();
                $num = $stmt->num_rows;
            }if($num > 0){
                mysqli_query($cxn, "UPDATE ref_bonus SET bonus=bonus + '$ref_bonus' WHERE username='$referer'");
            }else{
                mysqli_query($cxn, "INSERT INTO ref_bonus(username, bonus) VALUES('$referer', '$ref_bonus')");
            }           
               // Insert the new user into the database
	          $sql_ship = "UPDATE tbl_investments SET date_invested='$deposit_date', tot_amt_expected='$expected_amount', interest='$interest',
half_amt_exp='$half_amount', sec_amt_expected='$half_amount', first_date='$half_date', second_date='$full_date',
confirmed='yes', fulfilled='no', level='1' WHERE transid='$transid'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		      $message .= "User payment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:invest.php");
		      exit(0); 
		      
         }
                    
            
         

		        
		
		

           

} 
//PROCESS RE-INVESTMENT

// check if the form was submitted
if(isset($_POST['confirm2'])){
	     
		 $amount = $_POST['amount'];
		 $id = $_POST['trans'];
		 $payer = $_POST['user'];
		 
/* Process data when all fields are correct */

          $deposit_date = date('Y-m-d H:i:s');
		  $half_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +5 day'));
		   $full_date = date('Y-m-d H:i:s', strtotime($deposit_date . ' +10 day'));
		 $expected_amount = (0.5 * $amount) + $amount;
		 $half_amount = ($expected_amount/2);
		 $interest =  (0.5 * $amount);
		 $ref_bonus = 0.05 * $amount;
		 
		 // The user has PH before
		  // update the recommitment table
		  mysqli_query($cxn, "UPDATE tbl_investments2 SET confirmed='yes', fulfilled='yes' WHERE id='$id'");
		 //insert the new user into the database
		 
	      $sql_ship = "INSERT INTO tbl_investments(payer, amount_invested, date_invested, tot_amt_expected, interest, half_amt_exp, sec_amt_expected, first_date, second_date, confirmed, fulfilled, level)
VALUES('$payer', '$amount','$deposit_date', '$expected_amount', '$interest', '$half_amount', '$half_amount', '$half_date', '$full_date', 'yes', 'no', '1')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
					   
		      $message .= "User payment has been confirmed and account funded";
				$_SESSION['error']= $message;
		       header("location:invest2.php");
		      exit(0); 
         
		              

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