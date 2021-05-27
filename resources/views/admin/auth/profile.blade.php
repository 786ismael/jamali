@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<h2 style="font-size: 23px;">Profile</h2>
			<div class="profile-page">
				<div class="row">
					<!--Acount details-->
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
					<div class="col-md-6">

						<div class="profile-details">
							<div class="header">
								<h2>Acount details</h2>
							</div>
							<div class="body">
								<form method="POST" action="{{ route('admin_profile_update') }}">

									 @csrf
									 {{ method_field('PUT') }}
									<div class="form-group">
										<label>First Name:</label>
										<input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$data['user']->first_name}}">
									</div>
									<div class="form-group">
										<label>Last Name:</label>
										<input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{$data['user']->last_name}}">
									</div>
									<div class="form-group">
										<label>Email:</label>
										<input type="email" class="form-control" placeholder="Email" name="email" value="{{$data['user']->email}}" >
									</div>
									<div class="form-group">
										<label>Phone Number:</label>
										<input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{$data['user']->phone_number}}">
									</div>

									<div class="form-group">
										<button type="submit" class="same-btn1">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div><!--end-->

					<!--Password details-->
					<div class="col-md-6">
						<div class="profile-details">
							<div class="header">
								<h2>Change Password</h2>
							</div>
							<div class="body">
								
								<form method="POST" action="{{ route('admin_update_password') }}">
									@csrf
									{{ method_field('PUT') }}
									<div class="form-group">
										<label>Current Password:</label>
										<input type="password" class="form-control" placeholder="Current Password" name="old_password">
										@error('old_password')
											<span class="invalid-feedback" role="alert">
												<strong style="color: red">{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<label>New Password:</label>
										<input type="password" class="form-control" placeholder="Current Password" name="new_password">
										@error('new_password')
											<span class="invalid-feedback" role="alert">
												<strong style="color: red">{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<label>Confirm Password:</label>
										<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
										@error('confirm_password')
											<span class="invalid-feedback" role="alert">
												<strong style="color: red">{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="form-group">
										<button type="submit" class="same-btn1">Change</button>
									</div>
								</form>
							</div>
						</div>
					</div><!--end-->

					<!--Admin Profile Picture-->
					{{-- <div class="col-md-4">
						<div class="profile-details">
							<div class="header">
								<h2>Admin Profile Picture</h2>
							</div>
							<div class="body">
								<form enctype="">
									<div class="profile-picture">
										<input type="file" name="" id="upload-photo">
										<i class="fa fa-upload"></i>
										<img src="{{asset('public/admin_assets')}}/images/profile.jpg" id="profile-img-tag">
									</div>
								</form>
							</div>
						</div>
					</div> --}}<!--end-->

				</div>
			</div>
		</div>
	</div>
	
@endsection