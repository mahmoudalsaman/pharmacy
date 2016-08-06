@extends('master')
@section('content')

<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Category Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="category_table">
							<thead>
								<tr>
									<th>Category ID</th>
									<th>Category name</th>
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>									
									</tr>
							</tbody>
						</table>
					</div>	
				</div>
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#category_modal">Add Category</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#category_modal">Edit Category</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right">Delete Category</button>					
				</center>
				<br>
			</form>
	</div>
</div>	

<!-- MODAL -->

<div class="modal modal-default" id="category_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-5 col-sm-offset-4">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Category Information</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">
        		<div class="box-body">        		
				  	<div class="col-md-10">
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

					<div class="col-sm-12 modal-footer">
						<center>
							<button type="submit" class="btn btn-primary column-md-4 span4 text-right">Submit</button>
							<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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