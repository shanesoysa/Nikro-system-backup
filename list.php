<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>


<!-- Check git how -->
<!DOCTYPE html>
<html>
<head>
	<title>List of users</title>

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
  <div class="row">
  <div class="col-sm-3">

	<div class="sidebar" data-color="white" data-active-color="danger">
  
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

          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="active ">
            <a href="./list.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>

<div class="col-sm-9">
<?php $results = mysqli_query($db, "SELECT * FROM user_details WHERE USER_STATUS!='4' "); ?>
<br>


<div class="container">
  <h1>User Profile</h1>
<div class="float-right">
<a href="usermanagement.php" class="btn btn-primary">Add New User</a>
<br>
</div>
<div class="overflow-auto">
<div class="mt-l-2">
<div class="table-responsive-sm-6" >
<table class="table table-striped" style="font-size:11px;">
	<thead>
		<tr scope="row">
			<th scope="col" width="20">Username</th>
      <th scope="col" width="20">User Created Time</th>
      <th scope="col" width="20">User Status</th>
      <th scope="col" width="20">User Last Login</th>
      <th scope="col" width="20">User Last Operation</th>  			
			<th  scope="col" width="20">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr scope="row">
			<td><?php echo $row['USER_LOGIN_NAME']; ?></td>
      <td><?php echo $row['USER_CREATED_TIME']; ?></td>
      <td><?php echo $row['USER_STATUS']; ?></td>
      <td><?php echo $row['USER_LASTLOGIN_DATETIME']; ?></td>
      <td><?php echo $row['USER_LASTOPERATION_DATETIME']; ?></td>
			<td>
				<a href="usermanagement.php?edit=<?php echo $row['RECORD_ID']; ?>" class="btn btn-outline-success btn-sm" >User Details</a>
			</td>
      <td>
        
        <a id="reset_password" href="usermanagement.php?resetpw=<?php echo $row['RECORD_ID']; ?>" class="btn btn-outline-success btn-sm" >Reset password</a>
        
      </td>
      <td>
        <a href="usermanagement.php?userst=<?php echo $row['RECORD_ID']; ?>" class="btn btn-outline-success btn-sm" >User Status </a>
      </td>
			<td>
				<a href="php_code.php?del=<?php echo $row['RECORD_ID']; ?>" class="btn btn-danger btn-sm">Delete</a>
			</td>
		</tr>
	<?php } ?>
		
		 
	
</table>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

</body>
</html>