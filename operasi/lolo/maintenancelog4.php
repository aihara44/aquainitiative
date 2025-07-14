<?php 
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../../connection.php");

 ?>

<?php include ("../header.php"); ?>
           <body>
    <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
             <?php include ("leftmenu.php"); ?>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">Maintenance Log</div>
                    </div>
                   <div class="panel-body">
                      <table class="table table-hover table-bordered">
                          <thead>
                          <tr>
                            <th>Plat No.</th>
                            <th>Action</th>
                        </tr>
                          </thead>
                            <tbody>
                            <tr>
                                <td>Maintenance</td>
                                <td><a href="addmaintenance.php">Add</a> | <a href="viewlog.php">View</a></td>
                            </tr>
                            <tr>
                                <td>Daily Maintenance</td>
                                <td><a href="adddaily.php">Add</a> | <a href="viewlog.php">View</a></td>
                            </tr>
                            <tr>
                                <td>Inspection</td>
                                <td><a href="addinspection.php">Add</a> | <a href="viewlog.php">View</a></td>
                            </tr>
                          </tbody>
                       </table>
        </div>
              </div>
        </div>
    </div>
        </body>