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
                    <div class="card-body">
                    <p class="font-weight-normal mb-2 text-muted text-white"><?php echo date("Y-m-d H:i:s"); ?></p>
			        <p><span style='color:#f98604'>To complete your deposit kindly use the information below to make payment 
                    and upload a screenshot of payment for verification and confirmation. </span></p>
                    
                    
                    </div>
                </div>
                <div class="col-md-8">

			
            
            <div class="card">
              <div class="card-header">
                <h4>Momo Wallet Deposit</h4>
                <p>Kindly deposit N<?php echo $amount ?> into the Momo Account below.</p>
              </div>
            
              <div class="card-body">
			  
					<div class="row">
					    <?php
				  
				  $check_inv = "SELECT * FROM central_account WHERE fund_type='momo'";
						$res_inv =mysqli_query($cxn, $check_inv);
						
							while($row = mysqli_fetch_assoc($res_inv)){
							extract($row);
					?>
					<div class="col-md-12">
                  <div class="form-group" style='padding:5px;box-shadow:3px 5px #f2f2f6'>
				  <p>Momo Name:<br>
				  <input type="text" value="<?php echo $momo_name ?>" style="width:100%;background:#f98604;color:#fff" readonly /><br>
				  
				  </p>
                  <p>Momo Number:<br>
				  <input type="text" id="link" value="<?php echo $momo_number ?>" style="width:100%;background:#f98604;color:#fff" readonly /><br>
				  <button id="copy" onclick="copyLink2()" class="btn btn-info">COPY</button>
				  </p>
                  <p>Momo Network:<br>
				  <input type="text" value="<?php echo $network ?>" style="width:100%;background:#f98604;color:#fff" readonly /><br>
				  
				  </p>
				  
				  
				  
                  </div>
                  </div>
				<?php }  ?>
			<p style="background:#fff;padding:20px;color:#000;margin:15px"><span style="color:#f00">Note: </span> Only send Bitcoin to the above address. Sending any other coin could lead to permanent loss. After payment kindly upload a screen shot for faster confirmation.</p>
				<form action="processupdate.php" method="post"  enctype="multipart/form-data">
                      <div class="col-md-12">
                        <div class="form-group">
                      <label>Upload Screenshot</label>
                      <input type="file" name="pop" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                        <input type="hidden" name="amt" value="<?php echo $_GET['amt']; ?>" />
                         <input type="hidden" name="trans" value="<?php echo $_GET['trans']; ?>" />
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-success btn-icon-text" type="button">
						  <i class="mdi mdi-upload btn-icon-prepend"></i>  Choose File</button>
                        </span>
                      </div>
                    </div>
                     </div>
                   
                     
               </div>
			 <div class="card-footer">
                <button type="submit" name="momo_proof" class="btn btn-fill btn-warning">UPLOAD SCREEN SHOT</button>
              </div>
			  
            </div>
            </form>
        </div>
            
        
           </div>
		
	  
	  
        
          </div>
              
              
            </div>
        </div>
        <div class="row">
       
            
         
          
        </div>
      </div>
      <?php include("footer.php"); ?>