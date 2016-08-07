@extends('master')
@section('content')
<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Cart</h2>
			<h4>(Order Summary)</h4>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">

					<div class="col-md-12">
						<div class="form-group col-md-3">
			                <label>Delivery Type</label>
			                <select class="form-control select2" style="width: 100%;">
			                  <option selected="selected">Pick-up</option>
			                  <option>Delivery</option>			                 
			                </select>
		              	</div>
	              	</div>
	              	<div class="col-md-12">
		              	<div class="form-group col-md-3">
					      <label>Delivery Address</label>
					      <input type="text" class="form-control" id="" placeholder="Delivery Address">
				    	</div>	
			    	</div>	

			    	<div class="col-md-12">
		              	<div class="form-group col-md-3">
					      <label>Contact Person</label>
					      <input type="text" class="form-control" id="" placeholder="Contact Person">
				    	</div>	
			    	</div>	

						<table class="table table-bordered table-hover" id="">
							<thead>
								<tr>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Product Description</th>
									<th>Product Price</th>
									<th>Quantity Ordered</th>
									<th>Total Amount</th>
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
					<div class="col-md-offset-9">
						<div class="form-group col-md-12">
					      <label>Total amount Due</label>
					      <input type="text" class="form-control" id="" placeholder="0.00" disabled="">
					    </div>
				    </div>

				</div>
				
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#ordered_modal">Proceed to checkout</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#ordered_modal">Edit Order</button>
				</center>
				<br>
			</form>
	</div>
</div>	

<!-- MODAL -->
<div class="modal modal-default" id="ordered_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-7 col-sm-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i></h3>
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
					
					<div class="col-sm-12 modal-footer">
						<center>
							<button type="button" class="btn btn-primary column-md-4 span4 text-right">Done</button>
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