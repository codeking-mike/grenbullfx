<?php
//include important bfiles
session_start();
include("auth.php");
//include("../mailer/PHPMailerAutoload.php");


function clean($str){
	return strip_tags(trim($str));        
}
// check if the form was submitted
if(isset($_POST['create'])){
	
          
/* Process data when all fields are correct */

        $fullname = strip_tags($_POST['fullname']);
		$username = strip_tags($_POST['username']);
		//use password encryption to encrypt the password
		$pass = strip_tags($_POST['password']);
        //$pass = password_hash($p, PASSWORD_DEFAULT);
        $dt = date('Y-m-d H:i:s');
        $status='no';
            
            // Insert the new user into the database
	      $sql_ship = "INSERT INTO argent_client_db(fullname, username, user_password, date_joined, blocked, is_admin)
										VALUES('$fullname', '$username','$pass', '$dt', 'no', 'yes')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
			 $message .= 'Your account creation was successful.';
			$_SESSION['error'] = $message;
		    header("Location:account.php");  
              		
 }	 


if(isset($_POST['country'])){
	
/* Process data when all fields are correct */
        
        $country = strip_tags($_POST['cname']);
		
	           // Insert the new user into the database
	      $sql_ship = "INSERT INTO country_list(country_name, status)
										VALUES('$country', 'block')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
              
			
		   
			$message .= 'Country was added successfully!.';
			$_SESSION['error'] = $message;
		    header("Location:countrylist.php");      
			
 	 
}

if(isset($_POST['account'])){
	
/* Process data when all fields are correct */
        
        $accno = strip_tags($_POST['accno']);
		
		$accname = strip_tags($_POST['accname']);
		//use password encryption to encrypt the password
         $bankname = strip_tags($_POST['bank']);
          
        
		
	
            
            // Insert the new user into the database
	      $sql_ship = "INSERT INTO central_account(momo_name, momo_number, network, fund_type, status)
										VALUES('$accname', '$accno', '$bankname','momo', '1')";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
              
			
		   
			$message .= 'Your account number was added successfully.';
			$_SESSION['error'] = $message;
		    header("Location:account2.php");      
			
 	 
}
if(isset($_POST['wallet'])){
	
	/* Process data when all fields are correct */
			
			$type = strip_tags($_POST['type']);
			
			$address = strip_tags($_POST['address']);
			//use password encryption to encrypt the password
		
			  
			
			
		
				
				// Insert the new user into the database
			  $sql_ship = "INSERT INTO central_account(fund_type, wallet_type, wallet_address, status)
											VALUES('wallet', '$type', '$address', '1')";
				   $result = mysqli_query($cxn,$sql_ship)
						   or die("$sql_ship" . mysqli_error($cxn));
				  
				
			   
				$message .= 'Your wallet was added successfully.';
				$_SESSION['error'] = $message;
				header("Location:account2.php");      
				
		  
	}

if(isset($_POST['update'])){
	
/* Process data when all fields are correct */
        
        $accno = strip_tags($_POST['number']);
		
		$accname = strip_tags($_POST['name']);
		//use password encryption to encrypt the password
         $bnk = strip_tags($_POST['bank']);
         $id = strip_tags($_POST['id']);
          $ifsc = strip_tags($_POST['ifsc']);
        
		
	
            
            // Insert the new user into the database
	      $sql_ship = "UPDATE central_account SET acc_name='$accname', acc_number='$accno', acc_bank='$bnk', ifsc='$ifsc' WHERE id='$id'";
               $result = mysqli_query($cxn,$sql_ship)
                       or die("$sql_ship" . mysqli_error($cxn));
              
			
		   
			$message .= 'Your account number was updated successfully.';
			$_SESSION['error'] = $message;
		    header("Location:editaccount.php?ed=$id");      
			
 	 
}

mysqli_close($cxn);
?>