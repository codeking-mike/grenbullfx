<?php
include("auth.php");
if(isset($_GET['trans'])){
	$trans = $_GET['trans'];
	mysqli_query($cxn, "DELETE FROM tbl_investments2 WHERE transid='$trans'");
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../aassets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $fullname ?>| Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
 <style>
		   
		
		.modal-body table{
      position:relative;
      width:100%;
      padding:2px;
  }
  .modal-body tr{
      width:100%;
      border:1px solid #888;
  }
  .modal-body tr{
      padding:2px;
      border-left:1px solid #888;
  }
 @media (max-width: 991px)
.table-responsive {
    width: 100%;
    margin-bottom: 15px;
    border: 1px solid #dddddd;
    overflow-x: scroll !important;
    overflow-y: scroll !important;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    -webkit-overflow-scrolling: touch;
}

</style>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("searchgiver.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
    
});
</script>
  
  
  
</head>

<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../props/img/sidebar-1.jpg">
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
            PROVIDUS
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
            
              <?php
            if(isset($_SESSION['error'])){
				$msg=$_SESSION['error'];
        
        ?>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <p class="card-category" style="padding:10px;margin-bottom:20px"><?php echo $msg ?></p>
                </div>
              </div>
           </div>
        <?php
        
        unset($_SESSION['error']);
					}
        
        ?>
          <div class="row">
		  <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success" style="background:#000066 !important">
				  <h4 class="card-title">RE-INVESTORS</h4>
                  <p class="card-category">Current Date : <?php echo date("Y-m-d H:i:s") ?></p>
                </div>
                <div class="card-body table-responsive">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          SN
                        </th>
						<th>
                          Username
                        </th>
                        <th>
                         Amount
                        </th>
						<th>
                         Action
                        </th>
						
                        
                      </thead>
                    <tbody>
                      <?php
							$sq = "SELECT * FROM tbl_investments2 WHERE confirmed='no' AND fulfilled='no' ORDER BY id ASC";
							$rs = mysqli_query($cxn, $sq);
							$n=1;
							while($row = mysqli_fetch_assoc($rs)){
								extract($row);
								echo "<tr>
								        <td>$n</td>
										<td>$payer</td>
										<td>$amount_invested</td>
										<td><a href='invest2.php?v2=$id'>VIEW POP</a></td>
									 </tr>";
								$n++;
							}
							
					  
					  
					  
					  ?>                   
						
						
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
			
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6">
              
            </div>
			<!-- view payment details of user-->
<?php
 if(isset($_GET['v2'])){
	 $trs = $_GET['v2'];
	 $qry2 = "SELECT payer, pop, amount_invested FROM tbl_investments2 WHERE id='$trs'";
     $fm = mysqli_query($cxn, $qry2);
	 while($rw = mysqli_fetch_assoc($fm)){
		 extract($rw);
	 }
                        				   

?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#000066;padding:10px">
          <h5 class="modal-title" style="color:#fff">View POP and Confirm User Payment.</h5>
          
        </div>
                                                <div class="modal-body">
                                                  <form action="process_request.php" method="post">
                                                      <p>
                                                      <img src="../user/act_pop/<?php echo $pop ?>" height="300" width="250" />
                                                      </p>
													 <p> Username: <?php echo $payer ?> </p>
													 <p> Amount: <?php echo $amount_invested ?> </p>
													   <input type="hidden" name="trans" value="<?php echo $trs ?>" />
													   <input type="hidden" name="amount" value="<?php echo $amount_invested ?>" />
                                                        <input type="hidden" name="user" value="<?php echo $payer ?>" />
                                                      <input type="submit" name="delete2" value="DELETE REQUEST" style='text-decoration:none;color:white;background:#990000;padding:6px 12px;font-size:21px'>  
													  <input type="submit" name="confirm2" value="CONFIRM PAYMENT" style='text-decoration:none;color:white;background:#339900;padding:6px 12px;font-size:21px'>
                                                  </form>
                                                </div>
                                                <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background:#097;color:#fff;padding:10px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <?php
 }
 ?>
  


<!-- End view payment details -->
            
          
          <?php mysqli_close($cxn) ?>
        </div>
      </div>
      
    </div>
  </div>
  <div class="fixed-plugin">
    
  </div>
  <!--   Core JS Files   -->
  <script src="../props/js/core/jquery.min.js"></script>
  <script src="../props/js/core/popper.min.js"></script>
  <script src="../props/js/core/bootstrap-material-design.min.js"></script>
  <script src="../props/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../props/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../props/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../props/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../props/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../props/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../props/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../props/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../props/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../props/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../props/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../props/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../props/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../props/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  
  <!--  Notifications Plugin    -->
  <script src="../props/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../props/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../props/demo/demo.js"></script>
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
  <script>
$(document).ready(function(){
        $("#myModal").modal({backdrop: false});
});
</script>
</body>

</html>