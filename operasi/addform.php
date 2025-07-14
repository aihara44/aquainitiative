<?php 

include ("../connection.php");
//fetch.php
if(isset($_POST["tahun_id"]) && !empty($_POST["tahun_id"])){
    $query = $con->query("SELECT * FROM bulan WHERE tahun_id = ".$_POST['tahun_id']);
    $rowCount = $query->num_rows;
    if($rowCount > 0){
        echo '<option value="">-- Select Month --</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['bulan_id'].'">'.$row['bulan'].'</option>';
        }
    }else{
        echo '<option value="">-- Select Month --</option>';
    }
}

?>