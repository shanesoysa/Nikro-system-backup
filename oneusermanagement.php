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
  .one_user_management-form {
        width: 500px;
        margin: 10px auto;
        
  }
    .one_user_management-form form {
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
        width: 40%;
        margin-left: auto;
        margin-right: auto;
    }
</style>

</head>
<body>
  <div class="sidebar" data-color="white" data-active-color="danger">
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
            <a href="./dashboard.php" id="N011501">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./list.php" id="N011502">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
        </ul>
      </div>
  </div>


  <div class="one_user_management-form">

    <form  method="post" name='userupdate' action="php_code.php">

      <input type="hidden"  class="form-control" name="ID" value="<?php echo $ID; ?>">
      <div class="form-group">
        <label id="N011401">User Display Name :</label>
        <input type="text" id="N011001" name="displayname" class="form-control" value="<?php echo $Userdisplayname; ?>">
      </div>

      <div class="form-group">
        <label id="N011402">Company ID :</label>
        <input type="text" id="N011002" class="form-control" name="companyidone" value="<?php echo $Companyid; ?>" readonly>
      </div>

      <div class="form-group">
       <label id="N011403">Telephone 1 :</label>
      <input type="text" id="N011003" class="form-control" name="telephone1" value="<?php echo $telephone1; ?>">
      </div>

      <div class="form-group">
        <label id="N011404">Telephone 2 :</label>
        <input type="text" id="N011004" class="form-control" name="telephone2" value="<?php echo $telephone2; ?>">
      </div>

      <div class="form-group">
        <label id="N011405">Address 1 :</label>
        <input type="text" id="N011005" class="form-control" name="address1" value="<?php echo $address1; ?>">
      </div>
     
      <div class="form-group">
        <label id="N011406">Address 2 :</label>
      <input type="text" id="N011006" class="form-control" name="address2" value="<?php echo $address2; ?>">
      </div>

      <div class="form-group">
        <label id="N011407">Address 3 :</label>
      <input type="text" id="N011007" class="form-control" name="address3" value="<?php echo $address3; ?>">
      </div>
      
      <div class="form-group">
         <label id="N011408">Address 4 :</label>
      <input type="text" id="N011008" class="form-control" name="address4" value="<?php echo $address4; ?>">
      </div>

      <div class="form-group">
          <label id="N011409">Birth Day :</label>
      <input type="date" id="N011009" class="form-control" name="birthday" value="<?php echo $birthday; ?>">
      </div>
    
      <div class="form-group">
        <label id="N011410"> E-mail :</label>
      <input type="text" id="N011010" class="form-control" name="email" value="<?php echo $email; ?>">
      </div>

      <div class="form-group">
      <button class="btn btn-success btn-block" id="N011301" type="submit" name="updateoneuser" >update profile </button>

      <?php if (isset($_SESSION['messageone'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messageone']; 
          unset($_SESSION['messageone']);
        ?>
      </div>
    <?php endif ?>
    </form>
  </div>

</body>
</html>