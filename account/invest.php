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
                    <div class="card">
                        <div class="card-body">
                             <h4 class="card-title">Invest</h4>
                                <p class="card-description text-dark">
                                    Choose an investment plan below.
                                </p>
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
                                 <form action="processinvest.php" method="post">

                                     <div class="card text-dark d-flex grid-margin stretch-card">
                                        <div class="card-header">
                                           <h4 class="card-title"> <i class="now-ui-icons business_bank bg-warning" style="padding:10px"></i>&nbsp;&nbsp;Flexi Plan</h4>
                                           <p>Invest in our Flexi investment plan and earn 50% returns on your investment in 12 days. Investment
                                            starts from 5,000CFA</p>
                                        </div>
                                         
                                         <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-md-7">
                                                <input type="text" name="amount" class="form-control" style="background:#fff" placeholder="Enter investment amount" required>
                                                <input type="hidden" name="plan" value="flexi" />
                                
                                                </div>
                                                <div class="col-md-8">
                                                <input type="submit" name="invest" class="btn btn-warning text-white" value="Invest" style="width:50%;padding:10px;border-radius:20px">
                                                </div>
                                            </div>
                                              
                                        </div>

                                     </div>

                                </form>
                                <form action="processinvest.php" method="post">

                                     <div class="card text-dark d-flex grid-margin stretch-card">
                                        <div class="card-header">
                                           <h4 class="card-title"> <i class="now-ui-icons business_bank bg-danger" style="padding:10px;color:#fff"></i> Explorer Plan</h4>
                                           <p>Invest in our Explorer Investment plan and earn 100% returns on investment in 25 days. Investment
                                            starts from 5,000CFA</p>
                                        </div>
                                         
                                         <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-md-7">
                                                <input type="text" name="amount" class="form-control" style="background:#fff" placeholder="Enter investment amount" required>
                                                <input type="hidden" name="plan" value="explore" />
                                
                                                </div>
                                                <div class="col-md-8">
                                                <input type="submit" name="invest" class="btn btn-danger text-white" value="Invest" style="width:50%;padding:10px;border-radius:20px">
                                                </div>
                                            </div>
                                              
                                        </div>

                                     </div>

                                </form>
                        </div>
                    </div>
                </div>
            </div>
      
     </div>
      <?php include("footer.php"); ?>