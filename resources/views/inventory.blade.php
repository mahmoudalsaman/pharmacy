@extends('master')
@section('content')
<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Inventory</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="brand_table">
							<thead>
								<tr>
									<th>Inventory ID</th>
									<th>Branch Name</th>
									<th>Added by</th>
									<th>Product Name</th>
									<th>Previous Value</th>
									<th>Current Value</th>
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>
										<td>A</td>
										<td>E</td>
										<td>I</td>										
									</tr>
							</tbody>
						</table>
					</div>	
					
				</div>
				
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#brand_modal">Add Product</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#brand_modal">Edit Product</button>
				</center>
				<br>
			</form>
	</div>
</div>	

<!-- MODAL -->
<div class="modal modal-default" id="brand_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-7 col-sm-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Inventory Information</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">
        		<div class="box-body">        

				  	<div class="col-md-5">						  		
			            <div class="form-group">
			                <label>Branch</label>
			                <select class="form-control select2" style="width: 100%;">
			                  <option selected="selected">Heaven</option>
			                  <option>Hell</option>
			                </select>
			            </div>				  		

					    <div class="form-group">
					      <label>Employee Name</label>
					      <input type="text" class="form-control" id="added_by" placeholder="Employee Name" disabled="">
					    </div>	

					    <div class="form-group">
					      <label>Product Name</label>
					      <input type="text" class="form-control" id="inv_product" placeholder="Product Name" disabled="">
					    </div>
					</div>


					<div class="col-md-5 col-md-offset-1">						  		
			        			  		
					    <div class="form-group">
					      <label>Previous Value</label>
					      <input type="text" class="form-control" id="added_by" placeholder="Previous Value" disabled="">
					    </div>	

					    <div class="form-group">
					      <label>Added Value</label>
					      <input type="text" class="form-control" id="inv_product" placeholder="Enter number of stocks to be added">
					    </div>

					    <div class="form-group">
						      <label>Current Value</label>
						      <input type="text" class="form-control" id="added_by" placeholder="Previous Value" disabled="">
						    </div>	
						</div>

					<div class="col-sm-12 modal-footer">
						<center>
							<button type="submit" class="btn btn-primary column-md-4 span4 text-right">Submit</button>
							<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
						</center>
					</div>
				</div>
			</form>  
			</div>	
            
        </div>
    </div>
</div>
<!-- MODAL END -->
@stop