<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    include ("../connection.php");

?>
        <?php include ("header2.php"); ?>
         <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-md-12">
             <?php include ("leftmenu.php"); ?>
                </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="col-md-12">
              <div class="well">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Delivery Locations</div>
                      <div class="panel-body">
                        <table class="table table-hover table-bordered" id="table_locations">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Location</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Insufficient</th>
                            <th>Plat No.</th>
                            <th>Fuel Serial No.</th>
                            <th>Petrol Type</th>
                            <th>Price (RM)</th>
                        </tr>
                            </thead>
                            <tbody>
                       <?php
                        $qry = "";

                        $qry = mysqli_query($con, "SELECT * FROM penghantaran ORDER BY penghantaran_id desc");
                        while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
                            ?>
                            <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['lokasi_1'] ?></td>
                                <td><?php echo $row['jenama_1'] ?></td>                            
                                <td><?php echo $row['jenis_1'] ?></td>
                                <td><?php echo $row['kuantiti_1'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_1'] ?></p></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['no_siri'] ?></td>
                                <td><?php echo $row['petrol'] ?></td>
                                <td>RM<?php echo $row['harga'] ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['lokasi_2'] ?></td>
                                <td><?php echo $row['jenama_2'] ?></td>                            
                                <td><?php echo $row['jenis_2'] ?></td>
                                <td><?php echo $row['kuantiti_2'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_2'] ?></p></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['no_siri'] ?></td>
                                <td><?php echo $row['petrol'] ?></td>
                                <td>RM<?php echo $row['harga'] ?></td>
                            </tr>
                                <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['lokasi_3'] ?></td>
                                <td><?php echo $row['jenama_3'] ?></td>                            
                                <td><?php echo $row['jenis_3'] ?></td>
                                <td><?php echo $row['kuantiti_3'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_3'] ?></p></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['no_siri'] ?></td>
                                <td><?php echo $row['petrol'] ?></td>
                                <td>RM<?php echo $row['harga'] ?></td>
                            </tr>
                                <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['lokasi_4'] ?></td>
                                <td><?php echo $row['jenama_4'] ?></td>                            
                                <td><?php echo $row['jenis_4'] ?></td>
                                <td><?php echo $row['kuantiti_4'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_4'] ?></p></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['no_siri'] ?></td>
                                <td><?php echo $row['petrol'] ?></td>
                                <td>RM<?php echo $row['harga'] ?></td>
                            </tr>
                                <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['lokasi_5'] ?></td>
                                <td><?php echo $row['jenama_5'] ?></td>                            
                                <td><?php echo $row['jenis_5'] ?></td>
                                <td><?php echo $row['kuantiti_5'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_5'] ?></p></td>                                   <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['no_siri'] ?></td>
                                <td><?php echo $row['petrol'] ?></td>
                                <td>RM<?php echo $row['harga'] ?></td>
                            </tr>
                            <?php
                            }
                       ?>
                    </tbody>
                </table>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf8" src="../DataTables/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#table_locations').DataTable();
            });
</script>
        