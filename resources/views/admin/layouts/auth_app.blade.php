<!DOCTYPE html>
<html>
 @include('admin.layouts.auth_head')
<body>
	<section class="login-page clearfix">
		<div class="left-bg">
			<div class="overlay"></div>
		</div>
		<div class="right-bg">
		</div>
		<div class="input-box">
			<div class="logo">
				<a>
					<img src="{{asset('public/admin_assets')}}/images/nav-logo.png">
				</a>
			</div>
			<div class="dev">
				@section('content')@show
			</div>
		</div>
	</section>
@include('admin.layouts.auth_foot')
</body>
</html>