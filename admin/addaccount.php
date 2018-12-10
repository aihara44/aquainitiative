<?php
    session_start();
    
    if(!isset($_SESSION["admin_name"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $akaun_id = "";
    $username = "";
    $password = "";

    if(isset($_GET["edit_id"])){
        $qe = mysqli_query($con, "SELECT * FROM akaun WHERE akaun_id='".mres($con, $_GET["edit_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $akaun_id = $row["akaun_id"];
            $username = $row["course"];
        }
    }
    
    if(isset($_POST["btn_save"])){
    $username = mres($con, $_POST["username"]);
    $password = md5(mres($con, $_POST["password"]));
    $qry = mysqli_query($con, "INSERT INTO akaun values('','".$username."','".$password."')");

    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
        }else{
        $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
        }
    }

    if(isset($_POST["btn_edit"])){
    $username = mres($con, $_POST["username"]);
    $password = md5(mres($con, $_POST["password"]));
    $akaun_id = mres($con, $_POST["akaun_id"]);
    $qry = mysqli_query($con, "UPDATE akaun SET username='".$course."', password='".$course_code."' where akaun_id='".$course_id."'");

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
                       <div class="panel-title">Add Course</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_account" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                       <div style="margin-bottom: 25px" class="input-group">
                           <input type="hidden" name="akaun_id" value="<?php echo $course_id; ?>">
                           <span class="input-group-addon">Username</span>
                           <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" />
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Password</span>
                           <input type="password" class="form-control" name="password" id="password"/>
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
                    if($("#username").val() == ''){
                        $("#username").css("border-color","#DA1908");
                        $("#username").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#password").val() == ''){
                        $("#password").css("border-color","#DA1908");
                        $("#password").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#text_lect_name").val() == ''){
                        $("#text_lect_name").css("border-color","#DA1908");
                        $("#text_lect_name").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_account').unbind('submit').submit();
                    }
                });
            });
    </script>

