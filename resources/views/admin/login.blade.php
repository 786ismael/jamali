@extends('admin.layouts.auth_app')
@section('content')
	<h2>Sign In</h2>
	<form method="POST" action="{{ route('login') }}">
		 @csrf
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
				<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<p class="frgt-pass">
			<a href="{{ route('password.request') }}"><i class="fa fa-lock"></i> Forgot Password</a>
		</p>

		<div class="login-btn">
			<button type="submit" class="same-btn1">Log in</button>
		</div>
	</form>
@endsection