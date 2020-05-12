<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>


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

<h4 class="text-center">Personal Information part 5</h4>
<h5 class="text-center">Family Details (Children/Spouse)</h5>

<div class="container">
    <table id="myTable" class=" table order-list-fdsc">
    <thead>
        <tr>
            <td>Name</td>
            <td>Relationalship</td>
            <td>NIC No</td>
            <td>Work Place</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="name_fdsc" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="text" name="relationalship_fdsc"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="nic_fdsc"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="workplace_fdsc"  class="form-control"/>
            </td>
            
            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success " id="addrow_fdsc"><i class="fa fa-plus-circle"></i></button>
    </div>

    

    <!-- <div class="text-right">
      <a href="personalCollection3.php" class="btn btn-primary" style="margin-top: 10px">SAVE & NEXT</a>
    </div> -->

    <h5 class="text-center">Parent Details</h5>


    <table id="myTable" class=" table order-list-pd">
    <thead>
        <tr>
            <td>Name</td>
            <td>Relationalship</td>
            <td>NIC No</td>
            <td>Work Place</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="name_pd" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="text" name="relationalship_pd"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="nic_pd"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="workplace_pd"  class="form-control"/>
            </td>

            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
    </tbody>    
    </table>

    <div class="text-right" style="margin-right: 7px">
      <button type="button" class="btn btn-success " id="addrow_pd"><i class="fa fa-plus-circle"></i></button>
    </div>

    <h5 class="text-center">Brothers/Sisters Details</h5>

    <table id="myTable" class=" table order-list-bsd">
        <thead>
        <tr>
            <td>Name</td>
            <td>Relationalship</td>
            <td>NIC No</td>
            <td>Work Place</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="name_bsd" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="text" name="relationalship_bsd"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="nic_bsd"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="workplace_bsd"  class="form-control"/>
            </td>

            <td class="col-sm-2"><a class="deleteRow"></a></td>
        </tr>
        </tbody>
    </table>

    <div class="text-right" style="margin-right: 7px">
        <button type="button" class="btn btn-success " id="addrow_bsd"><i class="fa fa-plus-circle"></i></button>
    </div>


    <div class="text-right">
      <a href="personalCollection5.php" class="btn btn-primary" style="margin-top: 10px">SAVE & NEXT</a>
    </div>




</div>

<script type="text/javascript">
  
  $(document).ready(function () {
    var counter = 0;
    $("#addrow_fdsc").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" name="name_fdsc' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="relationalship_fdsc' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="nic_fdsc' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="workplace_fdsc' + counter + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_fdsc btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-fdsc").append(newRow);
        counter++;
    });
    $("table.order-list-fdsc").on("click", ".ibtnDel_fdsc", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });

    $("#addrow_pd").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" name="name_pd' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="relationalship_pd' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="nic_pd' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="workplace_pd' + counter + '"/></td>';

        cols += '<td><button type="button" class="ibtnDel_pd btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        newRow.append(cols);
        $("table.order-list-pd").append(newRow);
        counter++;
    });
    $("table.order-list-pd").on("click", ".ibtnDel_pd", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });

      $("#addrow_bsd").on("click", function () {
          var newRow = $("<tr>");
          var cols = "";
          cols += '<td><input type="text" class="form-control" name="name_bsd' + counter + '"/></td>';
          cols += '<td><input type="text" class="form-control" name="relationalship_bsd' + counter + '"/></td>';
          cols += '<td><input type="text" class="form-control" name="nic_bsd' + counter + '"/></td>';
          cols += '<td><input type="text" class="form-control" name="workplace_bsd' + counter + '"/></td>';

          cols += '<td><button type="button" class="ibtnDel_bsd btn btn-md btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
          newRow.append(cols);
          $("table.order-list-bsd").append(newRow);
          counter++;
      });
      $("table.order-list-bsd").on("click", ".ibtnDel_bsd", function (event) {
          $(this).closest("tr").remove();
          counter -= 1
      });

});

</script>



</body>
</html>
