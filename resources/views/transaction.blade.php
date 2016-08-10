@extends('master')
@section('content')

<div ng-controller="SalesApprovalController as vmSalesApproval">
	<div class="panel panel-primary box-body" style="margin-top:5%">
	  <div class="panel-body">
	  		<center>
				<h2>List of Transactions</h2>
			</center><br>	
				<form class="form-horizontal" role="form" >				
					<div class="form-group">		
						<div class="table-responsive">
							<table datatable="" dt-options="vmSalesApproval.dtOptions" dt-columns="vmSalesApproval.dtColumns" dt-instance="vmSalesApproval.dtInstance" class="table table-bordered table-hover" id="transaction_table">
							</table>
						</div>	

						<div>
							<center>
								<button type="button" class="btn btn-primary" ng-click="vmSalesApproval.approveOrdersOnClick()">Accept</button>
								<button type="button" class="btn btn-warning" ng-click="vmSalesApproval.showSalesDetailsOnClick()">View</button>
							</center>
						</div>
						
					</div>
					<br>
				</form>
		</div>
	</div>




	<div class="modal modal-default" id="ordered_list" role="dialog" style="margin-top:10%">
	    <div class="col-sm-7 col-sm-offset-3">
	        <div class="modal-content">
	            <div class="modal-header">
	                <center>
	                     <h3><i class="ace-icon fa fa-users"></i>Order Details</h3>
	                </center>
	            </div>           
	            <div class="modal-body">
	            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">
	        		<div class="box-body">
					  <div class="form-group">		
						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="branch_table">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Description</th>
										<th>Price</th>
										<th>Quantity Ordered</th>
										<th>Sub Total</th>		
									</tr>
								</thead>
								<tbody>							
										<tr ng-repeat="salesInvoiceDetail in vmSalesApproval.salesInvoiceDetails">
											<td>
												<span ng-bind="salesInvoiceDetail.name"></span>
											</td>
											<td>
												<span ng-bind="salesInvoiceDetail.description"></span>
											</td>
											<td>
												<span ng-bind="salesInvoiceDetail.price"></span>
											</td>
											<td>
												<span ng-bind="salesInvoiceDetail.quantity"></span>
											</td>
											<td>
												<span ng-bind="salesInvoiceDetail.subtotal"></span>
											</td>										
										</tr>
								</tbody>
							</table>
						</div>	
					</div>	
					<div class="form-group col-md-4">
						<label>Total Amount</label>
						<input type="text" class="form-control" id="trans_total_amount" placeholder="" disabled="" ng-model="vmSalesApproval.totalAmount">
					</div>

					<div class="col-sm-12 modal-footer">
							<center>							
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</center>
						</div>
					</div>	
	            </form>  
	            </div>                      
	        </div>
	    </div>
	</div>
</div>

<script type="text/javascript" src="{!! asset('dist/js/angular/sales/sales-approval.js') !!}"></script>
@stop