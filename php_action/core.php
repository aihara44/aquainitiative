<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['ppukm']) {
	header('location: http://localhost/aquainitiative/index.php');	
}

?>