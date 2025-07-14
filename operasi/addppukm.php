<?php
    session_start();

    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }

include ("../connection.php"); 

$msg = "";
$msg_image = "";
$customer_id = "";
$department = "";
$unit = "";
$block = "";
$level = "";
$dpquota = "";
$full_bottle = "";
$empty_bottle = "";
$month = "";
$year = "";
$receipt = "";

function GetImageExtension($imgtype)
{
    if(empty($imgtype))
        return false;
    switch($imgtype){
        case 'image/jpeg':
            return '.jpeg';
        case 'image/pdf':
            return '.pdf';
        case 'image/png':
            return '.png';
        case 'image/jpg':
            return '.jpg';
        default:
            return false;
        }
}
    

if(isset($_GET["get_id"])){
        $qe = mysqli_query($con, "SELECT jabatan.*, blok.blok as blokName, tingkat.tingkat as tingkatName, unit.unit as unitName FROM jabatan INNER JOIN tingkat ON jabatan.tingkat = tingkat.tingkat_id INNER JOIN blok ON jabatan.blok = blok.blok_id INNER JOIN unit ON jabatan.unit = unit.unit_id  WHERE jabatan.jabatan_id='".mres($con, $_GET["get_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $jabatan_id = $row["jabatan_id"];
            $customer_id = $row["customer_id"];
            $department = $row["jabatan"];
            $unit = $row["unitName"];
            $block = $row["blokName"];
            $level = $row["tingkatName"];
            $dpquota = $row["peruntukan_bulanan"];
        }
    }

if(isset($_POST["btn_save"])){
    foreach ($_FILES['receipt']['name'] as $key => $name){
        
        $tmp_name = $_FILES['receipt']['tmp_name'][$key];
        $imgtype = $_FILES['receipt']['type'][$key];
        $ext = GetImageExtension($imgtype);
        $newFilename = date('Y-m-d_h-i-s').rand(1111,9999).rand(1111,9999)."_".$name.$ext;
        $target_path = '../assests/images/stock/'.$newFilename;
		move_uploaded_file($tmp_name, $target_path);
        
        $customer_id = mres($con, $_POST["customer_id"]);
        $department = mres($con, $_POST["department"]);
        $unit = mres($con, $_POST["unit"]);
        $block = mres($con, $_POST["block"]);
        $level = mres($con, $_POST["level"]);
        $dpquota = mres($con, $_POST["dpquota"]);
        $full_bottle = mres($con, $_POST["full_bottle"]);
        $empty_bottle = mres($con, $_POST["empty_bottle"]);
        $month = mres($con, $_POST["month"]);
        $year = mres($con, $_POST["year"]);
    
        $qry = mysqli_query($con, "INSERT INTO gallon values('','".$customer_id."','".$department."','".$unit."','".$block."','".$level."','".$dpquota."','".$full_bottle."','".$empty_bottle."','".$month."','".$year."','".$newFilename."', 1)");
        if($qry){
                $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
                $msg_image = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Image Is Inserted.</div>';
            }else{
                $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
                $msg_image = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Image Cannot Inserted.</div>';
                }
            }
        }
?>
<?php include 'header.php'; ?>
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
                       <div class="panel-title">Add PPUKM Deliveries</div>
                    </div>
                   <div class="panel-body">
                       <?php 
                            echo $msg; 
                            echo $msg_image;
                       ?>
                   <form id="form_department" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                       <div class="well">
                           <h3 style="text-align: center">PPUKM Department Information</h3>
                            <div style="margin-bottom: 25px" class="input-group">
                                <input type="hidden" name="jabatan_id" value="<?php echo $jabatan_id; ?>">
                                <span class="input-group-addon">Customer ID</span>
                                <input type="text" class="form-control" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Department Name</span>
                                <input type="text" class="form-control" name="department" id="department" value="<?php echo $department; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Department Unit</span>
                                <input type="text" class="form-control" name="unit" id="unit" value="<?php echo $unit; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Department Block</span>
                                <input type="text" class="form-control" name="block" id="block" value="<?php echo $block; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Department Floor Level</span>
                                <input type="text" class="form-control" name="level" id="level" value="<?php echo $level; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Department Monthly Quota</span>
                                <input type="text" class="form-control" name="dpquota" id="dpquota" value="<?php echo $dpquota; ?>" readonly>
                           </div>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Delivered Full Bottle</span>
                           <input type="text" class="form-control" name="full_bottle" id="full_bottle"/>
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Collected Empty Bottle</span>
                           <input type="text" class="form-control" name="empty_bottle" id="empty_bottle" />
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Year</span>
                            <select class="form-control" name="year" id="year">
                                <option value="">-- Select Year --</option>
                                <?php 
                                    $qry = mysqli_query($con, "SELECT * FROM tahun");
                                    while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                        echo '<option value"'.$row["tahun"].'">'.$row["tahun"].'</option>';
                                    }
                                ?>
                            </select>
                            <span class="input-group-addon">Month</span>
                            <select class="form-control" name="month" id="month">
                                <option value="">-- Select Month --</option>
                                <?php 
                                    $qry = mysqli_query($con, "SELECT * FROM bulan");
                                    while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                        echo '<option value"'.$row["bulan"].'">'.$row["bulan"].'</option>';
                                    }
                                ?>
                            </select>
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Receipt Image</span>
                           <input type="file" class="form-control" name="receipt[]" id="receipt[]" multiple />
                       </div>
                        <p style="color: red;">*Note: Limit only 4 files. Not more, not less. </p>
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                               <?php if(!isset($_GET["edit_id"])){
                                    echo '<input type="submit" id="btn_save" name="btn_save" class="btn btn-info" value="Register"/>';
                                }else{
                                    echo '<input type="submit" id="btn_edit" name="btn_edit" class="btn btn-info" value="Edit"/>';
                                }
                            ?>
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
                    if($("#full_bottle").val() == ''){
                        $("#full_bottle").css("border-color","#DA1908");
                        $("#full_bottle").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#empty_bottle").val() == ''){
                        $("#empty_bottle").css("border-color","#DA1908");
                        $("#empty_bottle").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#month").val() == ''){
                        $("#month").css("border-color","#DA1908");
                        $("#month").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#year").val() == ''){
                        $("#year").css("border-color","#DA1908");
                        $("#year").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#receipt[]").val() == ''){
                        $("#receipt[]").css("border-color","#DA1908");
                        $("#receipt[]").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_department').unbind('form_ppukm').submit();
                    }
                });
            });
        
    </script>
<script src="custom/js/ppukm.js"></script>
<?php require_once 'includes/footer.php'; ?>