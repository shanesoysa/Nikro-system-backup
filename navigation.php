<?php ini_set('Error reporting', E_ALL);?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-inverse" id="navmain" style="margin-top: 5px; ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://18.138.8.42:85/System/PHPproject/home.php">NMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav mr-auto">
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown1">
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/list.php" id="N12345678">User Profile</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/personalCollection.php">Personal Information form</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/leaveform.php">Leaves</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/Calender/calender.php">Calender</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/calenderView/calenderView.php?useredit=<?php echo $_SESSION['loginid']; ?>">Calender View</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/personalCollectionView.php">Personal Collection View</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/leaveView.php">Leave View</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/Emergancyleaveform.php">Emergancyleaveform</a></li>
                    <li class="dropdown-item"><a href="oneusermanagement.php?useredit=<?php echo $_SESSION['loginid']; ?>">Personal Profile</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/company_data.php">Company Data Form</a></li>
                    <div class="divider"></div>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/userdetails.php" id="N12345678">User Details</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/resetpassword.php" id="N12345678">Reset Password</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/userstatus.php" id="N12345678">User Status</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/deleteuser.php" id="N12345678">Delete User</a></li>
                    <li class="dropdown-item"><a href="http://18.138.8.42:85/System/PHPproject/holidayAdder.php" id="N12345678">Holiday Adder</a></li>
                    <div class="divider"></div>


                   
                    <li class="dropdown-item dropdown">
                        <a href="www.google.com" class="dropdown-toggle" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">HR Department<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item"><a href="./personalCollection.php">Personal Information form</a></li>
                            <li class="dropdown-item" href="#"><a>Payment</a></li>
                            <li class="dropdown-item" href="./leaveform.php"><a>Leaves</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">IT Department<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item" href="#"><a href="www.google.com">Salary1</a></li>
                            <li class="dropdown-item" href="#"><a>Payment</a></li>
                            <li class="dropdown-item" href="#"><a>Leaves</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accounting Department<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item" href="#"><a>Salary</a></li>
                            <li class="dropdown-item" href="#"><a>Payment</a></li>
                            <li class="dropdown-item" href="#"><a>Leaves</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Finance Department<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item" href="#"><a>Salary</a></li>
                            <li class="dropdown-item" href="#"><a>Payment</a></li>
                            <li class="dropdown-item" href="#"><a>Leaves</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Audit Department<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item" href="#"><a>Salary</a></li>
                            <li class="dropdown-item" href="#"><a>Payment</a></li>
                            <li class="dropdown-item" href="#"><a>Leaves</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tax Department<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item" href="#"><a>Salary</a></li>
                            <li class="dropdown-item" href="#"><a>Payment</a></li>
                            <li class="dropdown-item" href="#"><a>Leaves</a></li>
                        </ul>
                    </li>




                </ul>
            </li>
        
      </ul>

        <!-- <div class="nav navbar-nav dropdown">
            <button class="btn btn-default navbar-btn dropdown-toggle"  data-toggle="dropdown">Menu
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                    <a class="test" tabindex="-1" href="#">HR Department <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="http://18.138.8.42:85/System/PHPproject/personalCollection.php">Personal Information Form</a></li>
                        <li><a tabindex="-1" href="http://18.138.8.42:85/System/PHPproject/personalCollection.php">Personal Collection View</a></li>
                        <li><a tabindex="-1" href="#">Leaves</a></li>
                        <li><a tabindex="-1" href="#">Leave View</a></li>
                        <li><a tabindex="-1" href="#">Company Registration Form</a></li>
                        <li><a tabindex="-1" href="#">Emergency Leave Form</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="test" tabindex="-1" href="#">User <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">User Profile</a></li>
                        <li><a tabindex="-1" href="#">Personal Profile</a></li>
                        <li><a tabindex="-1" href="#">User Details</a></li>
                        <li><a tabindex="-1" href="#">Reset Password</a></li>
                        <li><a tabindex="-1" href="#">User Status</a></li>
                        <li><a tabindex="-1" href="#">Delete User</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="test" tabindex="-1" href="#">Calender <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">Calender</a></li>
                        <li><a tabindex="-1" href="#">Calender View</a></li>
                        <li><a tabindex="-1" href="#">Holiday Adder</a></li>
                    </ul>
                </li>
            </ul>
        </div>
 -->
 
<div class="dropdown">
  <!-- Link or button to toggle dropdown -->
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    <li><a tabindex="-1" href="#">Action</a></li>
    <li><a tabindex="-1" href="#">Another action</a></li>
    <li><a tabindex="-1" href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a tabindex="-1" href="#">Separated link</a></li>
  </ul>
</div>

        <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo '<body onload="startTime()"><span id="txt"></span></body>';?></a></li>
        <li>
            <?php if (isset($_SESSION['name'])): ?>
        <a href=""><span class="glyphicon glyphicon-user"></span>
        <?php
                $UserIDForName=$_SESSION['loginid'];
                $userDisplayNameQuery = mysqli_query($db, "SELECT USER_DISPLAY_NAME FROM user_p_details WHERE RECORD_ID='$UserIDForName'");              
                    if(isset($userDisplayNameQuery)==1){
                        $n = mysqli_fetch_array($userDisplayNameQuery);
                        $userDisplayName = $n['USER_DISPLAY_NAME'];
                        }
                          echo $userDisplayName;
                          endif
                        ?> 
        </a>
        </li>

          <li>
              <form method='post' action="">
                  <button class="btn btn-dark navbar-btn" name=""><i class="fa fa-tasks"></i></button>
              </form>

          </li>

        <li>
            <form method='post' action="php_code.php">
                <button style="margin-left: 5px" class="btn btn-danger navbar-btn" name="logout">Logout</button>
            </form>
        </li>
            
      </ul>
    </div>
  </div>
</nav>


<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
</style>

<script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();

            e.preventDefault();
            e.stopPropagation();

        });
    });
</script>