<?php

include_once("auth.php");

function getUserName($id, $c){
    $prep_stmt = "SELECT firstname FROM argent_client_db WHERE user_id= ? ";
    $stmt = $c->prepare($prep_stmt);
    if ($stmt) {
         $stmt->bind_param('s', $id);
         $stmt->execute();
         $stmt->store_result();

            if ($stmt->num_rows == 1) {
            // A user with this username exists
                $stmt ->bind_result($fname);
                $stmt->fetch();

                
   
          }
      }
      return $fname;
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
  <style>
    #link{opacity: 0;}
  </style>
  <script>

   

function copyLink() {
/* Get the text field */
document.getElementById("link").defaultValue = "<?php echo $user_id ?>";

var copyText = document.getElementById("link");

/* Select the text field */
copyText.select();
copyText.setSelectionRange(0, 99999); /*For mobile devices*/

/* Copy the text inside the text field */
document.execCommand("copy");

/* Alert the copied text */
alert("Successful!");
}

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
                    <div class="card">
                        <div class="card-body">
                             <h4 class="card-title text-center">Referrals</h4>
                                <p class="card-description text-dark text-center">
                                    Earn 10% referrals commission when you invite your friends to register and trade with us. <br/>
                                    Use your referal code: <span class="text-success"><strong><?php echo $user_id ?></strong> </span>
                                    <span class="btn btn-warning" onclick="copyLink()"><i class="now-ui-icons files_single-copy-04"></i>Copy</span>
                                </p>
                                <input id='link' type='text' value='<?php echo $user_id ?>' />
                                <?php
                                        if(isset($_SESSION['error'])){
                                            $msg = $_SESSION['error'];
                                            echo "
                                            <div class='alert alert-info'>
                                    <button type='button' aria-hidden='true' class='close'>
                                        <i class='now-ui-icons ui-1_simple-remove'></i>s
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
                        <h4 class="text-sm mb-0 text-capitalize text-center">Referral Balance</h4>
                        <h3 class="mb-0 text-center text-danger">
                            
                        <?php
            
                        $qry = "SELECT amount FROM ref_bonus  WHERE receiver='$user_id'";
                        $res = mysqli_query($cxn, $qry);
                        $r = mysqli_fetch_array($res);
                        extract($r);
                    
                    echo $amount;
                        
                        
            
            
            ?>CFA</h3>
                        </div>
                  </div>
                  <div class="card-footer">
                    <a href="processinvest.php?bn=<?php echo $amount ?>" class="btn btn-warning" style="margin-left:10rem;font-size:1rem">Withdraw Commission &nbsp; <i class="now-ui-icons ui-1_send"></i></a>
                    
                
                 </div>
                  <hr class="dark horizontal my-0">
                 
                </div>
                <div class="card">
                <div class="bg-warning shadow-primary border-radius-lg py-3 pe-1">
                  <h5 class="text-white font-weight-bolder text-center mt-2 mb-0">Referral History</h5>
                  
                  
                </div>
                <div class="card-body">
                        <ul class="list-group">
                        <?php

$sql = "SELECT * FROM argent_client_db WHERE sponsor='$user_id'";
$res = mysqli_query($cxn, $sql);
if(mysqli_num_rows($res) > 0){
while($rw = mysqli_fetch_array($res)){
   extract($rw);


?>
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column alert-warning" style="padding:20px">
                    <h6 class="mb-3 text-sm text-center">Fullname : <?php echo getUserName($user_id, $cxn) ?></h6>
                    <span class="mb-2 text-xs">Date Registered: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $date_joined ?></span></span>
                    
                    </div>
                  
                </li>
<?php
}
}else{


?>
<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <p>You have not invited your friends to join!</p>
                    
                  </div>
                  
                </li>
<?php

}

?>

                </div>

                </div>
                                 
                </div>
                    </div>
                </div>
            </div>
      
     </div>
      <?php include("footer.php"); ?>