<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    GrenbullFxGold | Account Login
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

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <?php include("side.php"); ?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <?php include("navbar.php"); ?>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <div class="container" style="padding-bottom:200px">
            <div class="row">
                <div class="col-md-12">
                <h4 class="text-white">Welcome</h4>
            </div>
            </div>
            
        
        </div>
         
      </div>
      <div class="content">
        
        <div class="row">
            <div class="col-lg-12" >
                <div class="card" style="padding:3rem">
                    <div class="card-header">
                        <p>Enter your details to login to your account</p>
                    
                    </div>
                    <div class="card-body">
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
                        <form action="processlogin.php" method="post">
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Email</label>
                                    
                                    <input type="email" name="email" class="form-control" placeholder="(johndoe@xyz.com)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control"  placeholder="" required>
                                </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="forgotpassword.php">Forgot Password?</a>
                                    <div class="form-group">
                                        <input type="submit" name="login" class="form-control btn btn-danger" value="Sign In" style="background:#f98604;color:#fff" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="register.php">Don't have an account? Register</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            
            </div>
            </div>
            
        </div>
        
        <div class="row">
          <div class="col-md-12">
           
          </div>
          
        </div>
      </div>
      <?php include("footer.php"); ?>