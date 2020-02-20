<?php 

	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'user_db');

	// initialize variables
	$Username = "";
	$Password = "";
	$Companyid= "";
	$Usertype= "";
	$Usergroup="";
	$id = 0;
	$resetpw=false;
	$userst=false;
	$update = false;

	
	

	if (isset($_POST['save'])) {
		$ID =$_POST['ID'];
		$Username = $_POST['Username'];
		$Password = my_simple_crypt(($_POST['Password']),'e');  
		$Companyid = $_POST['Companyid'];
		$Usertype = $_POST['Usertype'];
		$Usergroup = $_POST['Usergroup'];

		$result = mysqli_query($db, "INSERT INTO user_details (USER_LOGIN_NAME, USER_PASSWORD, USER_COMPANY_ID, USER_TYPE,USER_GROUP) VALUES ('$Username', '$Password', '$Companyid', '$Usertype', '$Usergroup')"); 

		

		if($result)
		{
			$last_id = $db->insert_id;
			$result_user_p = mysqli_query($db, "INSERT INTO user_p_details (RECORD_ID,USER_COMPANY_ID) VALUES ('$last_id','$Companyid')");

			if($result_user_p){
			$_SESSION['message'] = "User created successfully !"; 
			header('location: usermanagement.php');
		}


		}
		else
		{
		$_SESSION['message'] = "Error !"; 
		header('location: usermanagement.php');
		}
	
	}

// -------------------------------------------------------------------------------------------------------//

	if (isset($_POST['update'])) {
	$id = $_POST['ID'];
	$Username = $_POST['Username'];
	$Password = my_simple_crypt(($_POST['Password']),'e');
	$Companyid = $_POST['Companyid'];
	$Usertype = $_POST['Usertype'];
	$Usergroup = $_POST['Usergroup'];
	$Userstatus =$_POST['Userstatus'];
	$confirmpassword =my_simple_crypt(($_POST['conPassword']),'e');


	
	$updatee=mysqli_query($db, "UPDATE user_details SET USER_LOGIN_NAME='$Username', USER_PASSWORD='$Password', USER_COMPANY_ID='$Companyid', USER_TYPE='$Usertype', USER_GROUP=' $Usergroup', USER_STATUS= ' $Userstatus' WHERE RECORD_ID='$id' ");

	if($updatee){
	
	$_SESSION['message'] = "Updated!"; 
	header('location: usermanagement.php');
	}
	else{
	$_SESSION['message'] = "update failed!"; 
	header('location: usermanagement.php');

	}
	}



	//-------------------------------------------------------------------------//-----------

	if (isset($_POST['updateoneuser'])) {
	$id = $_POST['ID'];
	$dispalayname=$_POST['displayname'];
	$telephone1=$_POST['telephone1'];
	$telephone2=$_POST['telephone2'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$address3=$_POST['address3'];
	$address4=$_POST['address4'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];



	
	$updatee=mysqli_query($db, "UPDATE user_p_details SET USER_DISPLAY_NAME='$dispalayname', USER_TELEPHONE1='$telephone1', USER_TELEPHONE2='$telephone2', USER_ADDRESS_1='$address1', USER_ADDRESS_2=' $address2', USER_ADDRESS_3=' $address3' , USER_ADDRESS_4='$address4', USER_BIRTHDAY='$birthday', USER_EMAIL='$email' WHERE RECORD_ID='$id'");

	if($updatee){
	
	$_SESSION['messageone'] = "Updated!"; 
	header('location: index.php');
	}
	else{
	$_SESSION['messageone'] = "update failed!"; 
	header('location: oneusermanagement.php');

	}

	}



// ----------------------------------------------------------------------------------------------------------------
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "UPDATE user_details SET USER_STATUS='4' WHERE RECORD_ID=$id");
	 
	header('location: list.php');
	}

// ---------------------------------------------------------------------------------------------------------
	
	if (isset($_POST['login_user'])) {


		$Username = $_POST['us'];
		$Password = my_simple_crypt(($_POST['pass']),'e');
		date_default_timezone_set('Asia/Colombo');
		$currentlogintime=date('Y/m/d h:i:s a', time());
		
		

		

		$rec = "SELECT * FROM user_details WHERE USER_LOGIN_NAME='".$Username."' AND USER_PASSWORD='".$Password."' limit 1 ";

		$rec3 ="SELECT USER_STATUS FROM user_details WHERE USER_LOGIN_NAME='".$Username."' AND USER_PASSWORD='".$Password."' AND USER_STATUS<2 limit 1";

		$rec65 ="SELECT USER_LOGIN_ATTEMPTS FROM user_details WHERE USER_LOGIN_NAME='".$Username."' AND USER_LOGIN_ATTEMPTS<3 limit 1";

		$blockedsql="SELECT USER_STATUS FROM user_details WHERE USER_LOGIN_NAME='".$Username."' AND USER_PASSWORD='".$Password."' AND USER_STATUS=3 limit 1";

		$resultblockedsql=mysqli_query($db,$blockedsql);

		
		$results65 = mysqli_query($db,$rec65);







		$results2 = mysqli_query($db,$rec3);

		$results = mysqli_query($db,$rec);
		if (mysqli_num_rows($results)== 1 && mysqli_num_rows($results2)== 1) {

		
         $_SESSION['login_user'] = $Username;

			$rec2 = "UPDATE user_details SET USER_LASTLOGIN_DATETIME='$currentlogintime' WHERE USER_LOGIN_NAME='$Username' ";
			$rec45 = "UPDATE user_details SET USER_LOGIN_ATTEMPTS='0' WHERE USER_LOGIN_NAME='$Username' ";

			
			$rec78 = "UPDATE user_details SET USER_STATUS='1' WHERE USER_LOGIN_NAME='$Username' ";

		if(mysqli_query($db,$rec2) && mysqli_query($db,$rec78) && mysqli_query($db,$rec45)){

			$login_display_name=mysqli_query($db,"SELECT user_p_details.USER_DISPLAY_NAME FROM user_p_details INNER JOIN user_details ON user_p_details.RECORD_ID=user_details.RECORD_ID WHERE user_details.USER_LOGIN_NAME='$Username'");

			$login_id=mysqli_query($db,"SELECT user_p_details.RECORD_ID FROM user_p_details INNER JOIN user_details ON user_p_details.RECORD_ID=user_details.RECORD_ID WHERE user_details.USER_LOGIN_NAME='$Username'");

			if(isset($login_display_name) ){

 			$n = mysqli_fetch_array($login_display_name);
 			$User_display_name = $n['USER_DISPLAY_NAME'];

 			
 			} 

 			if(isset($login_id)){

 			$n = mysqli_fetch_array($login_id);
 			$User_ID = $n['RECORD_ID'];

 			
 			} 
		
		

		echo '

        <!DOCTYPE html>
        <html>
        <head>
        <style>
        html{
        	
        }
       	.animated {
            background-color: #f2f2f2;
            padding-top:30px;
            padding-bottom:600px;
            height:200%;
            width:100%;
            
            
            background-position: center;
            
           
            -webkit-animation-duration: 3s;animation-duration: 3s;
            -webkit-animation-fill-mode: both;animation-fill-mode: both;
         }

         @-webkit-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
         }

         @keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
         }

         .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
         }

        </style>

        <META HTTP-EQUIV="refresh" CONTENT="3;URL=dashboard.php">
        </head>
        <body>
        	<div class="mse">
        	<div id="animated-example" class="animated fadeOut"><p style="font-size:100px; margin-left:300px; margin-top=100px;  "> Welcome ',
        	$_SESSION['	mse'] = $User_display_name;
        	'
        	</p>
    		</div>
    		</div>
    		</div>

       			</body>
        	</html>
  			
  

			';

			$_SESSION['name'] = $User_display_name;
			$_SESSION['loginid']= $User_ID;
			
		}
		

		}

		else if(mysqli_num_rows($resultblockedsql)==1){

			header('location:blocked.php');

		}

		else if(mysqli_num_rows($results65)== 1){

			
			
		$loginattemptcount = mysqli_query($db, "SELECT USER_LOGIN_ATTEMPTS FROM user_details WHERE USER_LOGIN_NAME='$Username' AND USER_STATUS!='4'");
		

		if (isset($loginattemptcount)== 1) {
		$n = mysqli_fetch_array($loginattemptcount);
		$countlogin = $n['USER_LOGIN_ATTEMPTS'];

		}

		$realcount=3-$countlogin;



		$_SESSION['message'] = "You have ".$realcount. " login attempts remaining.Try again!";

		$rcc3 ="UPDATE user_details SET USER_LOGIN_ATTEMPTS=USER_LOGIN_ATTEMPTS+1 WHERE USER_LOGIN_NAME='$Username'";
		$results23 = mysqli_query($db,$rcc3);

		
		
		header('location:index.php');


	
		}


			

		else{


		$result23 ="UPDATE user_details SET USER_STATUS='2' WHERE USER_LOGIN_NAME='$Username'";
		$rec53 = "SELECT * FROM user_details WHERE USER_LOGIN_NAME='".$Username."' limit 1 ";
		$sds=mysqli_query($db,$rec53);

		

		 if(mysqli_num_rows($sds)== 1){
		 	
				if(mysqli_query($db,$result23))
				{
				unset($loginattempts);
				$_SESSION['message'] = "You are temporarily blocked ! contact administrator"; 

				

				header('location:index.php');
						
				}

				else{
				
				$_SESSION['message'] = "Incorrect Password Or Username! ";
				header('location:index.php');
						
				}
			}
		else{

			$_SESSION['message'] = "Incorrect Username or Password"; 
			header('location:index.php');
		}



		}
		}

		


//--------------------------------------------------------------------------------------------------


function my_simple_crypt( $string, $action = 'e' ) {
    
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}



//-------------------------------------------------------------------------------------------
	if (isset($_POST['logout'])) {

	
	session_destroy();
	unset($_SESSION['login_user']); 
	header('location: index.php');
	}			
		
		
		
?>



