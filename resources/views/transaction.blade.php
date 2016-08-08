@extends('master')
@section('content')


<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>List of Transactions</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" id="transaction_token">
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="transaction_table">
							<thead>
								<tr>
									{{-- <th class="hidden"><center>Transaction ID</center></th>
									<th></th> --}}
									<th><center>Customer Name</center></th>
									<th><center>Order #</center></th>
									<th><center>Order Date</center></th>
									<th><center>Action</center></th>
									<th><center>Order Status</center></th>
									<th><center>Ordered Product/s</center></th>
									<th><center>Type</center></th>
									<th><center>Delivery Status</center></th>
								</tr>
							</thead>
							<tbody>				
								@foreach($order_transactions as $order_transaction)			
									<tr>
										{{-- <td hidden="">TRAN0001</td>
										<td>
											<div class="checkbox">
											  <label><input type="checkbox" value=""></label>
											</div>
										</td> --}}
										<td>{!! $order_transaction->first_name . ' ' . $order_transaction->middle_name . ' ' . $order_transaction->last_name !!}</td>
										<td>{!! $order_transaction->customer_sales_invoice_id !!}</td>
										<td>{!! $order_transaction->ordered_at !!}</td>
										<td>
											<button type="button" class="btn btn-primary" onclick="approveOnClick('{!! $order_transaction->customer_sales_invoice_id !!}')">
												Approve
											</button>
											<button type="button" class="btn btn-danger" onclick="rejectOnClick('{!! $order_transaction->customer_sales_invoice_id !!}')">
												Reject
											</button>
										</td>
										<td>{!! $order_transaction->status !!}</td>
										<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordered_list">View Details</button></td>
										<td>{!! $order_transaction->remarks !!}</td>
										<td>{!! $order_transaction->delivery_status != null ? $order_transaction->delivery_status : '---' !!}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
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
									<th>Total Amount</th>		
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
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</center>
					</div>
				</div>	
            </form>  
            </div>                      
        </div>
    </div>
</div>

<script type="text/javascript">
	$('#transaction_table').DataTable();

	function approveOnClick(id)
	{
		$.ajax({
			url: '{!! url('pharmacy/api/v1/sales-approvals?isApproved=1&salesInvoiceId=') !!}' + id,
			type: 'POST',
			data: {
				'_token': document.getElementById('transaction_token').value
			},
			success: function(data) {
				alert('Success!');

				window.location.href = '{!! url('transaction') !!}';
			},
			error: function(xhr) {
				alert('An error occurred!');
			}
		});
	}

	function rejectOnClick(id)
	{
		$.ajax({
			url: '{!! url('pharmacy/api/v1/sales-approvals?isApproved=0&salesInvoiceId=') !!}' + id,
			type: 'POST',
			data: {
				'_token': document.getElementById('transaction_token').value
			},
			success: function(data) {
				alert('Success!');

				window.location.href = '{!! url('transaction') !!}';
			},
			error: function(xhr) {
				alert('An error occurred!');
			}
		});
	}
</script>

@stop