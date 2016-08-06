@extends('master')
@section('content')

	
<div class="box box-primary">
<div class="col-md-offset-1" style="margin-top:5%">
	<div class="box-header with-border">
	  <h3 class="box-title">Customer Information</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form">
	  	<div class="box-body">
	  	<div class="col-md-6">
		    <div class="form-group">
		      <label>Firstname *</label>
		      <input type="text" class="form-control" id="cust_fname" placeholder="Firstname">
		    </div>

		    <div class="form-group">
		      <label>Middlename</label>
		      <input type="text" class="form-control" id="cust_mname" placeholder="Middlename">
		    </div>

		    <div class="form-group">
		      <label>Lastname*</label>
		      <input type="text" class="form-control" id="cust_lname" placeholder="Lastname">
		    </div>   
		</div>

		<div class="form-group">
        <label>Date:</label>
	        <div class="input-group date">
	          <div class="input-group-addon">
	            <i class="fa fa-calendar"></i>
	          </div>
	          <input type="text" class="form-control pull-right" id="datepicker">
	        </div>                
      	</div>

		<div class="col-md-6">
			<div class="form-group">
		      <label>Mobile Number*</label>
		      <input type="text" class="form-control" id="cust_mobile" placeholder="Mobile Number">
		    </div>   

		     <div class="form-group">
		      <label>Address*</label>
		      <input type="text" class="form-control" id="cust_address" placeholder="Address">
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