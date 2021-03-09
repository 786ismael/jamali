<div class="top-nav">
	<div class="nav-item clearfix">
		<div class="left-item">
			<button class="toggle-btn"><i class="fa fa-bars"></i></button>
		</div>
		<div class="right-item">
			{{-- <a href="login.html">
				<button><i class="fa fa-bell"></i> <span>&nbsp;</span></button>
			</a> --}}
			<div class="user-profile">
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">
				<button><i class="fa fa-sign-out"></i></button>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
				</form>
			</div>

			<div class="user-profile">
				<a href="{{route('profile')}}">
					<button><i class="fa fa-user"></i></button>
				</a>
				{{-- <span>

					<h2>{{Auth::user()->user_name}}</h2>
					<h3>{{Auth::user()->last_name}}</h3>
				</span> --}}
			</div>

		</div>
	</div>
	<div class="title-btn clearfix">
		{{-- {{url()->previous()}} --}}
		{{-- {{url()->current()}} --}}
		{{-- @if(substr(strrchr(url()->current(),"/"),2)=='3')
			{{'Ganesh'}}
		@endif
		@if(Request::segment(2).'/'.Request::segment(3)=='1')
		@endif --}}
		{{-- {{ Request::segment(1) }}
		{{ Request::segment(2) }}
		{{ Request::segment(3) }} --}}
		{{-- {{substr(strrchr(url()->current(),"/"),1)}} --}}
		{{-- {{substr(strrchr(url()->current(),"/"),2)}} --}}

		{{-- @if(substr(strrchr(url()->current(),"/"),1)=='profile')
			<a class="title" href="javascript:void(0);">Profile</a>

		@elseif(substr(strrchr(url()->current(),"/"),1)=='dashboard')
			<a class="title" href="javascript:void(0);">Dashboard</a>

		@elseif(substr(strrchr(url()->current(),"/"),1)=='riders')
			<a class="title" href="javascript:void(0);">Product</a>

		@elseif(substr(strrchr(url()->current(),"/"),1)=='invoice')
			<a class="title" href="javascript:void(0);">Invoice</a>
			<a class="back-btn" href="{{route('admin/product/index')}}"><button>Back</button></a>

		@elseif(substr(strrchr(url()->current(),"/"),1)=='details')
			<a class="title" href="javascript:void(0);">Product Details</a>
			<a class="back-btn" href="{{route('admin/product/index')}}"><button>Back</button></a>

		@elseif(substr(strrchr(url()->current(),"/"),1)=='edit')
			<a class="title" href="javascript:void(0);">Edit</a>
			<a class="back-btn" href="{{route('admin/product/index')}}"><button>Back</button></a>
		@elseif(substr(strrchr(url()->current(),"/"),1)=='create')
			<a class="title" href="javascript:void(0);">Create Product</a>
			<a class="back-btn" href="{{route('admin/product/index')}}"><button>Back</button></a>

		@else
			<a class="title" href="javascript:void(0);">Dashboard</a>
		@endif --}}
		<!-- <a class="back-btn" href="driver.html"><button>Back To Listing</button></a> -->
	</div>
</div>