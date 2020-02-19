<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>

<?php 

    if (isset($_GET['resetpw'])) {
    $ID = $_GET['resetpw'];
    $resetpw = true;
    $rec01 = mysqli_query($db, "SELECT * FROM user_details WHERE RECORD_ID=$ID");

    if (isset($rec01)== 1) {
      $n = mysqli_fetch_array($rec);
      $Username = $n['USER_LOGIN_NAME'];
      $Password = my_simple_crypt($n['USER_PASSWORD'],'d');
           
    }
  }
?>

<!DOCTYPE html>

<html>
<head>
	<title> Nikro Management Services </title>
	<link rel="stylesheet" type="text/css" href="style.css">



  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
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
<body>








    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./icons.html">
              <i class="nc-icon nc-diamond"></i>
              <p>Audit</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="nc-icon nc-pin-3"></i>
              <p>Tax</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
           <a href="./list.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Clients</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Opportunities</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
            <!--   <i class="nc-icon nc-spaceship"></i> -->
             <!--  <p>Upgrade to PRO</p> -->
            </a>
          </li>
        </ul>
      </div>
    </div>









	<form method="post" action="php_code.php" style=" margin-left: 402px;" >

		<input type="hidden" name="ID" value="<?php echo $ID; ?>">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="Username" value="<?php echo $Username; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="Password" value="<?php echo $Password; ?>">
		</div>


    </div>

		<div class="input-group">
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>

		</div>

      <?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
      </div>
  <?php endif ?>
	</form>
</div>
</body>

</html>