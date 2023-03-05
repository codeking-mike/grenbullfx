<?php

include_once("auth.php");
if(isset($_GET['trans'])){
	$trans = $_GET['trans'];
	$amount = $_GET['amt'];
	
}

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
            <div class="col-sm-12 mb-4 mb-xl-0">
                <div class="card">
                    <div class="card-header">
                    <h4 class="font-weight-bold">Hi, <?php echo $firstname ?></h4>
                    </div>
                   
                </div>
                <div class="col-md-8">
                <?php
				      if(isset($_SESSION['error'])){
						  $msg = $_SESSION['error'];
                        echo "
                          <div class='alert alert-info'>
                  <button type='button' aria-hidden='true' class='close'>
                    <i class='now-ui-icons ui-1_simple-remove'></i>
                  </button>
                  <span>$msg.</span>
                </div>";
						  unset($_SESSION['error']);
					  }
				    
				 
				 ?>
			
            
            <?php  
			  
        $check_inv = "SELECT * FROM client_investment2 WHERE depositor='$user_id' AND payment_confirmed='no' AND completed='no'";
                                 $r = mysqli_query($cxn, $check_inv);
                                 if(mysqli_num_rows($r) > 0){
                                   while($row=mysqli_fetch_assoc($r)){
                                   extract($row);
                                   
      
      
      ?>
        <div class="row mt-3">
           <div class="col-md-6 grid-margin stretch-card">
            <div class="col-sm-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pending Deposit</h4>
                        <p>You have a pending deposit of <b>N<?php echo $deposit_amount ?></b>. Kindly make payment and upload a proof of payment OR Click below to cancel investment request.</p>
                         
                        <a href="processupdate.php?cancel=<?php echo $transid ?>" class="btn btn-danger btn-lg btn-block">CANCEL REQUEST</a>
                        <?php
                            
                        ?>
                        <a href="processupdate.php?cancel=<?php echo $transid ?>" class="btn btn-danger btn-lg btn-block">CANCEL REQUEST</a>
                        
                    </div>
                  </div>
              </div>
          </div>
    
          
        </div>
    <?php
    
                                   }
                                 }else{
    ?>
    <div class="row mt-3">
           <div class="col-md-6 grid-margin stretch-card">
            <div class="col-sm-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">No Records Found</h4>
                        <p>You dont have any pending investment request</p>
                         <a href="invest.php" class="btn btn-warning btn-lg btn-block">DEPOSIT FUNDS</a>
                        
                    </div>
                  </div>
              </div>
          </div>
    
          
        </div>
                                 <?php }
                                 ?>

              
              
            </div>
        </div>
        <div class="row">
       
            
         
          
        </div>
      </div>
      <?php include("footer.php"); ?>