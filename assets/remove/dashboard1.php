<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    NMS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
     <div class="navbar-toggle">

    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="assets/img/nikro.png">
          </div>
        </a>
        <a href="http://www.nikro.lk" class="simple-text logo-normal">
          NMS
          <div class="logo-image-big">
           
          </div>
        </a>
      </div>
      
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php" id="N011501">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li >
            <a href="./list.php" id="N011502">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->

      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">

        <div class="container-fluid">

          <div class="navbar-wrapper">

            <div class="navbar-toggle">

                     <form method='post' action="php_code.php">
            
                    <button name="logout" class="btn btn-info" id="N011301">Logout</button>
                    </form>

              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1">
                 

                </span>
                <span class="navbar-toggler-bar bar2">
                  
                </span>
                <span class="navbar-toggler-bar bar3">
                  
                </span>
              </button>
            </div>
           
          </div>
                    <?php if (isset($_SESSION['name'])): ?>
                    <div class="container-fluid" style=" margin-right: -100px; margin-top: 20px;">
                    <h2>   
                      <a href="oneusermanagement.php?useredit=<?php echo $_SESSION['loginid']; ?>" id="N011501">
                      <?php
                          $UserIDForName=$_SESSION['loginid'];
                        	$userDisplayNameQuery = mysqli_query($db, "SELECT USER_DISPLAY_NAME FROM user_p_details WHERE RECORD_ID='$UserIDForName'");          
                          
                          if(isset($userDisplayNameQuery)==1){
                            $n = mysqli_fetch_array($userDisplayNameQuery);
                            $userDisplayName = $n['USER_DISPLAY_NAME'];
                          }

                          echo $userDisplayName;

                          endif
                          
                        ?>
                       
                    
                      </a>
                    </h2>
                    </div>
                        <br>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
 
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
               
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <form method='post' action="php_code.php">
            
                    <button name="logout" class="btn btn-info" id="N011301">Logout</button>
                    </form>
    
       

                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <!-- <i class="nc-icon nc-settings-gear-65"></i> -->
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->

<br>
<br>
  <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacity</p>
                      <p class="card-title">150GB
                        <p>
                    </div>
                  </div>
                </div>
              </div>

      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">

          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->

  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
