@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="driver-data-table">
				<div class="top-trip clearfix">
					<h2>Users</h2>
				</div>
				<div class="data-table">
					<div class="table-fbutton clearfix">
						@if(Session::get('message'))
						<div class="alert @if(Session::get('status')) {{ 'alert-success' }} @else {{ 'alert-danger' }} @endif" role="alert">
						<i class="fa @if(Session::get('status')) fa-check @else fa-times @endif mx-2"></i>
						{{Session::get('message')}}
						</div>
						@endif
					</div>
					<div class="table-responsive">
						<table id="laravel_datatable" class="table" >
							<thead>
								<tr>
									<th align="center">Sr.No.</th>
									<th>Profile Image</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Phone Number.</th>
									<th>Active/Deactive</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection