<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $kenderaan_id = "";
    $plat_no = "";
    $date = "";
    $wipers = "";
    $mirrors = "";
    $instrument = "";
    $e_brake = "";
    $brake = "";
    $horn = ""; 
    $steering = "";
    $engine = "";
    $air_cleaner = "";
    $glass = "";
    $aircond = "";
    $general = "";
    $cooling = "";
    $leaks = "";
    $tire = "";
    $belts = "";
    $starter = "";
    $alt_output = "";
    $fuel = "";
    $suspension = "";
    $transmission = "";
    $lights = "";
    $signals = "";
    $headlights = "";
    $battery = "";
    $exhaust = "";
    $reflectors = "";
    $scratches = "";
    $others = "";

    if(isset($_GET["get_id"])){
        $qe = mysqli_query($con, "SELECT kenderaan_id, no_plat FROM kenderaan WHERE kenderaan_id='".mres($con, $_GET["get_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $kenderaan_id = $row["kenderaan_id"];
            $plat_no = $row["no_plat"];
        }
    }
    
    if(isset($_POST["btn_save"])){
    $driver_name = mres($con, $_SESSION["operasi"]);
    $plat_no = mres($con, $_POST["plat_no"]);
    $date = mres($con, $_POST["date"]);
    $wipers = mres($con, $_POST["wipers"]);
    $mirrors = mres($con, $_POST["mirrors"]);
    $instrument = mres($con, $_POST["instrument"]);
    $e_brake = mres($con, $_POST["e_brake"]);
    $brake = mres($con, $_POST["brake"]); 
    $horn = mres($con, $_POST["horn"]);
    $steering = mres($con, $_POST["steering"]);
    $engine = mres($con, $_POST["engine"]);
    $air_cleaner = mres($con, $_POST["air_cleaner"]);
    $glass = mres($con, $_POST["glass"]);
    $aircond = mres($con, $_POST["aircond"]);
    $general = mres($con, $_POST["general"]);
    $cooling = mres($con, $_POST["cooling"]);
    $leaks = mres($con, $_POST["leaks"]);
    $tire = mres($con, $_POST["tire"]);
    $belts = mres($con, $_POST["belts"]);
    $starter = mres($con, $_POST["starter"]);
    $alt_output = mres($con, $_POST["alt_output"]);
    $fuel = mres($con, $_POST["fuel"]);
    $suspension = mres($con, $_POST["suspension"]);
    $transmission = mres($con, $_POST["transmission"]);
    $lights = mres($con, $_POST["lights"]);
    $signal = mres($con, $_POST["signal"]);
    $headlights = mres($con, $_POST["headlights"]);
    $battery = mres($con, $_POST["battery"]);
    $exhaust = mres($con, $_POST["exhaust"]);
    $reflectors = mres($con, $_POST["reflectors"]);
    $scratches = mres($con, $_POST["scratches"]);
    $others = mres($con, $_POST["others"]);
    $qry = mysqli_query($con, "INSERT INTO inspection values('','".$driver_name."','".$plat_no."','".$date."','".$wipers."','".$mirrors."','".$instrument."','".$e_brake."','".$brake."','".$horn."','".$steering."','".$engine."','".$air_cleaner."','".$glass."','".$aircond."','".$general."','".$cooling."','".$leaks."','".$tire."','".$belts."','".$starter."','".$alt_output."','".$fuel."','".$suspension."','".$transmission."','".$lights."','".$signals."','".$headlights."','".$battery."','".$exhaust."','".$reflectors."','".$scratches."','".$others."')");

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
                       <div class="panel-title">Vehicle Inspection Information Log</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_inspection" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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
                           <span class="input-group-addon">Windshield Wipers</span>
                           <select class="form-control" name="wipers" id="wipers">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Mirrors</span>
                           <select class="form-control" name="mirrors" id="mirrors">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Instruments Operation</span>
                           <select class="form-control" name="instrument" id="instrument">                                 
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Emergency Brake</span>
                           <select class="form-control" name="e_brake" id="e_brake">                                 
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Brakes</span>
                           <select class="form-control" name="brake" id="brake">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Horn</span>
                           <select class="form-control" name="horn" id="horn">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Steering / Alignment</span>
                           <select class="form-control" name="steering" id="steering">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Engine Oil Level</span>
                           <select class="form-control" name="engine" id="engine">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Air Cleaner</span>
                           <select class="form-control" name="air_cleaner" id="air_cleaner">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Glass</span>
                           <select class="form-control" name="glass" id="glass">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Air Conditioner</span>
                           <select class="form-control" name="aircond" id="aircond">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">General Engine Operation</span>
                           <select class="form-control" name="general" id="general">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Cooling System</span>
                           <select class="form-control" name="cooling" id="cooling">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Leaks Oil, Fuel and Coolant</span>
                           <select class="form-control" name="leaks" id="leaks">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Tires / Tire Pressure</span>
                           <select class="form-control" name="tire" id="tire">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Belts</span>
                           <select class="form-control" name="belts" id="belts">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Starter / Ignition</span>
                           <select class="form-control" name="starter" id="starter">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Alternator Output</span>
                           <select class="form-control" name="alt_output" id="alt_output">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Fuel System</span>
                           <select class="form-control" name="fuel" id="fuel">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Suspension System</span>
                           <select class="form-control" name="suspension" id="suspension">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Transmission Oil Level</span>
                           <select class="form-control" name="transmission" id="transmission">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Brake Lights</span>
                           <select class="form-control" name="lights" id="lights">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Turn Signals</span>
                           <select class="form-control" name="signal" id="signal">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Head Lights</span>
                           <select class="form-control" name="headlights" id="headlights">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Battery Operation / Levels</span>
                           <select class="form-control" name="battery" id="battery">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Exhaust System</span>
                           <select class="form-control" name="exhaust" id="exhaust">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Reflectors</span>
                           <select class="form-control" name="reflectors" id="reflectors">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Scratches / Dents</span>
                           <select class="form-control" name="scratches" id="scratches">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Others</span>
                           <select class="form-control" name="others" id="others">
                               <option selected>-- Select Rating --</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
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
                    if($("#wipers").val() == ''){
                        $("#wipers").css("border-color","#DA1908");
                        $("#wipers").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#mirrors").val() == ''){
                        $("#mirrors").css("border-color","#DA1908");
                        $("#mirrors").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#instrument").val() == ''){
                        $("#instrument").css("border-color","#DA1908");
                        $("#instrument").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#e_brake").val() == ''){
                        $("#e_brake").css("border-color","#DA1908");
                        $("#e_brake").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#brake").val() == ''){
                        $("#brake").css("border-color","#DA1908");
                        $("#brake").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#horn").val() == ''){
                        $("#horn").css("border-color","#DA1908");
                        $("#horn").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#steering").val() == ''){
                        $("#steering").css("border-color","#DA1908");
                        $("#steering").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#engine").val() == ''){
                        $("#engine").css("border-color","#DA1908");
                        $("#engine").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#air_cleaner").val() == ''){
                        $("#air_cleaner").css("border-color","#DA1908");
                        $("#air_cleaner").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#glass").val() == ''){
                        $("#glass").css("border-color","#DA1908");
                        $("#glass").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#aircond").val() == ''){
                        $("#aircond").css("border-color","#DA1908");
                        $("#aircond").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#general").val() == ''){
                        $("#general").css("border-color","#DA1908");
                        $("#general").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#cooling").val() == ''){
                        $("#cooling").css("border-color","#DA1908");
                        $("#cooling").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#leaks").val() == ''){
                        $("#leaks").css("border-color","#DA1908");
                        $("#leaks").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#tire").val() == ''){
                        $("#tire").css("border-color","#DA1908");
                        $("#tire").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#belts").val() == ''){
                        $("#belts").css("border-color","#DA1908");
                        $("#belts").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#starter").val() == ''){
                        $("#starter").css("border-color","#DA1908");
                        $("#starter").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#alt_output").val() == ''){
                        $("#alt_output").css("border-color","#DA1908");
                        $("#alt_output").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#fuel").val() == ''){
                        $("#fuel").css("border-color","#DA1908");
                        $("#fuel").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#suspension").val() == ''){
                        $("#suspension").css("border-color","#DA1908");
                        $("#suspension").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#transmission").val() == ''){
                        $("#transmission").css("border-color","#DA1908");
                        $("#transmission").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#lights").val() == ''){
                        $("#lights").css("border-color","#DA1908");
                        $("#lights").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#signals").val() == ''){
                        $("#signals").css("border-color","#DA1908");
                        $("#signals").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#headlights").val() == ''){
                        $("#headlights").css("border-color","#DA1908");
                        $("#headlights").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#battery").val() == ''){
                        $("#battery").css("border-color","#DA1908");
                        $("#battery").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#exhaust").val() == ''){
                        $("#exhaust").css("border-color","#DA1908");
                        $("#exhaust").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#reflectors").val() == ''){
                        $("#reflectors").css("border-color","#DA1908");
                        $("#reflectors").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#scratches").val() == ''){
                        $("#scratches").css("border-color","#DA1908");
                        $("#scratches").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#others").val() == ''){
                        $("#others").css("border-color","#DA1908");
                        $("#others").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_inspection').unbind('submit').submit();
                    }
                });
            });
    </script>

