@extends('master')
@section('content')


<div class="panel panel-primary box-body" style="margin-top:5%" ng-controller="CustomerController as vmCustomer">
  <div class="panel-body">
  		<center>
			<h2>Customer Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmCustomer.dtOptions" dt-columns="vmCustomer.dtColumns" dt-instance="vmCustomer.dtInstance" class="table table-bordered table-hover" id="customer_table">
						</table>
					</div>	
					
				</div>
			
				<center>
					<button id=""  type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#customer_modal">Add Customer</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					ng-click="vmCustomer.showCustomerDataOnClick()">Edit Customer</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right"
					ng-click="vmCustomer.deleteCustomerOnClick()">Delete Customer</button>					
				</center>
				<br>
			</form>
	</div>

	<!-- MODAL -->
	<div class="modal modal-default" id="customer_modal" role="dialog" style="margin-top:10%">
	    <div class="col-sm-7 col-sm-offset-3">
	        <div class="modal-content">
	            <div class="modal-header">
	                <center>
	                     <h3><i class="ace-icon fa fa-users"></i>Customer Information</h3>
	                </center>
	            </div>           
	            <div class="modal-body">
	            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" ng-submit="vmCustomer.customerOnSubmit(vmCustomer.isAdd)">

	        		<div class="box-body">
					  	<div class="col-md-5">
						    <div class="form-group">
						      <label>Firstname *</label>
						      <input type="text" class="form-control" id="cust_fname" placeholder="Firstname" ng-model="vmCustomer.formCustomer.firstName">
						    </div>

						    <div class="form-group">
						      <label>Middlename</label>
						      <input type="text" class="form-control" id="cust_mname" placeholder="Middlename" ng-model="vmCustomer.formCustomer.middleName">
						    </div>

						    <div class="form-group">
						      <label>Lastname*</label>
						      <input type="text" class="form-control" id="cust_lname" placeholder="Lastname" ng-model="vmCustomer.formCustomer.lastName">
						    </div>   
						</div>

						<div class="col-md-5 col-md-offset-1">								
							<div class="form-group">
					        <label>Date:</label>
						        <div class="input-group date">
						          <div class="input-group-addon">
						            <i class="fa fa-calendar"></i>
						          </div>
						          <input type="text" class="form-control pull-right" id="datepicker" ng-model="vmCustomer.formCustomer.birthDate">
						        </div>                
					      	</div>
						
							<div class="form-group">
						      <label>Mobile Number*</label>
						      <input type="text" class="form-control" id="cust_mobile" placeholder="Mobile Number" ng-model="vmCustomer.formCustomer.phoneNumber">
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

<script type="text/javascript" src="{!! asset('dist/js/angular/customer/customer.js') !!}"></script>
@stop