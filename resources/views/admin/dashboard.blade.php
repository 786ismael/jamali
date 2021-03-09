@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="top-trip clearfix">
				<h2>Dashboard</h2>
			</div>
			<div class="dashboard-data clearfix">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="{{url('admin/user')}}">
						<div class="single-data">
							<div class="heading">
								<h3>Total Users</h3>
							</div>
							<div class="txt">
								<div class="img-wrap"><img src="{{asset('public/admin_assets')}}/images/user.png"></div>
								<p>{{$data['user_count']}}</p>
							</div>
						</div>
					     </a>
					</div>
					<!--single-data-->
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="{{url('admin/vendor')}}">
							<div class="single-data">
								<div class="heading">
									<h3>Total Vendors</h3>
								</div>
								<div class="txt">
									<div class="img-wrap"><img src="{{asset('public/admin_assets')}}/images/vendor.png"></div>
									<p>{{$data['delivery_boy_count']}}</p>
								</div>
							</div>
						</a>
					</div>
						<!--single-data-->
						<div class="col-md-3 col-sm-4 col-xs-6">
							<a href="{{url('admin/order')}}">
								<div class="single-data">
									<div class="heading">
										<h3>Total Appointments</h3>
									</div>
									<div class="txt">
										<div class="img-wrap"><img src="{{asset('public/admin_assets')}}/images/appointment.png"></div>
										<p>{{\DB::table('appointments')->whereNull('deleted_at')->count()}}</p>
									</div>
								</div>
							</a>
						</div>
				</div>
			</div>
		</div>
	</div>
@endsection