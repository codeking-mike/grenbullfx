<?php

include("auth.php");
 

?>

<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard | Admin</title>
		

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<?php
        function phpAlert($msg) {
           echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }
	  ?>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
		<?php include("header.php"); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include("nav.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<div class="row">
					<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
						
						<p><b>Current Date:</b> <?php echo date("Y-M-d H:i:s"); ?></p>
						</section>
						</div>
					</div>
					<!--
					<div class="row">
						<section class="panel">
								
                               <div class="pricing-table">
							   
							   <div class="col-lg-3 col-sm-6">
								<div class="plan most-popular">
						
										<h3 class="panel-title">Provide Help(PH)</h3>
									
									<p style="padding:20px;background:#fdfdfd !important">You have to provide help before you can start receiving help. Kindly enter your PH amount below.</p>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="post" action="processph.php">
											<div class="form-group">
												<label class="col-md-3 control-label">Enter Amount to PH</label>
												<div class="col-md-6">
						
													<div class="input-group mb-md">
														<span class="input-group-addon">&#8358;</span>
														<select name="amount" class="form-control">
														    <option>5000</option>
															<option>10000</option>
															<option>15000</option>
															<option>20000</option>
															<option>25000</option>
															<option>30000</option>
															<option>35000</option>
															<option>40000</option>
															<option>45000</option>
															<option>50000</option>
															<option>55000</option>
															<option>60000</option>
															<option>65000</option>
															<option>70000</option>
															<option>75000</option>
															<option>80000</option>
															<option>85000</option>
															<option>90000</option>
															<option>95000</option>
															<option>100000</option>
														</select>
														<span class="input-group-addon btn-warning">.00</span>
													</div>
												</div>
												<div class="col-md-6 col-xs-11">
													<input class="btn btn-sm btn-primary" style="padding:10px 20px;font-size:17px !important;" name="ph" type="submit" value="MAKE PH" />
												</div>
											</div>
											
										</form>
									</div>
									</div>
									</div>
									</div>
							</section>
						
					</div> -->

					<!-- start: page -->
					<div class="row">
						
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">User Activation</h4>
														<div class="info">
															<strong class="amount">
															
															<?php  
												 $sql="SELECT * FROM tizeti_db_user WHERE activated='no' ";
												   $result=mysqli_query($cxn, $sql) or die("Error". mysqli_error($cxn));
												   $num = mysqli_num_rows($result);
												   if($num > 0){
													   echo $num;
												   }else{
													  echo "0"; 
												   }
																				   
										   ?>
															
															
															</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" 
														style="text-decoration:none;color:#fff !important;background:#2baab1;padding:10px;font-size:16px" href="activate.php">ACTIVATE USERS</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">All Users</h4>
														<div class="info">
															<strong class="amount">
															
															<?php  
															 $sql="SELECT * FROM tizeti_db_user";
															   $result=mysqli_query($cxn, $sql) or die("Error". mysqli_error($cxn));
															   $num = mysqli_num_rows($result);
															   if($num > 0){
																   echo $num;
															   }else{
																  echo "0"; 
															   }
																				   
															?>
															
															
															</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" 
														style="text-decoration:none;color:#fff !important;background:#2baab1;padding:10px;font-size:16px" href="users.php">VIEW USERS</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-money"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">PHers</h4>
														<div class="info">
															<strong class="amount">
															
															<?php  
												 $sql="SELECT * FROM tbl_investments WHERE merged='no' AND confirmed='no' ";
												   $result=mysqli_query($cxn, $sql) or die("Error". mysqli_error($cxn));
												   $num = mysqli_num_rows($result);
												   if($num > 0){
													   echo $num;
												   }else{
													  echo "0"; 
												   }
																				   
										   ?>
															
															</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" 
														style="text-decoration:none;color:#fff !important;background:#2baab1;padding:10px;font-size:16px" href="ph.php">VIEW PHers</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-money"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">GHers</h4>
														<div class="info">
															<strong class="amount">
															<?php  
															  
												 $sql="SELECT * FROM withdrawals WHERE merged='no'";
												   $result=mysqli_query($cxn, $sql) or die("Error". mysqli_error($cxn));
												   $num = mysqli_num_rows($result);
												   if($num > 0){
													   echo $num;
												   }else{
													  echo "0"; 
												   }
																				   
										   ?>
															
															</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" 
														style="text-decoration:none;color:#fff !important;background:#2baab1;padding:10px;font-size:16px" href="gh.php">VIEW GHers</a>
													</div>
												</div>
											</div>
										</div>
									</section>
									
							
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-money"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">BONUS</h4>
														<div class="info">
															<strong class="amount">
															<?php  
															  
												 $sql="SELECT * FROM bonus_withdrawals WHERE merged='no'";
												   $result=mysqli_query($cxn, $sql) or die("Error". mysqli_error($cxn));
												   $num = mysqli_num_rows($result);
												   if($num > 0){
													   echo $num;
												   }else{
													  echo "0"; 
												   }
																				   
										   ?>
															
															</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" 
														style="text-decoration:none;color:#fff !important;background:#2baab1;padding:10px;font-size:16px" href="bonus.php">VIEW </a>
													</div>
												</div>
											</div>
										</div>
									</section>
									
							
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Merged Users</h4>
														<div class="info">
															<strong class="amount">
											<?php  
												 $sql="SELECT * FROM mergetable WHERE fulfilled='no' ";
												   $result=mysqli_query($cxn, $sql) or die("Error". mysqli_error($cxn));
												   $num = mysqli_num_rows($result);
												   if($num > 0){
													   echo $num;
												   }else{
													  echo "0"; 
												   }
																				   
										   ?>			
															</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" 
														style="text-decoration:none;color:#fff !important;background:#2baab1;padding:10px;font-size:16px" href="mergelist.php">VIEW LIST</a>
													</div>
												</div>
											</div>
										</div>
									</section>
									
							
					</div>
					</div>

					

					
						
						
					</div>
					</div>
					
					<!-- end: page -->
					<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2019. Edge Tech All rights reserved</p>
				</section>
			</div>

			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html>