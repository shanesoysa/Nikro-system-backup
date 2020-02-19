<?php  include('php_code.php'); ?>


<!DOCTYPE html>

<html>
<head>
  <title>
    NMS
  </title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
  <img src="assets/img/img2.jpeg">
  

  <div class="header">

  
  </div>
 
  <div class="login-form">
  <form method="post" action="php_code.php" name="loginform" onsubmit="return validateForm()">
<!--    <?php include('errors.php'); ?>  -->
<!-- <h3><center>Account login</center></h3> -->


    <div class="input-group1">
      <!-- <label><b>Username </b></label> -->
      <img src="assets/img/nikro.png" style="height: 130px;
    width: 231px;">
      <br>
      <br>
      
      


      <input type="text" placeholder="Username" name="us" >
    </div>
    <div class="input-group1">
      <!-- <label><b>Password</b></label> -->
      <input type="password" placeholder="Password" name="pass">
    </div>
    <div class="input-group1">
      <button type="submit" class="btn" 
     name="login_user" id="loginbtn" style=" margin-right: 250px; margin-left: 227px; border-radius: 10px; padding: 10px 34px; font-size: 25px;">Login</button>
    </div>

  <?php if (isset($_SESSION['message'])): ?>
  <div class="msg2">
    <?php
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    
    
    ?>
  <?php endif?>

  </div>


  </form>
  </div>


    
</body>
</html>