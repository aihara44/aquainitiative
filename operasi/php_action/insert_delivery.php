<?php

session_start();
    
include ("../connection.php");

    $msg = '';
    $kad_id = '';
    $penghantaran_id = '';
    $username = '';
    $plat_no = '';
    $brand = '';
    $type = '';
    $quantity = '';
    $location = '';
    $brand2 = '';
    $type2 = '';
    $quantity2 = '';
    $location2 = '';
    $brand3 = '';
    $type3 = '';
    $quantity3 = '';
    $location3 = '';
    $brand4 = '';
    $type4 = '';
    $quantity4 = '';
    $location4 = '';
    $brand5 = '';
    $type5 = '';
    $quantity5 = '';
    $location5 = '';
    $date = '';
    $serial_no = '';
    $fuel_type = '';
    $price = '';
        
    if(isset($_POST["btn_save"])){
        
            $username = mres($con, $_SESSION["operasi"]);
            $plat_no = mres($con, $_POST["plat_no"]);
            $brand = mres($con, $_POST["brand"]);
            $type = mres($con, $_POST["type"]);
            $quantity = mres($con, $_POST["quantity"]);
            $location = mres($con, $_POST["location"]);
            $brand2 = mres($con, $_POST["brand2"]);
            $type2 = mres($con, $_POST["type2"]);
            $quantity2 = mres($con, $_POST["quantity2"]);
            $location2 = mres($con, $_POST["location2"]);
            $brand3 = mres($con, $_POST["brand3"]);
            $type3 = mres($con, $_POST["type3"]);
            $quantity3 = mres($con, $_POST["quantity3"]);
            $location3 = mres($con, $_POST["location3"]);
            $brand4 = mres($con, $_POST["brand4"]);
            $type4 = mres($con, $_POST["type4"]);
            $quantity4 = mres($con, $_POST["quantity4"]);
            $location4 = mres($con, $_POST["location4"]);
            $brand5 = mres($con, $_POST["brand5"]);
            $type5 = mres($con, $_POST["type5"]);
            $quantity5 = mres($con, $_POST["quantity5"]);
            $location5 = mres($con, $_POST["location5"]);
            $date = mres($con, $_POST["date"]);
            $serial_no = mres($con, $_POST["serial_no"]);
            $fuel_type = mres($con, $_POST["fuel_type"]);
            $price = mres($con, $_POST["price"]);
            $qry = mysqli_query($con, "INSERT INTO penghantaran values('','".$username."','".$plat_no."','".$brand."','".$type."','".$quantity."','".$location."','".$brand2."','".$type2."','".$quantity2."','".$location2."','".$brand3."','".$type3."','".$quantity3."','".$location3."','".$brand4."','".$type4."','".$quantity4."','".$location4."','".$brand5."','".$type5."','".$quantity5."','".$location5."','".$date."','".$serial_no."','".$fuel_type."','".$price."')");
            $_SESSION['message'] = "Address saved"; 
		      header('location: index.php');
                if($qry){
                    $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
                }else{
                    $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
                    }
            }


?>