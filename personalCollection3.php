<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>


<?php

    if (isset($_POST['personal_collection3_submit'])) {

        $rowCountBE =  $_COOKIE['basicEduCounter'];
        $rowCountTE =  $_COOKIE['technicalEduCounter'];
        $rowCountPE =  $_COOKIE['profeshionalEduCounter'];

        //echo $rowCountBE;
        for($i=0; $i<=$rowCountBE; $i++){
            $schoolName = $_POST['school_be'.$i];
            $level = $_POST['level_be'.$i];
            $year = $_POST['year_be'.$i];
            $subject = $_POST['subject_be'.$i];
            $result = $_POST['result_be'.$i];

            // echo $schoolName;echo " ";echo $level;echo " ";echo $year;echo " ";echo $subject;echo " ";echo $result;echo " ";

            $insert_query_be = mysqli_query($db, "INSERT INTO personal_information_basic_edu (record_id, school, level, year, subject, result) VALUES (
                                        '12',
                                        '$schoolName',
                                        '$level',
                                        '$year',
                                        '$subject',
                                        '$result'
                                        )");
            if($insert_query_be){
                echo "done.........  ";
            }else{
                echo "error.. ";
            }            
        }
        for($i=0; $i<=$rowCountTE; $i++){
            $instituteNameTe = $_POST['institute_te'.$i];
            $levelTe = $_POST['level_te'.$i];
            $yearTe = $_POST['year_te'.$i];
            $subjectTe = $_POST['subject_te'.$i];
            $resultTe = $_POST['result_te'.$i];

            // echo $schoolName;echo " ";echo $level;echo " ";echo $year;echo " ";echo $subject;echo " ";echo $result;echo " ";

            $insert_query_te = mysqli_query($db, "INSERT INTO personal_information_techical_edu (record_id, institute, level, year, subject, result) VALUES (
                                        '12',
                                        '$instituteNameTe',
                                        '$levelTe',
                                        '$yearTe',
                                        '$subjectTe',
                                        '$resultTe'
                                        )");
            if($insert_query_te){
                echo "done.........  ";
            }else{
                echo "error.. ";
            }            
        }
        for($i=0; $i<=$rowCountPE; $i++){
            $instituteNamePe = $_POST['institute_pe'.$i];
            $levelPe = $_POST['level_pe'.$i];
            $yearPe = $_POST['year_pe'.$i];
            $subjectPe = $_POST['subject_pe'.$i];
            $resultPe = $_POST['result_pe'.$i];

            // echo $schoolName;echo " ";echo $level;echo " ";echo $year;echo " ";echo $subject;echo " ";echo $result;echo " ";

            $insert_query_pe = mysqli_query($db, "INSERT INTO personal_information_profeshional_edu (record_id, university_institute, level, year, subject, result) VALUES (
                                        '12',
                                        '$instituteNamePe',
                                        '$levelPe',
                                        '$yearPe',
                                        '$subjectPe',
                                        '$resultPe'
                                        )");
            if($insert_query_pe){
                echo "done.........  ";
            }else{
                echo "error.. ";
            }            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Information 3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

<h4 class="text-center">Personal Information part 3 (Basic/Academic)</h4>
<h5 class="text-center">Basic Education</h5>

<div class="container">
<form method="post" action="">
    <table id="myTable" class=" table order-list-be">
    <thead>
        <tr>
            <td>School</td>
            <td>Level</td>
            <td>Year</td>
            <td>Subject</td>
            <td>Result</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="school_be0" class="form-control" />
            </td>
            <td class="col-sm-2">
                <input type="text" name="level_be0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="year_be0"  class="form-control"/>
            </td>
            <td class="col-sm-4">
                <input type="text" name="subject_be0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="result_be0"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success" id="addrow_be"><i class="fa fa-plus-circle"></i></button>
    </div>

    <!-- <div class="text-right">
      <a href="personalCollection3.php" class="btn btn-primary" style="margin-top: 10px">SAVE & NEXT</a>
    </div> -->

    <h5 class="text-center">Technical Education</h5>


    <table id="myTable" class=" table order-list-te">
    <thead>
        <tr>
            <td>Institute</td>
            <td>Level</td>
            <td>Year</td>
            <td>Subject</td>
            <td>Result</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="institute_te0" class="form-control" />
            </td>
            <td class="col-sm-2">
                <input type="text" name="level_te0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="year_te0"  class="form-control"/>
            </td>
            <td class="col-sm-4">
                <input type="text" name="subject_te0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="result_te0"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success " id="addrow_te"><i class="fa fa-plus-circle"></i></button>
    </div>

    <h5 class="text-center">Profeshional Education</h5>


    <table id="myTable" class=" table order-list-pe">
    <thead>
        <tr>
            <td>Institute/University</td>
            <td>Level</td>
            <td>Year</td>
            <td>Subject</td>
            <td>Result</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="institute_pe0" class="form-control" />
            </td>
            <td class="col-sm-2">
                <input type="text" name="level_pe0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="year_pe0"  class="form-control"/>
            </td>
            <td class="col-sm-4">
                <input type="text" name="subject_pe0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="result_pe0"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success " id="addrow_pe"><i class="fa fa-plus-circle"></i></button>
    </div>

    

    <div class="text-right">
        <button type="submit" name="personal_collection3_submit" class="btn btn-primary">SAVE & NEXT</button>
    </div>
</form>
</div>

<script type="text/javascript">
  
  $(document).ready(function () {
    var counterr = 1;
    var counter_te = 1;
    var counter_pe =  1;
    $("#addrow_be").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" name="school_be' + counterr + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="level_be' + counterr + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="year_be' + counterr + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="subject_be' + counterr + '"/></td>';
        cols += '<td><input type="text" class="form-control" name ="result_be' + counterr + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_be btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-be").append(newRow);
        document.cookie = "basicEduCounter ="+ counterr;
        counterr++;
    });
    $("table.order-list-be").on("click", ".ibtnDel_be", function (event) {
        $(this).closest("tr").remove();       
        counterr -= 1
    });

    $("#addrow_te").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" name="institute_te' + counter_te + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="level_te' + counter_te + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="year_te' + counter_te + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="subject_te' + counter_te + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="result_te' + counter_te + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_te btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-te").append(newRow);
        document.cookie = "technicalEduCounter ="+ counter_te;
        counter_te++;
    });
    $("table.order-list-te").on("click", ".ibtnDel_te", function (event) {
        $(this).closest("tr").remove();       
        counter_te -= 1
    });

    $("#addrow_pe").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" name="institute_pe' + counter_pe + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="level_pe' + counter_pe + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="year_pe' + counter_pe + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="subject_pe' + counter_pe + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="result_pe' + counter_pe + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_pe btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-pe").append(newRow);
        document.cookie = "profeshionalEduCounter ="+ counter_pe;
        counter_pe++;
    });
    $("table.order-list-pe").on("click", ".ibtnDel_pe", function (event) {
        $(this).closest("tr").remove();       
        counter_pe -= 1
    });


});

</script>



</body>
</html>
