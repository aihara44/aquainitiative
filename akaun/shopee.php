<?php
include "../connection.php";

$sql = "SELECT * FROM `online` WHERE platform='Shopee' ORDER BY `online`.`tarikh` DESC";  
$result = mysqli_query($con, $sql);
?>
<html>  
 <head>  
  <title>Export Shopee Deliveries</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container-fluid">  
   <br />  
   <br />  
   <br />
   <div class="table-responsive">
       <form method="post" action="excel_shopee.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
    <h2 align="center">Export Shopee Deliveries</h2><br /> 
     <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Plat No.</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                        </tr>
                            </thead>
                            <tbody>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
         ?>
        <tr>
            <td><?php echo $row['tarikh'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['no_plat'] ?></td>
            <td><?php echo $row['nama_pelanggan'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td><?php echo $row['jenama'] ?></td>                            
            <td><?php echo $row['jenis'] ?></td>
            <td><?php echo $row['kuantiti'] ?></td> 
        </tr>
        <?php 
     }
     ?>
         </tbody>
    </table>
    <br />
    
   </div>  
  </div>  
 </body>  
</html>