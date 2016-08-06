@extends('master')
@section('content')

<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Product Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="product_table">
							<thead>
								<tr>
									<th>Product ID</th>
									<th>Product name</th>
									<th>Product Description</th>
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>										
									</tr>
							</tbody>
						</table>
					</div>	
				</div>
				
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#product_modal">Add Product</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#product_modal">Edit Product</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right">Delete Product</button>					
				</center>
				<br>
			</form>
	</div>
</div>	
<!-- MODAL -->
<div class="modal modal-default" id="product_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-5 col-sm-offset-4">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Product Information</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">
        		<div class="box-body">        		
				  	<div class="col-md-10">
					   <div class="form-group">
					      <label>Product Name*</label>
					      <input type="email" class="form-control" id="product_name" placeholder="Product Name">
					    </div>

					    <div class="form-group">
					      <label>Product Description </label>
					      <input type="text" class="form-control" id="product__description" placeholder="Product Description">
					    </div>	


					    <div class="form-group">
					      <label>Product Price *</label>
					      <input type="text" class="form-control" id="product_price" placeholder="Product Price">
					    </div>	

					    <div class="form-group col-md-12">
				          <label for="exampleInputFile">Choose Image</label>
				          <input type="file" id="exampleInputFile">        
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