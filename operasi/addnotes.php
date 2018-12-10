<?php
    session_start();
    
    if(!isset($_SESSION["username"])){
        header("location:login.php");
    }
    
    include ("../connection.php");
    if(isset($_POST['submit'])){    
     
    $lect_name = mres($con,$_POST['lect_name']);
    $subject = mres($con,$_POST['subject']);
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="notes/";
 
     if(move_uploaded_file($file_loc,$folder.$file))
     {
      $sql="INSERT INTO notes(lect_name,subject,file,type,size) VALUES('$lect_name','$subject','$file','$file_type','$file_size')";
      mysqli_query($con,$sql);
      ?>
      <script>
      alert('successfully uploaded');
            window.location.href='addnotes.php?success';
            </script>
      <?php
     }
     else
     {
      ?>
      <script>
      alert('error while uploading file');
            window.location.href='addnotes.php?fail';
            </script>
      <?php
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
                       Notes Upload
                   </div>
                   <div class="panel-body">
                      <?php
                         if(isset($_GET['success']))
                         {
                          ?>
                                <label>File Uploaded Successfully...  <a href="notesmanagement.php">click here to view file.</a></label>
                                <?php
                         }
                         else if(isset($_GET['fail']))
                         {
                          ?>
                                <label>Problem While File Uploading !</label>
                                <?php
                         }
                       ?>
                   <form id="form_notes_upload" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Lecturer Name</span>
                           <select name="lect_name" class="form-control" id="lect_name">
                               <option value="">-- Choose Lecturer --</option>
                               <?php
                                $qry = mysqli_query($con, "SELECT * FROM lect");
                               while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                   if($row["lect_name"]==$lect_name){
                                       echo '<option value="'.$row["lect_name"].'" selected>'.$row["lect_name"].'</option>';
                                   }else{
                                       echo '<option value="'.$row["lect_name"].'">'.$row["lect_name"].'</option>';
                                        }
                                   
                               }
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Subject Name</span>
                           <select name="subject" class="form-control" id="subject">
                               <option value="">-- Choose Subject --</option>
                               <?php
                                $qry = mysqli_query($con, "SELECT subject FROM subject");
                               while($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                                   if($row["subject"]==$subject){
                                       echo '<option value="'.$row["subject"].'" selected>'.$row["subject"].'</option>';
                                   }else{
                                       echo '<option value="'.$row["subject"].'">'.$row["subject"].'</option>';
                                        }
                                   
                               }
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                          <span class="input-group-addon">Subject File</span>
                           <input type="file" class="form-control" name="file" id="file"> 
                       </div>
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                             <input type="submit" id="submit" name="submit" class="btn btn-info" value="Upload File">
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
                $("#submit").click(function(e){
                    if($("#lect_name").val() == ''){
                        $("#lect_name").css("border-color","#DA1908");
                        $("#lect_name").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#subject").val() == ''){
                        $("#subject").css("border-color","#DA1908");
                        $("#subject").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#file").val() == ''){
                        $("#file").css("border-color","#DA1908");
                        $("#file").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_notes_upload').unbind('submit').submit();
                    }
                });
            });
    </script>
        