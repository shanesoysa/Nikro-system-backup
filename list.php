<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>


<!-- Check git how -->
<!DOCTYPE html>
<html>
<head>
	<title>List of users</title>
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
            <img src="assets/img/nikro.png">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          NMS
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
            <a href="./list.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>

        </ul>
      </div>
    </div>




<?php $results = mysqli_query($db, "SELECT * FROM user_details WHERE USER_STATUS!='4' "); ?>
<br>
<h1 style=" margin-left: 550px">User Profile</h1>
<a href="usermanagement.php" class="new_btn" style=" margin-left: 1110px ;">Add New User</a>
<br><br><br>


<table style=" width:max-content; font-size: 11px; margin-left: 290px; margin-top: -20px; ">
	<thead>
		<tr>
			<th>Username</th>
      <th>User Created Time</th>
      <th>User Status</th>
      <th>User Last Login</th>
      <th>User Last Operation</th>  			
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['USER_LOGIN_NAME']; ?></td>
      <td><?php echo $row['USER_CREATED_TIME']; ?></td>
      <td><?php echo $row['USER_STATUS']; ?></td>
      <td><?php echo $row['USER_LASTLOGIN_DATETIME']; ?></td>
      <td><?php echo $row['USER_LASTOPERATION_DATETIME']; ?></td>
			<td>
				<a href="usermanagement.php?edit=<?php echo $row['RECORD_ID']; ?>" class="edit_btn" >User Details</a>
			</td>
      <td>
        
        <a id="reset_password" href="usermanagement.php?resetpw=<?php echo $row['RECORD_ID']; ?>" class="edit_btn" >Reset password</a>
        
      </td>
      <td>
        <a href="usermanagement.php?userst=<?php echo $row['RECORD_ID']; ?>" class="edit_btn" >User Status </a>
      </td>
			<td>
				<a href="php_code.php?del=<?php echo $row['RECORD_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
		
		 
	
</table>





</body>
</html>