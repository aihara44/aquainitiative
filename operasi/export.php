<?php
 session_start();
    
    if(!isset($_SESSION["akaun"])){
        header("location:login.php");
    }
include "../connection.php";

$sql = "SELECT * FROM `penghantaran` ORDER BY `penghantaran`.`tarikh` DESC";  
$result = mysqli_query($con, $sql);
?>

<?php include ('./header.php'); ?>     
          
        <div class="row" style="padding-left: 0px; padding-right: 0px;">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
             <?php include ('leftmenu.php'); ?>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="well">
              <div class="panel panel-primary">
                  <div class="panel-heading"><i class="glyphicon glyphicon-export"></i> Export Data to Excel</div>
                    <form style="float: right" method="post" action="excel.php">
     <button type="submit" name="export" class="btn btn-success btn-sm" value="Export"><span class="glyphicon glyphicon-export"></span> Export Data</button>
    </form>  
                  
                  <div class="panel-body">
     
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
     <table class="table table-hover table-bordered" id="table-export">
         <br />
                    <thead>
                        
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Plat No.</th>
                            <th>Location</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                        </tr>
                            </thead>
                            <tbody>
     <?php
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            ?>
                            <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['lokasi_1'] ?></td>
                                <td><?php echo $row['jenama_1'] ?></td>
                                <td><?php echo $row['jenis_1'] ?></td>
                                <td><?php echo $row['kuantiti_1'] ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['lokasi_2'] ?></td>
                                <td><?php echo $row['jenama_2'] ?></td>
                                <td><?php echo $row['jenis_2'] ?></td>
                                <td><?php echo $row['kuantiti_2'] ?></td>
                          
                            </tr>
                                <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['lokasi_3'] ?></td>
                                <td><?php echo $row['jenama_3'] ?></td>
                                <td><?php echo $row['jenis_3'] ?></td>
                                <td><?php echo $row['kuantiti_3'] ?></td>
                               
                            </tr>
                                <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['lokasi_4'] ?></td>
                                <td><?php echo $row['jenama_4'] ?></td>
                                <td><?php echo $row['jenis_4'] ?></td>
                                <td><?php echo $row['kuantiti_4'] ?></td>
                           
                            </tr>
                                <tr>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['lokasi_5'] ?></td>
                                <td><?php echo $row['jenama_5'] ?></td>
                                <td><?php echo $row['jenis_5'] ?></td>
                                <td><?php echo $row['kuantiti_5'] ?></td>
                            
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
</body>  
</html>
<script type="text/javascript" charset="utf8" src="../DataTables/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#table-export').DataTable();
            });
         $("#btn_search").click(function(e){
                    
                    if($("#search_text").val() == ''){
                        $("#search_text").css("border-color","#DA1908");
                        $("#search_text").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form-search').unbind('submit').submit();
                    }
                });
</script>