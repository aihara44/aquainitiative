<?php 
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../../connection.php");

    $kenderaan_id = "";
    $plat_no = "";
    $transport_id = "";
    $tyre = "";
    $date = "";

   
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
                       
                       <div class="btn-group">
                           <a href="operations.php" class="btn btn-info">Operations</a>
                       </div>
                       <br>
                       <br>
                       <div class="btn-group">
                           <a href="maintenancelog.php" class="btn btn-info">Maintenance Log</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </body>