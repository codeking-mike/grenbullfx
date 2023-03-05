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
    <div class="sidebar" data-color="orange">
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
                             <h4 class="card-title text-center">Withdrawals</h4>
                                <p class="card-description text-dark text-center">
                                    Enter withdrawal amount below. 
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
                                <div class="card">
                  <div class="card-header p-3 pt-2">
                  <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                  <i class="now-ui-icons business_bank" style="font-size:2rem"></i>
                  </div>
                    <div class="text-end pt-1">
                      <h4 class="text-sm mb-0 text-capitalize text-center">Available Balance</h4>
                      <h3 class="mb-0 text-center">
                        
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
                 
                </div>
                                 <form action="processinvest.php" method="post">


                                     <div class="card text-dark d-flex grid-margin stretch-card">
                                        
                                         <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-md-7">
                                                <input type="text" name="amount" class="form-control" style="font-size:1rem;background:#fff" placeholder="Enter withdrawal amount" required>
                                                
                                
                                                </div>
                                                <div class="col-md-8">
                                                <input type="submit" name="withdraw" class="btn btn-warning text-white" value="Withdraw Funds" style="width:50%;padding:10px;border-radius:20px;margin-left:150px">
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