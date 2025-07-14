<?php
include "../connection.php";

$sql = "SELECT * FROM `penghantaran` ORDER BY `penghantaran`.`tarikh` DESC";  
$result = mysqli_query($con, $sql);
?>
<html>  
 <head>  
  <title>Export Universities Deliveries</title>  
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
       <form method="post" action="excel.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
    <h2 align="center">Export Universities Deliveries</h2><br /> 
     <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Plat No.</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Fuel Serial No.</th>
                            <th>Petrol Type</th>
                            <th>Price (RM)</th>
                        </tr>
                            </thead>
                            <tbody>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
         ?>
        <tr>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['no_plat'] ?></td>                          
                <td><?php echo $row['jenama_1'] ?></td>                            
                <td><?php echo $row['jenis_1'] ?></td>
                <td><?php echo $row['kuantiti_1'] ?></td>
                <td><?php echo $row['lokasi_1'] ?></td>
                <td><?php echo $row['tarikh'] ?></td>
                <td><?php echo $row['no_siri'] ?></td>
                <td><?php echo $row['petrol'] ?></td>
                <td>RM<?php echo $row['harga'] ?></td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>
                <td><?php echo $row['jenama_2'] ?></td>                            
                <td><?php echo $row['jenis_2'] ?></td>
                <td><?php echo $row['kuantiti_2'] ?></td>
                <td><?php echo $row['lokasi_2'] ?></td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>
                <td><?php echo $row['jenama_3'] ?></td>                            
                <td><?php echo $row['jenis_3'] ?></td>
                <td><?php echo $row['kuantiti_3'] ?></td>
                <td><?php echo $row['lokasi_3'] ?></td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>                         
                <td><?php echo $row['jenama_4'] ?></td>                            
                <td><?php echo $row['jenis_4'] ?></td>
                <td><?php echo $row['kuantiti_4'] ?></td>
                <td><?php echo $row['lokasi_4'] ?></td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
            <tr>
                <td> - </td>
                <td> - </td>                          
                <td><?php echo $row['jenama_5'] ?></td>                            
                <td><?php echo $row['jenis_5'] ?></td>
                <td><?php echo $row['kuantiti_5'] ?></td>
                <td><?php echo $row['lokasi_5'] ?></td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
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