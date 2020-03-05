
<?php
   
   
   $db = mysqli_connect('localhost', 'root', '', 'user_db');
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select USER_LOGIN_NAME from user_details where USER_LOGIN_NAME = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['USER_LOGIN_NAME'];
   
   if(!isset($_SESSION['login_user'])){
   	unset($_SESSION['message']);
      header("location:index.php");
      die();
   }
?>