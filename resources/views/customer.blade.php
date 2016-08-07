@extends('master')
@section('content')


<div class="panel panel-primary box-body" style="margin-top:5%">
  <div class="panel-body">
  		<center>
			<h2>Customer Maintenance</h2>
		</center><br>	
			<form class="form-horizontal" role="form" >
				<div class="form-group">		
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="customer_table">
							<thead>
								<tr>
									<th>Customer ID</th>
									<th>Firstname</th>
									<th>Middlename</th>
									<th>Lastname</th>		
									<th>Birthdate</th>
									<th>Mobile Number</th>	
								</tr>
							</thead>
							<tbody>							
									<tr>
										<td>A</td>
										<td>E</td>
										<td>I</td>
										<td>O</td>
										<td>U</td>
										<td>U</td>									
									</tr>
							</tbody>
						</table>
					</div>	
					
				</div>
				
				<center>
					<button id=""  type="button" class="btn btn-primary column-md-4 span4 text-left" data-toggle="modal" data-target="#customer_modal">Add Customer</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-center"
					data-toggle="modal" data-target="#customer_modal">Edit Customer</button>
					<button id="" type="button" class="btn btn-primary column-md-4 span4 text-right">Delete Customer</button>					
				</center>
				<br>
			</form>
</div>
</div>



<!-- MODAL -->

<div class="modal modal-default" id="customer_modal" role="dialog" style="margin-top:10%">
    <div class="col-sm-7 col-sm-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                     <h3><i class="ace-icon fa fa-users"></i>Customer Information</h3>
                </center>
            </div>           
            <div class="modal-body">
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">

        		<div class="box-body">
				  	<div class="col-md-5">
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

					<div class="col-md-5 col-md-offset-1">								
						<div class="form-group">
				        <label>Date:</label>
					        <div class="input-group date">
					          <div class="input-group-addon">
					            <i class="fa fa-calendar"></i>
					          </div>
					          <input type="text" class="form-control pull-right" id="datepicker">
					        </div>                
				      	</div>
					
						<div class="form-group">
					      <label>Mobile Number*</label>
					      <input type="text" class="form-control" id="cust_mobile" placeholder="Mobile Number">
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