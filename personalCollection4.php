<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>

<?php

// $rowCountTD =  $_COOKIE['tranindDetailsCounter'];
// echo $rowCountTD;

if (isset($_POST['personal_collection4_submit'])) {

    //echo "submit";
   
    $rowCountTD =  $_COOKIE['tranindDetailsCounter'];
    $rowCountED =  $_COOKIE['employeeDetailsCounter'];

    for($i=0; $i<=$rowCountTD; $i++){
        if(isset($_POST['institute_td'.$i])){
            $instituteTd = $_POST['institute_td'.$i];
            echo $instituteTd; echo "          ";
        }
        // $instituteTd = $_POST['institute_td'.$i];
        // $typeOfTraningTd = $_POST['typeoftraining_td'.$i];
        // $dateFromTd = $_POST['from_td'.$i];
        // $dateToTd = $_POST['to_td'.$i];
        // $yearsTd = $_POST['years_td'.$i];

        

        // $insert_query_td = mysqli_query($db, "INSERT INTO personal_information_traning_details (record_id, institute, type_of_tranning, date_from, date_to, years) VALUES (
        //                             '12',
        //                             '$instituteTd',
        //                             '$typeOfTraningTd',
        //                             '$dateFromTd',
        //                             '$dateToTd',
        //                             '$yearsTd'
        //                             )");
        // if($insert_query_td){
        //     echo "done.........  ";
        // }else{
        //     echo "error.. ";
        // }            
    }
    for($i=0; $i<=$rowCountED; $i++){
        $empNameAddEd = $_POST['empnameaddress_ed'.$i];
        $designationEd = $_POST['designation_ed'.$i];
        $fromEd = $_POST['from_ed'.$i];
        $toEd = $_POST['to_ed'.$i];
        $yearsEd = $_POST['years_ed'.$i];

        echo $empNameAddEd; echo "          ";

        // $insert_query_ed = mysqli_query($db, "INSERT INTO personal_information_employeement_details (record_id, emp_name_address, designation, date_from, date_to, years) VALUES (
        //                             '12',
        //                             '$empNameAddEd',
        //                             '$designationEd',
        //                             '$fromEd',
        //                             '$toEd',
        //                             '$yearsEd'
        //                             )");
        // if($insert_query_ed){
        //     echo "done.........  ";
        // }else{
        //     echo "error.. ";
        // }            
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

<h4 class="text-center">Personal Information part 4</h4>
<h5 class="text-center">Training Details</h5>

<div class="container">

<form method="post" action="">
    <table id="myTable" class=" table order-list-td">
    <thead>
        <tr>
            <td>Institute</td>
            <td>Type of Training</td>
            <td>From</td>
            <td>To</td>
            <td>Years</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="institute_td0" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="text" name="typeoftraining_td0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="date" name="from_td0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="date" name="to_td0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="number" name="years_td0"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success " id="addrow_td"><i class="fa fa-plus-circle"></i></button>
    </div>

    

    <!-- <div class="text-right">
      <a href="personalCollection3.php" class="btn btn-primary" style="margin-top: 10px">SAVE & NEXT</a>
    </div> -->

    <h5 class="text-center">Employeement Details</h5>


    <table id="myTable" class=" table order-list-ed">
    <thead>
        <tr>
            <td>Employer Name & Address</td>
            <td>Designations</td>
            <td>From</td>
            <td>To</td>
            <td>Years</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="empnameaddress_ed0" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="text" name="designation_ed0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="date" name="from_ed0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="date" name="to_ed0"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="years_ed0"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success " id="addrow_ed"><i class="fa fa-plus-circle"></i></button>
    </div>

    <div class="text-right">
      <!-- <a href="personalCollection5.php" class="btn btn-primary" style="margin-top: 10px">SAVE & NEXT</a> -->
      <button type="submit" name="personal_collection4_submit" class="btn btn-primary">SAVE & NEXT</button>
    </div>

    </form>

</div>

<script type="text/javascript">
  
  $(document).ready(function () {
    document.cookie = "tranindDetailsCounter = 0";
    document.cookie = "employeeDetailsCounter = 0";
    var counter_td = 1;
    var counter_ed = 1;
    $("#addrow_td").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" value="'+counter_td+'" name="institute_td' + counter_td + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="typeoftraining_td' + counter_td + '"/></td>';
        cols += '<td><input type="date" class="form-control" name="from_td' + counter_td + '"/></td>';
        cols += '<td><input type="date" class="form-control" name="to_td' + counter_td + '"/></td>';
        cols += '<td><input type="text" class="form-control" name ="years_td' + counter_td + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_td btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-td").append(newRow);
        document.cookie = "tranindDetailsCounter ="+ counter_td;
        console.log(counter_td);
        counter_td++;
    });
    $("table.order-list-td").on("click", ".ibtnDel_td", function (event) {
        $(this).closest("tr").remove();       
        counter_td = counter_td - 1;
        document.cookie = "tranindDetailsCounter ="+ counter_td;
        console.log(counter_td);
    });
    

    $("#addrow_ed").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" name="empnameaddress_ed' + counter_ed + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="designation_ed' + counter_ed + '"/></td>';
        cols += '<td><input type="date" class="form-control" name="from_ed' + counter_ed + '"/></td>';
        cols += '<td><input type="date" class="form-control" name="to_ed' + counter_ed + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="years_ed' + counter_ed + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_ed btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-ed").append(newRow);
        document.cookie = "employeeDetailsCounter ="+ counter_ed;
        counter_ed++;
    });
    $("table.order-list-ed").on("click", ".ibtnDel_ed", function (event) {
        $(this).closest("tr").remove();       
        counter_ed -= 1
    });

});

</script>



</body>
</html>
