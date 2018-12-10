<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $penghantaran_id = "";
    $driver_name = "";
    $brand = "";
    $type = "";
    $quantity = "";
    $location = "";
    $date = "";

    if(isset($_GET["edit_id"])){
        $qe = mysqli_query($con, "SELECT * FROM penghantaran WHERE penghantaran_id='".mres($con, $_GET["edit_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $penghantaran_id = $row["penghantaran_id"];
            $driver_name = $row["nama_pemandu"];
            $brand = $row["jenama"];
            $type = $row["jenis"];
            $quantity = $row["kuantiti"];
            $location = $row["location"];
        }
    }
    
    if(isset($_POST["btn_save"])){
    $driver_name = mres($con, $_POST["driver_name"]);
    $brand = mres($con, $_POST["brand"]);
    $type = mres($con, $_POST["type"]);
    $quantity = mres($con, $_POST["quantity"]);
    $location = mres($con, $_POST["location"]);
    $date = mres($con, $_POST["date"]);
    $qry = mysqli_query($con, "INSERT INTO penghantaran values('','".$driver_name."','".$brand."','".$type."','".$quantity."','".$location."','".$date."')");

    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
        }else{
        $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
        }
    }

    if(isset($_POST["btn_edit"])){
    $driver_name = mres($con, $_POST["driver_name"]);
    $brand = mres($con, $_POST["brand"]);
    $type = mres($con, $_POST["type"]);
    $quantity = mres($con, $_POST["quantity"]);
    $location = mres($con, $_POST["location"]);
    $date = mres($con, $_POST["date"]);
    $penghantaran_id = mres($con, $_POST["penghantaran_id"]);
    $qry = mysqli_query($con, "UPDATE subject SET nama_pemandu='".$driver_name."', jenama='".$brand."', jenis='".$type."', kuantiti='".$quantity."', lokasi='".$location."', tarikh='".$date."' where penghantaran_id='".$penghantaran_id."'");

    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Updated.</div>';
        }else{
        $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot Updated.</div>';
        }
    }

?>
   

   <?php include ("header.php"); ?>
    <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
             <?php include ("leftmenu.php"); ?>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">Add Delivery Information</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_operation" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                       <div style="margin-bottom: 25px" class="input-group">
                           <input type="hidden" name="penghantaran_id" value="<?php echo $penghantaran_id; ?>">
                           <span class="input-group-addon">Driver Name</span>
                           <select>
                               <option>-- Driver Name --</option>
                           <?php 
                               $query = mysqli_query($con, "SELECT operasi_id, nama_pemandu FROM operasi") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['operasi_id'].'">'.$row['nama_pemandu'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Brand</span>
                           <select>
                               <option>-- Brand --</option>
                           <?php 
                               $query = mysqli_query($con, "SELECT operasi_id, nama_pemandu FROM operasi") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['operasi_id'].'">'.$row['nama_pemandu'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Type</span>
                           <select>
                               <option>-- Type --</option>
                           <?php 
                               $query = mysqli_query($con, "SELECT operasi_id, nama_pemandu FROM operasi") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['operasi_id'].'">'.$row['nama_pemandu'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo $quantity; ?>" />
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Location</span>
                           <select>
                               <option>-- Location --</option>
                           <?php 
                               $query = mysqli_query($con, "SELECT operasi_id, nama_pemandu FROM operasi") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['operasi_id'].'">'.$row['nama_pemandu'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Date</span>
                           <input type="date" class="form-control" name="date" id="date" />
                       </div>
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
                $("#btn_save, #btn_edit").click(function(e){
                    if($("#driver_name").val() == ''){
                        $("#driver_name").css("border-color","#DA1908");
                        $("#driver_name").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#transport").val() == ''){
                        $("#transport").css("border-color","#DA1908");
                        $("#transport").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#plat_no").val() == ''){
                        $("#plat_no").css("border-color","#DA1908");
                        $("#plat_no").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#transport").val() == ''){
                        $("#transport").css("border-color","#DA1908");
                        $("#transport").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#date").val() == ''){
                        $("#date").css("border-color","#DA1908");
                        $("#date").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#username").val() == ''){
                        $("#username").css("border-color","#DA1908");
                        $("#username").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#password").val() == ''){
                        $("#password").css("border-color","#DA1908");
                        $("#password").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_subject').unbind('submit').submit();
                    }
                });
            });
    </script>

