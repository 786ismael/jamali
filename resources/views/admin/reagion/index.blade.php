@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="driver-data-table">
				<div class="top-trip clearfix">
			   		   @if(Session::get('message'))
						<div class="alert @if(Session::get('status')) {{ 'alert-success' }} @else {{ 'alert-danger' }} @endif" role="alert">
						<i class="fa @if(Session::get('status')) fa-check @else fa-times @endif mx-2"></i>
						{{Session::get('message')}}
						</div>
						@endif

					<h2>Country List </h2>
				</div>
				<div class="data-table">
					<div class="table-fbutton clearfix">
						<div class="s-btn">
							<div class="searchbar">
								<label>Search :</label>
								<input type="text" name="">
							</div>
							<a href="{{route('admin.region.create')}}"><button>Add Reagion</button></a>
						</div>
					</div>
					<div class="table-responsive">
						<table id="laravel_datatable" class="table" >
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Name</th>
									<th>City</th>
									<th>Status</th>
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
