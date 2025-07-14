<?php 	



require_once 'core.php';

$sql = "SELECT gallon.gallon_id, gallon.customer_id, gallon.jabatan, gallon.unit, gallon.blok, gallon.peruntukan_bulanan, gallon.botol_penuh, gallon.botol_kosong, gallon.tarikh, gallon.resit, gallon.status FROM gallon WHERE gallon.status = 1 ORDER BY gallon.tarikh DESC";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
 	
 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>      
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

	$imageUrl = substr($row[9], 3);
	$productImage = "<img class='img-round' src='".$imageUrl."' style='height:30px; width:50px;'  />";

 	$output['data'][] = array( 		
 		// image
 		// product name
 		$row[1], 
 		// rate
        $row[2],
        $row[3],
        $row[4],
        $row[5],
 		$row[6],
        $row[7],
        $row[8],
 		// brand
 		$productImage,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);