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

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Deliveries</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Deliveries</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>			
				<div class="table-responsive">
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
                            <th>DO Number</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Brand 2</th>
                            <th>Type 2</th>
                            <th>Quantity 2</th>
							<th>Brand 3</th>
							<th>Type 3</th>
							<th>Quantity 3</th>
                            <th>Date</th>
                            <th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->
</div>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Delivery</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">
	      	<div class="div-result">
				<form class="form-horizontal" id="editProductForm" action="php_action/editDelivery.php" method="POST">   
				    	<br />
				<div id="edit-product-messages"></div>
			        <div class="form-group">
			        	<label for="editProductStatus" class="col-sm-3 control-label">Status: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editDeliveryStatus" name="editDeliveryStatus">
						      	<option value="">~~SELECT~~</option>
						      	<option value="1">Delivered</option>
						      	<option value="2">Not Delivered</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->
				  

				</div>
	      	
	      </div> <!-- /modal-body -->      
      </div>
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->
<script src="custom/js/lazada.js"></script>
<?php require_once 'includes/footer.php'; ?>