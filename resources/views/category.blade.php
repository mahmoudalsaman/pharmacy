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
                <label>Category Name</label>
                <select class="form-control select2" multiple="multiple" id="category_name" data-placeholder="Category name" style="width: 100%;">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>                 
                </select>
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