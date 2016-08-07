@extends('master')
@section('content')

<div class="panel panel-primary box-body" style="margin-top:5%" ng-controller="BrandController as vmBrand">
  <div class="panel-body">
  		<center>
			<h2>Brand Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmBrand.dtOptions" dt-columns="vmBrand.dtColumns" dt-instance="vmBrand.dtInstance" class="table table-bordered table-hover" id="brand_table">
						</table>
					</div>	
					
				</div>
				
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#brand_modal">Add Brand</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#brand_modal">Edit Brand</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right">Delete Brand</button>					
				</center>
				<br>
			</form>
	</div>

	<!-- MODAL -->
	<div class="modal modal-default" id="brand_modal" role="dialog" style="margin-top:10%" ng-controller="BrandAddUpdateController as vmBrandAddUpdate">
	    <div class="col-sm-5 col-sm-offset-4">
	        <div class="modal-content">
	            <div class="modal-header">
	                <center>
	                     <h3><i class="ace-icon fa fa-users"></i>Brand Information</h3>
	                </center>
	            </div>           
	            <div class="modal-body">
	            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" ng-submit="vmBrandAddUpdate.brandOnSubmit()">
	        		<div class="box-body">        		
					  	<div class="col-md-10">
						   <div class="form-group">
						      <label>Brand Name*</label>
						      <input type="text" class="form-control" id="brand_name" placeholder="Brand Name" ng-model="vmBrandAddUpdate.formBrand.brandName">
						    </div>

						    <div class="form-group">
						      <label>Brand Description </label>
						      <input type="text" class="form-control" id="brand_description" placeholder="Brand Description" ng-model="vmBrandAddUpdate.formBrand.brandDescription">
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

<script type="text/javascript" src="{!! asset('dist/js/angular/brand/brand.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/angular/brand/brand-add-update.js') !!}"></script>
@stop