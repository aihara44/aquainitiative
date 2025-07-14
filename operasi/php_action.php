<?php

include ("../connection.php");

?>
<?php include ("header.php"); ?>
        <body>
    <div class="row" style="padding-left: 0px; padding-right: 0px;">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-md-12">
                <?php include ("leftmenu.php"); ?>
                </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="col-md-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">PPUKM Delivery Operation</div>
                    </div>
                   <div class="panel-body">
                        <form method="post" class="form-inline" id="form-search" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <div class="row" style="padding-left: 10px; ">
                                    <div class="form-group">
                                        <label>Search By Year:</label>
                                        <select class="form-control" name="year" id="year" style="width:170px;">
                                                <option value="">-- Select Year --</option>
                                            <?php 
                                                $qry = mysqli_query($con, "SELECT * FROM tahun");
                                                while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                                    echo "<option value='".$row["tahun_id"]."'>".$row["tahun"]."</option>";
                                                }
                                                ?>
                                        </select>
                                        <label>Search By Month:</label>
                                        <select class="form-control" name="month" id="month" style="width:170px;">
                                                <option value="">-- Select Month --</option>    
                                        </select>
                                        <label>Search By Block:</label>
                                        <select class="form-control" name="block" id="block" style="width:150px;">
                                            <option value="">-- Select Block --</option>
                                        </select>
                                        <label>Search By Level:</label>
                                        <select class="form-control" name="level" id="level" style="width:150px;">
                                            <option value="">-- Select Level --</option>
                                        </select>
                                        <label>Search By Unit:</label>
                                        <select class="form-control" name="unit" id="unit" style="width:150px;">
                                            <option value="">-- Select Unit --</option>
                                        </select>
                                        <button type="submit" class="btn btn-default" id="btn_search" name="btn_search">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div style="clear:both"></div>                 
                            <br />  
                          <table class="table table-hover table-bordered" id="table_department">
                              <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Unit</th>
                                    <th>Block</th>
                                    <th>Level</th>
                                    <th>Monthly Quota</th>
                                    <th>Delivered Full Bottle</th>
                                    <th>Collected Empty Bottle</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Receipt Image</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                                <tbody>
                               <?php

                                $qry = "";

                                if(isset($_POST["btn_search"])) {
                                    $qry = mysqli_query($con, "SELECT * FROM gallon WHERE bulan LIKE '%".mres($con,$_POST["month"])."%' AND tahun LIKE '%".mres($con,$_POST["year"])."%' ORDER BY customer_id asc");
                                }else{
                                    $qry = mysqli_query($con, "SELECT * FROM gallon ORDER BY customer_id asc");
                                      }
                                while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                    echo '<tr>';
                                    echo '<td>'.$row["customer_id"]."</td><td>".$row["unit"]."</td><td>".$row["blok"]."</td><td>".$row["tingkat"]."</td><td>".$row["peruntukan_bulanan"]."</td><td>".$row["botol_penuh"]."</td><td>".$row["botol_kosong"]."</td><td>".$row["bulan"]."</td><td>".$row["tahun"]."</td><td><img src='../assests/images/stock/".$row["resit"]."'></td><td><a href='resit.php?get_id=".$row["gallon_id"]."' class='btn btn-primary'> View Receipt</a></td>";
                                    echo '</tr>';
                                    }

                                ?>

                    </tbody>
                       </table>
        </div>
              </div>
              </div>
        </div>
    </div>
            <script type="text/javascript" charset="utf8" src="../DataTables/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){  
            $('#table_department').DataTable();
                $('#year').on('change',function(){
                    var tahun_id = $(this).val();
                    if(tahun_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch.php',
                            data:'tahun_id='+tahun_id,
                            success:function(html){
                                $('#month').html(html);
                                $('#block').html('<option value="">-- Select Block --</option>'); 
                            }
                        }); 
                    }else{
                        $('#month').html('<option value="">-- Select Month --</option>');
                        $('#block').html('<option value="">-- Select Block --</option>'); 
                    }
                });
                
                $('#month').on('change',function(){
                    var bulan_id = $(this).val();
                    if(bulan_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch.php',
                            data:'bulan_id='+bulan_id,
                            success:function(html){
                                $('#block').html(html);
                                $('#level').html('<option value="">-- Select Level --</option>'); 
                            }
                        }); 
                    }else{
                        $('#month').html('<option value="">-- Select Month --</option>');
                        $('#level').html('<option value="">-- Select Level --</option>');
                    }
                });
                        
                $('#block').on('change',function(){
                    var block_id = $(this).val();
                    if(block_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch.php',
                            data:'block_id='+block_id,
                            success:function(html){
                                $('#level').html(html);        
                            }
                        }); 
                    }else{
                        $('#level').html('<option value="">-- Select Level --</option>');
                        $('#unit').html('<option value="">-- Select Unit --</option>'); 
                    }
                });
            
                $('#level').on('change',function(){
                    var level_id = $(this).val();
                    if(level_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch.php',
                            data:'level_id='+level_id,
                            success:function(html){
                                $('#unit').html(html);        
                            }
                        }); 
                    }else{
                        $('#unit').html('<option value="">-- Select Unit --</option>'); 
                    }
                });
            });
</script>
        </body>