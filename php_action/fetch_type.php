<html>
<?php
    
    include("../../connection.php");
    
    $query = "SELECT * FROM jenis WHERE jenama_id='".mres($con,$_POST["jenama_id"])."'";
    
    $result = mysqli_query($con,$query);
    
    
    ?>
<option>Select Type</option>
<?php 
    
    while ($row = mysqli_fetch_array($result)){
        ?>
        
    <option value="<?php echo $row["jenis_id"]; ?>"><?php echo $row["jenis"]; ?></option>
     
    <?php
    }
    
    ?>
</html>

