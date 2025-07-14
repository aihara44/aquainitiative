<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
    <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-md-12">
             <?php include ("leftmenu.php"); ?>
          </div>
        </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="col-md-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">Add Delivery Information</div>
                    </div>
                   <div class="panel-body">
                   <form id="submitProductForm" class="form-horizontal" action="php_action/createDelivery.php" method="post">
                       <div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="Username" class="col-sm-3 control-label">Username </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">				        
					   <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION["operasi"]; ?>" readonly />
				    </div>
	        </div> <!-- /form-group-->
                       
            <div class="form-group">
	        	<label for="DO Number" class="col-sm-3 control-label">DO Number: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="do_number" placeholder="DO Number" name="do_number">
				    </div>
	        </div> <!-- /form-group-->
                       
            <div class="form-group">
	        	<label for="Customer ID" class="col-sm-3 control-label">Customer ID: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customer_id" placeholder="Customer ID" name="customer_id">
				    </div>
	        </div> <!-- /form-group-->
                       
                       <div class="form-group">
	        	<label for="Customer Name" class="col-sm-3 control-label">Customer Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name">
				    </div>
	        </div> <!-- /form-group-->
                       
                       <div class="form-group">
	        	<label for="Address" class="col-sm-3 control-label">Address: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                        <textarea class="form-control" id="address" placeholder="Address" name="address"></textarea>
				    </div>
	        </div> <!-- /form-group-->
              
               <div class="form-group">
	        	<label for="Quantity" class="col-sm-3 control-label">Date: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="date" placeholder="Date" name="date">
				    </div>
	        </div> <!-- /form-group-->
                       
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 1</div>
                           </div>
                           <div class="panel-body">
                           <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT jenama_id, jenama FROM jenama";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="Type" class="col-sm-3 control-label">Type: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="type" placeholder="Type" name="type" >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT jenis_id, jenis FROM jenis";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
              
              <div class="form-group">
	        	<label for="Quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
				    </div>
	        </div> <!-- /form-group-->
                           </div>
                       </div>
                       <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 2</div>
                           </div>
                           <div class="panel-body">
                           <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName2" name="brandName2">
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT jenama FROM jenama";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="Type" class="col-sm-3 control-label">Type: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="type2" placeholder="Type" name="type2" >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT jenis FROM jenis";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
              
              <div class="form-group">
	        	<label for="Quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity2" placeholder="Quantity" name="quantity2">
				    </div>
	        </div> <!-- /form-group-->
                           </div>
                       </div>
                       <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 3</div>
                           </div>
                           <div class="panel-body">
                           <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName3" name="brandName3">
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT jenama FROM jenama";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="Type" class="col-sm-3 control-label">Type: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="type3" placeholder="Type" name="type3" >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT jenis FROM jenis";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
              
              <div class="form-group">
	        	<label for="Quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity3" placeholder="Quantity" name="quantity3">
				    </div>
	        </div> <!-- /form-group-->
                           </div>
                       </div>
                       
            <div class="form-group">
	        	<label for="deliveryStatus" class="col-sm-3 control-label">Platform: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="platform" name="platform">
                          <option value="">~~SELECT~~</option>
                          <option value="Lazada">Lazada</option>
                          <option value="Shopee">Shopee</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	 

	        <div class="form-group">
	        	<label for="deliveryStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="deliveryStatus" name="deliveryStatus">
				      	<option value="">~~SELECT~~</option>
                        <option value="0">Pending</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	 
                           
                       <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	                   </div> <!-- /modal-footer -->
                    </form>
               </div>
            </div>
          </div>
    </div>
</div>
<script src="custom/js/deliveries.js"></script>
<?php require_once 'includes/footer.php'; ?>
