@extends('master')
@section('content')

<style type="text/css">
	p {
     width: 250px;
     white-space: nowrap;
     overflow: hidden;
     text-overflow: ellipsis;
}
</style>

<div class="col-md-12">
	<div class="form-group col-md-3">
	<label>Search</label>
		<div class="input-group">
			<input type="text" class="form-control">
			<span class="input-group-addon"><i class="fa fa-search"></i></span>
		</div>
	</div>

	<div class="form-group col-md-3">
		<label>Category</label>
		<select class="form-control" style="width: 100%;">
		  <option selected="selected">All</option>
		  <option>Pampabata</option>
		  <option>Pampatanda</option>
		</select>
	</div>

	<div class="form-group col-md-3">
		<label>Brand</label>
		<select class="form-control" style="width: 100%;">
		  <option selected="selected">All</option>
		  <option>Toyo</option>
		  <option>Suka</option>
		</select>
	</div>
</div>


<div class="col-md-12">
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
			<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#add_to_cart">BUY</button>
         </center>
    <!-- end colored -->
    </a>
  </div>  
</div>
<!-- END -->

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
			<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#add_to_cart">BUY</button>
         </center>
    <!-- end colored -->
    </a>
  </div>  
</div>
<!-- END -->

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
			<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#add_to_cart">BUY</button>
         </center>
    <!-- end colored -->
    </a>
  </div>  
</div>
<!-- END -->

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
			<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#add_to_cart">BUY</button>
         </center>
    <!-- end colored -->
    </a>
  </div>  
</div>
<!-- END -->




</div>

















<!-- MODAL -->

<div class="modal modal-default" id="add_to_cart" role="dialog" style="margin-top:10%">
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
<!-- MODAL END -->


@stop


<!-- <div class="panel panel-primary box-body col-md-3" style="margin-top:3%; margin-left:7%;height:100%" >
  <div class="panel-body">	
			<form class="form-horizontal" role="form" >
				<div class="form-group">
					<h4><b>Product Name</b></h4>										
					<h5>Description: {PARA SA LAGNAT}</h5>
				</div>

			
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#add_to_cart">Add to Cart</button>
				</center>
				<br>
			</form>
	</div>
</div>
 -->