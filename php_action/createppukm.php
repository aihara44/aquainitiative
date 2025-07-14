<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $customer_id 		= $_POST['customer_id'];
	$department 		= $_POST['department'];
  // $productImage 	= $_POST['productImage'];
    $unit 			    = $_POST['unit'];
    $block 				= $_POST['block'];
    $dpquota 			= $_POST['dpquota'];
    $full_bottle 	    = $_POST['full_bottle'];
    $empty_bottle 	    = $_POST['empty_bottle'];
    $date 			    = $_POST['date'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'pdf', 'JPG', 'GIF', 'JPEG', 'PNG', 'PDF'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
				$sql = "INSERT INTO gallon (customer_id, jabatan, unit, blok, peruntukan_bulanan, botol_penuh, botol_kosong, tarikh, resit, status) 
				VALUES ('$customer_id', '$department', '$unit', '$block', '$dpquota', '$full_bottle', '$empty_bottle', '$date', '$url', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST