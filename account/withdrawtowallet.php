<?php
include_once('auth.php');

if(isset($_GET['fd'])){
    $trans = $_GET['fd'];
    $today = time();
    
    	$query_inv = "SELECT * FROM client_investment WHERE fund_id='$trans'";
		$r = mysqli_query($cxn, $query_inv);
		if(mysqli_num_rows($r) > 0){
		$row=mysqli_fetch_assoc($r);
		extract($row);

        $exd = strtotime($expected_date);

if($today > $exd){
		
    
    mysqli_query($cxn, "UPDATE user_wallets SET account_balance=account_balance + $expected_returns WHERE userid = '$payer'");
     mysqli_query($cxn, "UPDATE client_investment SET completed='yes' WHERE fund_id = '$trans'");
    
    $_SESSION['error'] = "Your funds have been deposited into your wallet. You can proceed to withdraw into your account";
	header("location:investments.php");
	exit(0);

}else{
    $_SESSION['error'] = "You can't withdraw now, your investments have not matured. Try again later!";
	header("location:investments.php");
	exit(0); 
}
        }
}



?>