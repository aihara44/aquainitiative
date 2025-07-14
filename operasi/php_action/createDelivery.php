<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $username               = $_POST['username'];
    $do_number              = $_POST['do_number'];
    $customer_id            = $_POST['customer_id'];
    $customer_name          = $_POST['customer_name'];
    $address                = $_POST['address'];
    $date                   = $_POST['date'];
    $brandName              = $_POST['brandName'];
    $type                   = $_POST['type'];
    $quantity               = $_POST['quantity'];
    $brandName2             = $_POST['brandName2'];
    $type2 	                = $_POST['type2'];
    $quantity2 	            = $_POST['quantity2'];
    $brandName3             = $_POST['brandName3'];
    $type3 	                = $_POST['type3'];
    $quantity3 	            = $_POST['quantity3'];
    $platform               = $_POST['platform'];
    $deliveryStatus         = $_POST['deliveryStatus'];
				
				$sql = "INSERT INTO online (username, tarikh, do_number, customer_id, nama_pelanggan, alamat, jenama, jenis, kuantiti, jenama_2, jenis_2, kuantiti_2, jenama_3, jenis_3, kuantiti_3, platform, active, status) 
				VALUES ('$username','$date', '$do_number', '$customer_id', '$customer_name', '$address', '$brandName', '$type', '$quantity', '$brandName2', '$type2', '$quantity2', '$brandName3', '$type3', '$quantity3', '$platform', '$deliveryStatus', 1)";

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