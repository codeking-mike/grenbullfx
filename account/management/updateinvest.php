<?php
session_start();
include("auth.php");

// check if the form was submitted
if(isset($_POST['update_inv'])){
	     
		 $date = $_POST['date'];
		 $payer = $_POST['payer'];
		 $amount = $_POST['amount'];
		 $transid = $_POST['fundid'];
		 
/*Process data when all fields are correct */

         //UPDATE INVESTMENT TABLE
	      $sql_ship = "UPDATE client_investment SET expected_returns='$amount', expected_date='$date' WHERE fund_id='$transid'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
           $message .= "Investment details has been updated successfully.";
				$_SESSION['error']= $message;
		       header("location:viewinvest.php?id=$transid");
		      exit(0); 
			  
			 
         
            

}

?>
