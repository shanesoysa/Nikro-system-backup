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
          echo ' <div class="alert" id="green">';
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          echo '</strong></div>';
          ?>
  <?php endif ?>



<?php $results = mysqli_query($db, "SELECT * FROM user_details WHERE USER_STATUS!='4' "); ?>

<div class="container">
 <h1>Reset Password</h1>
<div class="form group">
  <input id="myInput" type="text" placeholder="Search..">
</div>

<div class="overflow-auto">
<div class="mt-sm-2">
<div class="table-responsive-sm-6">
      <table class="table table-striped" style="font-size:15px;">
      	<thead>
      		<tr scope="row">
      			<th scope="col" width="0">Username</th>
            <!-- <th scope="col" width="0">User Created Time</th>
            <th scope="col" width="0">User Status</th> -->
            <th scope="col" width="0">User Last Login</th>
            <!-- <th scope="col" width="0">User Last Operation</th>  --> 			
      			<th  scope="col" width="0">Action</th>
      		</tr>
      	</thead>
      	<tbody  id="myTable">
      	<?php while ($row = mysqli_fetch_array($results)) { ?>
      		<tr scope="row">
      			<td><?php echo $row['USER_LOGIN_NAME']; ?></td>
         <!--    <td><?php echo $row['USER_CREATED_TIME']; ?></td>
            <td class="text-center"><?php echo $row['USER_STATUS']; ?></td> -->
            <td><?php echo $row['USER_LASTLOGIN_DATETIME']; ?></td>
           <!--  <td><?php echo $row['USER_LASTOPERATION_DATETIME']; ?></td> -->
    
            <td>
              
              <a href="usermanagement.php?resetpw=<?php echo $row['RECORD_ID']; ?>" class="btn btn-success btn-sm" id="N021503" >Reset password</a>
              
            </td>

      			</td>
      		</tr>
      	<?php } ?>
        </tbody>	 
      </table>
</div>
</div>
</div>

</div>
</div>
</div>

  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



</body>
</html>