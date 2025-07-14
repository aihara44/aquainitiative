<?php
//fetch.php
if(isset($_POST["action"])){
        $output = '';
        if($_POST["action"] == "year"){
            $query = "SELECT bulan FROM bulan WHERE tahun = '".$_POST["query"]."'";
            $result = mysqli_query($con, $query);
            $output .= '<option value="">-- Select Month --</option>';
                while($row = mysqli_fetch_array($result)){
                    $output .= '<option value="'.$row["bulan"].'">'.$row["bulan"].'</option>';
                }
            }
        if($_POST["action"] == "month"){
            $query = "SELECT blok FROM blok WHERE bulan = '".$_POST["query"]."'";
            $result = mysqli_query($con, $query);
            $output .= '<option value="">-- Select Block --</option>';
                while($row = mysqli_fetch_array($result)){
                    $output .= '<option value="'.$row["blok"].'">'.$row["blok"].'</option>';
                }
            }
        echo $output;
    }
?>
