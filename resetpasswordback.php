
<?php include('php_code.php');?>
<?php



$db = mysqli_connect('localhost', 'root', '', 'user_db');

  if (isset($_POST['update'])) {
  $id = $_POST['ID'];
  $Username = $_POST['Username'];
  $Password = my_simple_crypt(($_POST['Password']),'e');
  $Companyid = $_POST['Companyid'];
  $Usertype = $_POST['Usertype'];
  $Usergroup = $_POST['Usergroup'];
  $Userstatus =$_POST['Userstatus'];
  $confirmpassword =my_simple_crypt(($_POST['conPassword']),'e');
  $AdminUsername = $_POST['adminusername'];
  $AdminPassword = my_simple_crypt(($_POST['adminpassword']),'e');



  if($AdminUsername==$_SESSION['login_user'] && $AdminPassword==$_SESSION['login_password']){


                    $update_one_user=mysqli_query($db, "UPDATE user_details SET USER_LOGIN_NAME='$Username', USER_PASSWORD='$Password', USER_COMPANY_ID='$Companyid', USER_TYPE='$Usertype', USER_GROUP=' $Usergroup', USER_STATUS= ' $Userstatus' WHERE RECORD_ID='$id' ");

                    if($update_one_user){
                      $_SESSION['message'] = "Password Updated!";
                      header('location: resetpassword.php');
                    }
                    else{
                    $_SESSION['message'] = "Password update failed!"; 
                    header('location: resetpassword.php');

                    }
  }
  else{
    echo 
'<style type="text/css">
.alert {
      padding: 20px;
      background-color: #F98066;
      color: black;
      width: 40%;
      margin-left: auto;
      margin-right: auto;
      }
</style>';

      $_SESSION['message'] = "Admin Password or Username Incorrect";
      header('location: resetpassword.php');


  }

  }




?>