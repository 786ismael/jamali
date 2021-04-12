@php
namespace App\Helpers;
$user_placeholde_image=ImageHelper::getPlaceholderImage();
$driving_insurance_image=ImageHelper::getDrivingInsuranceImage();
$driving_licence_image=ImageHelper::getDrivingLicenceImage();
use Illuminate\Support\Facades\Session;
@endphp
@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
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
				<form method="POST" enctype="multipart/form-data" action="{{ route('admin/driver/store') }}">
					@csrf
					{{ method_field('PUT') }}
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Name:</label>
									<input type="text" placeholder="Name" class="form-control" name="name" value="{{old('name')}}">
									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Email:</label>
									<input type="email" placeholder="Email" class="form-control" name="email" value="{{old('email')}}">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Mobile No:</label>
									<input type="text" placeholder="Mobile No." class="form-control" name="mobile" value="{{old('mobile')}}">
									@error('mobile')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Emegency No:</label>
									<input type="text" placeholder="Emegency No." class="form-control" name="emergency_mobile" value="{{old('emergency_mobile')}}">
									@error('emergency_mobile')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- <div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Registration Date:</label>
									<input type="date" placeholder="" class="form-control" name="">
								</div>
							</div> --}}
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Profile Image:</label>
									<div class="upload-file">
										<button>
											<input type="file" class="form-control" name="profile_image" id="upload-photo-1">
											<span>Choose File</span>
										</button>
									</div>
									<img src="{{$user_placeholde_image}}" id="show-image-1" width="70"  height="70">
									@error('profile_image')
										<span class="invalid-feedback" role="alert">
										<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>City:</label>
									<select class="form-control" name="city">
										<option value="">Select</option>
										@if($data['cities']->isEmpty())
											<option value="">Record Not Found</option>
										@else
											@foreach($data['cities'] as $key => $value)
												<option value="{{$value->city_id}}" @if(old('city')==$value->city_id) {{'selected'}} @endif>{{$value->name}}</option>	
											@endforeach
										@endif
									</select>
									@error('city')
										<span class="invalid-feedback" role="alert">
										<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							{{-- <div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Driving Licence:</label>
									<div class="upload-file">
										<button>
											<input type="file" class="form-control" name="driving_licence" id="upload-photo-2">
											<span>Choose File</span>	
										</button>
									</div>
									<img src="{{$driving_licence_image}}" id="show-image-2" width="100"  height="70">
									@error('driving_licence')
										<span class="invalid-feedback" role="alert">
										<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Driving Insurance:</label>
									<div class="upload-file">
										<button>
											<input type="file" class="form-control" name="driving_insurance" id="upload-photo-3">
											<span>Choose File</span>
										</button>
									</div>
									<img src="{{$driving_insurance_image}}" id="show-image-3" width="100"  height="70">
									@error('driving_insurance')
											<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
											</span>
									@enderror
								</div>
							</div> --}}

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
						</div>
					</div>
					<div class="buttons">
						<button type="submit" class="same-btn1">Save</button>
						<button class="same-btn1">Reset</button>
						<button class="same-btn2">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection