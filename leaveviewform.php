<?php include('php_code.php'); ?>
<?php include('logcheck.php');?>


<?php

$MANAGER_GROUPID = 4;
$HR_GROUPID = 2;

  if (isset($_GET['recordid'])){
    $ID = $_GET['recordid'];

    $queary1 = mysqli_query($db, "SELECT * FROM leave_process WHERE recordid=$ID");

    if (isset($queary1) == 1) {
      $n = mysqli_fetch_array($queary1);
      $Companyid = $n['companyid'];

      if ($Companyid == 0) {
        $company_Name = "Nikro";
      }elseif ($Companyid == 1) {
        $company_Name = "Onit";
      }else{
        $company_Name = "Company 3";
      }

      $employee_id = $n['empid'];
      $user_id = $n['userid'];
      $user_name = $n['username'];
      $apply_date = $n['applydate'];
      $leave_type = $n['leavetype'];

      if($leave_type == 1){
        $leavetype_name = "Half-Day";
      }elseif ($leave_type == 2) {
        $leavetype_name = "Full-Day";
      }elseif ($leave_type == 3) {
        $leavetype_name = "Annual Leave";
      }elseif ($leave_type == 4) {
        $leavetype_name = "Casual Leave";
      }else{
        $leavetype_name = " ";
      }

      $leave_from = $n['leavefrom'];
      $leave_to = $n['leaveto'];
      $leave_reson = $n['leavereson'];
      $leave_usertype = $n['usertpye'];

      if ($leave_usertype == 0) {
        $leave_usertype_name = "student";
      }

      $attachment_name = $n['attachment_name'];
      $attachment_path = $n['attachment_path'];

      $handover_personname = $n['handoverempname'];
      $handover_client = $n['handoverclient'];
      $handover_responcibilities = $n['handoverresponsibilities'];

      $for_managername = $n['for_managername'];
      $for_2managername = $n['for_2managername'];

      $user_status = $n['status'];

      $manager_status = $n['manager_status'];
      $manager_comment = $n['managercomment'];

      $manager_2status = $n['2manager_status'];
      $manager_2comment = $n['2managercomment'];

      $hr_status = $n['hr_status'];
      $hr_comment = $n['hr_comment'];

      if ($manager_status == 1){
          $status_text = "Manager submited (".$for_managername.")";
          //$comment_text = $manager_comment;
      }

    }

    if (isset($_POST['save_user_status'])){
        $update_user_status_queary = mysqli_query($db, "UPDATE leave_process SET status = 1 WHERE recordid='$ID' ");

        if ($update_user_status_queary){
            echo "success";
            header('location: leaveView.php');
        }else{
            echo "error...............";
        }
    }

    if (isset($_POST['save_manager_status'])){

        $secondmanagername = $_POST['second_manager_name'];
        $managercomment = $_POST['manager_comment'];

        if ($secondmanagername == "-choose-"){
            $secondmanagerempid = "";
            $secondmanagername = "";
        }else {
            $find_empid_secondmanager = mysqli_query($db, "SELECT * FROM user_details WHERE USER_LOGIN_NAME = $secondmanagername");
            if (isset($find_empid_secondmanager) == 1) {$n = mysqli_fetch_array($find_empid_secondmanager);
                $secondmanagerempid = $n['USER_EMPID'];
            }
        }

        $update_manager_queary = mysqli_query($db, "UPDATE leave_process SET manager_status = 1, managercomment='$managercomment', manager_approvetime=now(), 
                                for_2managerid='$secondmanagerempid', for_2managername='$secondmanagername'  WHERE recordid='$ID' ");

        if ($update_manager_queary){
            echo "success";
            header('location: leaveView.php');
        }else{
            echo "error...............";
        }
    }
    if (isset($_POST['save_manager2_status'])){
        $manager2comment = $_POST['manager2_comment'];

        $update_manager2_queary = mysqli_query($db, "UPDATE leave_process SET 2manager_status = 1, 2managercomment='$manager2comment', 2manager_approvetime=now() WHERE recordid='$ID' ");

        if ($update_manager2_queary){
            echo "manager 2 success";
            header('location: leaveView.php');
        }else{
            echo "error..2.............";
        }
    }
    if (isset($_POST['save_hr_status'])){

        $hrusername = $_POST['hr_user_name'];
        $hrcomment = $_POST['hr_comment'];

        $find_hr_empid = mysqli_query($db, "SELECT * FROM user_details WHERE USER_LOGIN_NAME = $hrusername");
        if (isset($find_hr_empid) == 1) {$n = mysqli_fetch_array($find_hr_empid);
            $hrempid = $n['USER_EMPID'];
        }

        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {

            $filename = $_FILES['file']['name'];
            $file_ext = strtolower(end(explode('.', $filename)));
            $modified_file_name = "HR_".date("Y-m-d_h-i-sa")."_".$hrusername."_.".$file_ext;

            if (file_exists("attachments/leaves/HR/" . $modified_file_name)) {
                echo $modified_file_name . " <b>already exists.</b> ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "attachments/leaves/HR/" . $modified_file_name);
                $hrattachmentpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "attachments/leaves/HR/" . $modified_file_name;
            }
        }

        $update_hr_queary = mysqli_query($db, "UPDATE leave_process SET hr_user = '$hrempid', hr_user_name='$hrusername',hr_status = 1,hr_comment ='$hrcomment',hr_attachment_path='$hrattachmentpath' , hr_timestamp=now() WHERE recordid='$ID' ");

        if ($update_hr_queary){
            echo "hr success";
            header('location: leaveView.php');
        }else{
            echo "error..hr.............";
        }


    }

//    if (isset($queary1) == 1) {
//      $n1 = mysqli_fetch_array($queary1);
//      $Userempid = $n1['USER_EMPID'];
//    }
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
  .leaveview-form {
        width: 550px;
        margin: 10px auto;
        
  }
    .leaveview-form form {
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
  
<h1>One Leave View </h1>

  <div class="leaveview-form">

    <form  method="post" enctype="multipart/form-data" >
      <div class="form-group">
        <label id="">Company Name</label>
        <input type="text" id="" name="company_name" class="form-control" value="<?php echo $company_Name ?>" readonly>
      </div>
      <div class="form-group">
        <label id="">Employee No</label>
        <input type="text" id="" name="employee_id" class="form-control" value="<?php echo $employee_id ?>" readonly>
      </div>
      <div class="form-group">
        <label id="">User Id</label>
        <input type="text" id="" name="user_id" class="form-control" value="<?php echo $user_id ?>" readonly>
      </div>
      <div class="form-group">
        <label id="">User Name</label>
        <input type="text" id="" name="user_name" class="form-control" value="<?php echo $user_name ?>" readonly>
      </div>
      <div class="form-group">
        <label for="sel1">Leave Type:</label>
        <input type="text" id="" name="" class="form-control" value="<?php echo $leavetype_name ?>" readonly>
      </div>

      <div class="form-group">
        <label for="sel1">Submit time:</label>
        <input type="text" id="" name="" class="form-control" value="<?php echo $apply_date ?>" readonly>
      </div>

    <div class="form-group form-inline">
        <label>From:</label>
        <input type="text" name="user_leave_from" class="form-control-sm form-inline" value="<?php echo $leave_from ?> " readonly>
        <lable>To:</lable>
        <input type="text" name="user_leave_to" class="form-control-sm form-inline" value="<?php echo $leave_to ?>" readonly >
    </div>
    
    <div class="form-group">
        <label id="">Reason:</label>
        <input type="text" id="" name="leave_reason" class="form-control" value="<?php echo $leave_reson ?>" readonly>
    </div>

    <div class="form-group">
        <label id="">User Type</label>
        <input type="text" id="" name="user_user_type" class="form-control" value="<?php echo $leave_usertype_name ?>" readonly>
    </div>

    <div class="form-group">
        <label id="">Attachment Name:</label>
        <input type="text" name="" class="form-control" value="<?php echo $attachment_name ?>" readonly>
    </div>

    <div class="form-group">
        <label id="">Attachments path</label>
        <a type="text" id="" name="" class="form-control" href="<?php echo $attachment_path ?>" readonly><?php echo $attachment_path ?></a>
    </div>

    <div class="form-group">
        <label id="">Handover Person Name</label>
        <input type="text" id="" name="" class="form-control" value="<?php echo $handover_personname ?>" readonly>
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
            <td><input type="text" id="" name="client" class="form-control" value="<?php echo $handover_client ?>" readonly></td>
            <td><input type="text" id="" name="responsibilies" class="form-control" value="<?php echo $handover_responcibilities ?>" readonly></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="form-group">
        <label id="">Manager Name</label>
        <input type="text" id="" name="" class="form-control" value="<?php echo $for_managername ?>" readonly>
    </div>

    <div class="form-group">
        <div class="text-center">
            <?php if ($user_status == 0 ):?>
                <button class="btn btn-primary btn1" id="" type="submit" name="save_user_status" >Submit</button>
            <?php endif ?>
        </div>
    </div>

    <?php if ($user_status == 1):?>
    <div class="form-group">
      <div class="text-center">
          <?php if ($manager_status == 0 ): $status_text = "Manager Not Submitded"?>
              <label id="">Manager Comment</label>
              <input type="text" id="" name="manager_comment" class="form-control" value="" required><br>
              <label id="">Transfer to other Manager</label>
              <select class="form-control" name="second_manager_name">
                  <option>-choose-</option>
                  <?php
                  $forsecond_manager_queary = mysqli_query($db, "SELECT * FROM user_details WHERE USER_GROUP= $MANAGER_GROUPID ");
                  while ($row3 = mysqli_fetch_array($forsecond_manager_queary)) { ?>
                      <option><?php echo $row3['USER_LOGIN_NAME']; ?></option>
                  <?php } ?>
              </select><br>
              <button class="btn btn-primary btn1" id="" type="submit" name="save_manager_status" >Manager Submit</button>
          <?php endif ?>
      </div>
    </div>
        <div class="form-group">
            <div class="text-center">
                <?php if ($for_2managername != "" && $manager_2status == 0  ):?>
                    <label id="">Manager ( <?php echo $for_2managername?> ) Comment</label>
                    <input type="text" id="" name="manager2_comment" class="form-control" value="" required><br>
                    <button class="btn btn-primary btn1" id="" type="submit" name="save_manager2_status" >Manager ( <?php echo $for_2managername?> ) Submit</button>
                <?php endif ?>
            </div>
        </div>


        <!-- <?php if (isset($_SESSION['messageone'])): ?>
          <div class="alert alert-success text-center" role="alert">
            <?php
              echo $_SESSION['messageone'];
              unset($_SESSION['messageone']);
            ?>
          </div>
        <?php endif ?> -->
    </form>

      <br>

      <div class="form-group">
          <div class="text-center"><label>All Status</label></div>
          <table class="table">
              <thead>
              <tr>
                  <th>Manager/HR</th>
                  <th>Comment</th>
              </tr>
              </thead>
              <tbody>
              <?php if ($manager_status == 0):?>
                  <tr><td><?php echo "Manager not submited"; ?></td></tr>
              <?php endif ?>
              <?php if ($manager_status == 1  ):?>
              <tr>
                  <td><?php echo "Manager ".$for_managername." Submited"; ?></td>
                  <td><?php echo $manager_comment; ?></td>
              </tr>
              <?php endif ?>
              <?php if ($manager_2status == 1  ):?>
                  <tr>
                      <td><?php echo "Manager ".$for_2managername." Submited"; ?></td>
                      <td><?php echo $manager_2comment; ?></td>
                  </tr>
              <?php endif ?>
              <?php if ($hr_status == 1  ):?>
                  <tr>
                      <td><?php echo "HR Submited"; ?></td>
                      <td><?php echo $hr_comment; ?></td>
                  </tr>
              <?php endif ?>
              </tbody>
          </table>
      </div>

      <?php if ((($manager_status == 1 && $for_2managername == "") || ($manager_status == 1 && $manager_2status == 1)) && $hr_status == 0):?>

      <form  method="post" enctype="multipart/form-data" >
          <div class="form-group">
              <div class="text-center"><h4><label>HR Approvement Form</label></h4></div>
          </div>

          <div class="form-group">
              <label id="">HR Username</label>
              <select class="form-control" name="hr_user_name">
                  <?php
                  $findall_hr_users_queary = mysqli_query($db, "SELECT * FROM user_details WHERE USER_GROUP= $HR_GROUPID ");
                  while ($row4 = mysqli_fetch_array($findall_hr_users_queary)) { ?>
                      <option><?php echo $row4['USER_LOGIN_NAME']; ?></option>
                  <?php } ?>
              </select>
          </div>

          <div class="form-group">
              <label id="">HR Comment</label>
              <input type="text" name="hr_comment" class="form-control" value="" required>
          </div>

          <div class="form-group">
              <label id="">HR Attachment</label>
              <input type="file" name="file" class="form-control" value="" >
          </div>

          <div class="form-group">
              <div class="text-center">
              <button class="btn btn-primary btn1" id="" type="submit" name="save_hr_status" >HR Submit</button>
              </div>
          </div>
      </form>

      <?php endif ?>
      <?php endif ?>

  </div>

</body>
</html>



<!---->
<!--          <textarea rows="4" class="form-control" readonly>-->
<!--              --><?php //if ($manager_status == 0 && $manager_2status == 0 ):?>
<!--                  --><?php //echo "Manager not submited"; ?>
<!--              --><?php //endif ?>
<!--              --><?php //if ($manager_status == 1  ):?>
<!--                  --><?php //echo "Manager ".$for_managername." Submited"; ?>
<!--                  --><?php //echo "Manager Comment: ".$manager_comment; ?>
<!--              --><?php //endif ?>
<!--              --><?php //if ($manager_2status == 1  ):?>
<!--                  --><?php //echo "Manager ".$for_2managername." Submited"; ?>
<!--                  --><?php //echo "Manager Comment: ".$manager_2comment; ?>
<!--              --><?php //endif ?>
<!--          </textarea>-->
