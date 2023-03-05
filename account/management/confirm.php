<?php
 session_start();
 include("auth.php");
 
 if(isset($_POST['confirm'])){
     $mergeid = $_POST['mergeid'];
     $deposit_date = date('Y-m-d H:i:s');
     $sql = " SELECT * FROM mergetable WHERE mergeid='$mergeid'";
            $result = mysqli_query($cxn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row=mysqli_fetch_assoc($result)){
				extract($row);
            }
            }
          $pquery = "SELECT * FROM tbl_investments WHERE transid='$payer_id'";
            $result = mysqli_query($cxn, $pquery);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row=mysqli_fetch_assoc($result)){
				extract($row);
            }
            // merged = 'yes'
            if($merged =='yes'){
                $deposit_date = date('Y-m-d H:i:s');
		        $exp_date = date('Y-m-d H:i:s', strtotime($deposit_date . '+24 hours'));
		        $expected_amount = $amount_inv2 + $amount_inv2;
		        $ref_bonus = (0.05 * $amount_inv2);
           
            		 //check if user has PH before
		    $check_query = "SELECT * FROM tbl_investments WHERE payer='$payer' AND fulfilled='yes'";
            $check_result = mysqli_query($cxn, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
           
            		 // The user has PH before
            		  // Insert the new user into the database
            	            $sql_ship = "UPDATE tbl_investments SET date_confirmed='$deposit_date', 
            		                            expected_amount='$expected_amount', date_expected='$exp_date', confirmed='yes' WHERE transid='$payer_id'";
                           $result = mysqli_query($cxn,$sql_ship)
                                   or die("$sql_ship" . mysqli_error($cxn));
							//insert in to weekly cycle databse
							/*
							
							$sql_weekly = "INSERT INTO weekly_cycle(transid, no_of_cycle, receiver, cycle_amount, cycle_amount2, withdrawal_date, matured, merged, fulfilled)
											VALUES('$payer_id','1', '$payer', '$weekly_exp_amount','$weekly_exp_amount', '$weekly_exp_date', 'no', 'no', 'no')";
							$weekly_result = mysqli_query($cxn,$sql_weekly)
                                   or die("$sql_ship" . mysqli_error($cxn));*/
            					   
            		        
             }else{
                       
            		    $sql = "SELECT referer FROM tizeti_db_user WHERE username = '$payer_username'";
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
                            mysqli_query($cxn, "UPDATE ref_bonus SET bonus=bonus + '$ref_bonus' WHERE receiver='$referer'");
                        }else{
                            mysqli_query($cxn, "INSERT INTO ref_bonus(receiver, bonus) VALUES('$referer', '$ref_bonus')");
                        }           
                          $sql_ship = "UPDATE tbl_investments SET date_confirmed='$deposit_date', 
            		                            expected_amount='$expected_amount', date_expected='$exp_date', confirmed='yes' WHERE transid='$payer_id'";
                           $result = mysqli_query($cxn,$sql_ship)
                                   or die("$sql_ship" . mysqli_error($cxn));
							//insert in to weekly cycle databse
						/*
							
							$sql_weekly = "INSERT INTO weekly_cycle(transid, no_of_cycle, receiver, cycle_amount, cycle_amount2, withdrawal_date, matured, merged, fulfilled)
											VALUES('$payer_id','1', '$payer', '$weekly_exp_amount','$weekly_exp_amount', '$weekly_exp_date', 'no', 'no', 'no')";
							$weekly_result = mysqli_query($cxn,$sql_weekly)
                                   or die("$sql_ship" . mysqli_error($cxn)); */
            		      
                     }
                
            }
            }
            
            //GH
            $gquery = "SELECT * FROM weekly_cycle WHERE id='$receiver_id'";
            $result = mysqli_query($cxn, $gquery);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row=mysqli_fetch_assoc($result)){
				extract($row);
            }
            // merged = 'yes'
            if($merged =='yes'){
                mysqli_query($cxn, "UPDATE weekly_cycle SET fulfilled='yes' WHERE id='$receiver_id'");
                
            }
            }
            
            // update the merge table
        $oquery = "UPDATE mergetable SET fulfilled='yes' WHERE mergeid='$mergeid'";
        $resulto = mysqli_query($cxn,$oquery) or die("$oquery" . mysqli_error($cxn));
            					   
                           $message .= "User payment has been confirmed and account funded";
            				$_SESSION['error']= $message;
            		       header("location:adminuser.php");
            		      exit(0); 
 }
if(isset($_POST['nopop'])){
    
    $mergeid = $_POST['mergeid'];
     // get details from mergetable
                                $sql_ph = "SELECT * FROM mergetable WHERE mergeid='$mergeid'";
                                $result_ph = mysqli_query($cxn, $sql_ph);
                                      // output data of each row
                                    while($row=mysqli_fetch_assoc($result_ph)){
						            extract($row);
						            
                                }
     
    
    //REQUE ACHIEVEMNET USER
    mysqli_query($cxn, "UPDATE weekly_cycle SET merged='no', cycle_amount=cycle_amount + '$amount' WHERE id='$receiver_id'");

    // delete ph record from data base and block user
    mysqli_query($cxn, "DELETE FROM tbl_investments WHERE transid='$payer_id'");
    mysqli_query($cxn, "UPDATE tizeti_db_user SET block='yes' WHERE username='$payer'");
     mysqli_query($cxn, "DELETE FROM mergetable WHERE mergeid='$mergeid'");
     
   $message= "YOUR GH HAS BEEN REQUED FOR MERGING AND THE USER HAS BEEN BLOCKED!";
                                $_SESSION['error'] = $message;
                                header("location:adminuser.php");
                                   
    
               
    
}


?>