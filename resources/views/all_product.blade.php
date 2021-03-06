@extends('admin_layout')
@section('admin_content')
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Products</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<p class="alert-success">
					<?php
						$message=Session::get('message');
						if ($message) {
							echo $message;
							Session::put('message',null);
						}

					?>
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
					</div>
					<div >
						  <a href="{{URL::to('/add-product')}}">
    						<button>Add Product</button>
						</a>
						<button type="reset" class="btn">Cancel</button>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product ID</th>
								  <th>Product Name</th>
								  <th>Product Description</th>
								  <th>Product Image</th>	  
								  <th>Product SKUID</th>
								  <th>Product Price</th>
								  <th>Category Name</th>
								  <!--<th>Brand</th>-->
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						@foreach($all_product_info as $v_product)
						  <tbody>
							<tr>
								<td>{{ $v_product->id }}</td>
								<td class="center">{{ $v_product->product_name }}</td>
								<td class="center">{!! $v_product->product_description !!}</td>
								
								<td> <img src="{{URL::to($v_product->product_image)}}" style="height: 80px; width:80px;"></td>
								<td class="center">{{ $v_product->product_sku }}</td>
								<td class="center">{{ $v_product->product_price }}</td>
								<td class="center">{{ $v_product->category->category_name }}</td>
								

								
								  

								<td class="center">
									@if($v_product->product_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Unactive</span>
									@endif
								</td>
								<td class="center">
								@if($v_product->product_status==1)
								<a class="btn btn-danger" href="{{URL::to('/unactive-product'.$v_product->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
								    <a class="btn btn-success" href="{{URL::to('/active-product'.$v_product->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
									<a class="btn btn-info" href="{{URL::to('/edit-product'.$v_product->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-product'.$v_product->id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  </tbody>
						@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection