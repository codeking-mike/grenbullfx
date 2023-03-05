<?php

include_once("auth.php");


mysqli_query($cxn, "UPDATE notifications SET status='1' WHERE receiver='$user_id'");

?>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Grenbullfxgold | Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <style>
    #link{opacity: 0;}
  </style>
  
</head>
<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      
      <div class="sidebar-wrapper" id="sidebar-wrapper">
      <?php include("sidebar.php"); ?>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <?php include("navbar.php"); ?>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                                
                                
                                <?php
                                        if(isset($_SESSION['error'])){
                                            $msg = $_SESSION['error'];
                                            echo "
                                            <div class='alert alert-info'>
                                    <button type='button' aria-hidden='true' class='close'>
                                        <i class='now-ui-icons ui-1_simple-remove'></i>s
                                    </button>
                                    <span>$msg.</span>
                                    </div>";
                                            unset($_SESSION['error']);
                                        }
				    
				 
				                ?>
                
                <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-warning shadow-info border-radius-lg py-3 pe-1" style="padding:5em">
                  <h5 class="text-dark font-weight-bolder text-center mt-2 mb-0">Message Inbox</h5>
                </div>
              </div>
              <div class="card-body">
             
              <?php
		
		$check_msg = "SELECT * FROM notifications WHERE receiver='$user_id' ORDER BY id DESC";
																   $r = mysqli_query($cxn, $check_msg);
																   if(mysqli_num_rows($r) > 0){
																	while($rw = mysqli_fetch_assoc($r)){
                                                                        extract($rw);
																	   
			  
		?>
		<div class="row">
              
            <div class="col-xl-9 d-flex grid-margin stretch-card">
                <div class="card alert-success">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-8">
                          <p><?php echo $message ?><br/>
                          <span><em>-<?php echo $sender ?></em></span></p>
                          <p><a href="reply.php?id=<?php echo $id ?>" class="btn btn-WARNING btn-lg btn-block">Reply
                         <i class="now-ui-icons ui-1_email-85"></i></p>
                        </div>
                        
                      </div>
                      
                        
                    </div>
                  </div>
				  
            </div>
        </div>
        <?php 
			}
        }
		 ?>
              
                    
                    
                
              </div>
            </div>
                                 
                        </div>
                    </div>
                </div>
            </div>
      
     </div>
     <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64045b4d4247f20fefe40ee0/1gqog9ac1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
      <?php include("footer.php"); ?>