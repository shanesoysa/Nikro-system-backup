<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>

<?php

$MANAGER_GROUPID = 4;

$ID = $_SESSION['loginid'];

    $dataqueary = mysqli_query($db, "SELECT * FROM user_details WHERE RECORD_ID= $ID");
    $dataqueary2 = mysqli_query($db, "SELECT * FROM user_p_details WHERE RECORD_ID= $ID");

    if (isset($dataqueary2) == 1) {
      $n = mysqli_fetch_array($dataqueary2);
      $uname = $n['USER_DISPLAY_NAME'];      
    }

    if (isset($dataqueary) == 1) {
      $n = mysqli_fetch_array($dataqueary);
      $cid = $n['USER_COMPANY_ID'];
      $empid = $n['USER_EMPID']; 
      $uid = $n['USER_LOGIN_NAME'];
      $ut = $n['USER_TYPE'];
      $usergroup = $n['USER_GROUP'];


      if ($ut == 0) {
        $utype = "Student";
      }
    }

      if ($cid == 0) {
        $CompanyName = "Nikro";
      }elseif ($cid == 1) {
        $CompanyName = "Onit";
      }else{
        $CompanyName = "Company 3";
      }

if (isset($_POST['submit_leave_data']) || isset($_POST['save_leave_data'])) {
  echo "submit";

  $status = 0;

  if(isset($_POST['submit_leave_data'])){
    $status = 1;
  }

  $companyname = $_POST['company_name'];
  $employeeid = $_POST['employee_id'];
  $userid = $_POST['user_id'];
  $username = $_POST['user_name'];
  $leavetypeName = $_POST['user_leave_type'];

  $leavefrom = $_POST['user_leave_from'];
  $leaveto = $_POST['user_leave_to'];
  $leavereason = $_POST['leave_reason'];
  $attachmentname = $_POST['leave_attachment_name'];
  $handoverpersonname = $_POST['hand_over_person_name'];
  $client = $_POST['client'];
  $responsibilities = $_POST['responsibilies'];
  $managername = $_POST['manager_name'];

  if($leavetypeName == "Half-Day"){
    $leavetype = 1;
  }elseif ($leavetypeName == "Full-Day") {
    $leavetype = 2;
  }elseif ($leavetypeName == "Annual Leave") {
    $leavetype = 3;
  }elseif ($leavetypeName == "Casual Leave") {
    $leavetype = 4;
  }else{
    $leavetype = 0;
  }

  $find_emp_idqueary = mysqli_query($db, "SELECT * FROM user_details WHERE USER_LOGIN_NAME = $handoverpersonname");
  if (isset($find_emp_idqueary) == 1) {$n = mysqli_fetch_array($find_emp_idqueary);
      $handoverpersonid = $n['USER_EMPID'];      
    }

  $find_emp_idqueary1 = mysqli_query($db, "SELECT * FROM user_details WHERE USER_LOGIN_NAME = $managername");
  if (isset($find_emp_idqueary1) == 1) {$n = mysqli_fetch_array($find_emp_idqueary1);
      $managerid = $n['USER_EMPID'];      
    }

  if ($_FILES["file"]["error"] > 0) {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
  } else {

      $filename = $_FILES['file']['name'];
      $file_ext = strtolower(end(explode('.', $filename)));
      $modified_file_name = "LEAVE_".date("Y-m-d_h-i-sa")."_".$employeeid."_.".$file_ext;

      if (file_exists("attachments/leaves/" . $modified_file_name)) {
          echo $modified_file_name . " <b>already exists.</b> ";
      } else {
          move_uploaded_file($_FILES["file"]["tmp_name"], "attachments/leaves/" . $modified_file_name);
          $attachmentpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "attachments/leaves/" . $modified_file_name;
      }
  }   

                                       

  $insert_query = mysqli_query($db, "INSERT INTO leave_process (companyid, empid, userid, username, status, leavetype, leavefrom, leaveto, leavereson, usertpye, attachment_name, attachment_path, handoverempid, handoverempname, handoverclient, handoverresponsibilities, for_managerid, for_managername) VALUES (
                                              '$cid', 
                                              '$employeeid',
                                              '$userid', 
                                              '$username',
                                              '$status',  
                                              '$leavetype', 
                                              '$leavefrom',
                                              '$leaveto',
                                              '$leavereason',
                                              '$ut',
                                              '$attachmentname',
                                              '$attachmentpath',
                                              '$handoverpersonid',
                                              '$handoverpersonname',
                                              '$client',
                                              '$responsibilities',
                                              '$managerid',
                                              '$managername')
                                              ");
    if ($insert_query) {
      echo "success...................";
      header('location: home.php');
     }else{
      //$_SESSION['message'] = "Error !"; 
      //header('location: company_data.php');
      echo "Error....................";
     }

}


if(isset($_POST['save_leave_data'])){
  echo "Save";
}

?>



<!DOCTYPE html>
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
        width: 550px;
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
  
<h1>Leave Application</h1>

  <div class="one_user_management-form">

    <form  method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label id="">Company Name</label>
        <input type="text" id="" name="company_name" class="form-control" value="<?php echo $CompanyName ?>" readonly>
      </div>
      <div class="form-group">
        <label id="">Employee No</label>
        <input type="text" id="" name="employee_id" class="form-control" value="<?php echo $empid ?>" readonly>
      </div>
      <div class="form-group">
        <label id="">User Id</label>
        <input type="text" id="" name="user_id" class="form-control" value="<?php echo $uid ?>" readonly>
      </div>
      <div class="form-group">
        <label id="">User Name</label>
        <input type="text" id="" name="user_name" class="form-control" value="<?php echo $uname ?>" readonly>
      </div>
      <div class="form-group">
        <label for="sel1">Leave Type:</label>
        <select class="form-control" name="user_leave_type">
          <option>Half-Day</option>
          <option>Full-Day</option>
          <option>Annual Leave</option>
          <option>Casual Leave</option>
        </select>
    </div>

    <div class="form-group form-inline">
        <label>From:</label>
        <input type="datetime-local" name="user_leave_from" class="form-control-sm form-inline" >
        <lable>To:</lable>
        <input type="datetime-local" name="user_leave_to" class="form-control-sm form-inline" >
    </div>
    
    <div class="form-group">
        <label id="">Reason:</label>
        <input type="text" id="" name="leave_reason" class="form-control" value="">
    </div>

    <div class="form-group">
        <label id="">User Type</label>
        <input type="text" id="" name="user_user_type" class="form-control" value="<?php echo $utype ?>" readonly>
    </div>

    <div class="form-group">
        <label id="">Attachment Name:</label>
        <input type="text" id="file" name="leave_attachment_name" class="form-control" value="">
    </div>

    <div class="form-group">
        <label id="">Attachments:</label>
        <input type="file" id="file" name="file" class="form-control" value="">
    </div>

    <!-- <div class="form-group">
        <label id="">Handover Person ID</label>
        <select class="form-control" name="hand_over_person_id">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
    </div> -->

    <div class="form-group">
        <label id="">Handover Person Name</label>
        <select class="form-control" name="hand_over_person_name" id="hpn" onclick="getID()">
          <?php
          $findhandoverpersonqueary = mysqli_query($db, "SELECT * FROM user_details WHERE USER_GROUP= $usergroup AND RECORD_ID != $ID");
          while ($row2 = mysqli_fetch_array($findhandoverpersonqueary)) { ?>
            <option><?php echo $row2['USER_LOGIN_NAME']; ?></option>
          <?php } ?>  
        </select>
    </div>

                
    <div class="form-group">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Client</th>
            <th>Responsibilies</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" id="" name="client" class="form-control" value=""></td>
            <td><input type="text" id="" name="responsibilies" class="form-control" value=""></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!--  <div class="form-group">
        <label id="">Manager ID</label>
        <select class="form-control" name="manager_id">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
    </div> -->

    <div class="form-group">
        <label id="">Manager Name</label>
        <select class="form-control" name="manager_name">
         <?php
          $findhandover_manager_queary = mysqli_query($db, "SELECT * FROM user_details WHERE USER_GROUP= $MANAGER_GROUPID ");
          while ($row3 = mysqli_fetch_array($findhandover_manager_queary)) { ?>
            <option><?php echo $row3['USER_LOGIN_NAME']; ?></option>
          <?php } ?>  
        </select>
    </div>

    <div class="form-group">
      <div class="text-center">
          <button class="btn btn-primary btn1" id="" type="submit" name="save_leave_data" >Save</button>
          <button class="btn btn-success btn1" id="" type="submit" name="submit_leave_data" >Submit</button>
          <button class="btn btn-danger btn1" id="" type="submit" name="cancel_leave_data" >Cancel</button>
		  </div>
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

  <!-- <script type="text/javascript">
    function getID(){
      var x = document.getElementById('hpn').value;
      console.log(x);

    }
  </script> -->

</body>
</html>


<!-- // $findhandoverpersonqueary = mysqli_query($db, "SELECT * FROM user_details WHERE USER_GROUP= $usergroup AND RECORD_ID != $ID");

    // $login_display_name=mysqli_query($db,"SELECT user_p_details.USER_DISPLAY_NAME FROM user_p_details INNER JOIN user_details ON user_p_details.RECORD_ID=user_details.RECORD_ID WHERE user_details.USER_GROUP= $usergroup");

    // while ($row1 = mysqli_fetch_array($login_display_name)) {
    //         echo $row1['USER_DISPLAY_NAME'];echo " ";
    //       }
     -->
<!-- 

      echo $companyname; echo " ";
                                        echo $employeeid; echo " ";
                                        echo $userid; echo " ";
                                        echo $username;  echo " ";
                                        //echo $applydate; echo " ";
                                        echo $leavetype; echo " ";
                                        echo $leavefrom;echo " ";
                                        echo $leaveto;echo " ";
                                        echo $leavereason;echo " ";
                                        //echo $userType;echo " ";
                                        echo $Attachpath;echo " ";
                                        echo $Attachpath;echo " ";
                                        echo $handoverpersonid;echo " ";
                                        echo $handoverpersonname;echo " ";
                                        echo $client;echo " ";
                                        echo $responsibilities; echo " ";
                                        echo $managerid;echo " ";
                                        echo $managername;echo " "; -->

                                   <!--      $companyname = $_POST['company_name'];
  $employeeid = $_POST['employee_id'];
  $userid = $_POST['user_id'];
  $username = $_POST['user_name'];
  //$applydate = $_POST['user_apply_date'];
  $leavetypeName = $_POST['user_leave_type'];

  $leavefrom = $_POST['user_leave_from'];
  $leaveto = $_POST['user_leave_to'];
  $leavereason = $_POST['leave_reason'];
  //$userType = $_POST['user_user_type'];

  $attachmentname = $_POST['leave_attachment_name'];
  //$attachmentpath = "file";

  //$handoverpersonid = $_POST['hand_over_person_id'];
  $handoverpersonname = $_POST['hand_over_person_name'];
  $client = $_POST['client'];
  $responsibilities = $_POST['responsibilies'];

  //$managerid = $_POST['manager_id'];
  $managername = $_POST['manager_name'];

  //$Attachpath = "file/file"; -->