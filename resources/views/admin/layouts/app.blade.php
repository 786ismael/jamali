<!DOCTYPE html>
<html>
 @include('admin.layouts.head')
 @stack('css')
<body>
	<main class="clearfix">
		 @include('admin.layouts.sidebar')
		<div class="right-block">
			<div class="Navoverlay"></div>
			<div class="right-block-body">
				@include('admin.layouts.header')
				<!------right block body-->
				<div class="dev">
					@section('content')@show
				</div>
			</div>
			<!---footer--->
			@include('admin.layouts.footer')
		</div>
	</main>
<!--script-->
@include('admin.layouts.foot')
@stack('js')
</body>
</html>