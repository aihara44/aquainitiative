<?php
    session_start();
    
    if(!isset($_SESSION["username"])){
        header("location:login.php");
    }
    include ("../connection.php");
    $msg = "";

    if (isset($_GET["delete_id"])){
        
    $qry = mysqli_query($con, "DELETE FROM stud WHERE id ='" .mres($con, $_GET["delete_id"])."'");

    if($qry){
        $msg='<div id="login-alert" class="alert alert-success col-sm-12">Success! Data was Deleted</div>';
    }else{
        $msg='<div id="login-alert" class="alert alert-danger col-sm-12">Failure! Cannot Delete from Database</div>';
        }
    }
  
?>
        <?php include ("header.php"); ?>
         <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
             <?php include ("leftmenu.php"); ?>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="well">
                  <form method="post" class="form-inline" id="form-search" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                  <div class="form-group">
                          <label>Search By Username:</label>
                           <input type="text" class="form-control" name="search_text" id="search_text">
                           <button type="submit" class="btn btn-default" id="btn_search" name="btn_search">Search</button>
                        </div>
                  </form>
              </div>
               <div class="panel panel-info">
                   <div class="panel-heading">
                      Student Management
                   </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>NDP</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        $qry = "";
                        
                        if(isset($_POST["btn_search"])) {
                            $qry = mysqli_query($con, "SELECT * FROM stud WHERE username LIKE '%".mres($con,$_POST["search_text"])."%' ORDER BY stud_id asc");
                        }else{
                            $qry = mysqli_query($con, "SELECT * FROM stud WHERE ndp ORDER BY stud_id asc");
                        }
                        while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
                            echo '<tr>';
                            echo '<td>'.$row["stud_id"]."</td><td>".$row["username"]."</td><td>".$row["ndp"]."</td><td>".$row["course"]."</td><td><a href='addstudents.php?edit_id=".$row["stud_id"]."'>Edit</a> | <a href='?delete_id=".$row["stud_id"]."' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td>";
                            echo '</tr>';
                        }
                        ?>
                        
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function(){
                $("#btn_search").click(function(e){
                    
                    if($("#search_text").val() == ''){
                        $("#search_text").css("border-color","#DA1908");
                        $("#search_text").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form-search').unbind('submit').submit();
                    }
                });
            });
    </script>
        