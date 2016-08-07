@extends('master')
@section('content')
<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Unit Of Measurement</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="brand_table">
							<thead>
								<tr>
									<th>Uom ID</th>
									<th>Unit of Measurement</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>
									</tr>
							</tbody>
						</table>
					</div>	
					
				</div>
				<center>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#uom_modal">Add Uom</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#uom_modal">Edit Uom</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Delete Uom</button>
				</center>
				<br>
			</form>
	</div>
</div>	

<!-- MODAL -->
<div class="modal modal-default" id="uom_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-6 col-sm-offset-4">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Unit of Measurement</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">
        		<div class="box-body">        

				  	<div class="col-md-12">						  		
					    <div class="form-group">
					      <label>Unit of Measurement</label>
					      <input type="text" class="form-control" id="" placeholder="example mg,gram etc">
					    </div>	

					    <div class="form-group">
					      <label>Description</label>
					      <input type="text" class="form-control" id="" placeholder="Description">
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