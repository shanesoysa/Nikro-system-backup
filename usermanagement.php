<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>

<?php 
	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$rec = mysqli_query($db, "SELECT * FROM user_details WHERE RECORD_ID=$ID");

		if (isset($rec) == 1) {
			$n = mysqli_fetch_array($rec);
			$Username = $n['USER_LOGIN_NAME'];
			$Password = my_simple_crypt($n['USER_PASSWORD'],'d');
      $Companyid = $n['USER_COMPANY_ID'];
      $Usertype = $n['USER_TYPE'];
      $Usergroup = $n['USER_GROUP'];
      $Userstatus = $n['USER_STATUS'];
			
		}
	}

  elseif (isset($_GET['resetpw'])) {
    $ID = $_GET['resetpw'];
    $update = true;
    $resetpw = true;
    $rec = mysqli_query($db, "SELECT * FROM user_details WHERE RECORD_ID=$ID");

    if (isset($rec) == 1) {
      $n = mysqli_fetch_array($rec);
      $Username = $n['USER_LOGIN_NAME'];
      $Password = my_simple_crypt($n['USER_PASSWORD'],'d');
      $Companyid = $n['USER_COMPANY_ID'];
      $Usertype = $n['USER_TYPE'];
      $Usergroup = $n['USER_GROUP'];
      $Userstatus = $n['USER_STATUS'];
      
    }
  }

    elseif (isset($_GET['userst'])) {
    $ID = $_GET['userst'];
    $update = true;
    $userst = true;
    $rec = mysqli_query($db, "SELECT * FROM user_details WHERE RECORD_ID=$ID");

    if (isset($rec) == 1) {
      $n = mysqli_fetch_array($rec);
      $Username = $n['USER_LOGIN_NAME'];
      $Password = my_simple_crypt($n['USER_PASSWORD'],'d');
      $Companyid = $n['USER_COMPANY_ID'];
      $Usertype = $n['USER_TYPE'];
      $Usergroup = $n['USER_GROUP'];
      $Userstatus = $n['USER_STATUS'];
      
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



    <script type="text/JavaScript"> 

      function validateconfirmpassword() {
        var x = document.getElementById("pw").value;
        var y = document.getElementById("conpw").value;
        if (x != y) {
          alert("Password did not match!");
          return false;

      }
      return true;

    </script>




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
            <a href="./list.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>

        </ul>
      </div>
    </div>






    <?php if($update==false):?>


  <form method="post" name='myform' action="php_code.php" style=" margin-left: 402px;" >

		<input type="hidden" name="ID" value="">
    
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="Username" value="">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="Password" value="">
		</div>

    <div class="input-group">
      <label>Companany ID</label>
      <input type="Number" name="Companyid" value="">
    </div>

    <div class="input-group">
      <label>User Type</label>
      <input type="Number" name="Usertype" value="">
    </div>

    <div class="input-group">
      <label>User Group</label>
      <input type="Number" name="Usergroup" value="">
    </div>

    <div class="input-group">
      
    <div id="userstatus" style="display: none;">
    <label>User Status</label>
    </div>
    <input type="hidden" name="Userstatus" value="">
    <div class="input-group">
    <button class="btn" type="submit" name="save" >Save</button>
     </div>
        
  <?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
      </div>
    </form>
  <?php endif ?>
  


    <?php elseif ($update==true && $resetpw==false && $userst==false):?>

  <form method="post" name='myform' action="php_code.php" style=" margin-left: 402px;" >

    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="Username" value="<?php echo $Username; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="Password" name="Password" value="<?php echo $Password; ?>">
    </div>

    <div class="input-group">
      <label>Companany ID</label>
      <input type="Number" name="Companyid" value="<?php echo $Companyid; ?>">
    </div>

    <div class="input-group">
      <label>User Type</label>
      <input type="Number" name="Usertype" value="<?php echo $Usertype; ?>">
    </div>

    <div class="input-group">
      <label>User Group</label>
      <input type="Number" name="Usergroup" value="<?php echo $Usergroup; ?>">
    </div>

    <div class="input-group">
    <label>User Status</label>
    <input type="Number" name="Userstatus" value="<?php echo $Userstatus; ?>">
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

    <?php elseif ($resetpw==true):?>

     <form method="post" name='myform' action="php_code.php" style=" margin-left: 402px;" onsubmit="return validateconfirmpassword()" >


    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="Username" readonly value="<?php echo $Username; ?>">
    </div>
    <div class="input-group">
      <label>New Password</label>
      <input type="Password" id="pw" name="Password" value="">
    </div>


    <div class="input-group">
     
    <input type="hidden" name="Companyid" value="<?php echo $Companyid; ?>">
    </div>

    <div class="input-group">
      
      <input type="hidden" name="Usertype" value="<?php echo $Usertype; ?>">
    </div>

    <div class="input-group">
      
      <input type="hidden" name="Usergroup" value="<?php echo $Usergroup; ?>">
    </div>

    <div class="input-group">
   
    <input type="hidden" name="Userstatus" value="<?php echo $Userstatus; ?>">
    <div class="input-group">
    <button class="btn" type="submit" name="update" onclick="return validateconfirmpassword()" style="background: #556B2F;" >update</button>

     
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

    <?php elseif ($userst==true):?>

     <form method="post" name='myform' action="php_code.php" style=" margin-left: 402px;" >


    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="Username" value="<?php echo $Username; ?> " readonly>
    </div>
    <div class="input-group">
    
      <input type="hidden" name="Password" value="<?php echo $Password; ?>">
    </div>

    <div class="input-group">
      
      <input type="hidden" name="Companyid" value="<?php echo $Companyid; ?>">
    </div>

    <div class="input-group">
      
      <input type="hidden" name="Usertype" value="<?php echo $Usertype; ?>">
    </div>

    <div class="input-group">
      
      <input type="hidden" name="Usergroup"  value="<?php echo $Usergroup; ?>" >
    </div>

    <div class="input-group">

    <label>User Status</label>
    <input type="text" name="Userstatusdisplay" value="<?php 

    if($Userstatus==0){
    echo "Never Logged in ";
    }
    elseif($Userstatus==1){
    echo "Active";
    }
    elseif($Userstatus==2){
    echo "Locked";
    }
    elseif($Userstatus==3){
    echo "Blocked";
    }
    elseif($Userstatus==4){
    echo "Deleted";
    }


    ?>" readonly>
</div>
<br>


  <div class="input-group">

    <label>New User Status :    </label>
    <br>

  <select name="Userstatus" id="mySelect">
  <option selected disabled value="012" > </option>
  <option value="0">Never Logged in </option>
  <option value="1">Active</option>
  <option value="2">Locked</option>
  <option value="3">Blocked</option>
   <option value="4">Deleted</option>
</select>
</div>


    <div class="input-group">
    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
     
    </div>



    



    <?php endif ?>

    </div>




<!-- 		
			<?php if ($update == true): ?>
				
			<?php else: ?>
				
			<?php endif ?> -->


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