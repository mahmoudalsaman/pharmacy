@extends('master')
@section('content')

	
<div class="box box-primary">
<div class="col-md-offset-1" style="margin-top:5%">
	<div class="box-header with-border">
	  <h3 class="box-title">Category Information</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form">
	  	<div class="box-body">
	  	<div class="col-md-6">
		    <div class="form-group">
		      <label>Product Name*</label>
		      <input type="email" class="form-control" id="product_name" placeholder="Product Name">
		    </div>

		    <div class="form-group">
		      <label>Product Description </label>
		      <input type="text" class="form-control" id="product__description" placeholder="Product Description">
		    </div>	


		    <div class="form-group">
		      <label>Product Price *</label>
		      <input type="text" class="form-control" id="product_price" placeholder="Product Price">
		    </div>	

		    <div class="form-group col-md-4">
	          <label for="exampleInputFile">Choose Image</label>
	          <input type="file" id="exampleInputFile">        
	        </div>

		</div>
		</div>

	  <div class="box-footer ">
	    <button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>
</div>


@stop