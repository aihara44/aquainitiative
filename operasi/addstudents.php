<?php
    session_start();
    
    if(!isset($_SESSION["username"])){
        header("location:login.php");
    }
    include ("../connection.php");
    $msg = "";
    $id = "";
    $username = "";
    $ndp = "";
    $course = "";

    if(isset($_GET["edit_id"])){
        $qe = mysqli_query ($con, "SELECT * FROM stud WHERE id='".mres($con, $_GET["edit_id"])."'");
        while ($row = mysqli_fetch_array($qe,MYSQLI_ASSOC)) {
            $id = $row["id"];
            $username = $row["username"];
            $ndp = $row["ndp"];
            $course = $row["course"];
        }
    }

    if (isset($_POST["btn_save"])){
    $text_student_name = mres($con, $_POST["text_student_name"]);
    $text_ndp = mres($con, $_POST["text_ndp"]);
    $text_course = mres($con, $_POST["text_course"]);

    $qry = mysqli_query($con, "INSERT INTO stud VALUES('','".$text_student_name."','".$text_ndp."','".$text_course."')");

    if($qry){
        $msg='<div id="login-alert" class="alert alert-success col-sm-12">Success! Data was inserted into Database</div>';
    }else{
        $msg='<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot insert into Database</div>';
        }
    }

    if (isset($_POST["btn_edit"])){
        $text_student_name = mres($con, $_POST["text_student_name"]);
        $text_ndp = mres($con, $_POST["text_ndp"]);
        $text_course = mres($con, $_POST["text_course"]);
        $id = mres($con, $_POST["id"]);

        $qry = mysqli_query($con, "UPDATE stud SET username='".$text_student_name."', ndp='".$text_ndp."', course='".$text_course."' WHERE id='".$id."'");

        if($qry){
            $msg='<div id="login-alert" class="alert alert-success col-sm-12">Success! Data was inserted into Database</div>';
        }else{
            $msg='<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot insert into Database</div>';
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
                       Student Registration
                   </div>
                   <div class="panel-body">
                   <?php echo $msg; ?>
                   <form id="form_student_registration" class="form-horizontal" role="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Student Name</span>
                           <input type="text" class="form-control" name="text_student_name" id="text_student_name" value="<?php echo $username; ?>"> 
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">NDP</span>
                           <input type="text" class="form-control" name="text_ndp" id="text_ndp" value="<?php echo $ndp; ?>">
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Course</span>
                           <input type="text" class="form-control" name="text_course" id="text_course" value="<?php echo $course; ?>">
                       </div>
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                              <?php 
                                if(!isset($_GET["edit_id"])){
                                    echo '<input type="submit" id="btn_save" name="btn_save" class="btn btn-info" value="Register">';
                                }else{
                                    echo '<input type="submit" id="btn_edit" name="btn_edit" class="btn btn-info" value="Edit">';
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
                    if($("#text_student_name").val() == ''){
                        $("#text_student_name").css("border-color","#DA1908");
                        $("#text_student_name").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#text_ndp").val() == ''){
                        $("#text_ndp").css("border-color","#DA1908");
                        $("#text_ndp").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#text_course").val() == ''){
                        $("#text_course").css("border-color","#DA1908");
                        $("#text_course").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_student_registration').unbind('submit').submit();
                    }
                });
            });
    </script>
        