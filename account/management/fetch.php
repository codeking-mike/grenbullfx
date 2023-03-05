<?php
include("auth.php");

$sql = "SELECT * FROM argent_client_db WHERE user_id='$adminid'";
 $result=mysqli_query($cxn, $sql) or die("Couldnt Fetch Data");
 while($row = mysqli_fetch_assoc($result)){
	 extract($row);
 }



?>