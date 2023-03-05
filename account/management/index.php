<?php
include("auth.php");
//include("fetch.php");





?>
<!DOCTYPE html>
<html lang="en"> 

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <link rel="apple-touch-icon" sizes="76x76" href="../props/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../props/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin | Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <?php
        function phpAlert($msg) {
           echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }
	  ?>
</head>

<body class="">
<?php
					if(isset($_SESSION['error'])){
						$msg=$_SESSION['error'];
						phpAlert($msg);
						unset($_SESSION['error']);
					}

          if(isset($_GET['del'])){
            $del=$_GET['del'];
            phpClear($del);
          
          }
					
		?>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-background-color="yellow" data-image="../props/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <?php include("head.php") ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h3>Dashboard</h3>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          
            <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="card card-stats">
			          <a href="invest.php">
                <div class="card-header card-header-danger card-header-icon">
                  
                  <p class="card-category">Depositors</p>
                  <h3 class="card-title"><?php  
				  
				  
																$query_inv = "SELECT * FROM client_investment2 WHERE payment_confirmed='no'";
																   $r = mysqli_query($cxn, $query_inv);
																   $n = mysqli_num_rows($r);
																	if($n > 0){
																		echo $n;
																	}else{
																		echo "0";
																		
																	}
					  
																   
														   
														   ?>
                    <small></small>
                  </h3>
                </div>
				</a>
                <div class="card-footer">
                  <div class="stats">
                    
                    <a href="invest.php" class='btn btn-warning'>VIEW DEPOSITORS</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="card card-stats">
			  <a href="investmentlist.php">
                <div class="card-header card-header-warning card-header-icon">
                  
                  <p class="card-category">Active Investments</p>
                  <h3 class="card-title"><?php  
				  
				  
																$query_inv = "SELECT * FROM client_investment WHERE completed='no'";
																   $r = mysqli_query($cxn, $query_inv);
																   $n = mysqli_num_rows($r);
																	if($n > 0){
																		echo $n;
																	}else{
																		echo "0";
																		
																	}
					  
																   
														   
														   ?>
                    <small></small>
                  </h3>
                </div>
				</a>
                <div class="card-footer">
                  <div class="stats">
                    
                    <a href="investmentlist.php" class='btn btn-warning'>VIEW INVESTORS</a>
                  </div>
                </div>
              </div>
            </div>
		
            <div class="col-md-6 col-sm-6">
              <div class="card card-stats">
			  <a href="withdrawal.php">
                <div class="card-header card-header-info card-header-icon">
                 
                  <p class="card-category">Withdrawal
                  <h3 class="card-title"><?php  
				  
																$query_inv = "SELECT * FROM client_withdrawals WHERE completed='no' AND type='invest'";
																   $r = mysqli_query($cxn, $query_inv);
																   $n = mysqli_num_rows($r);
																	if($n > 0){
																		echo $n;
																	}else{
																		echo "0";
																		
																	}
					  
																   
														   
														   ?></h3>
                </div>
				</a>
                <div class="card-footer">
                  <div class="stats">
				  <a href='withdrawal.php' class='btn btn-info'> VIEW REQUESTS</a>
                  </div>
                </div>
              </div>
            </div>
			 
			
            
            <div class="col-md-6 col-sm-6">
              <div class="card card-stats">
			   <a href="bonuswithdrawal.php">
                <div class="card-header card-header-success card-header-icon">
                 
                  <p class="card-category">REFERAL BONUS</p>
                  <h3 class="card-title">
					<?php  
					
																$query_inv = "SELECT * FROM client_withdrawals WHERE completed='no' AND type='bonus'";
																   $r = mysqli_query($cxn, $query_inv);
																   $n = mysqli_num_rows($r);
																	if($n > 0){
																		echo $n;
																	}else{
																		echo "0";
																		
																	}
																   

														   ?>	
				  
				  </h3>
                </div>
				</a>
                <div class="card-footer">
                  <div class="stats">
                    <a href="bonuswithdrawal.php" class="btn btn-success" >VIEW BONUSES</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6">
              <div class="card card-stats">
			   <a href="support.php">
                <div class="card-header card-header-danger card-header-icon">
                  
                  <p class="card-category">SUPPORT</p>
                  <h3 class="card-title">
					<?php  
					
																$query_inv = "SELECT * FROM notifications WHERE status='0' AND receiver='Admin'";
																   $r = mysqli_query($cxn, $query_inv);
																   $n = mysqli_num_rows($r);
																	if($n > 0){
																		echo $n;
																	}else{
																		echo "0";
																		
																	}
																   

														   ?>	
				  
				  </h3>
                </div>
				</a>
                <div class="card-footer">
                  <div class="stats">
                    <a href="support.php" class="btn btn-danger" >VIEW MESSAGES</a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
          
        </div>
      </div>

      <div class="row">
		  <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  
				  <h4 class="card-title">Site Stats</h4>
                  <p class="card-category">Current Date : <?php echo date("Y-m-d H:i:s") ?></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    
                    <tbody>
                      <tr>
                        <td><a href="viewusers.php"><b>Total Users</b></a></td>
						<td><?php
						
								$qry = "SELECT * FROM argent_client_db WHERE is_admin='no'";
								$res = mysqli_query($cxn, $qry);
								$n = mysqli_num_rows($res);
								if($n > 0){
									echo $n;
								}else{
									echo "0";
									
								}

						?>
						</td>
                      </tr>
                      
		
                      <tr>
                        <td><a href="#"><b>Cummulative Investments</b></a></td>
						<td>
						<?php
						
								$qry = "SELECT SUM(fund_amount) as total FROM client_investment  WHERE completed='no'";
								$res = mysqli_query($cxn, $qry);
								$r = mysqli_fetch_array($res);
								$sum = $r['total'];
								
								echo $sum;
								
					  
					
					?>
						
						</td>
                      </a></tr>
                      <tr>
                        <td><a href="#"><b>Cummulative Withdrawals</b></a></td>
						<td>
						<?php
						
								$qry = "SELECT SUM(with_amount) as total2 FROM client_withdrawals  WHERE completed='no'";
								$res = mysqli_query($cxn, $qry);
								$r = mysqli_fetch_array($res);
								$sum2 = $r['total2'];
								
								echo $sum2;
					  
					
					?>
						
						</td>
                      </a></tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
      
    </div>
  </div>
  <div class="fixed-plugin">
    
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="./assets/js/plugins/jquery.dataTables.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
<?php 

mysqli_close($cxn);

?>