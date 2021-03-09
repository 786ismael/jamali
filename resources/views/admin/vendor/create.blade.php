@php
namespace App\Helpers;
$product_place_holder_image=ImageHelper::getProductPlaceholderImage();
use Illuminate\Support\Facades\Session;
@endphp
@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<h2 style="font-size: 23px;">Add Delivery Boy</h2>
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
				<form method="POST" enctype="multipart/form-data" action="{{ route('admin/delivery_boy/store') }}">
					@csrf
					{{ method_field('PUT') }}
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Zone Name:</label>
									<select class="form-control category-name" name="zone_name">
										<option value="">Select</option>
										@if($data['zones']->isEmpty())
											<option value="">Record Not Found</option>
										@else
											@foreach($data['zones'] as $key => $value)
												<option value="{{$value->zone_id}}" @if(old('zone_name')==$value->zone_id) {{'selected'}} @endif>{{$value->zone_name}}</option>	
											@endforeach
										@endif
									</select>
									@error('zone_name')
										<span class="invalid-feedback" role="alert">
										<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>User Name:</label>
									<input type="text" placeholder="User Name" class="form-control" name="user_name" value="{{old('user_name')}}">
									@error('user_name')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Email:</label>
									<input type="text" placeholder="Email" class="form-control" name="email" value="{{old('email')}}">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Phone Number:</label>
									<input type="text" placeholder="Phone Number" class="form-control" name="phone_number" value="{{old('phone_number')}}">
									@error('phone_number')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Password:</label>
									<input type="password" placeholder="Password" class="form-control" name="password">
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Confirm Password:</label>
									<input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password">
									@error('confirm_password')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							

							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Profile Image:</label>
									<div class="upload-file">
										<button>
											<input type="file" class="form-control" name="profile_image" id="upload-photo-1">
											<span>Choose File</span>
										</button>
									</div>
									<img src="{{$product_place_holder_image}}" id="show-image-1" width="70"  height="70">
									@error('product_image')
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