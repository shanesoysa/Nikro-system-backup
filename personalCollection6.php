<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>


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

    <h4 class="text-center">Other Activities</h4>
    <form>
        <div class="form-group">
            <label for="he">Hobbies/Entertainment</label>
            <input type="text" class="form-control" id="he" name="hobbies-entertainment" placeholder="reading books, watching movies etc...">
        </div>

        <div class="form-group">
            <label for="sp">Sports</label>
            <input type="text" class="form-control" id="sp" name="sports" placeholder="cricket, caram, chess etc...">
        </div>


        <div class="form-group" onclick="radioBtnClick()">
            <label>Do you have any relative at NMS ?</label>
            <label class="radio-inline"><input type="radio"  name="radio-1" value="yes" id="yesradio">Yes</label>
            <label class="radio-inline"><input type="radio"  name="radio-1" value="no" id="noradio" checked>No</label>
        </div>


        <div class="row" id="datarow" style="display: none;">
                <div class="form-group col-md-4">
                    <label for="n2">Name</label>
                    <input type="text" class="form-control" name="name_oi" id="n1" placeholder="Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="d1">Designation</label>
                    <input type="text" class="form-control" name="designation_oi" id="n1" placeholder="Designation">
                </div>
                <div class="form-group col-md-4">
                    <label for="dep1">Department</label>
                    <input type="text" class="form-control" name="department_oi" id="dep1" placeholder="Department">
                </div>
        </div>

        <h6 class="text-center">person to contact incase of emergency #1</h6>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name_pcicoe" id="name">
            </div>
            <div class="form-group col-md-4">
                <label for="r1">Relationalship</label>
                <input type="text" class="form-control" name="relationship_pcicoe" id="r1">
            </div>
            <div class="form-group col-md-4">
                <label for="cn">Contact No</label>
                <input type="number" class="form-control" name="contact_pcicoe" id="cn">
            </div>
        </div>
        <h6 class="text-center">person to contact incase of emergency #2</h6>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name_pcicoe_2" id="name">
            </div>
            <div class="form-group col-md-4">
                <label for="r1">Relationalship</label>
                <input type="text" class="form-control" name="relationship_pcicoe_2" id="r1">
            </div>
            <div class="form-group col-md-4">
                <label for="cn">Contact No</label>
                <input type="number" class="form-control" name="contact_pcicoe_2" id="cn">
            </div>
        </div>

        <h5 class="text-center">Non related refrees #1</h5>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="nn1">Name</label>
                <input type="text" class="form-control" name="name_r1" id="nn1">
            </div>
            <div class="form-group col-md-3">
                <label for="dd1">Designation</label>
                <input type="text" class="form-control" name="designation_r1
" id="dd1">
            </div>
            <div class="form-group col-md-6">
                <label for="aa1">Address</label>
                <input type="text" class="form-control" name="address_r1" id="aa1">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="mm1">Mobile 1</label>
                <input type="number" class="form-control" name="mobile1_r1" id="mm1">
            </div>
            <div class="form-group col-md-2">
                <label for="mm2">Mobile 2</label>
                <input type="number" class="form-control" name="mobile2_r1" id="mm2">
            </div>
            <div class="form-group col-md-2">
                <label for="mm3">Mobile 3</label>
                <input type="number" class="form-control" name="mobile3_r1" id="mm3">
            </div>
            <div class="form-group col-md-3">
                <label for="ee1">Email 1</label>
                <input type="email" class="form-control" name="email1_r1" id="ee1">
            </div>
            <div class="form-group col-md-3">
                <label for="ee2">Email 2</label>
                <input type="email" class="form-control" name="email2_r1" id="ee2">
            </div>
        </div>

        <h5 class="text-center">Non related refrees #2</h5>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="nn1">Name</label>
                <input type="text" class="form-control" name="name_r2" id="nn1">
            </div>
            <div class="form-group col-md-3">
                <label for="dd1">Designation</label>
                <input type="text" class="form-control" name="designation_r2
" id="dd1">
            </div>
            <div class="form-group col-md-6">
                <label for="aa1">Address</label>
                <input type="text" class="form-control" name="address_r2" id="aa1">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="mm1">Mobile 1</label>
                <input type="number" class="form-control" name="mobile1_r2" id="mm1">
            </div>
            <div class="form-group col-md-2">
                <label for="mm2">Mobile 2</label>
                <input type="number" class="form-control" name="mobile2_r2" id="mm2">
            </div>
            <div class="form-group col-md-2">
                <label for="mm3">Mobile 3</label>
                <input type="number" class="form-control" name="mobile3_r2" id="mm3">
            </div>
            <div class="form-group col-md-3">
                <label for="ee1">Email 1</label>
                <input type="email" class="form-control" name="email1_r2" id="ee1">
            </div>
            <div class="form-group col-md-3">
                <label for="ee2">Email 2</label>
                <input type="email" class="form-control" name="email2_r2" id="ee2">
            </div>
        </div>

        <h4 class="text-center">Finger Marks</h4>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="ltm">Left Thumb Mark</label>
                <input type="file" class="form-control" name="left_thumb_mark" id="ltm">
            </div>
            <div class="form-group col-md-6">
                <label for="rtm">Right Thumb mark</label>
                <input type="file" class="form-control" name="right_thumb_mark" id="rtm">
            </div>
        </div>


        <div class="text-right">
            <a href="personalCollection3.php" class="btn btn-primary">SUBMIT</a>
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
