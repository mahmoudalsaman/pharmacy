@extends('master')
@section('content')

	
<div class="panel panel-primary box-body" style="margin-top:5%" ng-controller="EmployeeController as vmEmployee">
  <div class="panel-body">
  		<center>
			<h2>Employee Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form">
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmEmployee.dtOptions" dt-columns="vmEmployee.dtColumns" dt-instance="vmEmployee.dtInstance" class="table table-bordered table-hover" id="employee_table">
						</table>
					</div>	
					
				</div>
				
				<center>
					<button id=""  type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#employee_modal">Add Employee</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center" ng-click="vmEmployee.showEmployeeDataOnClick()">Edit Employee</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right"
					ng-click="vmEmployee.deleteEmployeeOnClick()">Delete Employee</button>
				</center>
				<br>
			</form>
	</div>


	<!-- MODAL -->
	<div class="modal modal-default" id="employee_modal" role="dialog" style="margin-top:10%">
	    <div class="col-sm-7 col-sm-offset-3">
	        <div class="modal-content">
	            <div class="modal-header">
	                <center>
	                     <h3><i class="ace-icon fa fa-users"></i>Employee Information</h3>
	                </center>
	            </div>           
	            <div class="modal-body">
	            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" ng-submit="vmEmployee.employeeOnSubmit(vmEmployee.isAdd)">

	        		<div class="box-body">
					  	<div class="col-md-5">
						    <div class="form-group">
						      <label>Firstname *</label>
						      <input type="text" class="form-control" id="emp_fname" placeholder="Firstname" ng-model="vmEmployee.formEmployee.firstName">
						    </div>

						    <div class="form-group">
						      <label>Middlename</label>
						      <input type="text" class="form-control" id="emp_mname" placeholder="Middlename" ng-model="vmEmployee.formEmployee.middleName">
						    </div>

						    <div class="form-group">
						      <label>Lastname*</label>
						      <input type="text" class="form-control" id="emp_lname" placeholder="Lastname" ng-model="vmEmployee.formEmployee.lastName">
						    </div> 

						    <div class="form-group">
				                <label>Branch</label>
				                <select class="form-control select2" style="width: 100%;" ng-model="vmEmployee.formEmployee.branch" ng-options="branch as branch.name for branch in vmEmployee.branches track by branch.branch_id">
				                </select>
				            </div>

						</div>

						<div class="col-md-5 col-md-offset-1">		
							<div class="form-group">
					        <label>Date:</label>
						        <div class="input-group date">
						          <div class="input-group-addon">
						            <i class="fa fa-calendar"></i>
						          </div>
						          <input type="text" class="form-control pull-right" id="datepicker" ng-model="vmEmployee.formEmployee.birthDate">
						        </div>                
					      	</div>

						    <div class="form-group">
						      <label>Mobile Number*</label>
						      <input type="text" class="form-control" id="emp_mobile" placeholder="Mobile Number" ng-model="vmEmployee.formEmployee.phoneNumber">
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

<script type="text/javascript" src="{!! asset('dist/js/angular/employee/employee.js') !!}"></script>
@stop