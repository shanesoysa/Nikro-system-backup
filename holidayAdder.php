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
  .holiday-adder-form {
        width: 500px;
        margin: 10px auto;
        
  }
    .holiday-adder-form form {
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


  <div class="holiday-adder-form">
    <form  method="post" name='holiday_Adder' action="holidayAdder_code.php" enctype="multipart/form-data">

    <input type="hidden" name="ID" class="form-control">
      
    <div class="form-group">
        <label for="exampleFormControlSelect1">Company Name :</label>
        <select class="form-control" name="company">
        <option value="1">Nikro</option>
        <option value="2">Onit</option>
        <option value="3">Kanwill</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Holiday Type :</label>
        <select class="form-control" name="holidaytype">
        <option>Regualr</option>
        <option>Weekend</option>
        <option>Companywise</option>
        </select>
    </div>

    <div class="form-group">
        <label >Date :</label>
        <input type="Date" name="holiday" class="form-control">
      </div>

      <div class="form-group">
        <label >Remark :</label>
        <input type="text" name="remark" class="form-control">
      </div>

    <div class="form-group">
      	<div class="text-center">
        <a href="Calender/calender.php" class="btn btn-primary btn1" >View Calander</a>
      	<button class="btn btn-success btn1" type="submit" name="addholiday" >Add Holiday</button>
       
	</div>


      <?php if (isset($_SESSION['messageholi'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messageholi']; 
          unset($_SESSION['messageholi']);
        ?>
      </div>
    <?php endif ?>
    </form>
  </div>


   <div class="holiday-adder-form">
    <form  method="post" name='batchadder' action="holidayAdder_code.php" enctype="multipart/form-data">

    <input type="hidden" name="ID" class="form-control">
      
      <span style="float: right;" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom" title="Example:2,Weekend,2020-05-11,Annual "></span>
      <div class="form-group">
        <label >Add holidays as a batch</label>
        <input type="file" name="attachment" class="form-control">
      </div>

      <button class="btn btn-success btn1" type="submit" name="addbatch" >Add Batch</button>
      

      <?php if (isset($_SESSION['messageholi'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messagebatch']; 
          unset($_SESSION['messagebatch']);
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