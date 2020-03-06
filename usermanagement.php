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
	<!--  class="form-control" -->



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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">

/*body{
    background-image: url("assets/img/img2.jpeg");
    background-repeat: no-repeat, repeat;
}*/

  .usermanagement-form {
        width: 500px;
        margin: 50px auto;
        
  }
    .usermanagement-form form {
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border-radius: 10px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        border-radius: 12px;
        width: 20%;
        margin-left: auto;
        margin-right: auto;
    }
</style>


    <script type="text/JavaScript"> 

      // function validateconfirmpassword() {
      //   var x = document.getElementById("pw").value;
      //   var y = document.getElementById("conpw").value;
      //   if (x != y) {
      //     alert("Password did not match!");
      //     return false;

      // }
      // return true;
      function validatePassword(){
        var password = document.getElementById("N021002np"), 
            confirm_password = document.getElementById("N021003cp");
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
          confirm_password.setCustomValidity('');
          }
      }

      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;

      function myFunction() {
        var x = document.getElementById("N021002np");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }

        var y = document.getElementById("N021003cp");
        if (y.type === "password") {
          y.type = "text";
        } else {
          y.type = "password";
        }

      }

      
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





<!-- Add new user ------------------------------------------------------------>
  <?php if($update==false):?>

<div class="usermanagement-form">
  <form method="post" name='myform' action="php_code.php" >

		<div class="form-group">
			<label id="N021401">Username</label>
			<input type="text" id="N021001" class="form-control" name="Username" value="">
		</div>

    <div class="form-group">
			<label id="N021406">User Display Name</label>
			<input type="text" id="N021006" class="form-control" name="User_Display_name" value="">
		</div>

		<div class="form-group">
			<label id="N021402">Password</label>
			<input type="Password" id="N021002" class="form-control" name="Password" value="">
		</div>

    <div class="form-group">
      <label id="N021403">Companany ID</label>
      <input type="Number" id="N021003" class="form-control" name="Companyid" value="">
    </div>

    <div class="form-group">
      <label id="N021404">User Type</label>
      <input type="Number" id="N021004" class="form-control" name="Usertype" value="">
    </div>

    <div class="form-group">
      <label id="N021405">User Group</label>
      <input type="Number" id="N021005" class="form-control" name="Usergroup" value="">
    </div>

    <div class="form-group">
      <button class="btn btn-primary btn-block" id="N021301" type="submit" name="save" >Save</button>
    </div>
        
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['message']; 
          unset($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>

  </form>
</div>>
  
<!-- --------------------------------------------------------------------------------------------->
<!-- Update user -->
<?php elseif ($update==true && $resetpw==false && $userst==false):?>
<div class="usermanagement-form">
  <form method="post" name='myform' action="php_code.php">

    <input type="hidden" class="form-control" name="ID" value="<?php echo $ID; ?>">

    <div class="form-group">
      <label id="N021401" >Username</label>
      <input type="text" class="form-control" id="N021001" name="Username" value="<?php echo $Username; ?>">
    </div>

    <div class="form-group">
      <label id="N021402" >Password</label>
      <input type="Password" class="form-control" id="N021002" name="Password" value="<?php echo $Password; ?>">
    </div>

    <div class="form-group">
      <label id="N021403" >Companany ID</label>
      <input type="Number" class="form-control" id="N021003" name="Companyid" value="<?php echo $Companyid; ?>">
    </div>

    <div class="form-group">
      <label id="N021404" >User Type</label>
      <input type="Number" class="form-control" id="N021004" name="Usertype" value="<?php echo $Usertype; ?>">
    </div>

    <div class="form-group">
      <label id="N021405" >User Group</label>
      <input type="Number" class="form-control" id="N021005" name="Usergroup" value="<?php echo $Usergroup; ?>">
    </div>

    <div class="form-group">
      <button class="btn btn-success btn-block" id="N021301" type="submit" name="update">update</button>     
    </div>


      <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success text-center" role="alert">
          <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>

  </form>
</div>

<!-- --------------------------------------------------------------------------------------------->

<?php elseif ($resetpw==true):?>
<div class="usermanagement-form">
  <form method="post" name='myform' action="php_code.php" >

    <input type="hidden" class="form-control" name="ID" value="<?php echo $ID; ?>">

    <div class="form-group">
      <label id="N021401">Username</label>
      <input type="text" id="N021001" class="form-control" name="Username" readonly value="<?php echo $Username; ?>">
    </div>

    <div class="form-group">
      <label id="N021402">New Password</label>
      <div class="input-group" id="show_hide_password">
        <input type="Password" id="N021002np" class="form-control" name="Password" value="">
          <div class="input-group-addon">
            <input type="checkbox" name="sp" onclick="myFunction()">show
          </div>
      </div>
    </div>

    <div class="form-group">
      <label id="N021402">Confirm Password</label>
      <input type="Password" id="N021003cp" class="form-control" name="Password" value="">
    </div>
    
    <div class="form-group">
      <button class="btn btn-danger btn-block" id="N021301" type="submit" name="update" onclick="return validatePassword()">update</button>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
      ?>
      </div>
    <?php endif ?>
  </form>
</div>

<?php elseif ($userst==true):?>
<div class="usermanagement-form">
  <form method="post" name='myform' action="php_code.php" >

    <input type="hidden" class="form-control" name="ID" value="<?php echo $ID; ?>">

    <div class="form-group">
      <label id="N021401">Username</label>
      <input type="text" id="N021001" class="form-control" name="Username" value="<?php echo $Username; ?> " readonly>
    </div>

    <div class="form-group">
      <input type="hidden" class="form-control" name="Password" value="<?php echo $Password; ?>">
    </div>

    <div class="form-group">
      <input type="hidden" class="form-control" name="Companyid" value="<?php echo $Companyid; ?>">
    </div>

    <div class="form-group"> 
      <input type="hidden" class="form-control" name="Usertype" value="<?php echo $Usertype; ?>">
    </div>

    <div class="form-group">  
      <input type="hidden" class="form-control" name="Usergroup"  value="<?php echo $Usergroup; ?>" >
    </div>

    <div class="form-group">
      <label id="N021402">User Status</label>
      <input type="text" id="021002" class="form-control" name="Userstatusdisplay" value="<?php 

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

    <div class="form-group">
      <label id="N021403">New User Status :</label>
      <select class="form-control" name="Userstatus" id="N121601" id="mySelect">
        <option selected disabled value="012" > </option>
        <option value="0">Never Logged in </option>
        <option value="1">Active</option>
        <option value="2">Locked</option>
        <option value="3">Blocked</option>
        <option value="4">Deleted</option>
      </select>
    </div>


    <div class="form-group">
      <button class="btn btn-primary btn-block" id="N021301" type="submit" name="update">update</button>
    </div>

    <?php endif ?>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success text-center" role="alert">
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