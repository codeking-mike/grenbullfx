<?php 
session_start();

if(isset($_GET['refcode'])){
    $code = $_GET['refcode'];
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
    GrenbullFxGold| Open Account
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
    <div class="sidebar" data-color="yellow">
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
                <h4 class="text-white">Create Account</h4>
            <p class="text-white">Open an account in minutes and start investing</p>
                </div>
            </div>
            
        
        </div>
         
      </div>
      <div class="content">
        
        <div class="row">
            <div class="col-lg-12" >
                <div class="card" style="padding:3rem">
                    <div class="card-header">
                    <h5 class="title">Open Account</h5>
                    </div>
                    <div class="card-body">
                    <?php
				      if(isset($_SESSION['error'])){
						  $msg = $_SESSION['error'];
						  echo "<p style='padding:20px;color:#e00;'>$msg</p>";
						  unset($_SESSION['error']);
					  }
					  if(isset($_SESSION['error2'])){
						  $msg = $_SESSION['error2'];
						  echo "<p style='padding:20px;color:#0e0;'>$msg</p>";
						  unset($_SESSION['error2']);
					  }
				    
				 
				 ?>
                        <form action="createaccount.php" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" name="fname" class="form-control"  placeholder="First name" required>
                                </div>
                                </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="lname" class="form-control"  placeholder="Last name" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Phone</label>
                                    
                                    <input type="text" name="phone" class="form-control" placeholder="(+234-902-300-2345)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Email</label>
                                    
                                    <input type="email" name="email" class="form-control" placeholder="(johndoe@xyz.com)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control"  placeholder="" required>
                                </div>
                                </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="pass2" class="form-control"  placeholder="" >
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Country of Residence</label>
                                    
                                    <select name="country" class="form-control" >
                                <option value="benin">Republic of Benin</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Ivory Coast">Ivory Coast</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Mali">Mali</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Sierra Leon">Sierra Leon</option>

                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Referral Code</label>
                                    
                                    <input type="text" name="code" value="<?php 
                                     if(isset($code)){
                                        echo $code;
                                     }
                                    ?>" class="form-control" placeholder="(Optional)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="submit" style="background:#f98604;color:#fff" name="register" class="form-control btn btn-danger" value="Create Account" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="login.php">Already have an account? Login here...</a>
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