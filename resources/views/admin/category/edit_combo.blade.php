@php
namespace App\Helpers;
$product_place_holder_image=ImageHelper::getProductPlaceholderImage();
use Illuminate\Support\Facades\Session;
@endphp
@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="top-trip clearfix">
				<h2>Update Product Combo</h2>
			</div>
			<div class="add-driver clear-col">
				@if($message = Session::get('success'))
					<div class="alert alert-success">
						<ul>
							<li>{{ $message }}</li>
						</ul>
					</div>
				@endif

				@if($message = Session::get('error'))
					<div class="alert alert-danger">
						<ul>
							<li>{{ $message }}</li>
						</ul>
					</div>
				@endif
				<form method="POST" enctype="multipart/form-data" action="{{ route('admin/product/update_combo',$data['product_combos']->product_combo_id) }}">
					@csrf
					{{ method_field('PUT') }}
					
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Price:</label>
									<input type="text" placeholder="Price" class="form-control decimal-number price" name="price" value="{{$data['product_combos']->price}}">
									@error('price')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Discount (%):</label>
									<input type="text" placeholder="Discount" class="form-control decimal-number discount" name="discount" value="{{$data['product_combos']->discount}}">
									@error('discount')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Actual Price:</label>
									<input type="text" placeholder="Actual Price" class="form-control decimal-number actual-price" name="actual_price" value="{{$data['product_combos']->actual_price}}" readonly="">
									@error('actual_price')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Stocks:</label>
									<input type="text" placeholder="Stocks" class="form-control decimal-number" name="stock" value="{{$data['product_combos']->stock}}">
									@error('stock')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Quantity:</label>
									<input type="text" placeholder="Quantity" class="form-control decimal-number" name="quantity" value="{{$data['product_combos']->quantity}}">
									@error('quantity')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="buttons">
						<button type="submit" class="same-btn1">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection