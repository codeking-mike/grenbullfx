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
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  width:50%;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}


  </style>
  <script>
    document.getElementById("defaultOpen").click();

    function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
 // Get the element with id="defaultOpen" and click on it

  </script>
  
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
                        <div class="card-header">
                           <h4 class="card-title text-center">Investments</h4>
                        </div>
                        <div class="card-body">
                            <!-- Tab links -->
                            <div class="tab">
                            <button id="defaultOpen" class="tablinks bg-warning" onclick="openCity(event, 'active')">Active Investments</button>
                            <button class="tablinks bg-danger" onclick="openCity(event, 'history')">Investment History</button>
                            
                            </div>
                            <!-- Tab content -->
                            <div id="active" class="tabcontent">
                            <?php  

                    
                                $today = time();
                                $check_inv = "SELECT * FROM client_investment WHERE payer='$user_id' AND completed='no'";
                                $r = mysqli_query($cxn, $check_inv);
                                if(mysqli_num_rows($r) > 0){
                                while( $row=mysqli_fetch_assoc($r)){
                                extract($row);




                                ?>
                            <div class="card">
                                
                                <div class="container">
                                    <h4><b>Amount Invested: <span class="text-danger"><?php echo $fund_amount ?>CFA </span></b></h4>
                                    <p>Investment Date: <strong> <?php echo $fund_date ?></strong> <br />
                                   Investment Plan: <strong> <?php echo $plan ?></strong> <br />
                                   Profits: <strong class="text-success"> <?php echo $expected_returns ?></strong> <br />
                                        
                                  </p>
                                  <?php
                  $exp_date = strtotime($expected_date);
                  if($today > $exp_date){
                ?>
                <p>
                <a href="withdrawtowallet.php?fd=<?php echo $fund_id ?>" class="btn btn-warning">Withdraw to Wallet </a>
                </p>   
                    <?php
                    }else{

                    ?>
                   
                 
                  <p>Withdrawal Date: <strong class="text-danger"> <?php echo $expected_date ?></strong>
                  <?php
                  }

                  ?>
                                </div>
                            </div>

                            <?php
                            }
                        }

                            ?>
                            </div>
                            <div id="history" class="tabcontent">
                            <?php  

                    
$today = time();
$check_inv = "SELECT * FROM client_investment WHERE payer='$user_id' AND completed='yes'";
$r = mysqli_query($cxn, $check_inv);
if(mysqli_num_rows($r) > 0){
while( $row=mysqli_fetch_assoc($r)){
extract($row);




?>
<div class="card">

<div class="container">
    <h4><b>Amount Invested: <span class="text-danger"><?php echo $fund_amount ?>CFA </span></b></h4>
    <p>Investment Date: <strong> <?php echo $fund_date ?></strong> <br />
   Investment Plan: <strong> <?php echo $plan ?></strong> <br />
   Profits: <strong class="text-success"> <?php echo $expected_returns ?></strong> <br />
        
  </p>
  <p>Withdrawal Date: <strong class="text-danger"> <?php echo $expected_date ?></strong>

  
</div>
</div>

<?php
}
}

?>

                            </div>


                             
                                
                               
                               
                                
                        </div>
                    </div>
                </div>
            </div>
      
     </div>
     <script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
      <?php include("footer.php"); ?>