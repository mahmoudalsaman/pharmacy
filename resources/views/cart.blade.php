@extends('master')
@section('content')
<div class="col-md-12">
	<h1><center>Cart</center></h1>
	<hr>
	<div class="col-md-12">
		<div class="form-group col-md-3">
	        <label>Delivery Type</label>
	        <select class="form-control" style="width: 100%;" id="delivery_type">
	          <option value="pick-up" selected="selected">Pick-up</option>
	          <option value="delivery">Delivery</option>			                 
	        </select>
	  	</div>


	  	<div class="col-md-3">
			<div class="form-group">
		      <label>Total amount Due</label>
		      <input type="text" class="form-control" id="" placeholder="0.00" disabled="">
		    </div>
		</div>


		<div class="col-md-3">
			<label></label>
			<div class="form-group">
			<button type="button" class="btn btn-danger">Proceed to Check Out</button>
		</div>
		</div>

	</div>

	<div class="col-md-12" id="hide_show" hidden="">
  		<div class="form-group col-md-3">
	      <label>Delivery Address</label>
	      <input type="text" class="form-control" id="delivery_address" placeholder="Delivery Address">
		</div>	
	</div>	


	<div class="col-md-12" id="hide_show1" hidden="">
  		<div class="form-group col-md-3">
	      <label>Delivery Charge</label>
	      <input type="text" class="form-control" id="delivery_charge" placeholder="Delivery Charge" disabled="">
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
						<table class="table table-bordered table-hover" id="">
							<thead>
								<tr>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Product Description</th>
									<th>Product Price</th>
									<th>Quantity Ordered</th>
									<th>Total Amount</th>
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>
										<td>A</td>
										<td>E</td>
										<td>I</td>										
									</tr>
							</tbody>
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

<script type="text/javascript">
	

	var cmb = document.getElementById("delivery_type");
		cmb.onchange=newType;
		function newType()
		{   
		    var cmb = document.getElementById("delivery_type");
		    var selectedValue = cmb.options[cmb.selectedIndex].value;
		 
		    
		    if (selectedValue == "delivery")
		    {   document.getElementById("hide_show").style.display = "block";
				document.getElementById("hide_show1").style.display = "block";
		    }
		    else
		    {
		       document.getElementById("hide_show").style.display = "none";
		       document.getElementById("hide_show1").style.display = "none";
		    }
		}

</script>
<!-- MODAL END -->
@stop