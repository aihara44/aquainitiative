<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
    $deliveryId = $_POST['deliveryId'];
    $deliveryStatus = $_POST['editDeliveryStatus'];

				
	$sql = "UPDATE online SET active = '$deliveryStatus', status = 1 WHERE online_id = $deliveryId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
