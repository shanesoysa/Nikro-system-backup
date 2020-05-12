<?php

$db = mysqli_connect('localhost', 'root', '', 'user_db');

if (isset($_POST['add'])) {
  // $ID =$_POST['ID'];
  $eno=$_POST['eno'];
  $Dateatt=$_POST['present_date'];
  $remark=$_POST['remark'];

  

  

  $insert_query = mysqli_query($db, "INSERT INTO attendence (en_no,dates,remark) VALUES ('$eno', '$Dateatt', '$remark')"); 

  if($insert_query){

    $_SESSION['messageatt'] = "Successfully Added"; 
    header('location:  attendance.php');
  }
  else
  {
  $_SESSION['messageatt'] = "Error !"; 
  header('location:  holidayAdder.php');
  }

}

//-------------------------------------------------------------------------------------------------------

if (isset($_POST['attendance_batch'])) {
  
  if ($_FILES["attendance_list"]["error"] > 0) {
      echo "Return Code: " . $_FILES["attendance_list"]["error"] . "<br/><br/>";
  } else {

          $random=rand();
          $filename = $_FILES['attendance_list']['name'];
          $modified_file_name = "Attendance_".$random.".txt";

      if (file_exists("attachments/attendance/" . $modified_file_name)) {
          echo $modified_file_name . " <b>already exists.</b> ";
      } else {
          move_uploaded_file($_FILES["attendance_list"]["tmp_name"], "attachments/attendance/" . $modified_file_name);
          $imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "attachments/attendance/" . $modified_file_name;

            

      $open = fopen("http://18.138.8.42:85/System/PHPproject/attachments/attendance/Attendance_".$random.".txt",'r');
 
              while (!feof($open)) 
              {
                $getTextLine = fgets($open);
                $explodeLine = explode("\t",$getTextLine);
                
                list($no,$tm_no,$en_no,$name,$gm_no,$mode,$dates) = $explodeLine;

                $no_strip = preg_replace("/[^a-zA-Z0-9]/", "", $no);

                $tm_no_strip = preg_replace("/[^a-zA-Z0-9]/", "", $tm_no);

                $en_no_strip = preg_replace("/[^a-zA-Z0-9]/", "", $en_no);

                $name_strip = preg_replace("/[^a-zA-Z0-9]/", "", $name);

                $gm_no_strip = preg_replace("/[^a-zA-Z0-9]/", "", $gm_no);

                $mode_strip = preg_replace("/[^a-zA-Z0-9]/", "", $mode);

                $dates_strip = preg_replace("/[^a-zA-Z0-9-: ]/", "",$dates);

                
 
                
                 $qry = "insert into attendence (tm_no, en_no, name, gm_no, mode, dates) values('".$tm_no_strip."','".$en_no_strip."','".$name_strip."','".$gm_no_strip."','".$mode_strip."','".$dates_strip."')";
                 mysqli_query($db,$qry);
              }      

              fclose($open);

              if(mysqli_query($db,$qry)){
                $_SESSION['messageattbatch'] = "Attendance upload successfull "; 
                header('location:  attendance.php');
              }
              else{
                $_SESSION['messageattbatch'] = "Attendance upload failed try again  ";
                header('location:  attendance.php');
              }
              
           
      }
  }



}

?>
