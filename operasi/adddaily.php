<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $kenderaan_id = "";
    $plat_no = "";
    $driver_name = "";
    $date = "";
    $trip1 = "";
    $trip2 = "";

    if(isset($_GET["get_id"])){
        $qe = mysqli_query($con, "SELECT * FROM kenderaan WHERE kenderaan_id='".mres($con, $_GET["get_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $kenderaan_id = $row["kenderaan_id"];
            $plat_no = $row["no_plat"];
        }
    }
    
    if(isset($_POST["btn_save"])){
    $driver_name = mres($con, $_SESSION["operasi"]);
    $plat_no = mres($con, $_POST["plat_no"]);
    $date = mres($con, $_POST["date"]);
    $trip1 = mres($con, $_POST["trip1"]);
    $trip2 = mres($con, $_POST["trip2"]);
    $qry = mysqli_query($con, "INSERT INTO daily_maintenance values('','".$driver_name."','".$plat_no."','".$date."','".$trip1."','".$trip2."')");

    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
        }else{
        $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
        }
    }

?>
   

   <?php include ("header.php"); ?>
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
                       <div class="panel-title">Daily Maintenance Information Log</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_daily" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="hidden" name="kenderaan_id" value="<?php echo $kenderaan_id; ?>">
                            <span class="input-group-addon">Driver Name</span>
                            <input type="text" class="form-control" name="driver_name" id="driver_name" value="<?php echo $_SESSION["operasi"]; ?>" readonly>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Plat No.</span>
                            <input type="text" class="form-control" name="plat_no" id="plat_no" value="<?php echo $plat_no; ?>" readonly>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Date</span>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Trip Ending Reading</span>
                           <input type="text" class="form-control" name="trip1" id="trip1">
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Trip Mileage</span>
                           <input type="text" class="form-control" name="trip2" id="trip2">                               
                       </div>
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                               <input type="submit" id="btn_save" name="btn_save" class="btn btn-info" value="Register"/>
                            </div>
                       </div>
                    </form>
               </div>
            </div>
          </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
              $('input[class="form-control"]').focus(function() {
                  $(this).removeAttr('style');
              });
                $("#btn_save").click(function(e){
                    if($("#date").val() == ''){
                        $("#date").css("border-color","#DA1908");
                        $("#date").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#trip1").val() == ''){
                        $("#trip1").css("border-color","#DA1908");
                        $("#trip1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#trip2").val() == ''){
                        $("#trip2").css("border-color","#DA1908");
                        $("#trip2").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_daily').unbind('submit').submit();
                    }
                });
            });
    </script>

