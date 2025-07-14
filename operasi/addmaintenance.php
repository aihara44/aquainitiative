<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $kenderaan_id = "";
    $plat_no = "";
    $service = "";
    $date1 = "";
    $mileage = "";
    $mileage2 = "";
    $transport_id = "";
    $tyre = "";
    $date = "";

     if(isset($_GET["get_id"])){
        $qe = mysqli_query($con, "SELECT kenderaan_id, no_plat, nombor_id_kenderaan, saiz_tayar, tahun FROM kenderaan WHERE kenderaan_id='".mres($con, $_GET["get_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $kenderaan_id = $row["kenderaan_id"];
            $plat_no = $row["no_plat"];
            $transport_id = $row["nombor_id_kenderaan"];
            $tyre = $row["saiz_tayar"];
            $date = $row["tahun"];

        }
    }
    
    if(isset($_POST["btn_save"])){
    $plat_no = mres($con, $_POST["plat_no"]);
    $date1 = mres($con, $_POST["date1"]);
    $service = mres($con, $_POST["service"]);
    $mileage = mres($con, $_POST["mileage"]);
    $mileage2 = mres($con, $_POST["mileage2"]);
    $qry = mysqli_query($con, "INSERT INTO maintenance values('','".$plat_no."','".$date1."','".$service."','".$mileage."','".$mileage2."')");

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
                       <div class="panel-title">Add Maintenance Record</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_maintenance" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                       
                       <div class="well">
                           <h3 style="text-align: center">Vehicle Identification Information</h3>
                            <div style="margin-bottom: 25px" class="input-group">
                                <input type="hidden" name="kenderaan_id" value="<?php echo $kenderaan_id; ?>">
                                <span class="input-group-addon">Plat No.</span>
                                <input type="text" class="form-control" name="plat_no" id="plat_no" value="<?php echo $plat_no; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Vehicle Identification Number</span>
                                <input type="text" class="form-control" name="transport_id" id="transport_id" value="<?php echo $transport_id; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Tire Size</span>
                                <input type="text" class="form-control" name="tyre" id="tyre" value="<?php echo $tyre; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Vehicle Year</span>
                                <input type="date" class="form-control" name="date" id="date" value="<?php echo $date; ?>" readonly>
                           </div>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Date Of Maintenance</span>
                           <input type="date" class="form-control" name="date1" id="date1">
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Operation Performed</span>
                           <input type="text" class="form-control" name="service" id="service">                               
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Vehicle Mileage</span>
                           <input type="text" class="form-control" name="mileage" id="mileage">
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Next Maintenance Due</span>
                           <input type="text" class="form-control" name="mileage2" id="mileage2">
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
</div>
    <script>
        $(document).ready(function(){
              $('input[class="form-control"]').focus(function() {
                  $(this).removeAttr('style');
              });
                $("#btn_save").click(function(e){
                    if($("#date1").val() == ''){
                        $("#date1").css("border-color","#DA1908");
                        $("#date1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#service").val() == ''){
                        $("#service").css("border-color","#DA1908");
                        $("#service").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#mileage").val() == ''){
                        $("#mileage").css("border-color","#DA1908");
                        $("#mileage").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#mileage2").val() == ''){
                        $("#mileage2").css("border-color","#DA1908");
                        $("#mileage2").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_maintenance').unbind('submit').submit();
                    }
                });
            });
    </script>

