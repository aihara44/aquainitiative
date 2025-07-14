<?php 

session_start();

require_once 'db_connect.php';

$msg = "";
// echo $_SESSION['userId'];

if(!$_SESSION['operasi']) {
	header('location: http://localhost/aquainitiative/operasi/login.php');	
} 

if(isset($_SESSION['operasi'])) {
		$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Assalamualaikum <b>'.$_SESSION['operasi'].'</b>!</div>';
} 

?>