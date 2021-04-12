@extends('admin.layouts.auth_app')
@section('content')
	<h2>Forgot Password</h2>
		@if (session('status'))
			<div class="alert alert-success" role="alert">
			{{ session('status') }}
			</div>
		@endif
	<form method="POST" action="{{ route('password.email') }}">
		 @csrf
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
			@error('email')
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