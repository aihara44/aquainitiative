<?php
    session_start();
    
    if(!isset($_SESSION["username"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $subject_id = "";
    $subject = "";
    $course = "";
    $course_id = "";

    if(isset($_GET["edit_id"])){
        $qe = mysqli_query($con, "SELECT * FROM subject WHERE subject_id='".mres($con, $_GET["edit_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $subject_id = $row["subject_id"];
            $subject = $row["subject"];
            $course = $row["course"];
        }
    }
    
    if(isset($_POST["btn_save"])){
    $subject = mres($con, $_POST["subject"]);
    $course = mres($con, $_POST["course"]);
    $qry = mysqli_query($con, "INSERT INTO subject values('','".$subject."','".$course."')");

    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
        }else{
        $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
        }
    }

    if(isset($_POST["btn_edit"])){
    $subject = mres($con, $_POST["subject"]);
    $course = mres($con, $_POST["course"]);
    $subject_id = mres($con, $_POST["subject_id"]);
    $qry = mysqli_query($con, "UPDATE subject SET subject='".$subject."', course='".$course."' where subject_id='".$subject_id."'");

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
                       <div class="panel-title">Add Subject</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_subject" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                       <div style="margin-bottom: 25px" class="input-group">
                           <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                           <span class="input-group-addon">Subject</span>
                           <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $subject; ?>" />
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Course</span>
                           <select name="course" class="form-control" id="course">
                               <option value="">-- Choose Course --</option>
                               <?php
                                $qry = mysqli_query($con, "SELECT * FROM course");
                               while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                   if($row["course"]==$course){
                                       echo '<option value="'.$row["course"].'" selected>'.$row["course"].'</option>';
                                   }else{
                                       echo '<option value="'.$row["course"].'">'.$row["course"].'</option>';
                                        }
                                   
                               }
                               ?>
                           </select>
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
                    if($("#subject").val() == ''){
                        $("#subject").css("border-color","#DA1908");
                        $("#subject").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#course_id").val() == ''){
                        $("#course_id").css("border-color","#DA1908");
                        $("#course_id").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_subject').unbind('submit').submit();
                    }
                });
            });
    </script>

