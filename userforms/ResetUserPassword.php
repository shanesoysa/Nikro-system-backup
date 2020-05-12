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
  <form method="post" name='myform' action="../resetpasswordback.php" >

    <input type="hidden" class="form-control" name="ID" value="<?php echo $ID; ?>">

    <div class="form-group">
      <label >Admin Username</label>
      <input type="text"  id="a1" class="form-control" name="adminusername" value="">
    </div>

    <div class="form-group">
      <label >Admin password</label>
      <input type="Password"  id="a2" class="form-control" name="adminpassword" value="">
    </div>

    <div class="form-group">
      <label id="N021401">Username</label>
      <input type="text" id="N021001" class="form-control" name="Username" readonly value="<?php echo $Username; ?>">
    </div>

    <div class="form-group">
      <label id="N021402">New Password</label>
      <div class="input-group" id="show_hide_password">
        <input type="Password" id="N021002np" class="form-control" name="Password" value="">
          <div id="N23223" class="input-group-addon">
            <input type="checkbox" name="sp" onclick="myFunction()">show
          </div>
      </div>
    </div>

    <div class="form-group">
      <label id="N021402">Confirm Password</label>
      <input type="Password" id="N021003cp" class="form-control" name="Password" value="">
    </div>
    
    <div class="form-group text-center">
      <button class="btn btn-danger btn1" id="N021301" type="submit" name="update" onclick="return validatePassword()">Submit</button>
    </div>

    <?php if (isset($_SESSION['messagecon'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
        echo $_SESSION['messagecon']; 
        unset($_SESSION['messagecon']);
      ?>
      </div>
    <?php endif ?>
  </form>
</div>

</body>
</html>