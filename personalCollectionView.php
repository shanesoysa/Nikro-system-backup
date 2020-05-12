<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>

<!-- Check git how -->
<!DOCTYPE html>
<html>
<head>
	<title>Nikro Management Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script type="text/javascript" src="js/nav.js"></script>

  
  <style type="text/css">
    .alert {
      padding: 20px;
      background-color: #A4FFBF;
      color: black;
      width: 40%;
      margin-left: auto;
      margin-right: auto;
      }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
      }

    .closebtn:hover {
      color: black;
      }  
  </style>

</head>
<body>
<div>
  <?php include 'navigation.php';?>
  <script type="text/javascript">
    document.getElementById('navmain').style.height = '12px';
  </script>
</div>

<script type="text/javascript">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong>'
</script>

  <?php if (isset($_SESSION['message'])): ?>
          <?php 
          echo ' <div class="alert">';
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          echo '</strong></div>';
          ?>
  <?php endif ?>

 <!--  <?php if (isset($_SESSION['message'])): ?>
          <?php 
          echo "<script type='text/javascript'>alert('Details Updated');</script>";
          ?>
  <?php endif ?> -->
<?php $results = mysqli_query($db, "SELECT * FROM user_details WHERE USER_STATUS!='4' "); ?>

<div class="container">
  <h1>Personal Information</h1>
      <div class="text-right">
      <a href="personalCollection.php" class="btn btn-primary" id="">Add New Worker</a>
      <br>
      </div>
<div class="overflow-auto">
<div class="mt-l-2">
<div class="table-responsive-sm-6">
      <table class="table table-striped" style="font-size:15px;">
      	<thead>
      		<tr scope="row">
      			<th scope="col" width="0">Username</th>
            <th scope="col" width="0">Address</th>
            <th scope="col" width="0">Email</th>
            <th scope="col" width="0">Mobile</th>
            <th scope="col" width="0">NIC</th>  			
      			<th  scope="col" width="0">Action</th>
      		</tr>
      	</thead>
      		<tr scope="row">
      			<td>New User</td>
            <td>Katunayake</td>
            <td>newuser@gmail.com</td>
            <td>0777678678</td>
            <td>992345783V</td>
      			<td>
      				<a  class="btn btn-success btn-sm" id="N021502" >User Full Info</a>
      			</td>
            <td>
              
              <a  class="btn btn-success btn-sm" id="N021503" >Remove</a>
              
            </td>
      		</tr>
      	 
      </table>
</div>
</div>
</div>

</div>
</div>
</div>

</body>
</html>