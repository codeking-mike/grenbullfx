<?php

include_once("auth.php");

if($method == ''){
  $_SESSION['error'] = "Your profile is not complete! Kindly add a deposit and withdrawal method.";
  header("location:changeaccount.php");
  exit(0);
}

$check_deposit = "SELECT pop FROM client_investment2 WHERE depositor='$user_id' AND payment_confirmed='no'";
$check_result = mysqli_query($cxn, $check_deposit);
if(mysqli_num_rows($check_result) > 0){
    extract(mysqli_fetch_assoc($check_result));
    
    if($pop == ''){
    
    header("location:cancelinvestment.php");
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}


  </style>
 
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <?php include("sidebar.php"); ?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <?php include("navbar.php"); ?>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <div class="container">
            
        </div>
         
      </div>
      <div class="content">

      <?php
		
		$check_msg = "SELECT * FROM client_withdrawals WHERE receiver='$user_id' AND completed='no'";
																   $r = mysqli_query($cxn, $check_msg);
																   if(mysqli_num_rows($r) > 0){
																	    $num=mysqli_num_rows($r);
																	   
			  
		?>
		<div class="row">
              
            <div class="col-xl-9 d-flex grid-margin stretch-card">
                <div class="card alert-info">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-5">
                          <p>You have <?php echo $num ?> withdrawal requests pending. Go to withdrawal page for more details</p>
                        </div>
                        <div class="col-lg-7">
                         <a href="withdrawal.php" class="btn btn-warning btn-lg btn-block">Withdrawals (<?php echo $num ?>)
                         <i class="now-ui-icons business_money-coins"></i>
                    </a>
                        </div>
                      </div>
                      
                        
                    </div>
                  </div>
				  
            </div>
        </div>
        <?php 
			}
		 ?>
        <?php
		
		$check_msg = "SELECT * FROM notifications WHERE receiver='$user_id' AND status='0'";
																   $r = mysqli_query($cxn, $check_msg);
																   if(mysqli_num_rows($r) > 0){
																	    $num=mysqli_num_rows($r);
																	   
			  
		?>
		<div class="row">
              
            <div class="col-xl-9 d-flex grid-margin stretch-card">
                <div class="card alert-success">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-5">
                          <p>You have <?php echo $num ?> unread messages. Go to your inbox to view and reply message</p>
                        </div>
                        <div class="col-lg-7">
                         <a href="inbox.php" class="btn btn-danger btn-lg btn-block">New Messages
                         <i class="now-ui-icons ui-1_email-85"></i>(<?php echo $num ?>)
                    </a>
                        </div>
                      </div>
                      
                        
                    </div>
                  </div>
				  
            </div>
        </div>
        <?php 
			}
		 ?>
      
        <div class="row">
            
            
        <div class="col-lg-12">
                <div class="card card-chart">
            
                
                <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
  {
  "symbols": [
    {
      "description": "GOLD",
      "proName": "OANDA:XAUUSD"
    },
    {
      "description": "BTC",
      "proName": "BINANCE:BTCUSDT"
    }
  ],
  "colorTheme": "light",
  "isTransparent": false,
  "showSymbolLogo": true,
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
        
                </div>
            </div>
          <div class="col-lg-12">
            <div class="card card-chart" style="height:400px">
              <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_b1ea7"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
   "height": "350",
  "symbol": "OANDA:XAUUSD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_b1ea7"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
              
            </div>
          </div>
              <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-3 pt-2">
                  <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                  <i class="now-ui-icons business_bank" style="font-size:2rem"></i>
                  </div>
                    <div class="text-end pt-1">
                      <h4 class="text-sm mb-0 text-capitalize text-center">Wallet Balance</h4>
                      <h3 class="mb-0 text-center text-danger">
                        
                      <?php
                      if($method == "momo"){
                        echo $account_balance . "CFA";
                      }else{
                        echo "USD" . $account_balance;
                      }
                       ?></h3>
                    </div>
                  </div>
                  <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    <a href="fundaccount.php" style="width:30%" class="btn btn-warning"> <i class="now-ui-icons arrows-1_minimal-up"></i> &nbsp;&nbsp;Deposit</a>
                    <a href="withdraw.php" style="width:30%" class="btn btn-danger"><i class="now-ui-icons arrows-1_minimal-down"></i> &nbsp;&nbsp;Withdraw</a>
                    <a href="invest.php" style="width:30%" class="btn btn-warning"><i class="now-ui-icons arrows-1_minimal-right"></i> &nbsp;&nbsp;Invest</a>
                  
                  </div>
                </div>
              </div>
               
                    
                
            
        
          
          
          
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Investment History</h5>
                <h4 class="card-title">Active Investments</h4>
              </div>
              <div class="card-body ">
                

                              <?php  

                                    
                $today = time();
                $check_inv = "SELECT * FROM client_investment WHERE payer='$user_id' AND completed='no'";
                $r = mysqli_query($cxn, $check_inv);
                if(mysqli_num_rows($r) > 0){
                while( $row=mysqli_fetch_assoc($r)){
                extract($row);




                ?>
                <div class="card">

                <div class="container">
                    <h4><b>Amount Invested: <span class="text-danger"><?php echo $fund_amount ?>CFA </span></b></h4>
                    <p>Investment Date: <strong> <?php echo $fund_date ?></strong> <br />
                  Investment Plan: <strong> <?php echo $plan ?></strong> <br />
                  Profits: <strong class="text-success"> <?php echo $expected_returns ?></strong> <br />
                        
                  </p>
                  <?php
                  $exp_date = strtotime($expected_date);
                  if($today > $exp_date){
                ?>
                <p>
                <a href="withdrawtowallet.php?fd=<?php echo $fund_id ?>" class="btn btn-warning">Withdraw to Wallet </a>
                </p>   
                    <?php
                    }else{

                    ?>
                   
                 
                  <p>Withdrawal Date: <strong class="text-danger"> <?php echo $expected_date ?></strong>
                  <?php
                  }

                  ?>
                  
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
      <?php include("footer.php"); ?>