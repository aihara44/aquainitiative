<?php 
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
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
                       <div class="panel-title">View Locations</div>
                    </div>
                   <div class="panel-body">
                      <table class="table table-hover table-bordered">
                          <thead>
                          <tr>
                            <th>Locations</th>
                            <th>Action</th>
                        </tr>
                          </thead>
                          <?php
                          
                            $qry = mysqli_query($con, "SELECT * FROM lokasi ORDER BY lokasi_id asc");
                        while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
                            echo '<tr>';
                            echo '<td>'.$row["lokasi"]."</td><td><a href='viewlocation.php?get_id=".$row["lokasi_id"]."' class='btn btn-success'>View</a></td>";
                            echo '</tr>';
                        }
                        ?>
                       </table>
        </div>
              </div>
        </div>
        </div>
    </div>
        </body>