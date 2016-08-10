@extends('master')
@section('content')

<div class="panel panel-primary box-body" style="margin-top:5%" ng-controller="ProductController as vmProduct">
  <div class="panel-body">
  		<center>
			<h2>Product Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmProduct.dtOptions" dt-columns="vmProduct.dtColumns" dt-instance="vmProduct.dtInstance" class="table table-bordered table-hover">
						</table>
					</div>	
				</div>
				
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#product_modal">Add Product</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					ng-click="vmProduct.showProductDataOnClick()">Edit Product</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right"
					ng-click="vmProduct.deleteProductOnClick()">Delete Product</button>					
				</center>
				<br>
			</form>
	</div>

	<!-- MODAL -->
	<div class="modal modal-default" id="product_modal" role="dialog" style="margin-top:10%">
	    <div class="col-sm-7 col-sm-offset-3">
	        <div class="modal-content">
	            <div class="modal-header">
	                <center>
	                     <h3><i class="ace-icon fa fa-users"></i>Product Information</h3>
	                </center>
	            </div>           
	            <div class="modal-body">
	            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" ng-submit="vmProduct.productOnSubmit(vmProduct.isAdd)">
	        		<div class="box-body">        		
					  	<div class="col-md-5">
						   <div class="form-group">
						      <label>Product Name*</label>
						      <input type="text" class="form-control" id="product_name" placeholder="Product Name" ng-model="vmProduct.formProduct.productName">
						    </div>

						    <div class="form-group">
						      <label>Product Description </label>
						      <input type="text" class="form-control" id="product__description" placeholder="Product Description" ng-model="vmProduct.formProduct.productDescription">
						    </div>	


						    <div class="form-group">
						      <label>Product Price *</label>
						      <input type="text" class="form-control" id="product_price" placeholder="Product Price" ng-model="vmProduct.formProduct.productPrice">
						    </div>	

						    <div class="form-group">
						      <label>Dosage Amount *</label>
						      <input type="number" class="form-control" id="product_price" placeholder="Dosage Amount" ng-model="vmProduct.formProduct.dosageAmount">
						    </div>	

						    <div class="form-group">
						      <label>Unit of Measurement</label>
				                <select class="form-control select2" style="width: 100%;" ng-model="vmProduct.formProduct.uom" ng-options="uom as uom.name for uom in vmProduct.uoms track by uom.unit_of_measurement_id">
				                </select>
						    </div>

							<div class="form-group">
						      <label>Quantity *</label>
						      <input type="number" class="form-control" id="product_price" placeholder="Quantity" ng-model="vmProduct.formProduct.quantity">
						    </div>						    	
						</div>


						<div class="col-md-5 col-md-offset-1">
						    <div class="form-group col-md-12"" >
				                <label>Brand</label>
				                <select class="form-control select2" style="width: 100%;" ng-model="vmProduct.formProduct.brand" ng-options="brand as brand.name for brand in vmProduct.brands track by brand.brand_id">
				                </select>
				            </div>

				            <div class="form-group col-md-12"">
				                <label>Category</label>
				                <select class="form-control select2" style="width: 100%;" ng-model="vmProduct.formProduct.category" ng-options="category as category.name for category in vmProduct.categories track by category.category_id">
				                </select>
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
</div>
<script type="text/javascript" src="{!! asset('dist/js/angular/product/product.js') !!}"></script>
@stop