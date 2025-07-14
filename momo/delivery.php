 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br /> 
          <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                     </div>  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="70%">Employee Name</th>  
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>  
                               </tr>  
                               <?php  
                            //   while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["name"]; ?></td>  
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                 
             
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form id="form_delivery" class="form-horizontal" method="post" action="php_action/insert_delivery">
                       <div style="margin-bottom: 25px" class="input-group">
                           <input type="hidden" name="penghantaran_id">
                           <span class="input-group-addon">Username</span>
                           <input class="form-control" type="text" name="username" placeholder="<?php echo $_SESSION["operasi"]; ?>" readonly>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Plat No.</span>
                           <select class="form-control" name="plat_no" id="plat_no">
                                <option value="">-- Select Plat No. --</option>
                               <?php 
                               $query = mysqli_query($con, "SELECT no_plat FROM kenderaan") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['no_plat'].'">'.$row['no_plat'].'</option>';
                               }
                               ?>
                           </select>
                       </div>
                       <div class="panel panel-primary">
                          <div class="panel-heading">Delivery</div>
                            <div class="panel-body">
                            <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand" id="brand" onchange="getType(this.value);">
                                   <option value="">-- Select Brand --</option>
                                   
                                   <?php 
                    
                                    $qry = "SELECT * FROM jenama";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                    <option value="<?php echo $row["jenama_id"]; ?>"><?php echo $row["jenama"]; ?></option>
                                        <?php
                                    }
                
                
                                     ?>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type" id="type">
                                    <option value="">-- Select Type --</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity" id="quantity" />
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Location</span>
                               <select class="form-control" name="location" id="location">
                                    <option value="">-- Select Location --</option>
                               </select>
                           </div>
                        </div>
                    </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Date</span>
                           <input type="date" class="form-control" name="date" id="date" />
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                            <input type="hidden" name="kad_id" value="<?php echo $kad_id; ?>">
                            <span class="input-group-addon">Serial Number</span>
                            <select class="form-control" name="serial_no" id="serial_no">
                                <option value="">-- Select Serial No. --</option>
                                <option value="Cash">Cash</option>
                                
                                <?php 
                               $query = mysqli_query($con, "SELECT no_siri FROM kad_petrol") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['no_siri'].'">'.$row['no_siri'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Fuel Type</span>
                               <select class="form-control" name="fuel_type" id="fuel_type">
                                   <option value="">-- Select Fuel Type --</option>
                                   <option value="Petrol">Petrol</option>
                                   <option value="Diesel">Diesel</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Price (RM)</span>
                           <input type="text" class="form-control" name="price" id="price" />
                       </div>
                       
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                               <input type="submit" id="btn_save" name="btn_save" class="btn btn-info" value="Register"/>
                            </div>
                       </div>
                    </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>