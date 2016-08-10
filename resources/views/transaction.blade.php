@extends('master')
@section('content')


<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>List of Transactions</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >				
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="transaction_table">
							<thead>
								<tr>
									<th></th>
									<th><center>Transaction ID</center></th>
									<th><center>Customer Name</center></th>
									<th><center>Order #</center></th>
									<th><center>Order Date</center></th>
									<th><center>Order Status</center></th>									
									<th><center>Type</center></th>
									<th><center>Delivery Status</center></th>
								</tr>
							</thead>
							<tbody>				
									<tr>
										<td>
											<div class="checkbox">
											  <label><input type="checkbox" value=""></label>
											</div>
										</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>									
										<td></td>
										<td></td>
										<td></td>
									</tr>
							</tbody>
						</table>
					</div>	

					<div>
						<center>
							<button type="button" class="btn btn-primary">Accept</button>
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ordered_list">View</button>
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
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>
										<td>O</td>
										<td>O</td>										
									</tr>
							</tbody>
						</table>
					</div>	
				</div>	
				<div class="form-group col-md-4">
					<label>Total Amount</label>
					<input type="text" class="form-control" id="trans_total_amount" placeholder="" disabled="">
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


@stop