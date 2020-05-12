
<?php
$db = mysqli_connect('localhost', 'root', '', 'user_db');

$USER_ID = $_SESSION['loginid'];
$ALL_ID = array("N021502", "N021503", "N021504","N021505");

echo 
'<style type="text/css">
#N021502,#N021503,#N021504,#N021505{
display:none;
}

</style>';


$select_target_id = mysqli_query($db,"select TARGET_ID from user_loging_entity where ENTITI_RECORD_ID ='$USER_ID';");


$user_authentic_id=array();
while($row = mysqli_fetch_array($select_target_id)) {
    foreach($row as $value){

      $user_authentic_id[$value]=$row['TARGET_ID'];

    }

}

$array_matching_elemets=array_intersect($ALL_ID ,$user_authentic_id);

if(count($array_matching_elemets)>0){

    foreach($array_matching_elemets as $key => $value)
    {
        echo 
    '<style type="text/css">
    #'.$value.'{
    display:inline;
    }

    </style>';

  
    }

}





?>