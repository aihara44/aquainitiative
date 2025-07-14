
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Persada Dunya Distribution Center - Operation Homepage</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
      <link rel="stylesheet" href="../DataTables/css/jquery.dataTables.min.css">
      <link href="src/selectstyle.css" rel="stylesheet">

      <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
    <!-- jQuery -->
      <script src="../js/jquery-1.12.1.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery.min.js"></script>
      <script src="src/selectstyle.js"></script>

  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h3><b>Persada Dunya Distribution Center - Operation</b></h3>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="nav navbar-nav">
                     <li class="active"><a href="index.php">Home</a></li>
                    </div>
                    <div class="nav navbar-nav pull-right">
                    <li><a href="#"><?php echo "Hello: <b>".$_SESSION["operasi"]."</b>"; ?></a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>