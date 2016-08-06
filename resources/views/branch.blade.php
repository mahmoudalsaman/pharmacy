@extends('master')
@section('content')


<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Branch Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="branch_table">
							<thead>
								<tr>
									<th>Branch ID</th>
									<th>Branch Name</th>
									<th>Description</th>
									<th>Address</th>		
									<th>Contact Person</th>								
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>
										<td>O</td>
										<td>U</td>
									</tr>
							</tbody>
						</table>
					</div>	
					
				</div>
				
				<center>
					<button id=""  type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#brand_modal">Add Branch</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#brand_modal">Edit Branch</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right">Delete Branch</button>					
				</center>
				<br>
			</form>
</div>
</div>


<div class="modal modal-default" id="brand_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-7 col-sm-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Branch Information</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">

        		<div class="box-body">
				  	<div class="col-md-5">
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

					<div class="col-md-5 col-md-offset-1">			
					    <div class="form-group">
					      <label>Branch Contact Person*</label>
					      <input type="text" class="form-control" id="branch_contact_person" placeholder="Branch Contant Person">
					    </div>   

					    <div class="form-group">
				          <label for="exampleInputFile">Choose Image"></label>
				          <input type="file" id="exampleInputFile">        
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



@stop