<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>

<?php

$ID = $_SESSION['loginid']; 

//    $q1 = mysqli_query($db, "SELECT * FROM user_p_details WHERE RECORD_ID= $ID");
//    if (isset($q1) == 1) {
//      $n = mysqli_fetch_array($q1);
//      $Cid = $n['USER_COMPANY_ID'];
//    }

    $result = mysqli_query($db,"SELECT MAX(COMPANY_ID) AS max_number FROM company_data");
    $row = mysqli_fetch_array($result);
    //echo $row["max_number"] + 1;
    $new_company_id = $row["max_number"] + 1;

if (isset($_POST['save_company_data'])) {

    $Cn = $_POST['company_name'];

	if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
	} else {

	        $filename = $_FILES['file']['name'];
            $file_ext = strtolower(end(explode('.', $filename)));
	        $modified_file_name = "LOGO_".$new_company_id."_".$Cn.".".$file_ext;

			if (file_exists("companylogo/" . $modified_file_name)) {
					echo $modified_file_name . " <b>already exists.</b> ";
			} else {
					move_uploaded_file($_FILES["file"]["tmp_name"], "companylogo/" . $modified_file_name);
					$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "companylogo/" . $modified_file_name;
			}
	}


	$Ca1 = $_POST['company_address_s1'];
	$Ca2 = $_POST['company_address_s2'];
	$Ca3 = $_POST['company_address_s3'];
	$Ca4 = $_POST['company_address_s4'];
	$Cs = $_POST['company_status'];
	$Ct1 = $_POST['company_telephone1'];
	$Ct2 = $_POST['company_telephone2'];
	$Ce = $_POST['company_email'];

		$insert_query = mysqli_query($db, "INSERT INTO company_data (COMPANY_ID, COMPANY_NAME, COMPANY_ADDRESS1, COMPANY_ADDRESS2, COMPANY_ADDRESS3, COMPANY_ADDRESS4, COMPANY_STATUS, COMPANY_TELEPHONE_1, COMPANY_TELEPHONE_2, COMPANY_EMAIL, COMPANY_LOGO) VALUES ('$new_company_id', '$Cn', '$Ca1', '$Ca2', '$Ca3', '$Ca4', '$Cs', '$Ct1', '$Ct2', '$Ce', '$imgFullpath')");
		if ($insert_query) {
	 		header('location: home.php');
		 }else{
		 	$_SESSION['message'] = "Error !"; 
		 	header('location: company_data.php');
		 } 
}



?>

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

.companydata-form {
        width: 500px;
        margin: 50px auto;
        
  }
    .companydata-form form {
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

</head>
<body>
<div><?php include 'navigation.php';?></div>

<div class="companydata-form">
  <form method="post" name='myform' enctype="multipart/form-data" action="" >

	<div class="form-group">
		
<!--		<input type="hidden" id="N021001" class="form-control" name="company_id" value="--><?php //echo $Cid; ?><!--" disabled>-->
	</div>

    <div class="form-group">
		<label id="N021406">Company Name</label>
		<input type="text" id="N021006" class="form-control" name="company_name" value="">
	</div>

	<div class="form-group">
		<label id="N021402">Company Address S1</label>
		<input type="text" id="N021002" class="form-control" name="company_address_s1" value="">
	</div>

    <div class="form-group">
      <label id="N021403">Company Address S2</label>
      <input type="text" id="N021003" class="form-control" name="company_address_s2" value="">
    </div>

    <div class="form-group">
      <label id="N021404">Company Address S3</label>
      <input type="text" id="N021004" class="form-control" name="company_address_s3" value="">
    </div>

    <div class="form-group">
      <label id="N021405">Company Address S4</label>
      <input type="text" id="N021005" class="form-control" name="company_address_s4" value="">
    </div>

    <div class="form-group">
      <label id="N021405">Company Status</label>
      <input type="number" id="N021005" class="form-control" name="company_status" value="">
    </div>

    <div class="form-group">
      <label id="N021405">Company Telephone 1</label>
      <input type="number" id="N021005" class="form-control" name="company_telephone1" value="">
    </div>

    <div class="form-group">
      <label id="N021405">Company Telephone 2</label>
      <input type="number" id="N021005" class="form-control" name="company_telephone2" value="">
    </div>

    <div class="form-group">
      <label id="N021405">Company Email</label>
      <input type="text" id="N021005" class="form-control" name="company_email" value="">
    </div>

    <div class="form-group">
      <label id="N021405">Company logo</label>
      <input type="file" id="file" class="form-control" name="file" value="">
    </div>


    <div class="form-group text-center">
      <button class="btn btn-primary btn1" id="N021301" type="submit" name="save_company_data" >Save</button>
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