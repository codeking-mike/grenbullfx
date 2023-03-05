<?php
include("auth.php");

if(isset($_POST['update'])){

    $method = $_POST['method'];
	$type = $_POST['type'];
	$address = $_POST['address'];
   
	$mname = $_POST['momo_name'];
	$mno = $_POST['momo_no'];
	$ntwk = $_POST['network'];
	
	    
    $result = mysqli_query($cxn, "UPDATE user_wallets SET momo_name='$mname', momo_no='$mno', network='$ntwk', 
	method='$method', wallet_type='$type', wallet_address='$address' WHERE userid='$user_id'");
	
    if($result){
        $_SESSION['error'] = "Withdrawal & Deposit Method added successfully!"; 
							            header("location:changeaccount.php");
                                        $stmt->close(); 
										exit(0);
    }
	
  

} 

?>