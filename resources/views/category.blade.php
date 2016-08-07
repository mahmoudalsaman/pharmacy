@extends('master')
@section('content')

<div class="panel panel-primary box-body" style="margin-top:5%" ng-controller="CategoryController as vmCategory">
  <div class="panel-body">
  		<center>
			<h2>Category Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmCategory.dtOptions" dt-columns="vmCategory.dtColumns" dt-instance="vmCategory.dtInstance" class="table table-bordered table-hover" id="category_table">
						</table>
					</div>	
				</div>
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#category_modal">Add Category</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#category_modal">Edit Category</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right">Delete Category</button>					
				</center>
				<br>
			</form>
	</div>

	<!-- MODAL -->
	<div class="modal modal-default" id="category_modal" role="dialog" style="margin-top:10%" ng-controller="CategoryAddUpdateController as vmCategoryAddUpdate">
	    <div class="col-sm-5 col-sm-offset-4">
	        <div class="modal-content">
	            <div class="modal-header">
	                <center>
	                     <h3><i class="ace-icon fa fa-users"></i>Category Information</h3>
	                </center>
	            </div>           
	            <div class="modal-body">
	            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" ng-submit="vmCategoryAddUpdate.categoryOnSubmit()">
	        		<div class="box-body">        		
					  	<div class="col-md-10">
						    <div class="form-group">
				                <label>Category Name</label>
				                <input type="text" class="form-control" id="tag_name" placeholder="Category Name" ng-model="vmCategoryAddUpdate.formTag.tagName">
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

<script type="text/javascript" src="{!! asset('dist/js/angular/category/category.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/angular/category/category-add-update.js') !!}"></script>
@stop