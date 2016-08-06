@extends('master')
@section('content')

	
<div class="box box-primary">
<div class="col-md-offset-1" style="margin-top:5%">
	<div class="box-header with-border">
	  <h3 class="box-title">Branch Information</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form">
	  	<div class="box-body">
	  	<div class="col-md-6">
		    <div class="form-group">
		      <label>Branch Name *</label>
		      <input type="text" class="form-control" id="branch_name" placeholder="Branch Name">
		    </div>

		    <div class="form-group">
		      <label>Description</label>
		      <input type="text" class="form-control" id="branch_description" placeholder="Description">
		    </div>

		    <div class="form-group">
		      <label>Branch Adress *</label>
		      <input type="text" class="form-control" id="branch_address" placeholder="Branch Adress">
		    </div>
		  
		</div>	

		<div class="col-md-6">			
		    <div class="form-group">
		      <label>Branch Contact Person*</label>
		      <input type="text" class="form-control" id="branch_contact_person" placeholder="Branch Contant Person">
		    </div>   		    
		</div>	

		<div class="form-group col-md-2">
          <label for="exampleInputFile">Choose Image</label>
          <input type="file" id="exampleInputFile">        
        </div>

		</div>

	  <div class="box-footer ">
	    <button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>
</div>


@stop