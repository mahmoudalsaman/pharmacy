@extends('master')
@section('content')


<div class="panel panel-primary box-body" style="margin-top:5%" ng-controller="BranchController as vmBranch">
  <div class="panel-body">
  		<center>
			<h2>Branch Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmBranch.dtOptions" dt-columns="vmBranch.dtColumns" dt-instance="vmBranch.dtInstance" class="table table-bordered table-hover" id="branch_table">
						</table>
					</div>	
					
				</div>
				
				<center>
					<button id=""  type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#branch_modal">Add Branch</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					ng-click="vmBranch.showBranchDataOnClick(vmBranch.isAdd)">Edit Branch</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right" ng-click="vmBranch.deleteBranchOnClick()">Delete Branch</button>					
				</center>
				<br>
			</form>
	</div>

	<div class="modal modal-default" id="branch_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-7 col-sm-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Branch Information</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" ng-submit="vmBranch.branchOnSubmit()">

        		<div class="box-body">
				  	<div class="col-md-5">
					    <div class="form-group">
					      <label>Branch Name *</label>
					      <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" ng-model="vmBranch.formBranch.branchName">
					    </div>

					    <div class="form-group">
					      <label>Description</label>
					      <input type="text" class="form-control" id="branch_description" placeholder="Description" ng-model="vmBranch.formBranch.branchDescription">
					    </div>

					    <div class="form-group">
					      <label>Branch Adress *</label>
					      <input type="text" class="form-control" id="branch_address" placeholder="Branch Adress" ng-model="vmBranch.formBranch.branchAddress">
					    </div>
					  
					</div>	

					<div class="col-md-5 col-md-offset-1">			
					    <div class="form-group">
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
</div>

<script type="text/javascript" src="{!! asset('dist/js/angular/branch/branch.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/angular/branch/branch-add-update.js') !!}"></script>
@stop