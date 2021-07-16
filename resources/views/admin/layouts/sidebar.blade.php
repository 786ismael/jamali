<div class="left-wrapper">
	<div class="left-block">
		<button class="close-menu">
			<i class="fa fa-times"></i>
		</button>
		<div class="left-block-body">
			<nav>
				<div class="nav-logo">
					<a href="{{route('dashboard')}}">
						<img src="{{asset('public/admin_assets')}}/images/nav-logo.png" class="logo" width="70px">
						<img src="{{asset('public/admin_assets')}}/images/logo-icon.png" class="logo-icon">
					</a>
				</div>
				<div class="navlink">
					<ul>
						<li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='dashboard')){{'active'}}@endif" href="{{route('dashboard')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
						</li>
						<li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='user')){{'active'}}@endif" href="{{route('admin/user/index')}}"><i class="fa fa-user"></i> <span>Users</span></a>
						</li>

						<li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='vendor')){{'active'}}@endif" href="{{route('admin/vendor/index')}}"><i class="fa fa-users"></i> <span>Vendors</span></a>
						</li>
						<li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='category')){{'active'}}@endif" href="{{route('admin/category/index')}}"><i class="fa fa-list-alt"></i> <span>Categories</span></a>
						</li>
						<li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='order')){{'active'}}@endif" href="{{route('admin/order/index')}}"><i class="fa fa-shopping-cart"></i> <span>Appointments</span></a>
						</li>
						<li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='page')){{'active'}}@endif" href="{{route('landing.index')}}"><i class="fa fa-list-alt"></i> <span>Landing Page</span></a>
						</li>
                        <li>
							<a class="@if((substr(strrchr(url()->current(),"/"),1)=='region')){{'active'}}@endif" href="{{route('admin.region')}}"><i class="fa fa-mars-stroke"></i> <span>Reagion</span></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
