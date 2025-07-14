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
    $platform = "";
    $customer_name = "";
    $address = "";
    $brand1 = "";
    $type1 = "";
    $quantity1 = "";
    $date = "";
    $serial_no = "";
    $fuel_type = "";
    $price = "";

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
    $location = mres($con, $_POST["location"]);
    $brand1 = mres($con, $_POST["brand1"]);
    $type1 = mres($con, $_POST["type1"]);
    $quantity1 = mres($con, $_POST["quantity1"]);
    $date = mres($con, $_POST["date"]);
    $serial_no = mres($con, $_POST["serial_no"]);
    $fuel_type = mres($con, $_POST["fuel_type"]);
    $price = mres($con, $_POST["price"]);
    $qry = mysqli_query($con, "INSERT INTO gallon values('','".$driver_name."','".$plat_no."','".$date."','".$brand1."','".$type1."','".$quantity1."','".$location."','".$serial_no."','".$fuel_type."','".$price."')");

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
                       <div class="panel-title">Add Delivery Information</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_kpdnhep" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="hidden" name="online_id" value="<?php echo $online_id; ?>">
                            <span class="input-group-addon">Driver Name</span>
                            <input type="text" class="form-control" name="driver_name" id="driver_name" value="<?php echo $_SESSION["operasi"]; ?>" readonly>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Plat No.</span>
                            <input type="text" class="form-control" name="plat_no" id="plat_no" value="<?php echo $plat_no; ?>" readonly>
                        </div>
                       <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Location</span>
                            <input type="text" class="form-control" name="location" id="location" value="KPDNHEP (Kementerian Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna)" readonly>
                        </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand1" id="brand1">
                                   <option value="" selected>-- Select Brand --</option>
                                   <option value="Persada Dunya">Persada Dunya</option>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type1" id="type1">
                                    <option value="">-- Select Type --</option>
                                    <option value="5 Gallon">5 Gallon</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity1" id="quantity1" />
                       </div>
                         
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Date</span>
                           <input type="date" class="form-control" name="date" id="date" />
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="hidden" name="kad_id" value="<?php echo $kad_id; ?>">
                            <span class="input-group-addon">Serial Number</span>
                            <select class="form-control" name="serial_no" id="serial_no">
                                <option value="">-- Select Serial No. --</option>
                                <option value="Cash">Cash</option>
                                
                                <?php 
                               $query = mysqli_query($con, "SELECT no_siri FROM kad_petrol") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['no_siri'].'">'.$row['no_siri'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Fuel Type</span>
                               <select class="form-control" name="fuel_type" id="fuel_type">
                                   <option value="">-- Select Fuel Type --</option>
                                   <option value="Petrol">Petrol</option>
                                   <option value="Diesel">Diesel</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Price (RM)</span>
                           <input type="text" class="form-control" name="price" id="price" />
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
                    if($("#brand1").val() == ''){
                        $("#brand1").css("border-color","#DA1908");
                        $("#brand1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#type1").val() == ''){
                        $("#type1").css("border-color","#DA1908");
                        $("#type1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#quantity1").val() == ''){
                        $("#quantity1").css("border-color","#DA1908");
                        $("#quantity1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#location1").val() == ''){
                        $("#location1").css("border-color","#DA1908");
                        $("#location1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    
                    if($("#date").val() == ''){
                        $("#date").css("border-color","#DA1908");
                        $("#date").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_kpdnhep').unbind('submit').submit();
                    }
                });
            });
    </script>

