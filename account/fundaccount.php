<?php

include_once("auth.php");

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
                    <div class="card-body">
                    <p class="font-weight-normal mb-2 text-muted text-white"><?php echo date("Y-m-d H:i:s"); ?></p>
			        <p><span style='color:#f98604'>To start trading and investing, you have to add funds to your account. </span></p>
                    
                    <div class="card ">
                      <div class="card-body bg-danger">
                          <h4 class="card-title text-center text-white">Account Balance</h4>
                          
                          <h4 class="text-white font-weight-bold mb-2 text-center">N<?php echo $account_balance ?></p></h4>
                          
                                           
                    
                       
                      </div>
                    </div>
                    </div>
                </div>
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fund Account</h4>
                  <p class="card-description text-dark">
                    Kindly note that your default deposit and withdrawal method is selected by default. 
                    To use a different method, please go to your settings and update your withdrawal and deposit method.
                  </p>
				  <form action="processupdate.php" method="post">
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
                  <div class="form-group">
				  <label>Deposit Method</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
					  
                      <select name="method" class="form-control .form-control-lg">
                        <?php
                            if($method == "bank"){
                        ?>
						
						
                        <option value="bank">Bank Transfer</option>
                  <?php
                            }elseif($method == "wallet"){
                  ?>
                          <option value="wallet">Wallet Deposit</option>
                  <?php
                            }elseif($method == "momo"){
                  ?>
                  <option value="momo">Momo Deposit</option>
                  <?php
                            }else{
                  ?>
                  <option value="bank">Bank Transfer</option>
                  <option value="wallet">Wallet Deposit</option>
                  <option value="momo">Momo Deposit</option>
                  <?php
                            }
                  ?>
					</select>
                    </div>
                  </div>
                  <div class="form-group">
				  <label>Amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white bg-danger">&#8358;</span>
                      </div>
					   
                      <input type="text" name="amount" class="form-control .form-control-lg" aria-label="Amount (to the nearest dollar)" required>
					  <input type="hidden" name="payer" class="form-control" aria-label="<?php echo $userid ?>">
                      <div class="input-group-append">
                        <span class="input-group-text text-white bg-danger">.00</span>
                      </div>
                    </div>
                  </div>
                   <div class="form-group error">
                       <p><span style="color:#9c0">Risk Warning:</span>Trading Gold, Forex, Futures and CFDs can result in the loss of your entire capital. By clicking 'Proceed', you agree to our Terms and Conditions, Risk Disclosure Statement and Client Agreement before using our services and ensure that you understand the risks involved. 
                       </p>
                   </div>
				  <div class="form-group">
				    <input type="submit" name="deposit" class="btn btn-danger btn-lg btn-block" value="PROCEED TO PAYMENT &raquo;&raquo;" />
				  
				  </div>
				  </form>
                  
                 
                  
                </div>
              </div>
              
              
            </div>
        </div>
        <div class="row">
       
            
         
          
        </div>
      </div>
      <?php include("footer.php"); ?>