<?php

$db = mysqli_connect('localhost', 'root', '', 'user_db');

if (isset($_POST['addholiday'])) {
  // $ID =$_POST['ID'];
  $company=$_POST['company'];
  $holidaytype=$_POST['holidaytype'];
  $holiday=$_POST['holiday'];
  $remark=$_POST['remark'];

  

  

  $insert_query = mysqli_query($db, "INSERT INTO calendar_plan_events (company, title, start_event, end_event, remark) VALUES ('$company', '$holidaytype', '$holiday', '$holiday','$remark')"); 

  if($insert_query){
  
  header('location:  Calender/calender.php');
  }
  else
  {
  $_SESSION['messageholi'] = "Error !"; 
  header('location:  holidayAdder.php');
  }

}

//-------------------------------------------------------------------------------------------------------

if (isset($_POST['addbatch'])) {
  

  $subfolder="Calender";
  

  if ($_FILES["attachment"]["error"] > 0) {
      echo "Return Code: " . $_FILES["attachment"]["error"] . "<br/><br/>";
  } else {
          $random=rand();
          $filename = $_FILES['attachment']['name'];
          $modified_file_name = "Calander_".$random.".txt";

      if (file_exists("calander_attachments/" . $modified_file_name)) {
          echo $modified_file_name . " <b>already exists.</b> ";
      } else {
          move_uploaded_file($_FILES["attachment"]["tmp_name"], "calander_attachments/" . $modified_file_name);
          $imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "calander_attachments/" . $modified_file_name;

            

      $open = fopen("http://18.138.8.42:85/System/PHPproject/calander_attachments/Calander_".$random.".txt",'r');
 
              while (!feof($open)) 
              {
                $getTextLine = fgets($open);
                $explodeLine = explode(",",$getTextLine);
                
                list($company,$title,$start_event,$remark) = $explodeLine;
                
                $qry = "insert into calendar_plan_events (company, title, start_event, remark) values('".$company."','".$title."','".$start_event."','".$remark."')";
                mysqli_query($db,$qry);
              }
               
              $location =getcwd().'\Calander_.txt';

              fclose($open);
              unlink($location);

              echo $location;
           header('location:  Calender/calender.php');
      }
  }



}

?>
