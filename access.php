
<?php
$db = mysqli_connect('localhost', 'root', '', 'user_db');

$USER_ID = $_SESSION['loginid'];



$select_temp = mysqli_query($db,"select temp1 from temp where Record_ID ='$USER_ID';");



if(isset($select_temp)==1){
	$n = mysqli_fetch_array($select_temp);
	$temp_value = $n['temp1'];
}


switch ($temp_value) {
    case 13:
        echo 
        '<style type="text/css">
        #N021504,#N021505,#N021502,#N021503{
		display:none;
		}

		</style>';
        break;

    default:
        echo "rssssssssssssssssssssssssssssssssssssssssssssssssssssssssss".$temp_value."asdasdas";
}



?>