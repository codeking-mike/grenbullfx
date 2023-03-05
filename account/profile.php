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
    html, body{
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
                <h5 class="title" style="padding:3rem">Edit Profile</h5>
              </div>
              <div class="card-body" style="padding:3rem">
                <form action="processupdate.php" method="post" style="">
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
                    <div class="row">
                    <a href="#">For account security your email address is not editable</a>
                    </div>
                  <div class="row">
                    
                    <div class="col-md-5 pr-1">
                    
                      <div class="form-group">
                        <label>Email (disabled)</label>
                        <input type="email" type="email" class="form-control" disabled="" placeholder="Company" value="<?php echo $user_email ?>">
                      
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>User ID</label>
                        <input type="text" name="userid" disabled="" class="form-control" placeholder="Username" value="<?php echo $user_id ?>">
                      </div>
                    </div>
                    </div>
              
                  
                  <h5>Personal Details</h5>
                  <hr />
                  <div class="row">
                    
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $firstname ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input text="text" name="lname" class="form-control" value="<?php echo $lastname ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input text="text" name="phone" class="form-control" value="<?php echo $phone_no ?>">
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $city ?>">
                      </div>
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $country ?>">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" name="update" class="form-control btn btn-danger" value="Update Information" style="color:#fff;background:#f98604" />
                        </div>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
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



</body>

</html>