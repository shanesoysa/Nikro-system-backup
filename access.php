
<?php
$db = mysqli_connect('localhost', 'root', '', 'user_db');

$USER_ID = $_SESSION['loginid'];



$select_sqlk = mysqli_query($db,"select USER_GROUP from user_details where RECORD_ID ='$USER_ID';");



if(isset($select_sqlk)==1){
	$n = mysqli_fetch_array($select_sqlk);
	$USERGROUP = $n['USER_GROUP'];
}


switch ($USERGROUP) {
    case 4:
        echo 
        '<style type="text/css">
        #reset_password{
		display:none;
		}

		</style>';
        break;

    default:
        echo "seeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee".$USERGROUP."asdasdas";
}



?>