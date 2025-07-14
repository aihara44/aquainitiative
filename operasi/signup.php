<?php
    session_start();
    include ("../connection.php");

$nama_staf = '';
$username_staf = '';
$password = '';
$password2 = '';
$operasi = '';
$msg = '';

if (isset($_POST["register"])){
    
    $nama_staf      = mres($con, $_POST["nama_staf"]);
    $username_staf  = mres($con, $_POST["username_staf"]);
    $password       = md5(mres($con, $_POST["password"]));
    $password2      = md5(mres($con, $_POST["password2"]));
    $operasi        = mres($con,$_POST["operasi"]);
    
    $sql_u = "SELECT * FROM users WHERE username='$username_staf'";
  	$res_u = mysqli_query($db, $sql_u);
    
    if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 
    }else{
    
        $qry = mysqli_query($con, "INSERT INTO users VALUES ('','".$nama_staf."','".$username_staf."','".$password."','".$operasi."')");
        $results = mysqli_query($db, $query);
        
    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Welcome to the team.</div>';
        
        header("Location: signup.php?success=register");
    }
    
    else{
        
         $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Error occured while registering your user. </div>';
    header("Location: signup.php?error=register");
    }
}

}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Persada Dunya Distribution Center - Operation Department Login Page</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <!-- jQuery -->
    <script src="../js/jquery-1.12.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </head>
  <body>
      <style>
      .form_error span {
          width: 80%;
          height: 35px;
          margin: 3px 10%;
          font-size: 1.1em;
          color: #D83D5A;
        }
      
      </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h3>Persada Dunya Distribution Center</h3>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-default">
                  <div class="container">
                            <ul class="nav navbar-nav navbar-right">
                      <li><a href="../dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Dashboard</a></li>
                    </ul>
                  </div><!-- /.container-fluid -->
                </nav>
        </div>
        
      <div class="row">
           <div class="container">
            <div id="loginbox" style="margin-top: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="well">
        
            <div class="panel panel-primary">
                
                <div class="panel panel-heading">Register New Account</div>
                
                <div class="panel-body">
                  <?php echo $msg; ?>
                  <form id="form_username" class="form-horizontal" role="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                      <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input required type="text" name="nama_staf" id="nama_staf" class="form-control" placeholder="Full Name (as per IC)"> 
                       </div>
                    <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
                      <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input required type="text" name="username_staf" id="username_staf" class="form-control" placeholder="New Username" value="<?php echo $username_staf; ?>">
                          <?php if (isset($name_error)): ?>
                            <span><?php echo $name_error; ?></span>
                          <?php endif ?>
                       </div>
                      </div>
                      <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input required type="text" name="operasi" id="operasi" class="form-control" value="Operasi" readonly> 
                       </div>
                      
                      <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                           <input required type="password" class="form-control" name="password" id="password" placeholder="Password"> 
                       </div>
                      
                      <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                           <input required type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password"> 
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
      </div>
    </body>
</html>