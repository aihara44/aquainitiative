<?php
    session_start();
    
    if(!isset($_SESSION["operas"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $kad_id = "";
    $serial_no = "";
    
    if(isset($_POST["btn_save"])){
    $serial_no = mres($con, $_POST["serial_no"]);
    $qry = mysqli_query($con, "INSERT INTO penghantaran(no_siri) values('".$serial_no."')");

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
             <?php include ("leftmenu.php"); ?>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">Add Petrol Card</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_petrolcard" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                       <div style="margin-bottom: 25px" class="input-group">
                           <input type="hidden" name="penghantaran_id">
                           <span class="input-group-addon">Driver Name</span>
                           <input class="form-control" type="text" name="driver_name" placeholder="<?php echo $_SESSION["operasi"]; ?>" readonly>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Serial Number</span>
                           <input type="text" class="form-control" name="serial_no" id="serial_no" value="<?php echo $serial_no; ?>" />
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
                $("#btn_save, #btn_edit").click(function(e){
                    if($("#serial_no").val() == ''){
                        $("#serial_no").css("border-color","#DA1908");
                        $("#serial_no").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_petrolcard').unbind('submit').submit();
                    }
                });
            });
    </script>

