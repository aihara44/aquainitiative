<?php 	

require_once 'core.php';

productId = $_GET['i'];

$sql = "SELECT resit FROM gallon WHERE gallon_id = {$productId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo "stock/" . $result[0];
