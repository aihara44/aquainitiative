<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $username 		= $_POST['username'];
    $plat_no 		= $_POST['plat_no'];
    $customer_name  = $_POST['customer_name'];
    $address        = $_POST['address'];
    $date           = $_POST['date'];
    $brandName 		= $_POST['brandName'];
    $type 	        = $_POST['type'];
    $quantity 	    = $_POST['quantity'];
    $platform 	    = $_POST['platform'];
    $deliveryStatus = $_POST['deliveryStatus'];
				
				$sql = "INSERT INTO online (username, no_plat, tarikh, nama_pelanggan, alamat, jenama, jenis, kuantiti, platform, active, status) 
				VALUES ('$username', '$plat_no', '$date', '$customer_name', '$address', '$brandName', '$type', '$quantity', '$platform' , '$deliveryStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST