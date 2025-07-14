<?php 
    session_start();

    include("../connection.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Persada Dunya Distribution Center - Operation Homepage</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"
    <!-- jQuery -->
      <script src="../js/jquery-1.12.1.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h3><b>Persada Dunya Distribution Center - Operation</b></h3>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="nav navbar-nav">
                     <li class="active"><a href="index.php">Home</a></li>
                    </div>
                    <div class="nav navbar-nav pull-right">
                    <li><a href="#"><?php echo "Hello: <b>".$_SESSION["operasi"]."</b>"; ?></a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
<body>
<table id="table_delivery" class="table table-striped table-bordered" style="width:100%">
    
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
            $qry = "";
                        
            if(isset($_POST["btn_search"])) {
                $qry = mysqli_query($con, "SELECT * FROM penghantaran WHERE username LIKE '%".mres($con,$_POST["search_text"])."%' ORDER BY penghantaran_id asc");
            }else{
                $qry = mysqli_query($con, "SELECT * FROM penghantaran ORDER BY penghantaran_id asc");
            }       
            while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
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
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['no_plat'] ?></td>                           
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
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['no_plat'] ?></td>
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
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['no_plat'] ?></td>
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
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['no_plat'] ?></td>
                <td><?php echo $row['jenama_5'] ?></td>                            
                <td><?php echo $row['jenis_5'] ?></td>
                <td><?php echo $row['kuantiti_5'] ?></td>
                <td><?php echo $row['lokasi_5'] ?></td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr> 
    </tbody>
    <?php
        }   
    ?>
    </table>
</body>
<script>
$(document).ready(function() {
    $('#table_delivery').DataTable();
} );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>