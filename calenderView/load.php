<?php  include('../php_code.php'); ?>
<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=user_db', 'root', '');
$companyid=$_SESSION['loginuser_company_id'];
$data = array();


$query = "SELECT * FROM calendar_plan_events WHERE company='$companyid' ORDER BY id";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
