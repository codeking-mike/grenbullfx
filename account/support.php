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
                
                <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-warning shadow-info border-radius-lg py-3 pe-1" style="padding:5em">
                  <h5 class="text-dark font-weight-bolder text-center mt-2 mb-0">Contact Support</h5>
                  <p>Send us a message if you have any enquiries or if you encounter an error</p>
                  <p><a href="inbox.php" class="text-white text-underline">View Inbox</a></p>
                </div>
              </div>
              <div class="card-body">
              <?php
                        if(isset($_SESSION['error'])){
                            $msg = $_SESSION['error'];
                        
                  ?>
                  <p class="alert alert-warning mb-0" style="color:white"><?php echo $msg ?></p>
                 <?php 
                    unset($_SESSION['error']);
                        }
                    ?>
              
              
                    
                    
                <form role="form" class="text-start" action="processupdate.php" method="post">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Message</label>
                    <textarea name="msg" class="form-control"></textarea>
                    
                  </div>
                  
                  
                  
                  <div class="text-center">
                    <input type="submit" name="support" class="btn btn-warning bg-warning w-100 my-4 mb-2" value="Send Message &raquo;&raquo;" />
                  </div>
                  
                </form>
              </div>
            </div>
                                 
                        </div>
                    </div>
                </div>
            </div>
      
     </div>
     <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64045b4d4247f20fefe40ee0/1gqog9ac1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
      <?php include("footer.php"); ?>