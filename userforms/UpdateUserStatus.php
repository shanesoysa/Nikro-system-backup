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
    .form-control, .btn1 {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn1 {        
        font-size: 15px;
        font-weight: bold;
        width: 20%;
        border-radius: 12px;
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

<div><?php include 'navigation.php';?></div>




<div class="usermanagement-form">
  <form method="post" name='myform' action="../php_code.php" >

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


    <div class="form-group text-center">
      <button class="btn btn-primary btn1" id="N021301" type="submit" name="update">update</button>
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

</body>
</html>