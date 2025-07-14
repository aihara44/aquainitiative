<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
    $deliveryId = $_POST['deliveryId'];
    $full_bottle = $_POST['full_bottle'];
    $empty_bottle = $_POST['empty_bottle'];

				
	$sql = "UPDATE gallon SET botol_penuh = '$full_bottle', botol_kosong = '$empty_bottle', status = 1 WHERE gallon_id = $deliveryId ";

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
 
