<?php
//include important bfiles
session_start();
include("../controller/db_connect.php");
//include("../mailer/PHPMailerAutoload.php");



if(isset($_POST['login'])){
            $username = stripcslashes(strip_tags($_POST['username']));
	        $pass = stripcslashes(strip_tags($_POST['password']));
            $sidi = session_id();
            
            $prep_stmt = "SELECT adminid, admin_password, active FROM tizeti_admin WHERE admin_username = ? LIMIT 1";
            $stmt = $cxn->prepare($prep_stmt);
            if ($stmt) {
                 $stmt->bind_param('s', $username);
                 $stmt->execute();
                 $stmt->store_result();
 
                    if ($stmt->num_rows == 1) {
                    // A user with this username exists
                        $stmt ->bind_result($id, $password, $active);
                        $stmt->fetch();
                                 If($pass == $password){
									 if($active=='yes'){
									  $_SESSION['admin'] = $id; 
							            header("Location:dashboard.php");
                                        $stmt->close();
                                        exit(0);										
									 }else{
									  $_SESSION['error'] = "Your account is not active"; 
							            header("location:index.php");
                                        $stmt->close(); 
										exit(0);
									 }
                                       
                                       
								 }else{
										$message .= 'Incorrect Password. Enter your correct password';
                                        $_SESSION['error'] = $message;                 
                                        header("location:index.php");
									}  
                              }
								    
                     else{
                                   $message .= 'Username incorrect! Please enter your correct login details';
                                    $_SESSION['error'] = $message;                 
                                    header("location:index.php");
                                    $stmt->close();
                                    exit(0);
                                 }
                           } 
}
if(isset($_POST['reset'])){
$email = stripcslashes(strip_tags($_POST['email']));
		if(!preg_match("/^.+@.+\\..+$/",$email)){
		$message .= 'What you entered is not a valid email address';
        $_SESSION['error'] = $message;                 
        header("location:../forgot.php");
		exit(0);
		}
     else{
  $prep_stmt = "SELECT userid FROM multisect_db_users WHERE user_email = ? LIMIT 1";
	$stmt = $cxn->prepare($prep_stmt);
 
		if ($stmt) {
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
 
			if ($stmt->num_rows == 1) {
			// A user with this username already exists
			$stmt ->bind_result($id);
            $stmt->fetch();
			  $mail = new PHPMailer;
                   
					//from email address and name
					$mail->From = "noreply@multisectinvestment.com";
					$mail->FromName = "MULTISECT INVESTMENT";
					//To address and name
					$mail->addAddress("{$email}", $email);
					//Send HTML or Plain Text email
					$mail->isHTML(true);
					$mail->Subject = "Password Reset";
					$mail->Body = "<html>
					<head>
					<title>Password Reset</title>
					</head>
					<body style='background:#eee;padding:50px'>
					<div style='background:#fff;padding:50px'>

					<h2>Multisect Investment</h2>
					<hr style='margin:10px;background:#D4AF37'>
					<p>Please enter the code below to reset your password.<br />
					</p>
                       <h2>$id</h2>
					<div>
					</body>
					</html>";
					$mail->AltBody = "";

					if(!$mail->send()) 
					{
						echo "Mailer Error: " . $mail->ErrorInfo;
					}
					 
							
					 $message .= 'A reset code has been sent to the email address you entered.';
								$_SESSION['error'] = $message;
							   header("Location:../forgot.php");
						  
			}else{
			                   $message .= 'Email address not found';
								$_SESSION['error'] = $message;
							   header("Location:../forgot.php");
							   exit(0);
			}
		}
		
		} 
		


}
    
        
        
       

?>