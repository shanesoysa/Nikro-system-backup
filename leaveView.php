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

<?php $results = mysqli_query($db, "SELECT * FROM leave_process"); ?>

<div class="container">
  <h1>Leave Information</h1>
    <input id="myInput" type="text" placeholder="Search..">
      <div class="text-right">
      <!-- <a href="personalCollection.php" class="btn btn-primary" id="">Add New Worker</a> -->
      <br>
      </div>
<div class="overflow-auto">
<div class="mt-l-2">
<div class="table-responsive-sm-6">
      <table class="table table-striped" style="font-size:15px;">
      	<thead>
      		<tr scope="row">
      			<th scope="col" width="0">Employee No</th>
            <th scope="col" width="0">Name</th>
            <th scope="col" width="0">Date</th>
            <th scope="col" width="0">Type</th>
            <th scope="col" width="0">From</th>
            <th scope="col" width="0">To</th>  			
            <th scope="col" width="0">Status</th>
            <th scope="col" width="0">View</th>
      		</tr>
      	</thead>
        <tbody id="myTable">
          <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr scope="row">
            <td><?php echo $row['empid']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['applydate']; ?></td>
            <td class="text-center"><?php echo $row['leavetype']; ?></td>
            <td><?php echo $row['leavefrom']; ?></td>
            <td><?php echo $row['leaveto']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
            <a href="leaveviewform.php?recordid=<?php echo $row['recordid']; ?>" class="btn btn-success btn-sm" id="N021502" >view</a></td>
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