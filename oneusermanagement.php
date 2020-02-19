<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>
<!DOCTYPE html>

<?php 
  if (isset($_GET['useredit'])){
    $ID = $_GET['useredit'];
    
    $rec99 = mysqli_query($db, "SELECT * FROM user_p_details WHERE RECORD_ID=$ID");

    if (isset($rec99) == 1) {
      $n = mysqli_fetch_array($rec99);
      $Userdisplayname = $n['USER_DISPLAY_NAME'];
      $Companyid = $n['USER_COMPANY_ID'];
      $telephone1 = $n['USER_TELEPHONE1'];
      $telephone2 = $n['USER_TELEPHONE2'];
      $address1 = $n['USER_ADDRESS_1'];
      $address2 = $n['USER_ADDRESS_2'];
      $address3 = $n['USER_ADDRESS_3'];
      $address4 = $n['USER_ADDRESS_4'];
      $email = $n['USER_EMAIL'];
      $birthday=$n['USER_BIRTHDAY'];
      
    }
  }
  ?>

<html>
<head>
  <title>Nikro Management Services </title>

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

    <div class="formoneuser">
    <form  method="post" name='userupdate' action="php_code.php" style=" margin-left: 402px;">


    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <div class="input-group">
      <label>User Display Name :</label>
      <input type="text" name="displayname" value="<?php echo $Userdisplayname; ?>">
    </div>

    <div class="input-group">
      <label>Company ID :</label>
      <input type="text" name="companyidone" value="<?php echo $Companyid; ?>" readonly>
    </div>

    <div class="input-group">
     <label>Telephone 1 :</label>
    <input type="text" name="telephone1" value="<?php echo $telephone1; ?>">
    </div>

    <div class="input-group">
      <label>Telephone 2 :</label>
      <input type="text" name="telephone2" value="<?php echo $telephone2; ?>">
    </div>

    <div class="input-group">
      <label>Address 1 :</label>
      <input type="text" name="address1" value="<?php echo $address1; ?>">
    </div>

     
    <div class="input-group">
      <label>Address 2 :</label>
    <input type="text" name="address2" value="<?php echo $address2; ?>">
  </div>

       
    <div class="input-group">
      <label>Address 3 :</label>
    <input type="text" name="address3" value="<?php echo $address3; ?>">
  </div>

      
    <div class="input-group">
       <label>Address 4 :</label>
    <input type="text" name="address4" value="<?php echo $address4; ?>">
  </div>


    <div class="input-group">
        <label>Birth Day :</label>
    <input type="date" name="birthday" value="<?php echo $birthday; ?>">
  </div>


    
    <div class="input-group">
      <label> E-mail :</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
  </div>



    
    <div class="input-group">
    <button class="btn" type="submit" name="updateoneuser"style="background: #556B2F;" >update profile </button>
  


  <?php if (isset($_SESSION['messageone'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['messageone']; 
      unset($_SESSION['messageone']);
    ?>
      </div>
  <?php endif ?>

</div>





</body>
</html>