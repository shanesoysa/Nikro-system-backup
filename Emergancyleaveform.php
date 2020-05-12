<?php include('php_code.php');?>
<?php include('logcheck.php');?>
<?php include('access.php');?>

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
  .one_user_management-form {
        width: 500px;
        margin: 10px auto;
        
  }
    .one_user_management-form form {
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
  
  <div><?php include 'navigation.php';?>
    <script type="text/javascript">
    document.getElementById('navmain').style.height = '12px';
  </script>
  </div>
  
<h1>Emergancy Leave Application</h1>

  <div class="one_user_management-form">

    <form  method="post">
      <div class="form-group">
        <label id="">Employee No</label>
        <input type="text" id="" name="" class="form-control" value="">
      </div>
      <div class="form-group">
        <label id="">Name</label>
        <input type="text" id="" name="" class="form-control" value="">
      </div>
      <div class="form-group">
        <label id="">Date</label>
        <input type="Date" id="" name="" class="form-control" value="">
      </div>  
    
    <div class="form-group">
        <label id="">Reason:</label>
        <input type="text" id="" name="" class="form-control" value="">
    </div>

    <div class="form-group">
      <div class="text-center">
      		<button class="btn btn-success btn1" id="" type="submit" name="" >Submit</button>
		  </div>

      <?php if (isset($_SESSION['messageone'])): ?>
      <div class="alert alert-success text-center" role="alert">
        <?php 
          echo $_SESSION['messageone']; 
          unset($_SESSION['messageone']);
        ?>
      </div>
    <?php endif ?>
    </form>
  </div>

</body>
</html>