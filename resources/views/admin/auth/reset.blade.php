@extends('admin.layouts.auth_app')
@section('content')
	<h2>Change Password</h2>
		@if (session('status'))
			<div class="alert alert-success" role="alert">
			{{ session('status') }}
			</div>
		@endif
	<form method="POST" action="{{ route('password.update') }}">
		 @csrf
		 <input type="hidden" name="token" value="{{ $token }}">
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
			@error('email')
	            <span class="invalid-feedback" role="alert">
	                <strong style="color: red">{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password">
			@error('password')
	            <span class="invalid-feedback" role="alert">
	                <strong style="color: red">{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation">
			@error('password')
	            <span class="invalid-feedback" role="alert">
	                <strong style="color: red">{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		
		<div class="login-btn">
			<button type="submit" class="same-btn1">Submit</button>
		</div>
	</form>
@endsection