<?php

    include ("connection.php");

    $msg = "";
    $username = "";
    $password = "";
    $ndp = "";
    $course = "";

if(isset($_POST["register"])) {
    
    $username = mres($con, $_POST["username"]);
    $password = md5(mres($con, $_POST["password"]));
    $ndp = mres($con, $_POST["ndp"]);
    $course = mres($con, $_POST["course"]);
    
    $qry = mysqli_query($con, "INSERT INTO stud VALUES('','".$username."','".$password."','".$ndp."','".$course."')");
        if($qry){
        $msg='<div id="login-alert" class="alert alert-success col-sm-12">Success! Data was inserted into Database.Click here to <a href="login.php">login</a>.</div>';
    }else{
        $msg='<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot insert into Database</div>';
        header('location:register.php');
        }
     
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iLearning</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <!-- jQuery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h3>Student</h3>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h3>iLearning</h3>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-default">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">Brand</a>
                    </div> -->
                  </div><!-- /.container-fluid -->
                </nav>
        </div>
        <div class="row">
           <div class="container">
            <div id="loginbox" style="margin-top: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
               <div class="panel panel-info">
                   <div class="panel-heading">
                       Student Register
                   </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                       <form id="form_student" class="form-horizontal" role="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Student Name</span>
                           <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>"> 
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Password</span>
                           <input type="password" class="form-control" name="password" id="password" placeholder="Password"> 
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Student ID</span>
                           <input type="text" class="form-control" name="ndp" id="ndp" placeholder="Student ID" value="<?php echo $ndp; ?>"> 
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Course</span>
                           <select name="course" class="form-control" id="course">
                               <option value="">-- Choose Course --</option>
                               <?php
                                $qry = mysqli_query($con, "SELECT * FROM course");
                               while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                   if($row["course"]==$course){
                                       echo '<option value="'.$row["course_id"].'" selected>'.$row["course"].'</option>';
                                   }else{
                                       echo '<option value="'.$row["course_id"].'">'.$row["course"].'</option>';
                                        }
                                   
                               }
                               ?>
                           </select>
                       </div>
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                               <input type="submit" id="register" name="register" class="btn btn-info" value="Register">
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
                $("#register").click(function(e){
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
                    if($("#ndp").val() == ''){
                        $("#ndp").css("border-color","#DA1908");
                        $("#ndp").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#course").val() == ''){
                        $("#course").css("border-color","#DA1908");
                        $("#course").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_student').unbind('submit').submit();
                    }
                });
            });
      </script>
  </body>
</html>