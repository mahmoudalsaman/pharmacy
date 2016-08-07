@extends('master')
@section('content')
<div ng-controller="CartController as vmCart">
<div class="col-md-12">
	<h1><center>Cart</center></h1>
	<hr>
	<div class="col-md-12">
		<div class="form-group col-md-3">
	        <label>Delivery Type</label>
	        <select class="form-control" style="width: 100%;" id="delivery_type" ng-model="vmCart.deliveryType" ng-change="vmCart.deliveryTypeOnChange()">
	          <option value="pick-up" selected="selected">Pick-up</option>
	          <option value="delivery">Delivery</option>			                 
	        </select>
	  	</div>


	  	<div class="col-md-3">
			<div class="form-group">
		      <label>Total amount Due</label>
		      <input type="text" class="form-control" id="" disabled="" ng-model="vmCart.totalAmountDue">
		    </div>
		</div>


		<div class="col-md-3">
			<label></label>
			<div class="form-group">
			<button type="button" class="btn btn-danger" ng-click="vmCart.checkOutOnClick()">Proceed to Check Out</button>
		</div>
		</div>

	</div>

	<div class="col-md-12" id="hide_show" ng-if="!vmCart.isPickUp">
  		<div class="form-group col-md-3">
	      <label>Delivery Address</label>
	      <input type="text" class="form-control" id="delivery_address" placeholder="Delivery Address">
		</div>	
	</div>	


	<div class="col-md-12" id="hide_show1" ng-if="!vmCart.isPickUp">
  		<div class="form-group col-md-3">
	      <label>Delivery Charge</label>
	      <input type="text" class="form-control" id="delivery_charge" placeholder="Delivery Charge" disabled="" ng-model="vmCart.deliveryCharge">
		</div>	
	</div>

</div>
	
<div class="col-md-12">


<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Cart</h2>
			<h4>(Order Summary)</h4>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table datatable="" dt-options="vmCart.dtOptions" dt-columns="vmCart.dtColumns" dt-instance="vmCart.dtInstance" class="table table-bordered table-hover" id="">
						</table>
					</div>	
				</div>
				
				<center>					
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#ordered_modal">Edit Order</button>
				</center>
				<br>
			</form>
	</div>
</div>	



</div>


<div class="col-md-12">
	<br><br><br><br>
	<form>
		<center></center>
	</form>
</div>

<!-- MODAL -->
<div class="modal modal-default" id="cart" role="dialog" style="margin-top:10%">
    <div class="col-sm-5 col-sm-offset-4">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-plus"></i> Enter Quantity</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">
        		<div class="box-body">        		
				  	<div class="col-md-10">
					    <div class="form-group">
					    	<label>Quantity:</label>
			               	<input type="number" class="form-control" name="" placeholder="Quantity">
		              	</div>

		              	<div class="form-group">
					      <label>Total Amount*</label>
					      <input type="text" disabled="" class="form-control" id="" placeholder="Total Amount">
					    </div>			
					</div>

					<div class="col-sm-12 modal-footer">
						<center>
							<button type="submit" class="btn btn-primary column-md-4 span4 text-right">Submit</button>
							<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
						</center>
					</div>
				</div>
			</form>  
			</div>	
            
        </div>
    </div>
</div>

</div>


<script type="text/javascript" src="{!! asset('dist/js/angular/cart/cart.js') !!}"></script>
<!-- MODAL END -->
@stop