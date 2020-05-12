<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>

<?php

    $getIdQueary = mysqli_query($db, "SELECT * FROM personal_information_form WHERE step1_status= 1");
    if (isset($getIdQueary) == 1) {
        $n = mysqli_fetch_array($getIdQueary);
        $primaryId = $n['ID'];
        $nameWithInitials = $n['name_with_initials'];
        echo $primaryId;
    }

    if (isset($_POST['personal_collection2_submit'])) {
        $drivingLicenseNo = $_POST['driving_license_no'];
        $drivingLicenseIssuedDate = $_POST['driving_license_issued_date'];
        $licenseAttachPath = "path-path";
        $passportNo = $_POST['passport_no'];
        $passportIssuedDate = $_POST['passport_issued_date'];
        $passportAttachPath = "path-path";
        $bankName = $_POST['bank_name'];
        $branchName = $_POST['branch_name'];
        $bankAccountNo = $_POST['bank_account_no'];
        $passbookAttachPath = "path-path";
        $districtName = $_POST['district_name'];
        $electrorateDivision = $_POST['electrorate_divition'];
        $gramasewakaDivition = $_POST['gramasewka_divition'];
        $distanceFromResidenseToOffice = $_POST['distance_from_residense_to_office'];
        $busRootNo = $_POST['bus_root_no'];
        $residenseMapAttachPAth = "path-path";

        $crimeStatus = "No";
        $crimeDetails = $_POST['crime_details'];
        $crimeDetailsAttachPath = "path-path";

        $prePreEmpRegQli = $_POST['present_previous_employers_regarding_qlifications'];
        $natureOfIlleness = $_POST['nature_of_illeness'];

        $insert_personal_collection2_query=mysqli_query($db, "UPDATE personal_information_form SET 
                                        step1_status=2,
                                        driving_licence_no='$drivingLicenseNo',
                                        issued_date='$drivingLicenseIssuedDate',
                                        attach_passport='$passbookAttachPath',
                                        bank_name='$bankName',
                                        branch_name='$branchName',
                                        account_no='$bankAccountNo',
                                        copy_of_passbook='$passbookAttachPath',
                                        district='$districtName',
                                        electorate_division='$electrorateDivision',
                                        grgramasewaka_division='$gramasewakaDivition',
                                        distance_to_office='$distanceFromResidenseToOffice',
                                        bus_root_no='$busRootNo',
                                        attach_map_to_residence='$residenseMapAttachPAth',
                                        crime_status='$crimeStatus',
                                        crime_reason='$crimeDetails',
                                        crime_attached_sheet='$crimeDetailsAttachPath',
                                        inquries_before='$prePreEmpRegQli',
                                        illness='$natureOfIlleness' 
                                        WHERE ID='$primaryId'
                                         ");

        //step1_status=2,driving_licence_no='$drivingLicenseNo',issued_date=[value-24],attach_passport=[value-25],bank_name=[value-26],branch_name=[value-27],account_no=[value-28],copy_of_passbook=[value-29],district=[value-30],electorate_division=[value-31],grgramasewaka_division=[value-32],distance_to_office=[value-33],bus_root_no=[value-34],attach_map_to_residence=[value-35],crime_status=[value-36],crime_reason=[value-37],crime_attached_sheet=[value-38],inquries_before=[value-39],illness=[value-40]

        if ($insert_personal_collection2_query) {
          echo "doneeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
          //header('location: personalCollection2.php');
        } else {
          echo "not inserted";
          //header('location: personalCollection.php');
          
                  }




    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Information 2</title>
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

<h4 class="text-center">Personal Information part 2 ( <?php echo $nameWithInitials; ?> )</h4>
<form method="post" action="">
  <div class="row">
    <div class="form-group col-md-4">
      <label for="gln">Driving License No</label>
      <input type="text" class="form-control" name="driving_license_no" id="dln" placeholder="Driving License No">
    </div>
    <div class="form-group col-md-4">
      <label for="isd">Issued Date</label>
      <input type="date" class="form-control" name="driving_license_issued_date" id="isd">
    </div>
    <div class="form-group col-md-4">
      <label for="acl">Attach Copy Of License</label>
      <input type="file" class="form-control" name="attach_copy_of_license" id="acl">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="ppn">Passport No:</label>
      <input type="text" class="form-control" id="ppn" name="passport_no" placeholder="passport number">
    </div>
    <div class="form-group col-md-4">
      <label for="pic">Issued Date</label>
      <input type="date" class="form-control" name="passport_issued_date" id="pic">
    </div>
    <div class="form-group col-md-4">
      <label for="acp">Attach Copy Of Passport</label>
      <input type="file" class="form-control" name="attach_copy_of_passport" id="acp" >
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="bn">Bank Name</label>
      <input type="text" class="form-control" id="bn" name="bank_name" placeholder="Bank Name">
    </div>
    <div class="form-group col-md-3">
      <label for="brn">Branch Name</label>
      <input type="text" class="form-control" id="brn" name="branch_name" placeholder="Branch Name">
    </div>
    <div class="form-group col-md-3">
      <label for="acn">Account No</label>
      <input type="number" class="form-control" id="acn" name="bank_account_no" placeholder="Account No">
    </div>
    <div class="form-group col-md-3">
      <label for="abc">Attach Copy Of Passbook</label>
      <input type="file" class="form-control" name="attach_copy_of_passbook" id="abc">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="dis">District</label>
      <input type="text" class="form-control" name="district_name" id="dis" placeholder="Your district">
    </div>
    <div class="form-group col-md-4">
      <label for="edn">Electrorate Divition</label>
      <input type="text" class="form-control" name="electrorate_divition" id="edn" placeholder="Electrorate division">
    </div>
    <div class="form-group col-md-4">
      <label for="gsd">Gramasewaka Division</label>
      <input type="text" class="form-control" name="gramasewka_divition" id="gsd" placeholder="Gramasewaka Division">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="dfrto">Distance From Residense To Office</label>
      <input type="number" class="form-control" id="dfrto" name="distance_from_residense_to_office" placeholder="Distance From Residense To Office (km)">
    </div>
    <div class="form-group col-md-4">
      <label for="brn">Bus Root No(s)</label>
      <input type="number" class="form-control" id="brn" name="bus_root_no" placeholder="Bus Root No(s)">
    </div>
    <div class="form-group col-md-4">
      <label for="amr">Attach Map To Your Residense</label>
      <input type="file" class="form-control" name="attach_map_recidense" id="amr" >
    </div>
  </div>


  <div class="form-group" onclick="radioBtnClick()">
    <label>Have you ever been arrested and convicted of crime ?</label>
    <label class="radio-inline"><input type="radio"  name="optradio" value="yes" id="yesradio">Yes</label>
    <label class="radio-inline"><input type="radio"  name="optradio" value="no" id="noradio" checked>No</label>
  </div>


  <div class="row" id="datarow" style="display: none;">
    <div class="form-group col-md-8">
      <label for="ifyes">If Yes</label>
      <input type="text" class="form-control" name="crime_details" id="ifyes" placeholder="Please give the details..">
    </div>
    <div class="form-group col-md-4">
      <label for="asin">Attached Sheet If necessary</label>
      <input type="file" class="form-control" name="attach_crime_data_sheet" id="asin">
    </div>
  </div>

  <div class="form-group">
    <label for="n">May inquiry be made with your present and previous employers regarding your qulifications and character?</label>
    <input type="text" class="form-control" id="n" name="present_previous_employers_regarding_qlifications" placeholder="May inquiry be made with your present and previous employers regarding your qulifications and character?">
  </div>

  <div class="form-group">
    <label for="n1">Nature of series illnresses</label>
    <input type="text" class="form-control" id="n1" name="nature_of_illeness" placeholder="Nature of series illnresses">
  </div>


  <div class="text-right">
<!--    <a href="personalCollection3.php" class="btn btn-primary">SAVE & NEXT</a>-->
      <button type="submit" name="personal_collection2_submit" class="btn btn-primary">SAVE & NEXT</button>
    <!-- <button type="submit" class="btn btn-primary">SAVE & NEXT</button> -->
  </div>

</form>
</div>

<script type="text/javascript">
  function radioBtnClick(){
    if (document.getElementById('yesradio').checked) {
          document.getElementById('datarow').style.display = 'block';
    }else{
      document.getElementById('datarow').style.display = 'none';
    }
  }

</script>



</body>
</html>
