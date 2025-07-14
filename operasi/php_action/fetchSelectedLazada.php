<?php 	

require_once 'core.php';

$deliveryId = $_POST['deliveryId'];

$sql = "SELECT online_id, active, status FROM online WHERE online_id = $deliveryId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);