<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>
<!DOCTYPE html>

<?php 
  if (isset($_GET['userupdateadmin'])){
    $ID = $_GET['userupdateadmin'];
    
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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script type="text/javascript" src="js/nav.js"></script>

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
    .form-control, .btn1 {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn1 {        
        font-size: 15px;
        font-weight: bold;
        border-radius: 12px;
    }
</style>

</head>
<body>
  
  <div><?php include 'navigation.php';?></div>


  <div class="one_user_management-form">
    <form  method="post" name='userupdateadmin' action="php_code.php">
      <input type="hidden"  class="form-control" name="ID" value="<?php echo $ID; ?>">
      <div class="form-group">
        <label id="N011401">User Display Name :</label>
        <input type="text" id="N011001" name="displayname" class="form-control" value="<?php echo $Userdisplayname; ?>">
      </div>

      <div class="form-group">
        <label id="N011402">Company ID :</label>
        <input type="text" id="N011002" class="form-control" name="companyidone" value="<?php echo $Companyid; ?>">
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
      	<div class="text-center">
      		<button class="btn btn-success btn1" id="N011301" type="submit" name="updateoneuser" >update profile </button>
		</div>

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