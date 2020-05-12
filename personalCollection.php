<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>

<?php

    if (isset($_POST['office_information_submit'])) {

        $designation = $_POST['designation'];
        $effectivedate = $_POST['effectivedate'];
        $ourref = $_POST['ourref'];
        $epfetfno = $_POST['epfetfno'];
        $fullname = $_POST['fullname'];
        $initialname = $_POST['initialname'];
        $nic = $_POST['nic'];
        $nicissuedate = $_POST['nicissuedate'];
        $dob = $_POST['dob'];
        $maritalstatus = $_POST['maritalstatus'];
        $bloodgroup = $_POST['bloodgroup'];
        $permermant_address = $_POST['permermant_address'];
        $current_address = $_POST['current_address'];
        $hometelephone = $_POST['hometelephone'];
        $mobile1 = $_POST['mobile1'];
        $mobile2 = $_POST['mobile2'];
        $email = $_POST['email'];

        $office_information = mysqli_query($db, "INSERT INTO personal_information_form( 
                            designation, Effective_date, our_ref, epf_etf_no,full_name, name_with_initials,
                            national_id_no, nic_issue_date, date_of_birth, marital_status, blood_group, 
                            permernant_address, current_address,home_telephone, mobile1, mobile2, email) VALUES (
                                                '$designation',
                                                '$effectivedate',
                                                '$ourref',
                                                '$epfetfno',
                                                '$fullname',
                                                '$initialname',
                                                '$nic',
                                                '$nicissuedate',
                                                '$dob',
                                                '$maritalstatus',
                                                '$bloodgroup',
                                                '$permermant_address',
                                                '$current_address',
                                                '$hometelephone',
                                                '$mobile1',
                                                '$mobile2',
                                                '$email'
                                                )");

                                                       // INSERT INTO `personal_information_form`(`designation`, `Effective_date`, `our_ref`, `epf_etf_no`, `full_name`, `name_with_initials`,`national_id_no`, `nic_issue_date`,`date_of_birth`, `marital_status`, `blood_group`, `permernant_address`,`current_address`, `home_telephone`, `mobile1`, `mobile2`, `email`

        if ($office_information) {

//            $q1 = mysqli_query($db, "SELECT * FROM user_p_details WHERE RECORD_ID= $ID");
//            if (isset($q1) == 1) {
//                $n = mysqli_fetch_array($q1);
//                $Cid = $n['USER_COMPANY_ID'];
//            }
            echo "doneeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
            header('location: personalCollection2.php');
        } else {
            echo "not inserted";
            header('location: personalCollection.php');

        }

    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script type="text/javascript" src="js/nav.js"></script>

</head>

<body>


  <div><?php include 'navigation.php';?>
    <script type="text/javascript">
    document.getElementById('navmain').style.height = '12px';
  </script>
  </div>


<div class="container">

  <h4 class="text-center" style="margin-bottom: 10px;">Office Information</h4>

<form id="office_information" name="office_information" method="post" action="">
  <div class="row">
    <div class="form-group col-md-3">
      <label for="email">Designation:</label>
      <input type="text" class="form-control" name="designation" id="decignation">
    </div>
    <div class="form-group col-md-3">
      <label for="pwd">Effective Date:</label>
      <input type="date" class="form-control" name="effectivedate" id="pwd">
    </div>
    <div class="form-group col-md-3">
      <label for="pwd">Our Ref:</label>
      <input type="number" class="form-control" name="ourref" id="pwd">
    </div>
    <div class="form-group col-md-3">
      <label for="pwd">EPF/ETF NO.:</label>
      <input type="number" class="form-control" name="epfetfno" id="pwd">
    </div>
  </div>



<!-- ------------------------------------------ -->

<h4 class="text-center">Personal Information</h4>


  <div class="form-group">
    <label for="name">Full Name</label>
    <input type="text" class="form-control" id="name" name="fullname" placeholder="Full name">
  </div>

  <div class="row">
    <div class="form-group col-md-8">
      <label for="name">Name With Initials:</label>
      <input type="text" class="form-control" id="name" name="initialname" placeholder="Mr/Mrs/Miss.........">
    </div>
    <div class="form-group col-md-4">
      <label for="homeline">Upload Photo:</label>
      <input type="file" class="form-control" name="photo" id="homeline">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="nicnumber">National ID No:</label>
      <input type="text" class="form-control" id="nicnumber" name="nic" placeholder="NIC number">
    </div>
    <div class="form-group col-md-4">
      <label for="nicnumber">NIC Issued Date</label>
      <input type="date" class="form-control" id="nicnumber" name="nicissuedate">
    </div>
    <div class="form-group col-md-4">
      <label for="birthday">Upload NIC Copy:</label>
      <input type="file" class="form-control" id="birthday" placeholder="birthday" name="nicupload">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="birthday">Date Of Birth</label>
      <input type="date" class="form-control" id="birthday" name="dob" placeholder="birthday">
    </div>
    <div class="form-group col-md-4">
      <label for="sel1">Marital Status</label>
      <select class="form-control" id="sel1" name="maritalstatus">
        <option>Single</option>
        <option>Married</option>
        <option>Divorced</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="sel1">Blood Group</label>
      <select class="form-control" id="sel1" name="bloodgroup">
        <option>-select-</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-8">
      <label for="name">Permernant Address:</label>
      <input type="text" class="form-control" id="name" name="permermant_address" placeholder="permermant address">
    </div>
    <div class="form-group col-md-4">
      <label for="name">Gramasewaka Certificate:</label>
      <input type="file" class="form-control" id="name" name="gsupload">
    </div>
  </div>

  <div class="form-group">
    <label for="name">Current Address:</label>
    <input type="text" class="form-control" id="name" name="current_address" placeholder="current address">
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="hp">Home Telephone:</label>
      <input type="number" class="form-control" id="hp" name="hometelephone" placeholder="Home number">
    </div>
    <div class="form-group col-md-3">
      <label for="mp1">Mobile 1:</label>
      <input type="number" class="form-control" id="mp1" name="mobile1" placeholder="Mobile 1">
    </div>
    <div class="form-group col-md-3">
      <label for="mp2">Mobile 2:</label>
      <input type="number" class="form-control" id="mp2" name="mobile2" placeholder="Mobile 2">
    </div>
    <div class="form-group col-md-3">
      <label for="e1">Email:</label>
      <input type="email" class="form-control" id="e1" name="email" placeholder="email">
    </div>
  </div>

  <div class="text-right">
    <button type="submit" name="office_information_submit" class="btn btn-primary">SAVE & NEXT</button>
   
  </div>

</form>
</div>

</body>
</html>