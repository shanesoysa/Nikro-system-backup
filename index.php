<?php  include('php_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
body{
    background-image: url("assets/img/img2.jpeg");
    background-repeat: no-repeat, repeat;
}
	.login-form {
		width: 500px;
        margin: 200px auto;
        
	}
    .login-form form {
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

function validateForm() {
  var x = document.forms["loginform"]["us"].value;
  var y = document.forms["loginform"]["pass"].value;
  if (x == "") {
    alert("Username must be filled out");
    return false;
  }
    if (y == "") {
    alert("Password must be filled out");
    return false;
  }

  if (y == "" && x== "") {
  alert("Password must be filled out");
    return false;
  }
}

</script>

</head>
<body>
<div class="login-form">
    <form action="php_code.php"  method="post" name="loginform" onsubmit="return validateForm()">
        <div class="text-center">
        <img src="assets/img/nikro.png" id="001201" style="height: 130px; width: 230px;">
        <br></br>       
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="001001" placeholder="Username" name="us" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="001101" placeholder="Password" name="pass" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block" id="001301" name="login_user">Log in</button>
        </div>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-danger text-center" role="alert">
    <?php
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
    </div>
  <?php endif?>    
    </form>
</div>
</body>
</html>                                		                            