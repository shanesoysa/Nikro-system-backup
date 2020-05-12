<?php  include('php_code.php'); ?>
<?php include('logcheck.php');?>
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
  .attendence-form {
        width: 500px;
        margin: 10px auto;
        
  }
    .attendence-form form {
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

<center><h2>Add Employee Attendence Manually</h2></center>
  <div class="attendence-form">
    <form  method="post" name='attendance' action="attendance_code.php" enctype="multipart/form-data">

    <input type="hidden" name="ID" class="form-control">
      
    <div class="form-group">
      <label >Employee No :</label>
        <input type="text" name="eno" class="form-control">
    
    </div>

    <div class="form-group">
        <label >Date :</label>
        <input type="Date" name="present_date" class="form-control">
      </div>

      <div class="form-group">
        <label >Remark :</label>
        <input type="text" name="remark" class="form-control">
      </div>

    <div class="form-group">
      	<div class="text-center">
      	<button class="btn btn-primary btn1" type="submit" name="add" >Add Manually</button>
       
	</div>


      <?php if (isset($_SESSION['messageatt'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messageatt']; 
          unset($_SESSION['messageatt']);
        ?>
      </div>
    <?php endif ?>
    </form>
  </div>

<center><h2>Add Employee Attendence As Batch</h2></center>
   <div class="attendence">
    <form  method="post" name='batchattendance' action="attendance_code.php" enctype="multipart/form-data">

    <input type="hidden" name="ID" class="form-control">
      
      <span style="float: right;" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom" title="Attach txt file gatherd from fingerprint machine"></span>
      <div class="form-group">
        
        <input type="file" name="attendance_list" class="form-control">
      </div>

      <button class="btn btn-success btn1" type="submit" name="attendance_batch" >Add Batch</button>
   

      <?php if (isset($_SESSION['messageattbatch'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messageattbatch']; 
          unset($_SESSION['messageattbatch']);
        ?>
      </div>
    <?php endif ?>
    </form>
  </div>


  <script>
   $(function(){
            $('[data-toggle="tooltip"]').tooltip();
   })
</script>





</body>
</html>