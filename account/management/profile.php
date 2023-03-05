<?php
session_start();
include("auth.php");
/*
 if($activated == 'no'){
   header("location:activate.php");
   
 } 
 */
 //has user been merged to pay out?
   $query = "SELECT * FROM mergetable WHERE payer='$username' AND fulfilled='no'";
   $r = mysqli_query($cxn, $query);
   if(mysqli_num_rows($r) > 0){
       header("location:makeph.php");
   }  
 //has user been merged to receive?
 $query2 = "SELECT * FROM mergetable WHERE receiver='$username' AND fulfilled='no'";
   $g = mysqli_query($cxn, $query2);
   if(mysqli_num_rows($g) > 0){
       header("location:makegh.php");
   } 

?>
<?php include("head.php") ?>
<div class="inner-block">
    <div class="inbox">
        
        <?php
           if(isset($_GET['id'])){
               $id = $_GET['id'];
               $run_query = "SELECT * FROM tizeti_db_user WHERE userid='$id'";
                $res = mysqli_query($cxn, $run_query);
                $row = mysqli_fetch_assoc($res);
                extract();
               
           }
         
        
        ?>
    	  
    	 <div class="col-md-4 compose">
    	     <h3 style="text-align:center;padding:30px 10px 10px 10px;">Profile Details</h3>
    	 	<div class="mail-profile">
    	 		<div class="mail-pic">
    	 			<a href="#"><img src="images/p1.png" alt=""></a>
    	 		</div>
    	 		<div class="mailer-name"> 			
    	 				<h5><a href="#"><?php echo $fullname ?></a></h5>  	 				
    	 			     <h5><a href="#"><?php echo $username ?></a></h5>   
    	 		</div>
    	 	    <div class="clearfix"> </div>
    	 	</div>
    	 	<div class="compose-bottom">
    	 		<ul>
    	 			<li><a class="hilate" href="#"><i class="fa fa-inbox"> </i><b>Username:</b> <?php echo $username ?></a></li>
    	 			<li><a href="#"><i class="fa fa-envelope-o"> </i><b>Password:</b> <?php echo $user_password ?></a></li>
    	 			<li><a href="#"><i class="fa fa-star-o"> </i><b>Email:</b> <?php echo $user_email ?></a></li>
    	 			<li><a href="#"><i class="fa fa-pencil-square-o"> </i>Phone Number:<?php echo $user_phone ?></a></li>
    	 			<li><a href="#"><i class="fa fa-trash-o"> </i><b>Momo Number. </b><?php echo $account_no ?></a></li>
					<li><a href="#"><i class="fa fa-trash-o"> </i><b>Momo Name.</b> <?php echo $account_name ?></a></li>
				
					<li><a href="#"><i class="fa fa-trash-o"> </i><b>Date Registered.</b> <?php echo $date_registered ?></a></li>
    	 		</ul>
    	 	</div>
			
    	    </div>   	 
    	 	
    	
          <div class="clearfix"> </div>     
   </div>
</div>

<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2019 30Cycles. All Rights Reserved</p>
</div>	
<!--COPY rights end here-->
</div>

<!--slider menu-->
    <div class="sidebar-menu">
		  	<?php  include("sidebar.php");  ?>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
