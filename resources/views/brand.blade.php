@extends('master')
@section('content')

	
<div class="box box-primary">
<div class="col-md-offset-1" style="margin-top:5%">
	<div class="box-header with-border">
	  <h3 class="box-title">Brand Information</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form">
	  	<div class="box-body">
	  	<div class="col-md-6">
		    <div class="form-group">
		      <label>Brand Name*</label>
		      <input type="email" class="form-control" id="brand_name" placeholder="Brand Name">
		    </div>

		    <div class="form-group">
		      <label>Brand Description </label>
		      <input type="text" class="form-control" id="brand__description" placeholder="Brand Description">
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