<?php 	



require_once 'core.php';

$sql = "SELECT online.online_id, online.username, online.tarikh, online.do_number, online.customer_id, online.nama_pelanggan, online.alamat, online.jenama, online.jenis, online.kuantiti, online.jenama_2, online.jenis_2, online.kuantiti_2, online.jenama_3, online.jenis_3, online.kuantiti_3, online.active, online.status, jenama.jenama, jenis.jenis FROM online INNER JOIN jenama ON online.jenama = jenama.jenama_id INNER JOIN jenis ON online.jenis = jenis.jenis_id WHERE online.status = 1 ORDER BY online.tarikh DESC";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$deliveryId = $row[0];
 	// active 
 	if($row[16] == 0) {
 		// pending member
 		$active = "<label class='label label-warning'>Pending</label>";
 	} else if($row[16] == 1) {
 		// deactivate member
 		$active = "<label class='label label-success'>Delivered</label>";
 	} else if($row[16] == 2){
        $active = "<label class='label label-danger'>Not Delivered</label>";
    } // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editDelivery('.$deliveryId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>   
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }
    
	$brand = $row[18];
	$category = $row[19];

 	$output['data'][] = array(
 		// product name
 		$row[1],
        $row[3],
        $row[4],
        $row[5],
        $row[6],
 		$brand,
 		// category 		
 		$category,
        $row[9],
        $row[10],
        $row[11],
        $row[12],
        $row[13],
        $row[14],
        $row[15], 
 		// active
        $row[2],
 		$active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);