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

<div ng-controller="ProductOrderController as vmProductOrder">
<div class="col-md-12" >
	<div class="form-group col-md-3">
	<label>Search</label>
		<div class="input-group">
			<input type="text" class="form-control" ng-model="vmProductOrder.productSearch">
			<span class="input-group-addon"><i class="fa fa-search"></i></span>
		</div>
	</div>

	<div class="form-group col-md-3">
		<label>Category</label>
		<select class="form-control" style="width: 100%;" ng-model="vmProductOrder.category" ng-options="category as category.name for category in vmProductOrder.categories track by category.category_id" ng-change="vmProductOrder.categoryonChange()">  
		</select>
	</div>
</div>


<div class="col-md-12">
<!-- START -->
 <div class="col-md-4" style="margin-top:3%" ng-repeat="product in vmProductOrder.products | filter:vmProductOrder.productSearch">
    <!-- colored -->
    <div class="ih-item square colored effect4"  style="height:100%"><a href="#">
        <div class="img"><img src="images/no-image.jpg" alt="img"></div>
        	<p><b>Product Name: <span ng-bind="product.product_name"></span></b></p>
        	<p style="">Description: <span ng-bind="product.description"></span></p>                          	
        	<p>Price: <span ng-bind="vmProductOrder.formatProductPrice(product.price)"></span></p>
        	<p>Stock: <span ng-bind="product.current_value"></span></p>
  		<center>
  			<button id="" type="button" class="btn btn-primary column-md-4 span4 text-left" ng-click="vmProductOrder.buyOnClick(product.product_id, product.price, product.current_value)">BUY</button>
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
            <form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" ng-submit="vmProductOrder.productOrderOnSubmit()">
        		<div class="box-body">        		
				  	<div class="col-md-10">
					    <div class="form-group">
					    	<label>Quantity:</label>
			               	<input type="number" class="form-control" name="" placeholder="Quantity" ng-model="vmProductOrder.quantity" ng-change="vmProductOrder.quantityOnChange()">
		              	</div>

		              	<div class="form-group">
					      <label>Total Amount*</label>
					      <input type="text" disabled="" class="form-control" id="" placeholder="Total Amount" ng-model="vmProductOrder.totalAmount">
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
</div>

<script type="text/javascript" src="{!! asset('dist/js/angular/product-order/product-order.js') !!}"></script>
<script type="text/javascript" src="{!! asset('dist/js/dir-pagination.js') !!}"></script>
@stop