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
	</div>

	<div class="col-md-12" id="hide_show" hidden="">
  		<div class="form-group col-md-3">
	      <label>Delivery Address</label>
	      <input type="text" class="form-control" id="delivery_address" placeholder="Delivery Address">
		</div>	
	</div>	

	<div class="col-md-12" id="">
  		<div class="form-group col-md-1 col-md-offset-3">
	<button type="button" class="btn btn-primary">Proceed to Check Out</button>
	</div>
	</div>
</div>
	
<div class="col-md-12">
	<h3><center>Order Summary</center></h3>
	<hr>
<!-- START -->
	<div class="col-md-4" style="margin-top:3%">
    <!-- colored -->
    <div class="ih-item square colored effect4"  style="height:100%"><a href="#">
        <div class="img"><img src="images/liza.jpg" alt="img"></div>
        	<p><b>Product Name: {asds}</b></p>
        	<p style="">Description: {asdasdadasdasdadasdasdadasdasdadasdasdadasdasdadasdasdadasdasdad}</p>                          	
        	<p>Price: {3.3}</p>
        	<p>Quantity Ordered: </p>
        	<p>Total Amount: </p>
		<center>	
			<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#cart">Edit</button>
			<button type="button" class="btn btn-danger">Delete</button>
         </center>
    <!-- end colored -->
    	</a>
	  </div>  
	</div>
<!-- END -->


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
		    }
		    else
		    {
		       document.getElementById("hide_show").style.display = "none";
		    }
		}

</script>
<!-- MODAL END -->
@stop