<?php include ("connection.php"); ?>
<?php include ("header2.php"); ?>
        <body>
    <div class="row" style="padding-left: 0px; padding-right: 0px;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">PPUKM Delivery Operation</div>
                    </div>
                   <div class="panel-body">
                      <table class="table table-hover table-bordered" id="table_department">
                          <thead>
                            <tr>
                                <th style="width:30%">Department</th>
                                <th style="width:10%">Customer ID</th>
                                <th style="width:10%">Action</th>
                            </tr>
                          </thead>
                          <?php
                          
                            $qry = mysqli_query($con, "SELECT * FROM jabatan ORDER BY customer_id asc");
                        while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
                            echo '<tr>';
                            echo '<td>'.$row["jabatan"]."</td><td>".$row["customer_id"]."</td><td><a href='viewppukm.php?get_id=".$row["jabatan_id"]."' class='btn btn-primary'>View</a></td>";
                            echo '</tr>';
                        }
                        ?>
                       </table>
        </div>
              </div>
              </div>
        </div>
    </div>
            <script type="text/javascript" charset="utf8" src="DataTables/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#table_department').DataTable();
            });
</script>
        </body>