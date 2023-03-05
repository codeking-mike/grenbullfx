<?php

session_start();
include("db_connect.php");




if(isset($_POST['login'])){
            $eml = stripcslashes(strip_tags($_POST['email']));
	        $pass = stripcslashes(strip_tags($_POST['pass']));
            $sidi = session_id();
            
            $prep_stmt = "SELECT user_id, user_password, is_admin, blocked FROM argent_client_db WHERE user_email = ? LIMIT 1";
            $stmt = $cxn->prepare($prep_stmt);
            if ($stmt) {
                 $stmt->bind_param('s', $eml);
                 $stmt->execute();
                 $stmt->store_result();
 
                    if ($stmt->num_rows == 1) {
                    // A user with this username exists
                        $stmt ->bind_result($id, $password, $admin, $blocked);
                        $stmt->fetch();
                                 if($pass == $password){
									 
									 if($blocked=='yes'){
									  $_SESSION['error'] = "Your account has been blocked. Kindly contact the admin on how to Re-Activate your account"; 
							            header("location:login.php");
                                        $stmt->close(); 
										exit(0);
									 }else{
										if($admin=='yes'){
											$_SESSION['admin'] = $id;
											header("location:backend/");
											$stmt->close();   
										}else{
											$_SESSION['user'] = $id;
											header("location:index.php");
											$stmt->close();   
										}

									 }
                                       
		                 
										   
								    }
	
                                       
                                    else{
										$message .= 'Incorrect Password. Enter your correct password';
                                        $_SESSION['error'] = $message;                 
                                        header("location:login.php");
									}  
                              }
								    
                     else{
                                   $message .= 'Username incorrect! Please enter your correct login details';
                                    $_SESSION['error'] = $message;                 
                                    header("location:login.php");
                                    $stmt->close();
                                    exit(0);
                                 }
                           } 
}

    
mysqli_close($cxn);        
        
       

?>