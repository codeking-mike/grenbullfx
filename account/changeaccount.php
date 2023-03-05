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
 
  <style>
    html{
      overflow: scroll !important;
    }
   
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
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
              <h5 class="title">Deposit & Withdrawal Method</h5>
              <p>Choose your preferred deposit and withdrawal method. 
                This will determine your transaction and trading currency </p>
              </div>
              <div class="card-body">
                <form action="changemethod.php" method="post">
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
                     <div class="col-md-6">
                         <div class="form-group">
                         <label>Choose Deposit and Withdrawal Method</label>
                         <select name="method" class="form-control" id="select" onchange="hideShow()">
                            <option value="wallet">Crypto Wallet</option>
                            <option value="momo" selected>Momo Account</option>
                           

                         </select>
                         
                      
                         </div>
                      </div>
                      <div id="wallet" class="col-md-6 myDiv">
                          <div class="form-group">
                            <label>Crypto Wallet</label>
                            <select name="type" class="form-control" >
                                <option value="btc">Btc Wallet</option>
                                <option value="eth">Eth Wallet</option>
                                <option value="usdt">USDT Wallet</option>

                            </select>
                         
                      
                          </div>
                          <div class="form-group">
                            <label>Wallet Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $wallet_address ?>">
                          
                          </div>

                      </div>
                      <div id="momo" class="col-md-6 myDiv">
                          
                          <div class="form-group">
                            <label>Momo Name</label>
                            <input type="text" name="momo_name" class="form-control"  value="<?php echo $momo_name ?>">
                          
                          </div>
                          <div class="form-group">
                            <label>Momo Number</label>
                            <input type="text" name="momo_no" class="form-control" value="<?php echo $momo_no ?>">
                          
                          </div>
                          <div class="form-group">
                            <label>Network / Carrier</label>
                            <input type="text" name="network" class="form-control" value="<?php echo $network ?>">
                          
                          </div>

                      </div>
                      
                         
                     </div>
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" style="padding:30px">
                            <input type="submit" name="update" class="form-control btn btn-danger" value="Update" style="color:#fff;background:#f98604" />
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="#">
                  GrenBullFxGold
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, All rights reserved</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

document.getElementById("momo").style.display='block';
          document.getElementById("wallet").style.display='none';
          

function hideShow(){
    
    var optionValue = document.getElementById("select").value;

    if(optionValue == 'momo'){
        
         document.getElementById("momo").style.display='block';
          document.getElementById("wallet").style.display='none';
    }else if(optionValue == 'wallet'){
        document.getElementById("momo").style.display='none';
          document.getElementById("wallet").style.display='block';
          
    }else{
         document.getElementById("momo").style.display='block';
          document.getElementById("wallet").style.display='none';
    }
    
}
</script>

</body>

</html>